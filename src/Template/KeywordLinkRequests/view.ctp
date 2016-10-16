<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Keyword Link Request'), ['action' => 'edit', $keywordLinkRequest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Keyword Link Request'), ['action' => 'delete', $keywordLinkRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $keywordLinkRequest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Keyword Link Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Keyword Link Request'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Keywords'), ['controller' => 'Keywords', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Keyword'), ['controller' => 'Keywords', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['controller' => 'SemanticRequests', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['controller' => 'SemanticRequests', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="keywordLinkRequests view large-9 medium-8 columns content">
    <h3><?= h($keywordLinkRequest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($keywordLinkRequest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Keyword') ?></th>
            <td><?= $keywordLinkRequest->has('keyword') ? $this->Html->link($keywordLinkRequest->keyword->name, ['controller' => 'Keywords', 'action' => 'view', $keywordLinkRequest->keyword->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Semantic Request') ?></th>
            <td><?= $keywordLinkRequest->has('semantic_request') ? $this->Html->link($keywordLinkRequest->semantic_request->name, ['controller' => 'SemanticRequests', 'action' => 'view', $keywordLinkRequest->semantic_request->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Count') ?></th>
            <td><?= $this->Number->format($keywordLinkRequest->count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Percentage') ?></th>
            <td><?= $this->Number->format($keywordLinkRequest->percentage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($keywordLinkRequest->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($keywordLinkRequest->updated) ?></td>
        </tr>
    </table>
</div>
