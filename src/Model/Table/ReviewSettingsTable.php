<?php
namespace Integrateideas\Reviews\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReviewSettings Model
 *
 * @property \Integrateideas\Reviews\Model\Table\ReviewTypesTable|\Cake\ORM\Association\BelongsTo $ReviewTypes
 * @property |\Cake\ORM\Association\BelongsTo $Businesses
 *
 * @method \Integrateideas\Reviews\Model\Entity\ReviewSetting get($primaryKey, $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewSetting newEntity($data = null, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewSetting[] newEntities(array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewSetting|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewSetting patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewSetting[] patchEntities($entities, array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewSetting findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReviewSettingsTable extends Table
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

        $this->setTable('review_settings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ReviewTypes', [
            'foreignKey' => 'review_type_id',
            'joinType' => 'INNER',
            'className' => 'Integrateideas/Reviews.ReviewTypes'
        ]);
        $this->belongsTo('Businesses', [
            'foreignKey' => 'business_id',
            'joinType' => 'INNER',
            'className' => 'Integrateideas/Reviews.Businesses'
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
            ->integer('points')
            ->requirePresence('points', 'create')
            ->notEmpty('points');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->dateTime('is_deleted')
            ->allowEmpty('is_deleted');

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
        $rules->add($rules->existsIn(['review_type_id'], 'ReviewTypes'));
        $rules->add($rules->existsIn(['business_id'], 'Businesses'));

        return $rules;
    }
}
