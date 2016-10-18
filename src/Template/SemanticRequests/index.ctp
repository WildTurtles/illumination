<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Corpuses'), ['controller' => 'Corpuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Manage Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Configurations'), ['controller' => 'Configurations', 'action' => 'index']) ?></li>
         <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="semanticRequests index large-9 medium-8 columns content">
    <h3><?= __('Semantic Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('corpus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticRequests as $semanticRequest): ?>
            <tr>
                <td><?= h($semanticRequest->name) ?></td>
                <td><?= $this->Number->format($semanticRequest->count) ?></td>
                <td><?= $semanticRequest->has('category') ? $this->Html->link($semanticRequest->category->name, ['controller' => 'Categories', 'action' => 'view', $semanticRequest->category->id]) : '' ?></td>
                <td><?= $semanticRequest->has('language') ? $this->Html->link($semanticRequest->language->name, ['controller' => 'Languages', 'action' => 'view', $semanticRequest->language->id]) : '' ?></td>
                <td><?= $semanticRequest->has('corpus') ? $this->Html->link($semanticRequest->corpus->name, ['controller' => 'Corpuses', 'action' => 'view', $semanticRequest->corpus->id]) : '' ?></td>
                <td><?= $semanticRequest->has('account') ? $this->Html->link($semanticRequest->account->name, ['controller' => 'Accounts', 'action' => 'view', $semanticRequest->account->id]) : '' ?></td>
                <td><?= h($semanticRequest->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semanticRequest->id]) ?>
                    <?= $this->Html->link(__('Execute'), ['action' => 'execute', $semanticRequest->id]) ?>
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
