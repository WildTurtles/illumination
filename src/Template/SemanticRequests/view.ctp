<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semantic Request'), ['action' => 'edit', $semanticRequest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semantic Request'), ['action' => 'delete', $semanticRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticRequest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Corpuses'), ['controller' => 'Corpuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Corpus'), ['controller' => 'Corpuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semanticRequests view large-9 medium-8 columns content">
    <h3><?= h($semanticRequest->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($semanticRequest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($semanticRequest->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $semanticRequest->has('category') ? $this->Html->link($semanticRequest->category->name, ['controller' => 'Categories', 'action' => 'view', $semanticRequest->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= $semanticRequest->has('language') ? $this->Html->link($semanticRequest->language->name, ['controller' => 'Languages', 'action' => 'view', $semanticRequest->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Corpus') ?></th>
            <td><?= $semanticRequest->has('corpus') ? $this->Html->link($semanticRequest->corpus->name, ['controller' => 'Corpuses', 'action' => 'view', $semanticRequest->corpus->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $semanticRequest->has('account') ? $this->Html->link($semanticRequest->account->name, ['controller' => 'Accounts', 'action' => 'view', $semanticRequest->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Count') ?></th>
            <td><?= $this->Number->format($semanticRequest->count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semanticRequest->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($semanticRequest->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Field') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticRequest->field)); ?>
    </div>
    <div class="row">
        <h4><?= __('Request') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticRequest->request)); ?>
    </div>
    <div class="row">
        <h4><?= __('Block') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticRequest->block)); ?>
    </div>
</div>
