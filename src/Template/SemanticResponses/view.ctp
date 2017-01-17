<?= $this->Html->css('visiblis/kube.css') ?>
<?= $this->Html->css('visiblis/visiblis-font.css') ?>
<?= $this->Html->css('visiblis/tooltipster.css') ?>
<?= $this->Html->css('visiblis/jquery.jqGauges.css') ?>
<?= $this->Html->css('visiblis/title.css') ?>

<?php echo $this->Html->script('visiblis/jquery-1.11.0.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.jqGauges.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.tooltipster.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.validate.min.js');?>
<?php echo $this->Html->script('visiblis/visiblis-v2.js');?>

    
  
<nav class="large-3 medium-4 columns" id="actions-sidebar">
	<ul class="side-nav">
		<li class="heading"><?= __('Actions') ?></li>
		<li><?= $this->Html->link(__('All Semantic Request'), ['controller' => 'SemanticRequests', 'action' => 'index']) ?></li>
		<li> <?= $this->Html->link(__('View Semantic Request'), ['controller' => 'SemanticRequests', 'action' => 'view', $semanticResponse->semantic_request_id]) ?></li>
	</ul>
</nav>

<div  class=" semanticResponses view large-9 medium-8 columns content">
	<div id="resTitre" class="units-row ">
		<table width="100%">
			<tr>
				<td>
					<div class="cadre">
						<h2>Affinité Sémantique du Titre <i class="visiblis-tooltip bulle tooltipstered" rel="1"></i></h2>
					</div>
					<div style="text-align:center">
					
						<div id="ForteTitre" class="ui-jqlineargauge" style="width: 400px; height: 140px;display:inline-block">
							<?php 
								if (($this->Number->format($semanticResponse->as_text))==0)
								{
									$val = $this->Number->format($semanticResponse->as_title);
								}
								else 
								{
									$val = $this->Number->format($semanticResponse->as_text);
								}
							?>
							<script type="text/javascript">
								// variables à modifier
								var valeur =  "<?php echo $val ?>"
								
								var title ="analyse sémantique";
								
								var synthese1 = false;
								// fin variables à modifier
								
								var tips_txt= "L'affinité sémantique est une mesure de la proximité sémante d'un titre de page WEB avec une requête de recherche. Elle varie de 0 à 100 sur une échelle non lineaire.";
								
								
								var hgrad1 = {type: 'linearGradient', x0: 0,y0: 0.5,x1: 1,y1: 0.5, colorStops: [{ offset: 0, color: '#ff0000' },{ offset: 0.5, color: '#ff0000'},{ offset: 1, color: '#ff8c00'}]};
								
								var hgrad2 = {type: 'linearGradient', x0: 0,y0: 0.5,x1: 1,y1: 0.5, colorStops: [{ offset: 0, color: '#ff8c00' },{ offset: 0.25, color: '#ff8c00' },{ offset: 0.75, color: '#ffd700' },{ offset: 1, color: '#32dd32'}]};
								
								var hgrad3 = {type: 'linearGradient', x0: 0,y0: 0.5,x1: 1,y1: 0.5, colorStops: [{ offset: 0, color: '#32dd32' },{ offset: .75, color: '#008000'},{ offset: 1, color: '#008000'}]};
								

								var needleGradient = {type: 'linearGradient',x0: 0,y0: 0.5,x1: 1,y1: 0.5,colorStops: [{ offset: 0, color: '#888888' },{ offset: 1, color: '#000000'}]};
								
