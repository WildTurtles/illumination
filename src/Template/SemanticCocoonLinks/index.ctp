<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Link'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticCocoonLinks index large-9 medium-8 columns content">
    <h3><?= __('Semantic Cocoon Links') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('source') ?></th>
                <th scope="col"><?= $this->Paginator->sort('destination') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semantic_cocoon_response_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticCocoonLinks as $semanticCocoonLink): ?>
            <tr>
                <td><?= h($semanticCocoonLink->id) ?></td>
                <td><?= $this->Number->format($semanticCocoonLink->source) ?></td>
                <td><?= $this->Number->format($semanticCocoonLink->destination) ?></td>
                <td><?= $semanticCocoonLink->has('semantic_cocoon_response') ? $this->Html->link($semanticCocoonLink->semantic_cocoon_response->id, ['controller' => 'SemanticCocoonResponses', 'action' => 'view', $semanticCocoonLink->semantic_cocoon_response->id]) : '' ?></td>
                <td><?= h($semanticCocoonLink->created) ?></td>
                <td><?= h($semanticCocoonLink->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semanticCocoonLink->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $semanticCocoonLink->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semanticCocoonLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonLink->id)]) ?>
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
