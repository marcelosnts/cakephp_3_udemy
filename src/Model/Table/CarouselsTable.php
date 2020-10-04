<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Carousels Model
 *
 * @property \App\Model\Table\PositionsTable|\Cake\ORM\Association\BelongsTo $Positions
 * @property \App\Model\Table\ColorsTable|\Cake\ORM\Association\BelongsTo $Colors
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\Carousel get($primaryKey, $options = [])
 * @method \App\Model\Entity\Carousel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Carousel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Carousel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carousel|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Carousel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Carousel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Carousel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CarouselsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('carousels');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteFiles');

        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Colors', [
            'foreignKey' => 'color_id'
        ]);
        $this->belongsTo('Situations', [
            'foreignKey' => 'situation_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('carousel_name')
            ->maxLength('carousel_name', 220)
            // ->requirePresence('carousel_name', 'create')
            ->notEmpty('carousel_name');

        $validator
            ->notEmpty('image', 'Select a picture')
            ->add('image', 'file', [
                    'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                    'message' => 'Extension not valid. It must be JPEG or PNG'
                ]
            );

        $validator
            ->scalar('title')
            ->maxLength('title', 220)
            ->allowEmpty('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->allowEmpty('description');

        $validator
            ->scalar('button_title')
            ->maxLength('button_title', 220)
            ->allowEmpty('button_title');

        $validator
            ->scalar('link')
            ->maxLength('link', 220)
            ->allowEmpty('link');


        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['color_id'], 'Colors'));
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));

        return $rules;
    }

    public function getLastSlide()
    {
        $query = $this->find()
                    ->select(['id', 'slide_order'])
                    ->order(['Carousels.slide_order' => 'DESC']);
        return $query->first();
    }

    public function getNextSlideList($slideOrder){
        $query = $this->find()
                    ->select(['id', 'slide_order'])
                    ->where(['Carousels.slide_order > ' => $slideOrder])
                    ->order(['Carousels.slide_order' => 'ASC']);
        return $query;
    }

    public function getHomeSlideList(){
        $query = $this->find()
                    ->select([
                                'id',
                                'image',
                                'title',
                                'description',
                                'button_title',
                                'link',
                                'slide_order',
                                'position_id',
                                'color_id',
                                'Positions.position',
                                'Colors.color',
                                'Situations.situation_name'
                            ])
                    ->contain(['Positions', 'Colors', 'Situations'])
                    ->where(['Carousels.situation_id = ' => 1])
                    ->order(['Carousels.slide_order' => 'ASC']);
        return $query;
    }

    public function getActualSlide($id){
        $query = $this->find()
                    ->select(['id', 'slide_order'])
                    ->where(['Carousels.id = ' => $id]);
        return $query->first();
    }

    public function getPreviewSlide($previewSlideOrder){
        $query = $this->find()
                    ->select(['id', 'slide_order'])
                    ->where(['Carousels.slide_order = ' => $previewSlideOrder]);
        return $query->first();
    }
}
