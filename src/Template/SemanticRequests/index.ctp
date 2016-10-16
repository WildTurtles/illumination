<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Corpuses'), ['controller' => 'Corpuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Corpus'), ['controller' => 'Corpuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticRequests index large-9 medium-8 columns content">
    <h3><?= __('Semantic Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('corpus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticRequests as $semanticRequest): ?>
            <tr>
                <td><?= h($semanticRequest->id) ?></td>
                <td><?= h($semanticRequest->name) ?></td>
                <td><?= $this->Number->format($semanticRequest->count) ?></td>
                <td><?= $semanticRequest->has('category') ? $this->Html->link($semanticRequest->category->name, ['controller' => 'Categories', 'action' => 'view', $semanticRequest->category->id]) : '' ?></td>
                <td><?= $semanticRequest->has('language') ? $this->Html->link($semanticRequest->language->name, ['controller' => 'Languages', 'action' => 'view', $semanticRequest->language->id]) : '' ?></td>
                <td><?= $semanticRequest->has('corpus') ? $this->Html->link($semanticRequest->corpus->name, ['controller' => 'Corpuses', 'action' => 'view', $semanticRequest->corpus->id]) : '' ?></td>
                <td><?= $semanticRequest->has('account') ? $this->Html->link($semanticRequest->account->name, ['controller' => 'Accounts', 'action' => 'view', $semanticRequest->account->id]) : '' ?></td>
                <td><?= h($semanticRequest->created) ?></td>
                <td><?= h($semanticRequest->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semanticRequest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $semanticRequest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semanticRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticRequest->id)]) ?>
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
