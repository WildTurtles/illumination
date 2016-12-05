<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cocoons Category'), ['action' => 'edit', $cocoonsCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cocoons Category'), ['action' => 'delete', $cocoonsCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cocoonsCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cocoons Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cocoons Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cocoonsCategories view large-9 medium-8 columns content">
    <h3><?= h($cocoonsCategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($cocoonsCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($cocoonsCategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cocoonsCategory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($cocoonsCategory->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($cocoonsCategory->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Semantic Cocoons') ?></h4>
        <?php if (!empty($cocoonsCategory->semantic_cocoons)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Count') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Request') ?></th>
                <th scope="col"><?= __('Clusters') ?></th>
                <th scope="col"><?= __('Language Id') ?></th>
                <th scope="col"><?= __('Corpus Id') ?></th>
                <th scope="col"><?= __('Regular Expression') ?></th>
                <th scope="col"><?= __('Exclusive') ?></th>
                <th scope="col"><?= __('Account Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col"><?= __('Cocoons Category Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cocoonsCategory->semantic_cocoons as $semanticCocoons): ?>
            <tr>
                <td><?= h($semanticCocoons->id) ?></td>
                <td><?= h($semanticCocoons->name) ?></td>
                <td><?= h($semanticCocoons->count) ?></td>
                <td><?= h($semanticCocoons->url) ?></td>
                <td><?= h($semanticCocoons->request) ?></td>
                <td><?= h($semanticCocoons->clusters) ?></td>
                <td><?= h($semanticCocoons->language_id) ?></td>
                <td><?= h($semanticCocoons->corpus_id) ?></td>
                <td><?= h($semanticCocoons->regular_expression) ?></td>
                <td><?= h($semanticCocoons->exclusive) ?></td>
                <td><?= h($semanticCocoons->account_id) ?></td>
                <td><?= h($semanticCocoons->created) ?></td>
                <td><?= h($semanticCocoons->updated) ?></td>
                <td><?= h($semanticCocoons->cocoons_category_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SemanticCocoons', 'action' => 'view', $semanticCocoons->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SemanticCocoons', 'action' => 'edit', $semanticCocoons->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SemanticCocoons', 'action' => 'delete', $semanticCocoons->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoons->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
