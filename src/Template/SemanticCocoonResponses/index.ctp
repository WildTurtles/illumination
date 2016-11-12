<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Links'), ['controller' => 'SemanticCocoonLinks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Link'), ['controller' => 'SemanticCocoonLinks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Uniform Ressource Locators'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Uniform Ressource Locator'), ['controller' => 'SemanticCocoonUniformRessourceLocators', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticCocoonResponses index large-9 medium-8 columns content">
    <h3><?= __('Semantic Cocoon Responses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('started') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ended') ?></th>
                <th scope="col"><?= $this->Paginator->sort('count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semantic_cocoon_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticCocoonResponses as $semanticCocoonResponse): ?>
            <tr>
                <td><?= h($semanticCocoonResponse->id) ?></td>
                <td><?= h($semanticCocoonResponse->started) ?></td>
                <td><?= h($semanticCocoonResponse->ended) ?></td>
                <td><?= $this->Number->format($semanticCocoonResponse->count) ?></td>
                <td><?= $semanticCocoonResponse->has('semantic_cocoon') ? $this->Html->link($semanticCocoonResponse->semantic_cocoon->name, ['controller' => 'SemanticCocoons', 'action' => 'view', $semanticCocoonResponse->semantic_cocoon->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semanticCocoonResponse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $semanticCocoonResponse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semanticCocoonResponse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonResponse->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
