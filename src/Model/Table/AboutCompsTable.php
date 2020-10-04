<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AboutComps Model
 *
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\AboutComp get($primaryKey, $options = [])
 * @method \App\Model\Entity\AboutComp newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AboutComp[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AboutComp|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AboutComp|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AboutComp patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AboutComp[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AboutComp findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AboutCompsTable extends Table
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

        $this->setTable('about_comps');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteFiles');

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
            ->scalar('title')
            ->maxLength('title', 220)
            ->notEmpty('title');

        $validator
            ->scalar('description')
            ->notEmpty('description');

        $validator
            ->notEmpty('image', 'Select a picture')
            ->add('image', 'file', [
                    'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                    'message' => 'Extension not valid. It must be JPEG or PNG'
                ]
            );

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
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));

        return $rules;
    }

    public function getLastComp()
    {
        $query = $this->find()
                    ->select(['id', 'company_order'])
                    ->order(['AboutComps.company_order' => 'DESC']);
        return $query->first();
    }

    public function getActualComp($id){
        $query = $this->find()
                    ->select(['id', 'company_order'])
                    ->where(['AboutComps.id = ' => $id]);
        return $query->first();
    }

    public function getPreviewComp($previewCompOrder){
        $query = $this->find()
                    ->select(['id', 'company_order'])
                    ->where(['AboutComps.company_order = ' => $previewCompOrder]);
        return $query->first();
    }

    public function getAboutCompList(){
        $query = $this->find()
                    ->select(['id', 'title', 'description', 'image'])
                    ->where(['AboutComps.situation_id = ' => 1])
                    ->order(['AboutComps.company_order' => 'ASC']);
        return $query;
    }
}
