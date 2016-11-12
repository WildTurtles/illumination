<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $queueElement->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $queueElement->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Queue Elements'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="queueElements form large-9 medium-8 columns content">
    <?= $this->Form->create($queueElement) ?>
    <fieldset>
        <legend><?= __('Edit Queue Element') ?></legend>
        <?php
            echo $this->Form->input('position');
            echo $this->Form->input('semantic_cocoon_id', ['options' => $semanticCocoons]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
