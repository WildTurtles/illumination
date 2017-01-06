;(function() {
  'use strict';

  sigma.utils.pkg('sigma.canvas.edges');

  /**
   * This edge renderer will display edges as   plain/dotted/dashed  line/curves with/without arrow.
   *
   * @param  {object}                   edge         The edge object.
   * @param  {object}                   source node  The edge source node.
   * @param  {object}                   target node  The edge target node.
   * @param  {CanvasRenderingContext2D} context      The canvas context.
   * @param  {configurable}             settings     The settings function.
   */
  sigma.canvas.edges.visiblis =
    function(edge, source, target, context, settings) {
    var color = edge.color,
        prefix = settings('prefix') || '',
        edgeColor = settings('edgeColor'),
        defaultNodeColor = settings('defaultNodeColor'),
        defaultEdgeColor = settings('defaultEdgeColor'),
	directed=settings('dirGraph'),
	curved=settings('curvedEdges'),
	style=edge.style || "plain",
        cp = {},
        size = edge[prefix + 'size'] || 1,
        tSize = target[prefix + 'size'],
	e =target[prefix + 'size']/target['size'],
        sX = source[prefix + 'x'],
        sY = source[prefix + 'y'],
        tX = target[prefix + 'x'],
        tY = target[prefix + 'y'],
        aSize = Math.max(size * 2.5, settings('minArrowSize')),
        taSize = settings('treeArrowSize'),
        d,
        aX,
        aY,
        vX,
        vY;


    if (!color)
      switch (edgeColor) {
        case 'source':
          color = source.color || defaultNodeColor;
          break;
        case 'target':
          color = target.color || defaultNodeColor;
          break;
        default:
          color = defaultEdgeColor;
          break;
      }

    
	context.save();

	if(style=="dotted") icontext.setLineDash([2]);
	else if(style=="dashed") context.setLineDash([8,3]);
	context.strokeStyle = color;
	context.lineWidth = size;
	context.beginPath();
	context.moveTo(sX, sY);

	if(curved) {
		cp = (source.id === target.id) ?
			sigma.utils.getSelfLoopControlPoints(sX, sY, tSize) :
			sigma.utils.getQuadraticControlPoint(sX, sY, tX, tY);
		if(directed) {
			if (source.id === target.id) {
				d = Math.sqrt(Math.pow(tX - cp.x1, 2) + Math.pow(tY - cp.y1, 2));
				aX = cp.x1 + (tX - cp.x1) * (d - aSize - tSize) / d;
				aY = cp.y1 + (tY - cp.y1) * (d - aSize - tSize) / d;
				vX = (tX - cp.x1) * aSize / d;
				vY = (tY - cp.y1) * aSize / d;
			} else {
				d = Math.sqrt(Math.pow(tX - cp.x, 2) + Math.pow(tY - cp.y, 2));
				aX = cp.x + (tX - cp.x) * (d - aSize - tSize) / d;
				aY = cp.y + (tY - cp.y) * (d - aSize - tSize) / d;
				vX = (tX - cp.x) * aSize / d;
				vY = (tY - cp.y) * aSize / d;
			}
			if (source.id === target.id) {
				context.bezierCurveTo(cp.x2, cp.y2, cp.x1, cp.y1, aX, aY);
			} else {
				context.quadraticCurveTo(cp.x, cp.y, aX, aY);
			}
		} else {
			if (source.id === target.id) {
				context.bezierCurveTo(cp.x1, cp.y1, cp.x2, cp.y2, tX, tY);
			} else {
				context.quadraticCurveTo(cp.x, cp.y, tX, tY);
			}
		}
	} else {
		if(directed) {
			if(settings('treeGraph')!=undefined && settings('treeGraph')=="vertical") {
				cp={x:tX,y:sY};
				d = Math.sqrt(Math.pow(tX - cp.x, 2) + Math.pow(tY - cp.y, 2));
				aX = cp.x + (tX - cp.x) * (d - (e * taSize) - tSize) / d;
				aY = cp.y + (tY - cp.y) * (d - (e * taSize) - tSize) / d;
				vX = (tX - cp.x) * e * taSize / d;
				vY = (tY - cp.y) * e * taSize / d;
				context.quadraticCurveTo(tX,sY,tX,tY-tSize-(e * taSize));
			} else if(settings('treeGraph')!=undefined && settings('treeGraph')=="horizontal") {
				cp={x:sR*Math.cos(sA),y:sR*Math.sin(sA)};
				d = Math.sqrt(Math.pow(tX - cp.x, 2) + Math.pow(tY - cp.y, 2));
				aX = cp.x + (tX - cp.x) * (d - (e * taSize) - tSize) / d;
				aY = cp.y + (tY - cp.y) * (d - (e * taSize) - tSize) / d;
				vX = (tX - cp.x) * e * taSize / d;
				vY = (tY - cp.y) * e * taSize / d;
				context.quadraticCurveTo(sX,tY,tX-tSize-(e * taSize),tY);
			} else {
				/*d = Math.sqrt(Math.pow(tX - sX, 2) + Math.pow(tY - sY, 2));
				aX = sX + (tX - sX) * (d - aSize - tSize) / d;
				aY = sY + (tY - sY) * (d - aSize - tSize) / d;
				vX = (tX - sX) * aSize / d;
				vY = (tY - sY) * aSize / d;
				context.lineTo(
					aX,
					aY
				);*/
				if(target['m']==1) {
					var sA = target['c']+Math.asin(target['size']/target['r']);
					var sR=target['r']-target['size'];
				} else {
					var sA = target['c'];
					var sR =  target['m']*(source['r']+target['r']);
				}
				var dx=source[prefix + 'x']-(e*source['x']),
				dy=source[prefix + 'y']-(e*source['y']),
				px=dx+(e*sR*Math.cos(sA)),
				py=dy+(e*sR*Math.sin(sA));
				if(sA!=undefined) {
					cp={x:px,y:py};
					d = Math.sqrt(Math.pow(tX - cp.x, 2) + Math.pow(tY - cp.y, 2));
					//aX = cp.x + (tX - cp.x) * (d - (e * taSize) - tSize) / d;
					//aY = cp.y + (tY - cp.y) * (d - (e * taSize) - tSize) / d;
					//vX = (tX - cp.x) * e * taSize / d;
					//vY = (tY - cp.y) * e * taSize / d;
					aX = cp.x + (tX - cp.x) * (d -  aSize - tSize) / d;
					aY = cp.y + (tY - cp.y) * (d - aSize - tSize) / d;
					vX = (tX - cp.x) * aSize / d;
					vY = (tY - cp.y) * aSize / d;
					context.quadraticCurveTo(cp.x,cp.y,aX,aY);
				} else {
					d = Math.sqrt(Math.pow(tX - sX, 2) + Math.pow(tY - sY, 2)),
					aX = sX + (tX - sX) * (d - aSize - tSize) / d,
					aY = sY + (tY - sY) * (d - aSize - tSize) / d,
					vX = (tX - sX) * aSize / d,
					vY = (tY - sY) * aSize / d;
					context.lineTo(aX,aY);
				}
				
			}
		} else {
			if(settings('treeGraph')!=undefined && settings('treeGraph')=="vertical") {
				context.quadraticCurveTo(tX,sY,tX,tY);
			} else {
			    context.lineTo(
			      tX,
			      tY
			    );
			}
		}
	}
	context.stroke();

    if(directed) {
	    context.fillStyle = color;
	    context.beginPath();
	    context.moveTo(aX + vX, aY + vY);
	    context.lineTo(aX + vY * 0.6, aY - vX * 0.6);
	    context.lineTo(aX - vY * 0.6, aY + vX * 0.6);
	    context.lineTo(aX + vX, aY + vY);
	    context.closePath();
	    context.fill();
    }
    
    context.restore();
  };
})();
