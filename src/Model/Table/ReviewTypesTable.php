<?php
namespace Integrateideas\Reviews\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ReviewTypes Model
 *
 * @property \Integrateideas\Reviews\Model\Table\ReviewSettingsTable|\Cake\ORM\Association\HasMany $ReviewSettings
 * @property \Integrateideas\Reviews\Model\Table\BusinessReviewsTable|\Cake\ORM\Association\HasMany $BusinessReviews
 *
 * @method \Integrateideas\Reviews\Model\Entity\ReviewType get($primaryKey, $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewType newEntity($data = null, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewType[] newEntities(array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewType[] patchEntities($entities, array $data, array $options = [])
 * @method \Integrateideas\Reviews\Model\Entity\ReviewType findOrCreate($search, callable $callback = null, $options = [])
 */
class ReviewTypesTable extends Table
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

        $this->setTable('review_types');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('ReviewSettings', [
            'foreignKey' => 'review_type_id',
            'className' => 'Integrateideas/Reviews.ReviewSettings'
        ]);
        $this->hasMany('BusinessReviews', [
            'foreignKey' => 'review_type_id',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
