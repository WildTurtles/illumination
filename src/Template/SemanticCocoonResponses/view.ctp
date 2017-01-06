<?= $this->Html->css('visiblis/kube.css'); ?>
<?= $this->Html->css('visiblis/visiblis-font.css'); ?>
<?= $this->Html->css('visiblis/tools.css'); ?>
<?= $this->Html->css('visiblis/tooltipster.css'); ?>
<?= $this->Html->css('visiblis/jquery.jqGauges.css'); ?>

<?php echo $this->Html->script('visiblis/jquery-1.11.0.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.jqGauges.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.tooltipster.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.validate.min.js');?>
<?php echo $this->Html->script('visiblis/visiblis-v2.js');?>

<?php echo $this->Html->script('src/sigma.core.js');?>
<?php echo $this->Html->script('src/conrad.js');?>
<?php echo $this->Html->script('src/utils/sigma.utils.js');?>
<?php echo $this->Html->script('src/utils/sigma.polyfills.js');?>
<?php echo $this->Html->script('src/sigma.settings.js');?>
<?php echo $this->Html->script('src/classes/sigma.classes.dispatcher.js');?>
<?php echo $this->Html->script('src/classes/sigma.classes.configurable.js');?>
<?php echo $this->Html->script('src/classes/sigma.classes.graph.js');?>
<?php echo $this->Html->script('src/classes/sigma.classes.camera.js');?>
<?php echo $this->Html->script('src/classes/sigma.classes.quad.js');?>
<?php echo $this->Html->script('src/classes/sigma.classes.edgequad.js');?>
<?php echo $this->Html->script('src/captors/sigma.captors.mouse.js');?>
<?php echo $this->Html->script('src/captors/sigma.captors.touch.js');?>
<?php echo $this->Html->script('src/renderers/sigma.renderers.canvas.js');?>
<?php echo $this->Html->script('src/renderers/canvas/sigma.canvas.labels.def.js');?>
<?php echo $this->Html->script('src/renderers/canvas/sigma.canvas.hovers.def.js');?>
<?php echo $this->Html->script('src/renderers/canvas/sigma.canvas.nodes.def.js');?>
<?php echo $this->Html->script('src/renderers/canvas/sigma.canvas.edges.def.js');?>
<?php echo $this->Html->script('src/renderers/canvas/sigma.canvas.edges.visiblis.js');?>
<?php echo $this->Html->script('src/renderers/canvas/sigma.canvas.extremities.def.js');?>
<?php echo $this->Html->script('src/middlewares/sigma.middlewares.rescale.js');?>
<?php echo $this->Html->script('src/middlewares/sigma.middlewares.copy.js');?>
<?php echo $this->Html->script('src/misc/sigma.misc.animation.js');?>
<?php echo $this->Html->script('src/misc/sigma.misc.bindEvents.js');?>
<?php echo $this->Html->script('src/misc/sigma.misc.bindDOMEvents.js');?>
<?php echo $this->Html->script('src/misc/sigma.misc.drawHovers.js');?>
<?php echo $this->Html->script('plugins/sigma.layout.treeGraph.js');?>
<?php echo $this->Html->script('plugins/sigma.layout.forceAtlas2.min.js');?>
<?php echo $this->Html->script('plugins/sigma.layout.forceAtlas2/supervisor.js');?>



<div  id="Gcocon">
		<div id="nodes">
			<div class="tree">
				<span class="colPR">PR</span>
				<span class="colSRT">SRT</span>
				<span class="colSRP">SRP</span>
				<span>URLs</span>
			</div>
			<div id="Tscroll"><ul>
				<?php foreach ($semanticCocoonResponse->semantic_cocoon_urls as $semanticCocoonUrl): ?>
					<li>
						<span class='colPR'><?php echo $this->Number->format($semanticCocoonUrl->page_rank) ?>%</span>
						<span class='colSRT'><?php echo $this->Number->format($semanticCocoonUrl->title_semantic_rank)?>%</span>
						<span class='colSRP'><?php echo $this->Number->format($semanticCocoonUrl->page_semantic_rank) ?>%</span>
						<span><?php echo h($semanticCocoonUrl->url) ?></span>
					</li>
				<?php endforeach; ?>
			</ul></div>
		</div>
		<!-- Pas touché à la partie graphe !!!!	 -->
		<div id="graph">
			<div id="display"></div>
			<div id="gtBox">
				<div>
					<span id="dirGraph" class="btn btn-active" title="Graphe dirigé"><i class="visiblis-dirgraph"></i></span>
					<span id="zoomFit" class="btn" title="Ajuster à la page"><i class="visiblis-zoom-fit"></i></span>
					<span id="zoomIn" class="btn" title="Zoom avant"><i class="visiblis-zoom-in"></i></span>
					<span id="zoomOut" class="btn" title="Zoom arriere"><i class="visiblis-zoom-out"></i></span>
				</div>
				<div>
					<span id="CGraph" class="btn btn-active" title="Graphe hiérarchique circulaire"><i class="visiblis-circular"></i></span>
					<span id="showLinks" class="btn" title="Voir / cacher les liens secondaires"><i class="visiblis-link"></i></span>
				</div>
				<div class="context CGraph">
					<span id="toggleAtlas" class="btn tooltip" title="Start / Stop force atlas"><i class="visiblis-play"></i></span>
					<span id="fastAtlas" class="btn tooltip" title="Mode précis / rapide"><i class="visiblis-fast"></i></span>
					<div class="line">
						<label>Gravité : </label>
						<input id="gravity" type="range" step="0.1" max="2" min="0" value="1">
						<output>1</output>
					</div>
					<div class="line">
						<label>Hubs : </label>
						<input id="expand" type="range" step="1" max="10" min="1" value="1">
						<output>1</output>
					</div>
				</div>
			</div> 	
		</div>
	</div>
