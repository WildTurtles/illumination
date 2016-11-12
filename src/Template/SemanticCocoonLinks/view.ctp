<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Semantic Cocoon Link'), ['action' => 'edit', $semanticCocoonLink->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Semantic Cocoon Link'), ['action' => 'delete', $semanticCocoonLink->id], ['confirm' => __('Are you sure you want to delete # {0}?', $semanticCocoonLink->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Links'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Link'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Cocoon Responses'), ['controller' => 'SemanticCocoonResponses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Cocoon Response'), ['controller' => 'SemanticCocoonResponses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semanticCocoonLinks view large-9 medium-8 columns content">
    <h3><?= h($semanticCocoonLink->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($semanticCocoonLink->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semantic Cocoon Response') ?></th>
            <td><?= $semanticCocoonLink->has('semantic_cocoon_response') ? $this->Html->link($semanticCocoonLink->semantic_cocoon_response->id, ['controller' => 'SemanticCocoonResponses', 'action' => 'view', $semanticCocoonLink->semantic_cocoon_response->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Source') ?></th>
            <td><?= $this->Number->format($semanticCocoonLink->source) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Destination') ?></th>
            <td><?= $this->Number->format($semanticCocoonLink->destination) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semanticCocoonLink->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($semanticCocoonLink->updated) ?></td>
        </tr>
    </table>
</div>
