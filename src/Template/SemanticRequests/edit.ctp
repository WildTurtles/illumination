<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $semanticRequest->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $semanticRequest->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['action' => 'index']) ?></li>
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
<div class="semanticRequests form large-9 medium-8 columns content">
    <?= $this->Form->create($semanticRequest) ?>
    <fieldset>
        <legend><?= __('Edit Semantic Request') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('count');
            echo $this->Form->input('category_id', ['options' => $categories]);
            echo $this->Form->input('field');
            echo $this->Form->input('request');
            echo $this->Form->input('block');
            echo $this->Form->input('language_id', ['options' => $languages]);
            echo $this->Form->input('corpus_id', ['options' => $corpuses]);
            echo $this->Form->input('account_id', ['options' => $accounts, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
