<?php
namespace Integrateideas\Reviews\Model\Entity;

use Cake\ORM\Entity;

/**
 * ReviewSetting Entity
 *
 * @property int $id
 * @property int $review_type_id
 * @property int $business_id
 * @property int $points
 * @property string $url
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $is_deleted
 *
 * @property \Integrateideas\Reviews\Model\Entity\ReviewType $review_type
 * @property \Integrateideas\Reviews\Model\Entity\Vendor $vendor
 */
class ReviewSetting extends Entity
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
