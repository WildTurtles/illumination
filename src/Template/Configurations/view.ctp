<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Configuration'), ['action' => 'edit', $configuration->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Configuration'), ['action' => 'delete', $configuration->id], ['confirm' => __('Are you sure you want to delete # {0}?', $configuration->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Configurations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Configuration'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="configurations view large-9 medium-8 columns content">
    <h3><?= h($configuration->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($configuration->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($configuration->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Key') ?></th>
            <td><?= h($configuration->key) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($configuration->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($configuration->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($configuration->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Default') ?></th>
            <td><?= $configuration->default ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
