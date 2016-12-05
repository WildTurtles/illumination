<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SemanticCocoon Entity
 *
 * @property string $id
 * @property string $name
 * @property int $count
 * @property string $url
 * @property string $request
 * @property int $clusters
 * @property string $language_id
 * @property string $corpus_id
 * @property string $regular_expression
 * @property bool $exclusive
 * @property string $account_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 * @property string $cocoons_category_id
 *
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\Corpus $corpus
 * @property \App\Model\Entity\Account $account
 * @property \App\Model\Entity\QueueElement[] $queue_elements
 * @property \App\Model\Entity\SemanticCocoonResponse[] $semantic_cocoon_responses
 */
class SemanticCocoon extends Entity
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
