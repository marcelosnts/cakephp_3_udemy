<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articles Model
 *
 * @property \App\Model\Table\RobotsTable|\Cake\ORM\Association\BelongsTo $Robots
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SituationsTable|\Cake\ORM\Association\BelongsTo $Situations
 * @property \App\Model\Table\ArticlesTpsTable|\Cake\ORM\Association\BelongsTo $ArticlesTps
 * @property \App\Model\Table\ArticlesCatsTable|\Cake\ORM\Association\BelongsTo $ArticlesCats
 *
 * @method \App\Model\Entity\Article get($primaryKey, $options = [])
 * @method \App\Model\Entity\Article newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Article[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Article|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Article patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Article[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Article findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticlesTable extends Table
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

        $this->setTable('articles');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Upload');
        $this->addBehavior('UploadRed');
        $this->addBehavior('DeleteFiles');
        $this->addBehavior('SlugUrl');

        $this->belongsTo('Robots', [
            'foreignKey' => 'robot_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Situations', [
            'foreignKey' => 'situation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ArticlesTps', [
            'foreignKey' => 'articles_tp_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ArticlesCats', [
            'foreignKey' => 'articles_cat_id',
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
            ->scalar('slug')
            ->maxLength('slug', 220)
            ->notEmpty('slug');

        $validator
            ->scalar('keywords')
            ->maxLength('keywords', 220)
            ->notEmpty('keywords');

        $validator
            ->scalar('description')
            ->maxLength('description', 220)
            ->notEmpty('description');

        $validator
            ->integer('viewed')
            ->notEmpty('viewed');

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
        $rules->add($rules->existsIn(['robot_id'], 'Robots'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['situation_id'], 'Situations'));
        $rules->add($rules->existsIn(['articles_tp_id'], 'ArticlesTps'));
        $rules->add($rules->existsIn(['articles_cat_id'], 'ArticlesCats'));

        return $rules;
    }

    public function getArticle($slug = null){
        $query = $this->find()
                    ->select(['id', 'title', 'content', 'created'])
                    ->where(['slug = ' => $slug, 'situation_id' => 1]);

        return $query->first();
    }
    public function getPrevArticle($id = null){
        $query = $this->find()
                    ->select(['id', 'slug'])
                    ->where(['id < ' => $id, 'situation_id' => 1])
                    ->order(['id' => 'DESC']);

        return $query->first();
    }
    public function getNextArticle($id = null){
        $query = $this->find()
                    ->select(['id', 'slug'])
                    ->where(['id > ' => $id, 'situation_id' => 1])
                    ->order(['id' => 'ASC']);

        return $query->first();
    }
    public function getLastArticles($limit = 5, $home = false){
        if($home){
            $select = ['id', 'title', 'description', 'image', 'slug'];
        }else{
            $select = ['id', 'title', 'slug'];
        }

        $query = $this->find()
                    ->select($select)
                    ->where(['situation_id' => 1])
                    ->order(['id' => 'DESC'])
                    ->limit($limit);

        return $query;
    }
    public function getSpotlightArticles(){
        $query = $this->find()
                    ->select(['id', 'title', 'slug'])
                    ->where(['situation_id' => 1])
                    ->order(['viewed' => 'DESC'])
                    ->limit(5);

        return $query;
    }
}
