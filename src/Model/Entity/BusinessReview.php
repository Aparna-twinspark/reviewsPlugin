<?php
namespace Integrateideas\Reviews\Model\Entity;

use Cake\ORM\Entity;

/**
 * BusinessReview Entity
 *
 * @property int $id
 * @property int $business_id
 * @property int $review_type_id
 * @property string $description
 * @property int $user_id
 * @property bool $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $customer_id
 *
 * @property \Integrateideas\Reviews\Model\Entity\Business $business
 * @property \Integrateideas\Reviews\Model\Entity\ReviewType $review_type
 * @property \Integrateideas\Reviews\Model\Entity\User $user
 */
class BusinessReview extends Entity
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
