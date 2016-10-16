<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SemanticRequest Entity
 *
 * @property string $id
 * @property string $name
 * @property int $count
 * @property string $category_id
 * @property string $field
 * @property string $request
 * @property string $block
 * @property string $language_id
 * @property string $corpus_id
 * @property string $account_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $updated
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Language $language
 * @property \App\Model\Entity\Corpus $corpus
 * @property \App\Model\Entity\Account $account
 */
class SemanticRequest extends Entity
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
