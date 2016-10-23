
    <?= $this->Html->css('visiblis/kube.css') ?>
    <?= $this->Html->css('visiblis/visiblis-font.css') ?>
    <?= $this->Html->css('visiblis/tools.css') ?>
    <?= $this->Html->css('visiblis/tooltipster.css') ?>
    <?= $this->Html->css('visiblis/jquery.jqGauges.css') ?>
    
    <?php echo $this->Html->script('visiblis/jquery-1.11.0.min.js');?>
    <?php echo $this->Html->script('visiblis/jquery.jqGauges.min.js');?>
    <?php echo $this->Html->script('visiblis/jquery.tooltipster.min.js');?>
    <?php echo $this->Html->script('visiblis/jquery.validate.min.js');?>
    <?php echo $this->Html->script('visiblis/visiblis-v2.js');?>


<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Semantic Requests'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semantic Request'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="semanticRequests view large-9 medium-8 columns content">
    <h3><?= h($semanticRequest->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($semanticRequest->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $semanticRequest->has('category') ? $this->Html->link($semanticRequest->category->name, ['controller' => 'Categories', 'action' => 'view', $semanticRequest->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= $semanticRequest->has('language') ? $this->Html->link($semanticRequest->language->name, ['controller' => 'Languages', 'action' => 'view', $semanticRequest->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Corpus') ?></th>
            <td><?= $semanticRequest->has('corpus') ? $this->Html->link($semanticRequest->corpus->name, ['controller' => 'Corpuses', 'action' => 'view', $semanticRequest->corpus->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account') ?></th>
            <td><?= $semanticRequest->has('account') ? $this->Html->link($semanticRequest->account->name, ['controller' => 'Accounts', 'action' => 'view', $semanticRequest->account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Count') ?></th>
            <td><?= $this->Number->format($semanticRequest->count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($semanticRequest->created) ?></td>
        </tr>
       
    </table>
    <div class="row">
        <h4><?= __('Field') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticRequest->field)); ?>
    </div>
    <div class="row">
        <h4><?= __('Request') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticRequest->request)); ?>
    </div>
    <div class="row">
        <h4><?= __('Block') ?></h4>
        <?= $this->Text->autoParagraph(h($semanticRequest->block)); ?>
    </div>

   <?php if (!empty($keywordLinkRequests)): ?>
   <div class="keywordLinkRequests index large-9 medium-8 columns content">
    <h3><?= __('Keyword Link Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
		<th scope="col"><?= $this->Paginator->sort('count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('keyword_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('percentage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created', null, ['direction' => 'desc']) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keywordLinkRequests as $keywordLinkRequest): ?>
            <tr>
              
		<td><?= $this->Number->format($keywordLinkRequest->count) ?></td>
                <td><?= $keywordLinkRequest->has('keyword') ? $this->Html->link($keywordLinkRequest->keyword->name, ['controller' => 'Keywords', 'action' => 'view', $keywordLinkRequest->keyword->id]) : '' ?></td>
               
                <td><?= $this->Number->format($keywordLinkRequest->percentage) ?></td>
                <td><?= h($keywordLinkRequest->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $keywordLinkRequest->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $keywordLinkRequest->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $keywordLinkRequest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $keywordLinkRequest->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
   
   <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div> -->
</div>

   <?php endif; ?>
   
   <?php if (!empty($semanticResponses)): ?>
       <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>

                <th scope="col"><?= $this->Paginator->sort('as_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_page') ?></th>
                <th scope="col"><?= $this->Paginator->sort('as_text') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($semanticResponses as $semanticResponse): ?>
                <tr>
                    <td><?= $this->Number->format($semanticResponse->as_title) ?></td>
                    <td><?= $this->Number->format($semanticResponse->as_page) ?></td>
                    <td><?= $this->Number->format($semanticResponse->as_text) ?></td>
                    <td><?= h($semanticResponse->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'SemanticResponses', 'action' => 'view', $semanticResponse->id]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
   <?php endif; ?> 
</div>
