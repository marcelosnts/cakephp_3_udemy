<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Carousels Controller
 *
 * @property \App\Model\Table\CarouselsTable $Carousels
 *
 * @method \App\Model\Entity\Carousel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarouselsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Positions', 'Colors', 'Situations'],
            'order' => ['Carousels.slide_order' => 'ASC']
        ];
        $carousels = $this->paginate($this->Carousels);

        $this->set(compact('carousels'));
    }

    /**
     * View method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $carousel = $this->Carousels->get($id, [
            'contain' => ['Positions', 'Colors', 'Situations']
        ]);

        $this->set('carousel', $carousel);
    }

    public function changeCarouselOrder($id = null){
        $carouselTable = TableRegistry::get('Carousels');

        $actualSlide = $carouselTable->getActualSlide($id);
        $previewSlideOrder = $actualSlide->slide_order - 1;
        $previewSlide = $carouselTable->getPreviewSlide($previewSlideOrder);

        if($previewSlide){
            $actualCarousel = $this->Carousels->newEntity();
            $actualCarousel->id = $actualSlide->id;
            $actualCarousel->slide_order = $previewSlide->slide_order;
            $this->Carousels->save($actualCarousel);

            $previewCarousel = $this->Carousels->newEntity();
            $previewCarousel->id = $previewSlide->id;
            $previewCarousel->slide_order = $actualSlide->slide_order;
            $this->Carousels->save($previewCarousel);

            $this->Flash->success(__('Slide order updated'));

            return $this->redirect(['controller' => 'Carousels', 'action' => 'index']);
        }else{
            $this->Flash->danger(__('Cannot change slide order'));
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $carousel = $this->Carousels->newEntity();
        if ($this->request->is('post')) {
            $carousel = $this->Carousels->patchEntity($carousel, $this->request->getData());

            if(!$carousel->errors()){
                $carousel->image = $this->Carousels->slugUploadImgRed($this->request->getData()['image']['name']);

                $carouselTable = TableRegistry::get('Carousels');
                $lastSlide = $carouselTable->getLastSlide();
                $carousel->slide_order = $lastSlide->slide_order+1;

                if($resultSave = $this->Carousels->save($carousel)){
                    $id = $resultSave->id;

                    $path = WWW_ROOT . "files" . DS . "carousel" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $carousel->image;

                    if($this->Carousels->uploadImgRed($imgUpload, $path, 1920, 846)){
                        $this->Flash->success(__('Image successfully uploaded'));

                        return $this->redirect(['controller' => 'Carousels', 'action' => 'view', $id]);
                    } else {
                        $this->Flash->danger(__('The image could not be uploaded. Please, try again.'));
                    }
                } else {
                    $this->Flash->danger(__('Slide could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->danger(__('Slide could not be saved'));
            }
        }
        $positions = $this->Carousels->Positions->find('list', ['limit' => 200]);
        $colors = $this->Carousels->Colors->find('list', ['limit' => 200]);
        $situations = $this->Carousels->Situations->find('list', ['limit' => 200]);
        $this->set(compact('carousel', 'positions', 'colors', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $carousel = $this->Carousels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $carousel = $this->Carousels->patchEntity($carousel, $this->request->getData());
            if ($this->Carousels->save($carousel)) {
                $this->Flash->success(__('The carousel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The carousel could not be saved. Please, try again.'));
        }
        $positions = $this->Carousels->Positions->find('list', ['limit' => 200]);
        $colors = $this->Carousels->Colors->find('list', ['limit' => 200]);
        $situations = $this->Carousels->Situations->find('list', ['limit' => 200]);
        $this->set(compact('carousel', 'positions', 'colors', 'situations'));
    }

    public function changeCarouselPic($id = null){
        $carousel = $this->Carousels->get($id);
        $oldImage = $carousel->image;

        if($this->request->is(['patch', 'post', 'put'])){
            $carousel = $this->Carousels->newEntity();
            $carousel = $this->Carousels->patchEntity($carousel, $this->request->getData());

            if(!$carousel->errors()){
                $carousel->image = $this->Carousels->slugUploadImgRed($this->request->getData()['image']['name']);
                $carousel->id = $id;

                if($this->Carousels->save($carousel)){
                    $path = WWW_ROOT. "files" . DS . "carousel" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $carousel->image;

                    if($this->Carousels->uploadImgRed($imgUpload, $path, 1920, 846)){
                        $this->Carousels->deleteOldFile($path, $oldImage, $carousel->image);

                        $this->Flash->success(__('Image updated successfully'));
                        return $this->redirect(['controller' => 'Carousels', 'action' => 'view', $id]);
                    }else{
                        $carousel->image = $oldImage;

                        $this->Carousels->save($carousel);

                        $this->Flash->danger(__('Image cannot be updated.'));
                    }
                }else{
                    $this->Flash->danger(__('Image cannot be updated.'));
                }
            }else{
                $this->Flash->danger(__('Image cannot be updated.'));
            }
        }

        $this->set(compact('carousel'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Carousel id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $carousel = $this->Carousels->get($id);
        $path = WWW_ROOT . 'files' . DS . 'carousel' . DS . $carousel->id . DS;

        $this->Carousels->deleteFiles($path);

        $carouselTable = TableRegistry::get('Carousels');
        $nextSlideList = $carouselTable->getNextSlideList($carousel->slide_order);

        if ($this->Carousels->delete($carousel)) {
            foreach($nextSlideList as $nextSlide){
                $carousel->slide_order = $nextSlide->slide_order - 1;
                $carousel->id = $nextSlide->id;

                $this->Carousels->save($carousel);
            }

            $this->Flash->success(__('The carousel has been deleted.'));
        } else {
            $this->Flash->error(__('The carousel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
