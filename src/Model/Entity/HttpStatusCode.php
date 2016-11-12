<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HttpStatusCode Entity
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $request_for_comment_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\RequestForComment $request_for_comment
 */
class HttpStatusCode extends Entity
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
