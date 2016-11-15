<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QueueElement Entity
 *
 * @property string $id
 * @property int $position
 * @property string $semantic_cocoon_id
 *
 * @property \App\Model\Entity\SemanticCocoon $semantic_cocoon
 */
class QueueElement extends Entity
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