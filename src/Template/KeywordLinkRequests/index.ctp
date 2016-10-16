<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Keyword Link Request'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['controller' => 'SemanticRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['controller' => 'SemanticRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="keywordLinkRequests index large-9 medium-8 columns content">
    <h3><?= __('Keyword Link Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('keyword_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('semantic_request_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('percentage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keywordLinkRequests as $keywordLinkRequest): ?>
            <tr>
                <td><?= h($keywordLinkRequest->id) ?></td>
                <td><?= $this->Number->format($keywordLinkRequest->count) ?></td>
                <td><?= $keywordLinkRequest->has('keyword') ? $this->Html->link($keywordLinkRequest->keyword->name, ['controller' => 'Keywords', 'action' => 'view', $keywordLinkRequest->keyword->id]) : '' ?></td>
                <td><?= $keywordLinkRequest->has('semantic_request') ? $this->Html->link($keywordLinkRequest->semantic_request->name, ['controller' => 'SemanticRequests', 'action' => 'view', $keywordLinkRequest->semantic_request->id]) : '' ?></td>
                <td><?= $this->Number->format($keywordLinkRequest->percentage) ?></td>
                <td><?= h($keywordLinkRequest->created) ?></td>
                <td><?= h($keywordLinkRequest->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $keywordLinkRequest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $keywordLinkRequest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $keywordLinkRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $keywordLinkRequest->id)]) ?>
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
