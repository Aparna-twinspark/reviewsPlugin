<?php
namespace Integrateideas\Reviews\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Utility\Text;

/**
 * ReviewRequests Model
 *
 * @property \Integrateideas\Reviews\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \Integrateideas\Reviews\Model\Table\CustomersTable|\Cake\ORM\Association\BelongsTo $Customers
 * @property \Integrateideas\Reviews\Model\Table\BusinessesTable|\Cake\ORM\Association\BelongsTo $Businesses
 * @property \Integrateideas\Reviews\Model\Table\BusinessReviewsTable|\Cake\ORM\Association\HasMany $BusinessReviews
 *
 * @method \Integrateideas\Reviews\Model\Entity\ReviewRequest get($primaryKey, $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewRequest newEntity($data = null, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewRequest[] newEntities(array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewRequest|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewRequest patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewRequest[] patchEntities($entities, array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewRequest findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReviewRequestsTable extends Table
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

        $this->setTable('review_requests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Integrateideas/Reviews.Users'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
            'joinType' => 'INNER',
            'className' => 'Integrateideas/Reviews.Customers'
        ]);
        $this->belongsTo('Businesses', [
            'foreignKey' => 'business_id',
            'joinType' => 'INNER',
            'className' => 'Integrateideas/Reviews.Businesses'
        ]);
        $this->hasMany('BusinessReviews', [
            'foreignKey' => 'review_request_id',
            'className' => 'Integrateideas/Reviews.BusinessReviews'
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
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        return $validator;
    }

    public function beforeSave( \Cake\Event\Event $event, $entity, \ArrayObject $options){
      if ($entity->isNew()){
           $entity->uuid = Text::uuid();
       }
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['business_id'], 'Businesses'));

        return $rules;
    }
}
