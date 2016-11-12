<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Links'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="semanticCocoonLinks form large-9 medium-8 columns content">
    <?= $this->Form->create($semanticCocoonLink) ?>
    <fieldset>
        <legend><?= __('Add Semantic Cocoon Link') ?></legend>
        <?php
            echo $this->Form->input('source');
            echo $this->Form->input('destination');
            echo $this->Form->input('semantic_cocoon_response_id', ['options' => $semanticCocoonResponses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
