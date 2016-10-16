<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Keyword Link Requests'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['controller' => 'SemanticRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['controller' => 'SemanticRequests', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="keywordLinkRequests form large-9 medium-8 columns content">
    <?= $this->Form->create($keywordLinkRequest) ?>
    <fieldset>
        <legend><?= __('Add Keyword Link Request') ?></legend>
        <?php
            echo $this->Form->input('count');
            echo $this->Form->input('keyword_id', ['options' => $keywords]);
            echo $this->Form->input('semantic_request_id', ['options' => $semanticRequests]);
            echo $this->Form->input('percentage');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
