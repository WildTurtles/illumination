<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Queue Element'), ['action' => 'edit', $queueElement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Queue Element'), ['action' => 'delete', $queueElement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $queueElement->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Queue Elements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Queue Element'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoons'), ['controller' => 'SemanticCocoons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon'), ['controller' => 'SemanticCocoons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="queueElements view large-9 medium-8 columns content">
    <h3><?= h($queueElement->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($queueElement->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semantic Cocoon') ?></th>
            <td><?= $queueElement->has('semantic_cocoon') ? $this->Html->link($queueElement->semantic_cocoon->name, ['controller' => 'SemanticCocoons', 'action' => 'view', $queueElement->semantic_cocoon->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position') ?></th>
            <td><?= $this->Number->format($queueElement->position) ?></td>
        </tr>
    </table>
</div>