// 								if ( synthese1)
// 								{
// 								$('.ggtitle').append ("");
// 								}
// 								else
// 								{
// 								$('.ggtitle').append (title);
// 								}
								
								$('#ForteTitre').jqLinearGauge
								({
									orientation: 'horizontal',
									background: '#fff',
									border: {padding: 10,lineWidth: 0,strokeStyle: '#76786A'},
									annotations:
									[
										{text: valeur,font: '40px sans-serif',horizontalOffset: 0.5,verticalOffset: 0.20,fillStyle: '#000000'},
										{text: 'Mauvaise',font: '12px sans-serif',horizontalOffset: 0.1,verticalOffset: 0.9,fillStyle: '#888888'},
										{text: 'Mediocre',font: '12px sans-serif',horizontalOffset: 0.4,verticalOffset: 0.9,fillStyle: '#888888'},
										{text: 'Correcte',font: '12px sans-serif',horizontalOffset: 0.70,verticalOffset: 0.9,fillStyle: '#888888'},
										{text: 'Excellente',font: '12px sans-serif',horizontalOffset: 0.9,verticalOffset: 0.9,fillStyle: '#888888'}
									],
									tooltips: 
									{
										disabled: true,
										highlighting: false
									},
									animation: 
									{
										enabled:false
									},
									scales: 
									[{
										minimum: 0,maximum: 100,labels: {offset: 0.34},
										customTickMarks: [0,40,80,100],
										majorTickMarks: {length: 10, offset: 0.42,lineWidth: 1},
										ranges: [{startValue:0,endValue: 40,innerOffset: 0.56,outerStartOffset: 0.85,outerEndOffset: 0.85,fillStyle: hgrad1},{startValue: 40,endValue: 80,innerOffset: .56,outerStartOffset: 0.85,outerEndOffset: 0.85,fillStyle: hgrad2},{startValue: 80,endValue: 100,innerOffset: .56,outerStartOffset: 0.85,outerEndOffset: 0.85,fillStyle: hgrad3}],
										needles: [{type: 'triangle',width: 15,value: valeur,fillStyle: needleGradient,strokeStyle:'white',lineWidth: 1,innerOffset: 0.56,outerOffset: 0.9}]
									}]
								}); 
								
								$(".bulle").each(function() 
								{
								$("#error").css("display","none");
								$(this).tooltipster({trigger:'hover',maxWidth:600,content: tips_txt});	
								});
							
							</script>
						</div>
					</div>

					<br>
					<div class="ggtest" style="display:inline-block;visibility:hidden"></div>
				</td>
				
				<?php if ($is_url)
				{ ?>
				
				<td>
					<div class="cadre">
						<h2>Affinité Sémantique du Contenu <i class="visiblis-tooltip bulle" rel="2"></i></h2>
					</div>
					<div style="text-align:center">
						<div id="Radial" class="ui-jqradialgauge" style="width: 400px; height: 227px;display:inline-block">
							<?php $valRadToto = $this->Number->format($semanticResponse->as_page);?>
							
							<script type="text/javascript">
							
								tips_txt="Cette affinité sémantique est la mesure de la proximité sémante du contenu de votre page avec une requête de recherche. Elle varie de 0 à 100 sur une échelle non lineaire.";
								
								var valeur2Toto =  "<?php echo $valRadToto ?>"
								
								var anchorGradient = {type: 'radialGradient',x0: 0.35,y0: 0.35,r0: 0.0,x1: 0.35,y1: 0.35,r1: 1,colorStops: [{ offset: 0, color: '#485961' },{ offset: 1, color: '#000000'}]};
					
								var rgrad1 = {type: 'linearGradient',x0: 0,y0: 1,x1: 0.33,y1:0,colorStops: [{ offset: 0, color: '#ff0000' },{ offset: 0.75, color: '#ff8c00' },{ offset: 1, color: '#ff8c00' }]};
										
								var rgrad2 = {type: 'linearGradient',x0:1,y0: 0,x1: 0,y1:0.8,colorStops: [{ offset: 0, color: '#ffd700' },{ offset: .25, color: '#ffd700' },{ offset: 0.75, color: '#ff8c00' },{ offset: 1, color: '#ff8c00' }]};

								var rgrad3 = {type: 'linearGradient',x0: 0,y0: 1,x1: 1,y1:1,colorStops: [{ offset: 0, color: '#ffd700' },{ offset: 0.5, color: '#00ff00' },{ offset: 1, color: '#32dd32' }]};
					
								var rgrad4 = {type: 'linearGradient',x0: 0,y0: 0,x1: 1,y1:1,colorStops: [{ offset: 0, color: '#32dd32' },{ offset: 0.25, color: '#32dd32' },{ offset: 0.75, color: '#008000' },{ offset: 1, color: '#008000' }]};
								
								var rgrad5 = {type: 'linearGradient',x0: 0.25,y0: 0,x1: 1,y1: 1,colorStops: [{ offset: 0, color: '#008000' },{ offset:0.25, color: '#008000'},{ offset: 1, color: '#ff0000'}]};
										
								$(".bulle").each(function() 
								{
									$("#error").css("display","none");
									$(this).tooltipster({trigger:'hover',maxWidth:600,content: tips_txt});			
								});
							
								$('#Radial').jqRadialGauge
								({
									background: '#ffffff',
									border: {lineWidth: 0,strokeStyle: '#76786A',padding: 16},
									shadows: {enabled: true},
									anchor: {visible: true,fillStyle:anchorGradient,radius: 0.10},
									tooltips: {disabled: true,highlighting: false},
									animation: {enabled:false},
									annotations: 
									[
										{text: valeur2Toto,font: '40px sans-serif',horizontalOffset: 0.5,verticalOffset: 0.6,fillStyle: '#000000'},
										{text: 'Correcte',font: '12px sans-serif',horizontalOffset: 0.36,verticalOffset: 0.20,fillStyle: '#888888'},
										{text: 'Mediocre',font: '12px sans-serif',horizontalOffset: 0.15,verticalOffset: 0.40,fillStyle: '#888888'},
										{text: 'Mauvaise',font: '12px sans-serif',horizontalOffset: 0.07,verticalOffset: 0.70,fillStyle: '#888888'},
										{text: 'Excellente',font: '12px sans-serif',horizontalOffset: 0.64,verticalOffset: 0.20,fillStyle: '#888888'},
										{text: 'Suspecte',font: '12px sans-serif',horizontalOffset: 0.89,verticalOffset: 0.58,fillStyle: '#888888'}
									],
									scales: 
									[{
										minimum: 0,
										maximum: 100,
										startAngle: 180,
										endAngle: 360,
										customTickMarks: [0,15,30,50,70,100],
										majorTickMarks: {length: 40,lineWidth: 1,interval: 10,offset: 0.75},
										labels: {orientation: 'horizontal',interval: 10,offset: 1.00},

										needles: [{value: valeur2Toto,type: 'pointer',outerOffset: 0.8,mediumOffset: 0.7,width: 10,fillStyle: '#485961'}],
										ranges: 
										[
											{outerOffset: 0.75,innerStartOffset: 0.55,innerEndOffset: 0.55,startValue: 0,endValue: 15,fillStyle: rgrad1},
											{outerOffset: 0.75,innerStartOffset: 0.55,innerEndOffset: 0.55,startValue: 15,endValue: 30,fillStyle: rgrad2},
											{outerOffset: 0.75,innerStartOffset: 0.55,innerEndOffset: 0.55,startValue: 30,endValue: 50,fillStyle: rgrad3},
											{outerOffset: 0.75,innerStartOffset: 0.55,innerEndOffset: 0.55,startValue: 50,endValue: 70,fillStyle: rgrad4},
											{outerOffset: 0.75,innerStartOffset: 0.55,innerEndOffset: 0.55,startValue: 70,endValue: 100,fillStyle: rgrad5}
										]
									}]
								});
						
							</script>
						</div>
					</div>
				</td>
				<?php } ?>
			</tr>
		</table>
	</div>

</div>


