<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Services Model
 *
 * @method \App\Model\Entity\Service get($primaryKey, $options = [])
 * @method \App\Model\Entity\Service newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Service[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Service|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Service patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Service[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Service findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ServicesTable extends Table
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

        $this->setTable('services');
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
            ->scalar('sv_title')
            ->maxLength('sv_title', 220)
            ->requirePresence('sv_title', 'create')
            ->notEmpty('sv_title');

        $validator
            ->scalar('icon_sv_one')
            ->maxLength('icon_sv_one', 45)
            ->requirePresence('icon_sv_one', 'create')
            ->notEmpty('icon_sv_one');

        $validator
            ->scalar('title_sv_one')
            ->maxLength('title_sv_one', 45)
            ->requirePresence('title_sv_one', 'create')
            ->notEmpty('title_sv_one');

        $validator
            ->scalar('desc_sv_one')
            ->requirePresence('desc_sv_one', 'create')
            ->notEmpty('desc_sv_one');

        $validator
            ->scalar('icon_sv_two')
            ->maxLength('icon_sv_two', 45)
            ->requirePresence('icon_sv_two', 'create')
            ->notEmpty('icon_sv_two');

        $validator
            ->scalar('title_sv_two')
            ->maxLength('title_sv_two', 45)
            ->requirePresence('title_sv_two', 'create')
            ->notEmpty('title_sv_two');

        $validator
            ->scalar('desc_sv_two')
            ->requirePresence('desc_sv_two', 'create')
            ->notEmpty('desc_sv_two');

        $validator
            ->scalar('icon_sv_three')
            ->maxLength('icon_sv_three', 45)
            ->requirePresence('icon_sv_three', 'create')
            ->notEmpty('icon_sv_three');

        $validator
            ->scalar('title_sv_three')
            ->maxLength('title_sv_three', 45)
            ->requirePresence('title_sv_three', 'create')
            ->notEmpty('title_sv_three');

        $validator
            ->scalar('desc_sv_three')
            ->requirePresence('desc_sv_three', 'create')
            ->notEmpty('desc_sv_three');

        return $validator;
    }

    public function getServicesList($id){
        $query = $this->get($id);
        return $query;
    }
}
