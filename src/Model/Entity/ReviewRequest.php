<?php
namespace Integrateideas\Reviews\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReviewRequest Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $customer_id
 * @property int $business_id
 * @property string $uuid
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \Integrateideas\Reviews\Model\Entity\User $user
 * @property \Integrateideas\Reviews\Model\Entity\Customer $customer
 * @property \Integrateideas\Reviews\Model\Entity\Business $business
 * @property \Integrateideas\Reviews\Model\Entity\BusinessReview[] $business_reviews
 */
class ReviewRequest extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
