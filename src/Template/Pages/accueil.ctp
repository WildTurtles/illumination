<?= $this->Html->css('visiblis/kube.css', array('block' => 'css')); ?>
<?= $this->Html->css('visiblis/visiblis-font.css', array('block' => 'css')); ?>
<?= $this->Html->css('visiblis/tools.css', array('block' => 'css')); ?>
<?= $this->Html->css('visiblis/tooltipster.css', array('block' => 'css')); ?>
<?= $this->Html->css('visiblis/jquery.jqGauges.css', array('block' => 'css')); ?>
<?= $this->Html->css('https://fonts.googleapis.com/css?family=Orbitron:400', array('block' => 'css')); ?>

<?php echo $this->Html->script('visiblis/jquery-1.11.0.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.jqGauges.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.tooltipster.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.validate.min.js');?>
<?php echo $this->Html->script('visiblis/visiblis-v2.js');?>

	<table>
		<tr>
			<td>Requête</td>
			<td>Administration</td>
	  </tr>
	  <tr>
		<td><?= $this->Html->link(__('Semantic'), ['controller'=> 'SemanticRequests', 'action' => 'index']) ?></td>
		<td><?= $this->Html->link(__('Users'), ['controller'=> 'Users','action' => 'edit', $this->request->Session()->read('Auth.User.id') ]) ?></td>
	  </tr>
	  <tr>
		<td><?= $this->Html->link(__('Cocoon'), ['controller'=> 'SemanticCocoons','action' => 'index']) ?></td>
		<td><?= $this->Html->link(__('Configuration'), ['controller'=> 'Configurations','action' => 'index']) ?></td>
	  </tr>
	   <tr>
		<td></td>
		<td><?= $this->Html->link(__('Account'), ['controller'=> 'Accounts','action' => 'index']) ?></td>
	  </tr>
	  <tr>
		<td></td>
		<td><?= $this->Html->link(__('Corpus'), ['controller'=> 'Corpuses','action' => 'index']) ?></td>
	  </tr>
	</table>
