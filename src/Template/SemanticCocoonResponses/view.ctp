<?= $this->Html->css('visiblis/kube.css', array('block' => 'css')); ?>
<?= $this->Html->css('visiblis/visiblis-font.css', array('block' => 'css')); ?>
<?= $this->Html->css('visiblis/tools.css', array('block' => 'css')); ?>
<?= $this->Html->css('visiblis/tooltipster.css', array('block' => 'css')); ?>
<?= $this->Html->css('visiblis/jquery.jqGauges.css', array('block' => 'css')); ?>

<?php echo $this->Html->script('visiblis/jquery-1.11.0.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.jqGauges.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.tooltipster.min.js');?>
<?php echo $this->Html->script('visiblis/jquery.validate.min.js');?>
<?php echo $this->Html->script('visiblis/visiblis-v2.js');?>
<!-- VU -->
<?php echo $this->Html->script('ajout/src/sigma.core.js');?>
<?php echo $this->Html->script('ajout/src/conrad.js');?>
<?php echo $this->Html->script('ajout/src/utils/sigma.utils.js');?>
<?php echo $this->Html->script('ajout/src/utils/sigma.polyfills.js');?>
<?php echo $this->Html->script('ajout/src/sigma.settings.js');?>
<?php echo $this->Html->script('ajout/src/classes/sigma.classes.dispatcher.js');?>
<?php echo $this->Html->script('ajout/src/classes/sigma.classes.configurable.js');?>
<?php echo $this->Html->script('ajout/src/classes/sigma.classes.graph.js');?>
<?php echo $this->Html->script('ajout/src/classes/sigma.classes.camera2.js');?>
<?php echo $this->Html->script('ajout/src/classes/sigma.classes.quad.js');?>
<?php echo $this->Html->script('ajout/src/classes/sigma.classes.edgequad.js');?>
<?php echo $this->Html->script('ajout/src/captors/sigma.captors.mouse2.js');?>
<?php echo $this->Html->script('ajout/src/captors/sigma.captors.touch2.js');?>
<?php echo $this->Html->script('ajout/src/renderers/sigma.renderers.canvas2.js');?>

<!--  VU-->
<?php echo $this->Html->script('ajout/src/renderers/canvas/sigma.canvas.labels.def.js');?>
<?php echo $this->Html->script('ajout/src/renderers/canvas/sigma.canvas.hovers2.def.js');?>
<?php echo $this->Html->script('ajout/src/renderers/canvas/sigma.canvas.nodes2.def.js');?>
<?php echo $this->Html->script('ajout/src/renderers/canvas/sigma.canvas.edges.def.js');?>
<!--  VU AJOUT J-->
<?php echo $this->Html->script('src/renderers/canvas/sigma.canvas.edges.visiblis.js');?>
<!-- VU -->
<?php echo $this->Html->script('ajout/src/renderers/canvas/sigma.canvas.extremities.def.js');?>
<?php echo $this->Html->script('ajout/src/middlewares/sigma.middlewares.rescale.js');?>
<?php echo $this->Html->script('ajout/src/middlewares/sigma.middlewares.copy.js');?>
<?php echo $this->Html->script('ajout/src/misc/sigma.misc.animation.js');?>
<?php echo $this->Html->script('ajout/src/misc/sigma.misc.bindEvents.js');?>
<?php echo $this->Html->script('ajout/src/misc/sigma.misc.bindDOMEvents.js');?>
<?php echo $this->Html->script('ajout/src/misc/sigma.misc.drawHovers.js');?>
<?php echo $this->Html->script('plugins/sigma.layout.treeGraph.js');?>
<?php echo $this->Html->script('plugins/sigma.layout.forceAtlas2.min.js');?>
<?php echo $this->Html->script('plugins/sigma.layout.forceAtlas2/supervisor.js');?>




<!--  Tab with value of page selected-->
<table width="100%">
	<tr>
		<td align="center" width="33%">
			<span id="showPR" class="btn btn-active"><i class="visiblis-pr"></i> Page Rank</span>
			<span class="prVal"></span>
		</td>
		<td align="center" width="33%">
			<span id="showSRT" class="btn"><i class="visiblis-srt"></i> Sémantic Rank Titre</span>
			<span class="srtVal"></span>
		</td>
		<td align="center" width="33%">
			<span id="showSRP" class="btn"><i class="visiblis-srp"></i> Sémantic Rank Page</span>
			<span class="srpVal">:</span>
		</td>
	</tr>
