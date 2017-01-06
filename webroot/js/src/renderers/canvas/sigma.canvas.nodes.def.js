;(function() {
  'use strict';

  sigma.utils.pkg('sigma.canvas.nodes');

  /**
   * The default node renderer. It renders the node as a simple disc.
   *
   * @param  {object}                   node     The node object.
   * @param  {CanvasRenderingContext2D} context  The canvas context.
   * @param  {configurable}             settings The settings function.
   */
  sigma.canvas.nodes.def = function(node, context, settings) {
		var _g=sigma.instances()["0"].graph;
		var prefix = settings('prefix') || '';
		var bgs= document.getElementsByClassName("sigma-background");
		var background=bgs[0].getContext('2d');
		if(settings('treeGraph')!=undefined && node['root']==1) {
			if(settings('treeGraph')=="circular") {
				if(node['cocon']==0) {
					var a = node['ea'],
					r = node['r'],
					s = node['es'];
				} else {
					var a = node['a'],
					r = node['r'],
					s = node['s'];
				}
				var e=node['renderer1:size']/node['read_cam0:size'];
				//var R=e*(settings('maxR')) || r;
				//var dx=node[prefix + 'x']-(e*node['x']);
				//var dy=node[prefix + 'y']-(e*node['y']);
				var dx=_g.nodes("n0")['renderer1:x'];
				var dy=_g.nodes("n0")['renderer1:y'];
				var R=e*settings('maxR');
				//var dx=node[prefix + 'x']-node['read_cam0:x']+X;
				//var dy=node[prefix + 'y']-node['read_cam0:y']+Y;
				var ox=dx;
				var oy=dy;
				var px=dx+(R*Math.cos(a-(s/2)));
				var py=dy+(R*Math.sin(a-(s/2)));
				var qx=dx+(R*Math.cos(a+(s/2)));
				var qy=dy+(R*Math.sin(a+(s/2)));
				
				background.globalAlpha=0.5;
				background.strokeStyle = "#aaa";
				if(settings('cocons')%2==1) {
					if(node['cocon']%3==0) {
						background.fillStyle ="#eee";
					} else if(node['cocon']%3==1) {
						background.fillStyle ="#D3D3D3";
					} else {
						background.fillStyle ="#ddd";
					}
				} else {
					if(node['cocon']%2==0) {
						background.fillStyle ="#eee";
					} else {
						background.fillStyle ="#ddd";
					}
				}
				background.beginPath();
				background.moveTo(ox,oy);
				background.lineTo(px, py);
				background.arc(
					dx,
					dy,
					R,
					a-(s/2),
					a+(s/2),
					false
				);
				background.lineTo(ox, oy);
				background.closePath();
				background.fill();
				background.globalAlpha=1;
				background.stroke();
			} else if(settings('treeGraph')=="vertical") {
				var e=node[prefix + 'size']/node['size'];
				var dx=node[prefix + 'x']-(e*node['x']);
				var dy=node[prefix + 'y']-(e*node['y']);
				
				var x1=dx+(e*(node['x']-(node['w']/2)));
				var y1=dy+(e*settings('Ymin'));
				var x2=dx+(e*(node['x']-(node['w']/2)));
				var y2=dy+(e*settings('Ymax'));
				var x3=dx+(e*(node['x']+(node['w']/2)));
				var y3=dy+(e*settings('Ymax'));
				var x4=dx+(e*(node['x']+(node['w']/2)));
				var y4=dy+(e*settings('Ymin'));
				background.globalAlpha=0.5;
				background.strokeStyle = "#aaa";
				if(settings('cocons')%2==1) {
					if(node['cocon']%3==0) {
						background.fillStyle ="#eee";
					} else if(node['cocon']%3==1) {
						background.fillStyle ="#ddd";
					} else {
						background.fillStyle ="#ccc";
					}
				} else {
					if(node['cocon']%2==0) {
						background.fillStyle ="#ddd";
					} else {
						background.fillStyle ="#ccc";
					}
				}
				background.beginPath();
				background.moveTo(x1,y1);
				background.lineTo(x2,y2);
				background.lineTo(x3,y3);
				background.lineTo(x4,y4);
				background.closePath();
				background.fill();
				background.globalAlpha=1;
				background.stroke();
			} else if(settings('treeGraph')=="horizontal") {
				var e=node[prefix + 'size']/node['size'];
				var dx=node[prefix + 'x']-(e*node['x']);
				var dy=node[prefix + 'y']-(e*node['y']);
				
				var y1=dy+(e*(node['y']-(node['w']/2)));
				var x1=dx+(e*settings('Xmin'));
				var y2=dy+(e*(node['y']-(node['w']/2)));
				var x2=dx+(e*settings('Xmax'));
				var y3=dy+(e*(node['y']+(node['w']/2)));
				var x3=dx+(e*settings('Xmax'));
				var y4=dy+(e*(node['y']+(node['w']/2)));
				var x4=dx+(e*settings('Xmin'));
				background.globalAlpha=0.5;
				background.strokeStyle = "#aaa";
				if(settings('cocons')%2==1) {
					if(node['cocon']%3==0) {
						background.fillStyle ="#eee";
					} else if(node['cocon']%3==1) {
						background.fillStyle ="#ddd";
					} else {
						background.fillStyle ="#ccc";
					}
				} else {
					if(node['cocon']%2==0) {
						background.fillStyle ="#ddd";
					} else {
						background.fillStyle ="#ccc";
					}
				}
				background.beginPath();
				background.moveTo(x1,y1);
				background.lineTo(x2,y2);
				background.lineTo(x3,y3);
				background.lineTo(x4,y4);
				background.closePath();
				background.fill();
				background.globalAlpha=1;
				background.stroke();
			}
		}
	  
		context.strokeStyle = settings('defaultNodeBorderColor') || node.color  ;
		context.fillStyle = node.color || settings('defaultNodeColor');
		context.lineWidth=1;
		//context.globalAlpha=0.75;
		context.beginPath();
		context.arc(
			node[prefix + 'x'],
			node[prefix + 'y'],
			node[prefix + 'size'],
			0,
			Math.PI * 2,
			true
		);

		context.closePath();
		context.stroke();
		context.fill();
		//context.globalAlpha=1;

	};
})();
