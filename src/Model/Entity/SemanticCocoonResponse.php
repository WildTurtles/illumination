<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SemanticCocoonResponse Entity
 *
 * @property string $id
 * @property \Cake\I18n\Time $started
 * @property \Cake\I18n\Time $ended
 * @property int $count
 * @property string $semantic_cocoon_id
 * @property string $token
 *
 * @property \App\Model\Entity\SemanticCocoon $semantic_cocoon
 * @property \App\Model\Entity\SemanticCocoonLink[] $semantic_cocoon_links
 * @property \App\Model\Entity\SemanticCocoonUniformRessourceLocator[] $semantic_cocoon_uniform_ressource_locators
 */
class SemanticCocoonResponse extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'token'
    ];
}
