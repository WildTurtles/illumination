<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SemanticCocoonUrl Entity
 *
 * @property string $id
 * @property int $id_url_visiblis
 * @property string $url
 * @property float $as_title
 * @property float $as_page
 * @property float $title_semantic_rank
 * @property float $page_semantic_rank
 * @property float $page_rank
 * @property string $http_status_code_id
 * @property string $semantic_cocoon_response_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\HttpStatusCode $http_status_code
 * @property \App\Model\Entity\SemanticCocoonResponse $semantic_cocoon_response
 */
class SemanticCocoonUrl extends Entity
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
