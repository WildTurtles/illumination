<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Format'), ['action' => 'edit', $format->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Format'), ['action' => 'delete', $format->id], ['confirm' => __('Are you sure you want to delete # {0}?', $format->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="formats view large-9 medium-8 columns content">
    <h3><?= h($format->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($format->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($format->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Visiblis Code') ?></th>
            <td><?= h($format->visiblis_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($format->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($format->updated) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($format->description)); ?>
    </div>
</div>
