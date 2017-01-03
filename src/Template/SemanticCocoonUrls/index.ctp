<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Url'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Http Status Codes'), ['controller' => 'HttpStatusCodes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Http Status Code'), ['controller' => 'HttpStatusCodes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticCocoonUrls index large-9 medium-8 columns content">
    <h3><?= __('Semantic Cocoon Urls') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_url_visiblis') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_page') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title_semantic_rank') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_semantic_rank') ?></th>
                <th scope="col"><?= $this->Paginator->sort('page_rank') ?></th>
                <th scope="col"><?= $this->Paginator->sort('http_status_code_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semantic_cocoon_response_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticCocoonUrls as $semanticCocoonUrl): ?>
            <tr>
                <td><?= h($semanticCocoonUrl->id) ?></td>
                <td><?= $this->Number->format($semanticCocoonUrl->id_url_visiblis) ?></td>
                <td><?= $this->Number->format($semanticCocoonUrl->as_title) ?></td>
                <td><?= $this->Number->format($semanticCocoonUrl->as_page) ?></td>
                <td><?= $this->Number->format($semanticCocoonUrl->title_semantic_rank) ?></td>
                <td><?= $this->Number->format($semanticCocoonUrl->page_semantic_rank) ?></td>
                <td><?= $this->Number->format($semanticCocoonUrl->page_rank) ?></td>
                <td><?= $semanticCocoonUrl->has('http_status_code') ? $this->Html->link($semanticCocoonUrl->http_status_code->name, ['controller' => 'HttpStatusCodes', 'action' => 'view', $semanticCocoonUrl->http_status_code->id]) : '' ?></td>
                <td><?= $semanticCocoonUrl->has('semantic_cocoon_response') ? $this->Html->link($semanticCocoonUrl->semantic_cocoon_response->id, ['controller' => 'SemanticCocoonResponses', 'action' => 'view', $semanticCocoonUrl->semantic_cocoon_response->id]) : '' ?></td>
                <td><?= h($semanticCocoonUrl->created) ?></td>
                <td><?= h($semanticCocoonUrl->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semanticCocoonUrl->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $semanticCocoonUrl->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semanticCocoonUrl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonUrl->id)]) ?>
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
