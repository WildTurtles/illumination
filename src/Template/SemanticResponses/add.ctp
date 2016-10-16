<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Semantic Responses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['controller' => 'SemanticRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['controller' => 'SemanticRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticResponses form large-9 medium-8 columns content">
    <?= $this->Form->create($semanticResponse) ?>
    <fieldset>
        <legend><?= __('Add Semantic Response') ?></legend>
        <?php
            echo $this->Form->input('count');
            echo $this->Form->input('url');
            echo $this->Form->input('as_title');
            echo $this->Form->input('as_page');
            echo $this->Form->input('as_text');
            echo $this->Form->input('language_id', ['options' => $languages]);
            echo $this->Form->input('semantic_request_id', ['options' => $semanticRequests]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