</table>

<div  id="Gcocon">
		<div id="nodes">
			<div class="tree">
				<span class="colPR">PR</span>
				<span class="colSRT">SRT</span>
				<span class="colSRP">SRP</span>
				<span>URLs</span>
			</div>
			<div id="Tscroll"><ul>
				<script type="text/javascript">
					//reovery urls' data
					var urls =<?php echo json_encode($semanticCocoonResponse->semantic_cocoon_urls);?>;
					//color's node
					var colors=["#CC9040","#CB5ADC","#79D842","#70A9C8","#DF5C88","#C02F1D","#7D87DE","#CC5E0A","#CEFF2A","#E16247","#F7A2EF","#75D786","#805928","#5E2A66","#488028","#395666","#343E4E","#66190F","#1B0D22","#813C07","#7B9918","#803929","#A80116","#45804F"];	
					//tab of nodes
					var nodesColor=[];
					var maxPR=0;
					var maxSRT=0;
					var maxSRP=0;
					var totSRP=0;
					for (i in urls) 
					{
						nodesColor[i]=colors[0];
						if(!(urls[i].page_rank)) 
						{
							urls[i].page_rank=0; 
						}
						else 
						{
							urls[i].page_rank=(100*urls[i].page_rank).toFixed(2);
							maxPR=Math.max(maxPR,urls[i].page_rank);
						}
						if(!urls[i].page_semantic_rank) {
							urls[i].page_semantic_rank=0; 
						} else {
							urls[i].page_semantic_rank*=Math.exp(urls[i].title_semantic_rank)-1;
							totSRP+=urls[i].page_semantic_rank;
						}
						if(!urls[i].title_semantic_rank) {urls[i].title_semantic_rank=0; }
						else {
							urls[i].title_semantic_rank=(100*urls[i].title_semantic_rank).toFixed(2);
							maxSRT=Math.max(maxSRT,urls[i].title_semantic_rank);
						}
					}
					
					for (i in urls)
					{
						urls[i].page_semantic_rank=(100*urls[i].page_semantic_rank/totSRP).toFixed(2);
							maxSRP=Math.max(maxSRP,urls[i].page_semantic_rank);
						var elt="<li id='n"+i+"'><span class='colPR'>"+urls[i].page_rank+"%</span><span class='colSRT'>"+urls[i].title_semantic_rank+"%</span><span class='colSRP'>"+urls[i].page_semantic_rank+"%</span><span>"+urls[i].url+"</span></li>";
						$("#Tscroll ul").append(elt);
					}
				</script>
				
			</ul></div>
		</div>
		<!-- Pas touché à la partie graphe !!!!	 -->
	<!--	<div id="container">
  <style>
    #graph-container {
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      position: absolute;
    }
  </style>
  <div id="graph-container"></div>
</div>
<script>
/**
 * This is a basic example on how to instantiate sigma. A random graph is
 * generated and stored in the "graph" variable, and then sigma is instantiated
 * directly with the graph.
 *
 * The simple instance of sigma is enough to make it render the graph on the on
 * the screen, since the graph is given directly to the constructor.
 */
var i,
    s,
    N = 100,
    E = 500,
    g = {
      nodes: [],
      edges: []
    };
// Generate a random graph:
for (i = 0; i < N; i++)
  g.nodes.push({
    id: 'n' + i,
    label: 'Node ' + i,
    x: Math.random(),
    y: Math.random(),
    size: Math.random(),
    color: '#666'
  });
for (i = 0; i < E; i++)
  g.edges.push({
    id: 'e' + i,
    source: 'n' + (Math.random() * N | 0),
    target: 'n' + (Math.random() * N | 0),
    size: Math.random(),
    color: '#ccc'
  });
// Instantiate sigma:
s = new sigma({
  graph: g,
  container: 'graph-container'
});
</script>-->
	<div id="graph">
		<div id="display">
