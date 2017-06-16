<?php
namespace Integrateideas\Reviews\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * BusinessReviews Model
 *
 * @property \Integrateideas\Reviews\Model\Table\BusinessesTable|\Cake\ORM\Association\BelongsTo $Businesses
 * @property \Integrateideas\Reviews\Model\Table\ReviewTypesTable|\Cake\ORM\Association\BelongsTo $ReviewTypes
 * @property \Integrateideas\Reviews\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview get($primaryKey, $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview newEntity($data = null, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview[] newEntities(array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview[] patchEntities($entities, array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\BusinessReview findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BusinessReviewsTable extends Table
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

        $this->setTable('business_reviews');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Businesses', [
            'foreignKey' => 'business_id',
            'joinType' => 'INNER',
            'className' => 'Integrateideas/Reviews.Businesses'
        ]);
        $this->belongsTo('ReviewTypes', [
            'foreignKey' => 'review_type_id',
            'joinType' => 'INNER',
            'className' => 'Integrateideas/Reviews.ReviewTypes'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => 'Integrateideas/Reviews.Users'
        ]);
        // pr(Configure::read('ReviewPlugin.CustomerModel'));die;
        $this->belongsTo(Configure::read('ReviewPlugin.CustomerModel'), [
            'foreignKey' => Configure::read('ReviewPlugin.CustomerForeignKey'),
            'joinType' => 'INNER'        ]);
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
            ->allowEmpty('description');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['business_id'], 'Businesses'));
        $rules->add($rules->existsIn(['review_type_id'], 'ReviewTypes'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn([Configure::read('ReviewPlugin.CustomerForeignKey')], Configure::read('ReviewPlugin.CustomerModel')));

        return $rules;
    }
}
