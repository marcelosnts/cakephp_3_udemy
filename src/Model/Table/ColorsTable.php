<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Colors Model
 *
 * @property \App\Model\Table\CarouselsTable|\Cake\ORM\Association\HasMany $Carousels
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\HasMany $Situations
 *
 * @method \App\Model\Entity\Color get($primaryKey, $options = [])
 * @method \App\Model\Entity\Color newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Color[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Color|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Color|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Color patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Color[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Color findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ColorsTable extends Table
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

        $this->setTable('colors');
        $this->setDisplayField('color_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Carousels', [
            'foreignKey' => 'color_id'
        ]);
        $this->hasMany('Situations', [
            'foreignKey' => 'color_id'
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
            ->scalar('color_name')
            ->maxLength('color_name', 45)
            ->requirePresence('color_name', 'create')
            ->notEmpty('color_name');

        $validator
            ->scalar('color')
            ->maxLength('color', 45)
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        return $validator;
    }
}
