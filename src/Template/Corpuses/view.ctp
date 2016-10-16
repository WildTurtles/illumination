<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Corpus'), ['action' => 'edit', $corpus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Corpus'), ['action' => 'delete', $corpus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corpus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Corpuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Corpus'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="corpuses view large-9 medium-8 columns content">
    <h3><?= h($corpus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($corpus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($corpus->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visiblis Number') ?></th>
            <td><?= $this->Number->format($corpus->visiblis_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($corpus->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($corpus->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($corpus->description)); ?>
    </div>
</div>
