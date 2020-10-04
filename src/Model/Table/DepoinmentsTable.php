<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Depoinments Model
 *
 * @method \App\Model\Entity\Depoinment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Depoinment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Depoinment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Depoinment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Depoinment|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Depoinment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Depoinment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Depoinment findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DepoinmentsTable extends Table
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

        $this->setTable('depoinments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('depoinment_name')
            ->maxLength('depoinment_name', 220)
            ->requirePresence('depoinment_name', 'create')
            ->notEmpty('depoinment_name');

        $validator
            ->scalar('depoinment_desc')
            ->maxLength('depoinment_desc', 220)
            ->requirePresence('depoinment_desc', 'create')
            ->notEmpty('depoinment_desc');

        $validator
            ->scalar('video_one')
            ->maxLength('video_one', 320)
            ->requirePresence('video_one', 'create')
            ->notEmpty('video_one');

        $validator
            ->scalar('video_two')
            ->maxLength('video_two', 320)
            ->requirePresence('video_two', 'create')
            ->notEmpty('video_two');

        $validator
            ->scalar('video_three')
            ->maxLength('video_three', 320)
            ->requirePresence('video_three', 'create')
            ->notEmpty('video_three');

        return $validator;
    }

    public function getDepoinmentsList($id){
        $query = $this->get($id);
        return $query;
    }
}
