<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SemanticResponse Entity
 *
 * @property string $id
 * @property int $count
 * @property string $url
 * @property float $as_title
 * @property float $as_page
 * @property float $as_text
 * @property string $language_id
 * @property string $semantic_request_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\SemanticRequest $semantic_request
 */
class SemanticResponse extends Entity
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
