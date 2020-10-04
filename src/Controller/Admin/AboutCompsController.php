<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * AboutComps Controller
 *
 * @property \App\Model\Table\AboutCompsTable $AboutComps
 *
 * @method \App\Model\Entity\AboutComp[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AboutCompsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Situations'],
            'order' => ['AboutComps.company_order' => 'ASC']
        ];
        $aboutComps = $this->paginate($this->AboutComps);

        $this->set(compact('aboutComps'));
    }

    /**
     * View method
     *
     * @param string|null $id About Comp id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aboutComp = $this->AboutComps->get($id, [
            'contain' => ['Situations']
        ]);

        $this->set('aboutComp', $aboutComp);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aboutComp = $this->AboutComps->newEntity();
        if ($this->request->is('post')) {
            $aboutComp = $this->AboutComps->patchEntity($aboutComp, $this->request->getData());

            if(!$aboutComp->errors()){
                $aboutComp->image = $this->AboutComps->slugUploadImgRed($this->request->getData()['image']['name']);

                $aboutCompTable = TableRegistry::get('AboutComps');
                $lastCompany = $aboutCompTable->getLastComp();
                $aboutComp->company_order = $lastCompany->company_order+1;

                if($resultSave = $this->AboutComps->save($aboutComp)){
                    $id = $resultSave->id;

                    $path = WWW_ROOT . "files" . DS . "aboutComp" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $aboutComp->image;

                    if($this->AboutComps->uploadImgRed($imgUpload, $path, 500, 400)){
                        $this->Flash->success(__('Image successfully uploaded'));

                        return $this->redirect(['controller' => 'AboutComps', 'action' => 'view', $id]);
                    } else {
                        $this->Flash->danger(__('The image could not be uploaded. Please, try again.'));
                    }
                } else {
                    $this->Flash->danger(__('Company could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->danger(__('Company could not be saved'));
            }
        }
        $situations = $this->AboutComps->Situations->find('list', ['limit' => 200]);
        $this->set(compact('aboutComp', 'situations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id About Comp id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aboutComp = $this->AboutComps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aboutComp = $this->AboutComps->patchEntity($aboutComp, $this->request->getData());
            if ($this->AboutComps->save($aboutComp)) {
                $this->Flash->success(__('The about comp has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The about comp could not be saved. Please, try again.'));
        }
        $situations = $this->AboutComps->Situations->find('list', ['limit' => 200]);
        $this->set(compact('aboutComp', 'situations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id About Comp id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aboutComp = $this->AboutComps->get($id);
        if ($this->AboutComps->delete($aboutComp)) {
            $this->Flash->success(__('The about comp has been deleted.'));
        } else {
            $this->Flash->error(__('The about comp could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function changeCompanyOrder($id){
        $aboutCompsTable = TableRegistry::get('AboutComps');

        $actualComp = $aboutCompsTable->getActualComp($id);
        $previewCompOrder = $actualComp->company_order - 1;
        $previewComp = $aboutCompsTable->getPreviewComp($previewCompOrder);

        if($previewComp){
            $actualAboutComp = $this->AboutComps->newEntity();
            $actualAboutComp->id = $actualComp->id;
            $actualAboutComp->company_order = $previewComp->company_order;
            $this->AboutComps->save($actualAboutComp);

            $previewAboutComp = $this->AboutComps->newEntity();
            $previewAboutComp->id = $previewComp->id;
            $previewAboutComp->company_order = $actualComp->company_order;
            $this->AboutComps->save($previewAboutComp);

            $this->Flash->success(__('Company order updated'));

            return $this->redirect(['controller' => 'AboutComps', 'action' => 'index']);
        }else{
            $this->Flash->danger(__('Cannot change company order'));
        }
    }

    public function changeCompPic($id = null){
        $aboutComp = $this->AboutComps->get($id);
        $oldImage = $aboutComp->image;

        if($this->request->is(['patch', 'post', 'put'])){
            $aboutComp = $this->AboutComps->newEntity();
            $aboutComp = $this->AboutComps->patchEntity($aboutComp, $this->request->getData());

            if(!$aboutComp->errors()){
                $aboutComp->image = $this->AboutComps->slugUploadImgRed($this->request->getData()['image']['name']);
                $aboutComp->id = $id;

                if($this->AboutComps->save($aboutComp)){
                    $path = WWW_ROOT. "files" . DS . "aboutComp" . DS . $id . DS;
                    $imgUpload = $this->request->getData()['image'];
                    $imgUpload['name'] = $aboutComp->image;

                    if($this->AboutComps->uploadImgRed($imgUpload, $path, 500, 400)){
                        $this->AboutComps->deleteOldFile($path, $oldImage, $aboutComp->image);

                        $this->Flash->success(__('Image updated successfully'));
                        return $this->redirect(['controller' => 'AboutComps', 'action' => 'view', $id]);
                    }else{
                        $aboutComp->image = $oldImage;

                        $this->AboutComps->save($aboutComp);

                        $this->Flash->danger(__('Image cannot be updated.'));
                    }
                }else{
                    $this->Flash->danger(__('Image cannot be updated.'));
                }
            }else{
                $this->Flash->danger(__('Image cannot be updated.'));
            }
        }

        $this->set(compact('aboutComp'));
    }
}
