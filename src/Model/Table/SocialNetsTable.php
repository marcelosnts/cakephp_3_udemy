<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SocialNets Model
 *
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 *
 * @method \App\Model\Entity\SocialNet get($primaryKey, $options = [])
 * @method \App\Model\Entity\SocialNet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SocialNet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SocialNet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialNet|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SocialNet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SocialNet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SocialNet findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SocialNetsTable extends Table
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

        $this->setTable('social_nets');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('link')
            ->maxLength('link', 220)
            ->requirePresence('link', 'create')
            ->notEmpty('link');

        $validator
            ->scalar('icon')
            ->maxLength('icon', 45)
            ->requirePresence('icon', 'create')
            ->notEmpty('icon');

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

    public function getSocialNets(){
        $query = $this->find()
                    ->select(['title', 'link', 'icon'])
                    ->where(['situation_id = ' => 1])
                    ->limit(5);

        return $query;
    }
}
