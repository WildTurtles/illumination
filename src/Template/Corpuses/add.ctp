<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Corpuses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="corpuses form large-9 medium-8 columns content">
    <?= $this->Form->create($corpus) ?>
    <fieldset>
        <legend><?= __('Add Corpus') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('visiblis_number');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
