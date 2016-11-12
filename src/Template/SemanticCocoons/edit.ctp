<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $semanticCocoon->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoon->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Corpuses'), ['controller' => 'Corpuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Corpus'), ['controller' => 'Corpuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Accounts'), ['controller' => 'Accounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Account'), ['controller' => 'Accounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Queue Elements'), ['controller' => 'QueueElements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Queue Element'), ['controller' => 'QueueElements', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticCocoons form large-9 medium-8 columns content">
    <?= $this->Form->create($semanticCocoon) ?>
    <fieldset>
        <legend><?= __('Edit Semantic Cocoon') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('count');
            echo $this->Form->input('url');
            echo $this->Form->input('request');
            echo $this->Form->input('clusters');
            echo $this->Form->input('language_id', ['options' => $languages]);
            echo $this->Form->input('corpus_id', ['options' => $corpuses]);
            echo $this->Form->input('regular_expression');
            echo $this->Form->input('exclusive');
            echo $this->Form->input('account_id', ['options' => $accounts]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