<!-- 			<canvas class="sigma-background" style="position:absolute; width:1056px; height:516px; display:block;" width="1056" height="516px"></canvas> -->
		</div>
			
		
		
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
				
			<span id="ruler"></span>
		<script type="text/javascript">
			
			var links =<?php echo json_encode($semanticCocoonResponse->semantic_cocoon_links);?>;
		
			//TODO variables à comprendre
			var mem="";
			var response;
			var Gravity=0;
			var flag=true;
			var mode={"form":"force","what":"pr","etype":"arrow"};
			var colors=["#CC9040","#CB5ADC","#79D842","#70A9C8","#DF5C88","#C02F1D","#7D87DE","#CC5E0A","#CEFF2A","#E16247","#F7A2EF","#75D786","#805928","#5E2A66","#488028","#395666","#343E4E","#66190F","#1B0D22","#813C07","#7B9918","#803929","#A80116","#45804F"];				
			var i,j,s,rend,N,alpha,r,g = {nodes: [],edges: []},selectedNode=null;
			var  spire=0,dist=0,step=0,circleXY=new Object();
			var nodesColor=[];
			var hiddedNodes=[];
			var flag=0;
			var linLogMode = false;
			var outboundAttractionDistribution =true;
			var adjustSizes=true;
			var scalingRatio=1;
			var gravity =1;
			var barnesHutOptimize = true;
			var barnesHutTheta = 0.5;
			var iterationsPerRender= 4;
			
			var treeGraph=undefined;
			var dirGraph=true;
			var forceAtlas=false;
			var drawEdges=false;
			var curvedEdges=false;
			var visNodeMargin=10;
			var minNodeSize=10,maxNodeSize=110;
			
			//TODO fonction addMethode
			sigma.classes.graph.addMethod('neighborsIn', function(nodeId) {
				var k,
				i,
				neighbors = {},
				index = this.inNeighborsIndex [nodeId] || {};
				for (k in index) neighbors[k] = this.nodesIndex[k];
				return neighbors;
			});
			sigma.classes.graph.addMethod('neighborsOut', function(nodeId) {
				var k,
				neighbors = {},
				index = this.outNeighborsIndex [nodeId] || {};
				for (k in index)
					neighbors[k] = this.nodesIndex[k];
					return neighbors;
			});
			sigma.classes.graph.addMethod('neighbors', function(nodeId) {
				var k,
				neighbors = {},
				index = this.allNeighborsIndex[nodeId] || {};
				for (k in index)
					neighbors[k] = this.nodesIndex[k];
					return neighbors;
			});
			sigma.renderers.def = sigma.renderers.canvas;
			
			//TODO function basique
			
			
			//TODO function aff à suivre en vrac
			$("#gravity").val(1);
			$("#expand").val(1);
			$(".legend").html(" TreeAlyser");
			
			$("input").bind("keypress",function() {
				$("#error").css("display","none");
				$(".field").removeClass("input-error");
			});  
			$(".opt").bind("click",function() {
				if($(this).attr("rel")==1) {
					flag=1;
				} else if($(this).attr("rel")==2) {
					
					flag=2;
				}
			});
			
			$(".last").bind("click",function() {
				$form=$('<form action="/outils/treealyser.html" method="POST"><input type="hidden" name="last" value="ok"></form>').appendTo('body'); 
				$form.submit();
			});      
			
			$(".history").bind("click",function() {
				$("#trace").html("Veuillez patienter...");
				$("#loading").css("display","block");      
				historique();
			});       
					
			$("#save").bind("click",function() {
				request_mem();
			});      
			
			$(".bulle").each(function() {
				$("#error").css("display","none");
				$(this).tooltipster({trigger:'hover',maxWidth:600,content: tips_txt[$(this).attr("rel")]});			
			});
					
			function testForm() {
				return(false);
			}
			
			function testField() {
						if($("#urls").val().length==0) {
							if($("#root").val().length!=0) {
								var url=$("#root").val().toLowerCase();
								var parsedSrc=parseUri(url);
								if(!(parsedSrc.protocol=="http" || parsedSrc.protocol=="https")) {
									$("#error ul.lists-simple").html("<li>L'url doit commencer par : http(s)://</li>"); 
									$("#loading").css("display","none");
									$("#error").css("display","block").focus();
									return false; 
								} else if(Url_Valide(url,false)==false) {
									$("#error ul.lists-simple").html("<li>Veuillez saisir une url valide</li>"); 
									$("#loading").css("display","none");
									$("#error").css("display","block").focus();
									return false;
								}  else if(parsedSrc.host.indexOf("google")>0) {
									$("#error ul.lists-simple").html("<li>Les urls Google ne sont pas autorisées</li>"); 
									$("#loading").css("display","none");
									$("#error").css("display","block").focus();
									return false; 
								} else if(parsedSrc.host.indexOf("bing")>0) {
									$("#error ul.lists-simple").html("<li>Les urls Bing ne sont pas autorisées</li>"); 
									$("#loading").css("display","none");
									$("#error").css("display","block").focus();
									return false; 
								} else if(parsedSrc.host.indexOf("yahoo")>0) {
									$("#error ul.lists-simple").html("<li>Les urls Yahoo ne sont pas autorisées</li>"); 
									$("#loading").css("display","none");
									$("#error").css("display","block").focus();
									return false; 
								}
								if($("#mask").val()==0 && $("#nomask").val()>0) {
									$("#error ul.lists-simple").html("<li>Veuillez saisir le masque d'url</li>"); 
									$("#loading").css("display","none");
									$("#error").css("display","block").focus();
									return false;
								}
								if($("#mask").val()==0 && $("#nomask").val()>0) {
									var mask=$("#mask").val().toLowerCase();
									var parsedMask=parseUri(mask);
									if(!(parsedMask.protocol=="http" || parsedMask.protocol=="https")) {
										$("#error ul.lists-simple").html("<li>Le masque d'url commencer par : http(s)://</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									} else if(Url_Valide(mask,false)==false) {
										$("#error ul.lists-simple").html("<li>Le masque doit être une url valide</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false;
									}  else if(parsedMask.host.indexOf("google")>0) {
										$("#error ul.lists-simple").html("<li>Les urls Google ne sont pas autorisées</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									} else if(parsedMask.host.indexOf("bing")>0) {
										$("#error ul.lists-simple").html("<li>Les urls Bing ne sont pas autorisées</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									} else if(parsedMask.host.indexOf("yahoo")>0) {
										$("#error ul.lists-simple").html("<li>Les urls Yahoo ne sont pas autorisées</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									}
								}
							} 
							return true; 
						} else {
							var urls= $('#urls').val().split('\n');
							var cpt=0;  
							for(var url in urls){
								if(urls[url]!="") {
									cpt++;
									var parsedSrc=parseUri(urls[url].toLowerCase());
									if(!(parsedSrc.protocol=="http" || parsedSrc.protocol=="https")) {
										$("#error ul.lists-simple").html("<li>L'url doit commencer par : http(s)://</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									} else if(Url_Valide(urls[url],false)==false) {
										$("#error ul.lists-simple").html("<li>Veuillez saisir une url valide</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									}  else if(parsedSrc.host.indexOf("google")>0) {
										$("#error ul.lists-simple").html("<li>Les urls Google ne sont pas autorisées</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									} else if(parsedSrc.host.indexOf("bing")>0) {
										$("#error ul.lists-simple").html("<li>Les urls Bing ne sont pas autorisées</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									} else if(parsedSrc.host.indexOf("yahoo")>0) {
										$("#error ul.lists-simple").html("<li>Les urls Yahoo ne sont pas autorisées</li>"); 
										$("#loading").css("display","none");
										$("#error").css("display","block").focus();
										return false; 
									}
								}
							}
							if(cpt==0) {
								$("#error ul.lists-simple").html("<li>Veuillez saisir au moins une url</li>"); 
								$("#loading").css("display","none");
								$("#error").css("display","block").focus();
								return false; 
							} else if(cpt>50) {
								$("#error ul.lists-simple").html("<li>Le nombre d'urls est limité à 50</li>"); 
								$("#loading").css("display","none");
								$("#error").css("display","block").focus();
								return false; 
							}
						}
						return (true);
					}
					function request_mem() {
					var name = prompt("Donnez un nom à votre analyse : :", "")
					if (name!=null) {
						$("#trace").html("Donnez un nom à votre analyse :");
						$("#loading").css("display","block");      
						$("#error").css("display","none");
						Timer=setInterval(trace_request, 2000);
					}		
				}
				
				gravity=1;
						$("#gravity").val(1);
						$("#gravity").parent().children("output").html(1);
						scalingRatio=1;
						$("#expand").val(1);
						$("#expand").parent().children("output").html(1);
						$("#mem").css("display","inline-block");
						$(".tohide").css("display","none");
						$(".toshow").css("display","block");
			var maxPR=0;
			var maxSRT=0;
			var maxSRP=0;
			var totSRP=0;
			for (i in urls) 
			{
				nodesColor[i]=colors[0];
				if(!urls[i].page_rank) urls[i].page_rank=0; 
				else {
					urls[i].page_rank=(100*urls[i].page_rank).toFixed(2);
					maxPR=Math.max(maxPR,urls[i].page_rank);
				}
				if(!urls[i].page_semantic_rank) {
					urls[i].page_semantic_rank=0; 
				} else {
					urls[i].page_semantic_rank*=Math.exp(urls[i].title_semantic_rank)-1;
					totSRP+=urls[i].page_semantic_rank;
				}
				if(!urls[i].title_semantic_rank) urls[i].title_semantic_rank=0; 
				else {
					urls[i].title_semantic_rank=(100*urls[i].title_semantic_rank).toFixed(2);
					maxSRT=Math.max(maxSRT,urls[i].title_semantic_rank);
				}
			}
			for (i in urls) 
			{
				urls[i].page_semantic_rank=(100*urls[i].page_semantic_rank/totSRP).toFixed(2);
				maxSRP=Math.max(maxSRP,urls[i].page_semantic_rank);
			}
			$(".colPR").css("display","block");
			$(".colSRT").css("display","block");
			$(".colSRP").css("display","block");
			for (i in urls) 
			{
				g.nodes.push({
					id: "n"+i,
					label:urls[i].url,
					x: 0,
					y: 0,
					size:10+parseFloat(100* urls[i].page_rank/maxPR),
					color: nodesColor[i],
					data:{
						pr:10+parseFloat(100* urls[i].page_rank/maxPR),
						srt:10+parseFloat( 100*urls[i].title_semantic_rank/maxSRT),
						srp:10+parseFloat(100* urls[i].page_semantic_rank/maxSRP)
					}
				});
			}

			g.nodes[0].lev=0;
			for (i in links) 
			{
				var src=links[i].source;
				var dst=links[i].destination;
				
				g.edges.push({
					id:"e"+i,
					source:"n"+links[i].source,
					target:"n"+links[i].destination
				});
				if(g.nodes[dst].lev==undefined && dst!=0) {
					if(g.nodes[src].lev!=undefined) g.nodes[dst].lev=g.nodes[src].lev+1;
					else if(src==0) g.nodes[dst].lev=1;
				}
			}
			
			//TODO declaration du graphe 
			
			s = new sigma({
				graph: g,
				container: 'display',
				type:"canvas",
				settings: {
					scalingMode:"inside",
					autoRescale:false,
					autoResize:true,
					rescaleIgnoreSize:false,
					zoomMin:0.005,
					zoomMax:50,
					drawEdges: true,
					maxNodeSize:maxNodeSize,
					minNodeSize:minNodeSize,
					maxEdgeSize:0,
					minEdgeSize:0,
					minArrowSize:4,
					drawLabels:false,
					defaultLabelAlignment:'top',
					defaultEdgeType:"visiblis",
					defaultEdgeColor:"#2c69b0",
					edgeColor:"#ccc",
					curvedEdges:curvedEdges,
					dirGraph:dirGraph,
					defaultNodeType:"circle",
					defaultNodeBorderColor:"#000",
					labelThreshold:0,
					nodesPowRatio:1,
					edgesPowRatio:1,
					borderSize:1,
					zoomingRatio:1.5,
					doubleClickZoomingRatio:1.5,
					sideMargin:10,
					colors:colors,
					treeArrowSize:20,
					visNodeMargin:visNodeMargin,
					root:"n0"
				}
			});
			rend = s.renderers[0];
			s.refresh();
			CGraph();			
			
			//TODO fonction bind 
			s.bind('clickStage', function(e) {
				if(selectedNode!=null) {
					nodeUnSelect(false);
				}
			});
			s.bind('outNode', function(n,s) {
				$(".prVal").html('');
				$(".srtVal").html('');
				$(".srpVal").html('');
				$("#Tscroll li").removeClass("hovered");
			});
			s.bind('overNode', function(n) {
				var id=n.data.node.id;
				$(".prVal").html($("#"+id).children(".colPR").html());
				$(".srtVal").html($("#"+id).children(".colSRT").html());
				$(".srpVal").html($("#"+id).children(".colSRP").html());
				$("#Tscroll li").removeClass("hovered");
				$("#"+n.data.node.id).addClass("hovered");
				if(flag) {
					$('#Tscroll').scrollTop($("#"+n.data.node.id).offset().top-$("#Tscroll ul").offset().top);
				}
			});
			s.bind('clickNode', function(e) {
				var id=e.data.node.id;
				var n=s.graph.nodes(id);
				if(selectedNode!=null) selectedNode.borderColor=selectedNode.color;
				nodeSelect(n);
			});
			
			//TODO definition des id et classes
			$("#Tscroll li").bind("click",function() 
			{
				var id=$(this).attr("id");;
				var n=s.graph.nodes(id);
				if(selectedNode!=null) selectedNode.borderColor=selectedNode.color;
				nodeSelect(n);
			});
			$("#Tscroll li").bind("mouseover",function() {
				if($(this).attr("id")) {
					var id=$(this).attr("id");
					flag=false;
					rend.dispatchEvent('overNode', {node:s.graph.nodes(id)});
				}
			});
			$("#Tscroll li").bind("mouseout",function() {
				if($(this).attr("id")) {
					var id=$(this).attr("id");;
					flag=true;
					rend.dispatchEvent('outNode', {node:s.graph.nodes(id)});
				}
			});
					
			$("#showLinks").bind('click', function()
			{
				if(!$(this).hasClass("disabled")) 
				{
					if($(this).hasClass("btn-active")) 
					{
						drawEgdges=false;
						$(this).removeClass("btn-active");
						showLinks(false);
					} else {
						drawEgdges=true;
						$(this).addClass("btn-active");
						showLinks(true);
					}
					s.refresh();
				}
			});
			$("#dirGraph").bind('click', function(){
				if($(this).hasClass("btn-active")) {
					dirGraph=false;
					$(this).removeClass("btn-active");
				} else {
					dirGraph=true;
					$(this).addClass("btn-active");
				}
				s.settings({dirGraph:dirGraph});
				s.refresh();
			});
			$("#toggleAtlas").bind("click",function() {
				if($(this).hasClass("btn-active")) {
					$(this).removeClass("btn-active");
					stopAtlas();
				} else {
					if($("#CGraph").hasClass("btn-active"))  {
						$("#CGraph").removeClass("btn-active");
						$("#showLinks").addClass("disabled");
					}
					$(this).addClass("btn-active");
					s.graph.edges().forEach(function(e) {
						s.graph.edges(e.id).hidden=0;
					});
					startAtlas();
				}
			});
			$("#fastAtlas").bind('click', function(){
				if(!$(this).hasClass("btn-active")) {
					$(this).addClass("btn-active");
					linLogMode=true; 
					adjustSizes=false;
				} else {
					$(this).removeClass("btn-active");
					linLogMode=false;
					adjustSizes=true;
				}
				configAtlas();
			});
			$("#gravity").bind('change', function(){
				gravity=$(this).val();
				$(this).parent().children("output").html(gravity);
				configAtlas();
			});
			$("#expand").bind('change', function(){
				scalingRatio=$(this).val();
				$(this).parent().children("output").html(scalingRatio);
				configAtlas();
			});
			$("#zoomFit").bind('click', function(){
				$("#zoomResize").removeClass("btn-active");
				$("#zoomIn").removeClass("disabled");
				$("#zoomOut").removeClass("disabled");
				$("#scrollH").val(0);
				$("#scrollH").attr("disabled","disabled");
				s.renderers[0].camera.ratio=s.settings("zoomFit");
				s.renderers[0].camera.x=s.settings("Cx");
				s.renderers[0].camera.y=s.settings("Cy");
				s.refresh();
			});
			$("#zoomIn").bind('click', function(){
				$("#zoomResize").removeClass("btn-active");
				var posY=s.settings("Cy")- s.renderers[0].camera.y
				var posX=s.settings("Cx")- s.renderers[0].camera.x;
				sigma.utils.zoomTo(s.renderers[0].camera, posX, posY,0.8,{duration:1000}) ;
				s.refresh();
			});
			$("#zoomOut").bind('click', function(){
				$("#zoomResize").removeClass("btn-active");
				var posY=s.settings("Cy")- s.renderers[0].camera.y
				var posX=s.settings("Cx")- s.renderers[0].camera.x;
				sigma.utils.zoomTo(s.renderers[0].camera,posX,posY, 1.25,{duration:1000}) ;
				s.refresh();
			});
			
			$("#CGraph").bind('click', function(){
				if(!$(this).hasClass("btn-active")) {
					$("#zoomResize").removeClass("btn-active");
					$("#zoomIn").removeClass("disabled");
					$("#zoomOut").removeClass("disabled");
					$("#showLinks").removeClass("disabled");
					$("#showLinks").removeClass("btn-active");
					$("#toggleAtlas").removeClass("btn-active");
					setTimeout(CGraph,100);
				}
			});
					
					
			$("#showPR").bind("click",function() {
				if(!$(this).hasClass("btn-active")) {
					$("#showSRT").removeClass("btn-active");
					$("#showSRP").removeClass("btn-active");
					$(this).addClass("btn-active");
					mode.what="pr";
					for (i in response.Datas.Urls) {
						s.graph.nodes("n"+i).size=s.graph.nodes("n"+i).data.pr;
					}
					s.refresh();
				}
			});
			$("#showSRT").bind("click",function() {
				if(!$(this).hasClass("btn-active")) {
					$("#showPR").removeClass("btn-active");
					$("#showSRP").removeClass("btn-active");
					$(this).addClass("btn-active");
					mode.what="srt";
					for (i in response.Datas.Urls) {
						s.graph.nodes("n"+i).size=s.graph.nodes("n"+i).data.srt;
					}
					s.refresh();
				}
			});
			$("#showSRP").bind("click",function() {
				if(!$(this).hasClass("btn-active")) {
					$("#showSRT").removeClass("btn-active");
					$("#showPR").removeClass("btn-active");
					$(this).addClass("btn-active");
					mode.what="srp";
					for (i in response.Datas.Urls) {
						s.graph.nodes("n"+i).size=s.graph.nodes("n"+i).data.srp;
					}
					s.refresh();
				}
			});
		
			//TODO autres fonctions
			function configAtlas() {
				s.configForceAtlas2({
					worker: true,
					linLogMode:linLogMode,
					outboundAttractionDistribution :outboundAttractionDistribution,
					scalingRatio:scalingRatio,
					gravity :gravity,
					barnesHutOptimize : barnesHutOptimize,
					barnesHutTheta : barnesHutTheta,
					iterationsPerRender : iterationsPerRender,
					adjustSizes:adjustSizes

				});
			}
			function startAtlas() {
				curvedEdges=true;
				s.settings({drawEdges:false,curvedEdges:curvedEdges,treeGraph:"forceAtlas"});
				$(".sigma-background").css("display","none");
				$(".comun").css("display","block");
				$(".forceAtlas").css("display","none");
				if($("#CGraph").hasClass("btn-active"))  $("#CGraph").removeClass("btn-active")
				s.refresh();
				forceAtlas=true;
				configAtlas();
				s.startForceAtlas2();
			}
			function stopAtlas() {
				s.settings({drawEdges:true});
				forceAtlas=false;
				s.stopForceAtlas2();
				s.refresh();
			}
			function nodeSelect(n) {
			}
			function nodeUnSelect(tmp) {
			}
			function showLinks(flag) {
				if(flag) {
					s.graph.edges().forEach(function(e) {
						s.graph.edges(e.id).hidden=0;
					});
				} else {
					var done=new Array("n0");
					s.graph.edges().forEach(function(e) {
						if($.inArray( e.target, done )>=0) {
							s.graph.edges(e.id).hidden=1;
						} else {
							s.graph.edges(e.id).hidden=0;
							done.push(e.target);
						}
					});
				}
			}
			function CGraph() {
				stopAtlas();
				s.killForceAtlas2();
				forceAtlas=false;
				dirGraph=true;
				drawEgdges=false;
				curvedEdges=false;
				s.settings({curvedEdges:curvedEdges,dirGraph:dirGraph});
				if(!$("#CGraph").hasClass("btn-active"))  $("#CGraph").addClass("btn-active")
				$(".sigma-background").css("display","block");
				showLinks(false);
				if(treeGraph==undefined) 
				{
					treeGraph=sigma.plugins.treeGraph(s);
				}
				else 
				{
					s.graph.circularTree(s);
				}
			}
			function colorInv(hex)
			{
					var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
					
					var r= parseInt(result[1], 16);
					var g= parseInt(result[2], 16);
					var b= parseInt(result[3], 16);
					var r1 = r / 255;
					var g1 = g / 255;
					var b1 = b / 255;

					var maxColor = Math.max(r1,g1,b1);
					var minColor = Math.min(r1,g1,b1);
					var L = (maxColor + minColor) / 2 ;
					if(L < 0.5){
						return "#fff";
					}else{
						return "#000";
					}
				}			
		</script>
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
