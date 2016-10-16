<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * KeywordLinkRequest Entity
 *
 * @property string $id
 * @property int $count
 * @property string $keyword_id
 * @property string $semantic_request_id
 * @property float $percentage
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Keyword $keyword
 * @property \App\Model\Entity\SemanticRequest $semantic_request
 */
class KeywordLinkRequest extends Entity
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
