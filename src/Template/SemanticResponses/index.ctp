<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semantic Response'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['controller' => 'SemanticRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['controller' => 'SemanticRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticResponses index large-9 medium-8 columns content">
    <h3><?= __('Semantic Responses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_page') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_text') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semantic_request_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticResponses as $semanticResponse): ?>
            <tr>
                <td><?= h($semanticResponse->id) ?></td>
                <td><?= $this->Number->format($semanticResponse->count) ?></td>
                <td><?= $this->Number->format($semanticResponse->as_title) ?></td>
                <td><?= $this->Number->format($semanticResponse->as_page) ?></td>
                <td><?= $this->Number->format($semanticResponse->as_text) ?></td>
                <td><?= $semanticResponse->has('language') ? $this->Html->link($semanticResponse->language->name, ['controller' => 'Languages', 'action' => 'view', $semanticResponse->language->id]) : '' ?></td>
                <td><?= $semanticResponse->has('semantic_request') ? $this->Html->link($semanticResponse->semantic_request->name, ['controller' => 'SemanticRequests', 'action' => 'view', $semanticResponse->semantic_request->id]) : '' ?></td>
                <td><?= h($semanticResponse->created) ?></td>
                <td><?= h($semanticResponse->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semanticResponse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $semanticResponse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semanticResponse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticResponse->id)]) ?>
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
