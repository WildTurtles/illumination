<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Corpuses'), ['controller' => 'Corpuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
       <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<div class="semanticCocoons index large-9 medium-8 columns content">
    <h3><?= __('Semantic Cocoons') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clusters') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cocoons_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('corpus_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticCocoons as $semanticCocoon): ?>
            <tr>
                <td><?= h($semanticCocoon->name) ?></td>
                <td><?= $this->Number->format($semanticCocoon->count) ?></td>
                <td><?= $this->Number->format($semanticCocoon->clusters) ?></td>
                <td><?= $semanticCocoon->has('cocoons_category') ? $this->Html->link($semanticCocoon->cocoon_category->name, ['controller' => 'CocoonCategories', 'action' => 'view', $semanticCocoon->cocoons_category->id]) : '' ?></td>
                <td><?= $semanticCocoon->has('language') ? $this->Html->link($semanticCocoon->language->name, ['controller' => 'Languages', 'action' => 'view', $semanticCocoon->language->id]) : '' ?></td>
                <td><?= $semanticCocoon->has('corpus') ? $this->Html->link($semanticCocoon->corpus->name, ['controller' => 'Corpuses', 'action' => 'view', $semanticCocoon->corpus->id]) : '' ?></td>
                <td><?= $semanticCocoon->has('account') ? $this->Html->link($semanticCocoon->account->name, ['controller' => 'Accounts', 'action' => 'view', $semanticCocoon->account->id]) : '' ?></td>
                <td><?= h($semanticCocoon->created) ?></td>
                                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $semanticCocoon->id]) ?>
                    <?= $this->Html->link(__('Execute'), ['action' => 'cocoon', $semanticCocoon->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $semanticCocoon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoon->id)]) ?>
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
