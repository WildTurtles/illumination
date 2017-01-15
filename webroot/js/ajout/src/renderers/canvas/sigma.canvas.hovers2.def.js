;(function(undefined) {
  'use strict';

  if (typeof sigma === 'undefined')
    throw 'sigma is not declared';

  // Initialize packages:
  sigma.utils.pkg('sigma.canvas.hovers');

  /**
   * This hover renderer will basically display the label with a background.
   *
   * @param  {object}                   node     The node object.
   * @param  {CanvasRenderingContext2D} context  The canvas context.
   * @param  {configurable}             settings The settings function.
   */
  sigma.canvas.hovers.def = function(node, context, settings) {
    var alignment,
        fontStyle = settings('hoverFontStyle') || settings('fontStyle'),
        prefix = settings('prefix') || '',
        size = node[prefix + 'size'],
        fontSize = (settings('labelSize') === 'fixed') ? settings('defaultLabelSize') : settings('labelSizeRatio') * size;
    
	/*if(settings('treeGraph')!=undefined) {
		if(settings('treeGraph')=="circular") {
			var a = node['a'],
			r = node['r'],
			s = node['s'];
			if(node['cocon']==0) {
				if( node['ea']!=undefined &&  node['es']!=undefined) {
					a = node['ea'];
					s = node['es'];
				}
			}	
			var e=node[prefix + 'size']/node['size'];
			var R=e*(settings('maxR')) || r;
			var dx=node[prefix + 'x']-(e*node['x']);
			var dy=node[prefix + 'y']-(e*node['y']);
			var ox=dx;
			var oy=dy;
			var px=dx+(R*Math.cos(a-(s/2)));
			var py=dy+(R*Math.sin(a-(s/2)));
			var qx=dx+(R*Math.cos(a+(s/2)));
			var qy=dy+(R*Math.sin(a+(s/2)));
			
			context.setLineDash([2]);
			context.strokeStyle = "#000";
			context.beginPath();
			context.moveTo(ox,oy);
			context.lineTo(px, py);
			context.arc(
				dx,
				dy,
				R,
				a-(s/2),
				a+(s/2),
				false
			);
			context.lineTo(ox, oy);
			context.closePath();
			context.stroke();
			var px=dx+(R*Math.cos(a-(s/2)));
			var py=dy+(R*Math.sin(a-(s/2)));
			var qx=dx+(R*Math.cos(a+(s/2)));
			var qy=dy+(R*Math.sin(a+(s/2)));
			
			context.fillStyle ="#fff";
			context.beginPath();
			context.moveTo(ox,oy);
			context.lineTo(px, py);
			context.arc(
				dx,
				dy,
				R,
				a-(s/2),
				a+(s/2),
				false
			);
			context.lineTo(ox, oy);
			context.closePath();
			context.stroke();
			if(node['cocon']!=0 && node['ea']!=undefined) {
				var ex=dx+(R*Math.cos(node['ea']+(node['es']/2)));
				var ey=dy+(R*Math.sin(node['ea']+(node['es']/2)));
				context.moveTo(ox,oy);
				context.lineTo(ex, ey);
				context.stroke();
			}

	      
		} else if(settings('treeGraph')=="vertical") {
			var e=node[prefix + 'size']/node['size'];
			var dx=node[prefix + 'x']-(e*node['x']);
			var dy=node[prefix + 'y']-(e*node['y']);
			
			var x1=dx+(e*(node['x']-(node['w']/2)));
			var y1=dy+(e*(node['y']-node['size']));
			var x2=dx+(e*(node['x']-(node['w']/2)));
			var y2=dy+(e*settings('Ymax'));
			var x3=dx+(e*(node['x']+(node['w']/2)));
			var y3=dy+(e*settings('Ymax'));
			var x4=dx+(e*(node['x']+(node['w']/2)));
			var y4=dy+(e*(node['y']-node['size']));
			
			context.strokeStyle = "#000";
			context.beginPath();
			context.moveTo(e*(node['x']-(node['w']/2)),e*settings('Ymin'));
			context.lineTo(e*(node['x']-(node['w']/2)),e*settings('Ymax'));
			context.moveTo(e*(node['x']+(node['w']/2)),e*settings('Ymin'));
			context.lineTo(e*(node['x']+(node['w']/2)),e*settings('Ymax'));
			context.beginPath();
			context.moveTo(x1,y1);
			context.lineTo(x2,y2);
			context.lineTo(x3,y3);
			context.lineTo(x4,y4);
			context.closePath();
			context.stroke();
		}	
	}*/	
			/*
			var txt=node.id+" | ";
			if(node.color!=undefined) txt+=" color :"+node.color;
			if(node.size!=undefined) txt+=" size :"+node.size;
			if(node.r!=undefined) txt+=" r :"+node.r;
			if(node.c!=undefined) txt+=" c :"+node.c;
			if(node.m!=undefined) txt+=" m :"+node.m;
			if(node.size!=undefined) txt+=" Size :"+node.size;
			if(node.ms!=undefined) txt+=" ms :"+node.ms;
			if(node.s!=undefined) txt+=" s :"+node.s;
			if(node.es!=undefined) txt+=" es :"+node.es;
			if(node.ea!=undefined) txt+=" ea :"+node.ea;
			if(node.a!=undefined) txt+=" a :"+node.a;
			if(node.w!=undefined) txt+=" w :"+node.w;
			if(node.x!=undefined) txt+=" x :"+node.x;
			if(node.y!=undefined) txt+=" y :"+node.y;
			if(node.Afix!=undefined) txt+=" Afix :"+node.Afix;
			if(node.mrc!=undefined) txt+=" mrc :"+node.mrc;
			if(node.mr!=undefined) txt+=" mr :"+node.mr;
			*/
			var txt=node.label;
// Label background:
    context.font = (fontStyle ? fontStyle + ' ' : '') +
      fontSize + 'px ' + (settings('hoverFont') || settings('font'));

    context.beginPath();
    context.fillStyle = settings('labelHoverBGColor') === 'node' ?
      (node.color || settings('defaultNodeColor')) :
      settings('defaultHoverLabelBGColor');

    if (settings('labelHoverShadow')) {
      context.shadowOffsetX = 0;
      context.shadowOffsetY = 0;
      context.shadowBlur = 8;
      context.shadowColor = settings('labelHoverShadowColor');
    }

    if (settings('labelAlignment') === undefined) {
      alignment = settings('defaultLabelAlignment');
    } else {
      alignment = settings('labelAlignment');
    }


	drawHoverBorder(alignment, context, fontSize, node,txt);
    
	// Node border:
	    if (settings('borderSize') > 0) {
	      context.beginPath();
	      context.fillStyle = settings('nodeBorderColor') === 'node' ?
		(node.color || settings('defaultNodeColor')) :
		settings('defaultNodeBorderColor');
	      context.arc(
		node[prefix + 'x'],
		node[prefix + 'y'],
		size + settings('borderSize'),
		0,
		Math.PI * 2,
		true
	      );
	      context.closePath();
	      context.fill();
	    }

    // Node:
    var nodeRenderer = sigma.canvas.nodes[node.type] || sigma.canvas.nodes.def;
    //nodeRenderer(node, context, settings);
		context.fillStyle = node.color || settings('defaultNodeColor');
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
		context.fill();
	
	    
    drawLabel(alignment, context, fontSize, node,txt);
	
    
    function drawLabel(alignment, context, fontSize, node,txt) {
      if (node.label === null || node.label === undefined ||
          node.label === '' || typeof node.label !== 'string') {
        return;
      }

      context.fillStyle = (settings('labelHoverColor') === 'node') ?
        (node.color || settings('defaultNodeColor')) :
        settings('defaultLabelHoverColor');

      var labelWidth = context.measureText(txt).width,
         labelOffsetX = - labelWidth / 2,
         labelOffsetY = fontSize / 3;

      switch (alignment) {
        case 'bottom':
          labelOffsetY = + size + 4 * fontSize / 3;
          break;
        case 'center':
          break;
        case 'left':
          labelOffsetX = - size - 3 - labelWidth;
          break;
        case 'top':
          labelOffsetY = - size - 2 * fontSize / 3;
          break;
        case 'inside':
          if (labelWidth <= (size + fontSize / 3) * 2) {
            break;
          }
        /* falls through*/
        case 'right':
        /* falls through*/
        default:
          labelOffsetX = size + 3;
          break;
      }
     context.fillText(
       txt,
        Math.round(node[prefix + 'x'] + labelOffsetX),
       Math.round(node[prefix + 'y'] + labelOffsetY)
      );
    
      
}
    

    function drawHoverBorder(alignment, context, fontSize, node,txt) {
      var x = Math.round(node[prefix + 'x']),
          y = Math.round(node[prefix + 'y']),
          w = Math.round(
            context.measureText(txt).width + size + 1.5 + fontSize / 3
          ),
          h = fontSize + 4,
          e = Math.round(size + fontSize / 3);

      // draw a circle for the node first
      context.arc(x, y, e, 0, 2 * Math.PI);

      if (txt && typeof txt === 'string') {
        // then a rectangle for the label
        switch (alignment) {
          case 'center':
            break;
          case 'left':
            y = Math.round(node[prefix + 'y'] - fontSize / 2 - 2);
            context.rect(x - w, y, w, h);
            break;
          case 'top':
            context.rect(x - w / 2, y - e - h, w, h);
            break;
          case 'bottom':
            context.rect(x - w / 2, y + e, w, h);
            break;
          case 'inside':
            if (context.measureText(txt).width <= e * 2) {
              // don't draw anything
              break;
            }
            // use default setting, falling through
          /* falls through*/
          case 'right':
          /* falls through*/
          default:
            y = Math.round(node[prefix + 'y'] - fontSize / 2 - 2);
            context.rect(x, y, w, h);
            break;
        }
      }

      context.closePath();
      context.fill();

      context.shadowOffsetX = 0;
      context.shadowOffsetY = 0;
      context.shadowBlur = 0;
    }
  };
}).call(this);
