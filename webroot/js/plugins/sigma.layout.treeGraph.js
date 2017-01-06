;(function(undefined) {
	'use strict';

	if (typeof sigma === 'undefined')  throw 'sigma is not declared';

	// Initialize package:
	sigma.utils.pkg('sigma.plugins');
	
	var _g = undefined, _s = undefined;
	var _root=undefined;
	var _struct=undefined;
	var _nodeChildsNodes=undefined;
	var _maxLev=undefined;
	var _levR=undefined;
	var _nLev=undefined;
	var _Vstep=undefined;
	var _Rstep=undefined;
	var _Oy=undefined;
	var _lc=undefined;
	var _cocons=undefined;
	var _marge=undefined;
	var _maxR=undefined;
	var _maxSize=undefined;
	var _Xmax=undefined;
	var _Ymax=undefined;
	var _Xmin=undefined;
	var _Ymin=undefined;
	var _todo=undefined;

	/**
	* ?????,
	* ------------------
	* @param  {sigma} s The related sigma instance.
	*/
	function TreeGraph(s) {
		_s = s;
		_g = s.graph;
		_struct=[];
		_root="n0";
		_nodeChildsNodes=[];
		_maxLev=0;
		_nLev=[];
		_levR=[];
		_Vstep=150;
		_Rstep=150;
		_Oy=0;
		_lc=[];
		_cocons=[];
		_marge=5;
		_maxR=0;
		_maxSize=0;
		_Xmax=0;
		_Ymax=0;
		_Xmin=0;
		_Ymin=0;
		_todo=[];
	};

	function levelize(n) {
		_g.nodes(n).w=0;
		var tab=[];
		var size=0;
		var lev=_g.nodes(n).lev;
		_g.edges().forEach(function(e) {
			if(e.hidden==0) {
				if(e.source==n  && _g.nodes(e.target).lev==(lev+1) && $.inArray( e.target, tab )<0) {
					tab.push(e.target);
					size=Math.max( _g.nodes(e.target).size,size);
					levelize(e.target);
					_g.nodes(e.target).w=0;
					_maxLev=Math.max(_maxLev,lev);
					if(_nLev[lev+1]!=undefined) _nLev[lev+1].push(e.target);
					else _nLev[lev+1]=[e.target];
				}
			}
		});
		_nodeChildsNodes[n]= tab;
		_maxSize=Math.max(_maxSize,size+_marge);
		return(tab);
	};
	function setStructure(n) {
		var ends=[],childs=[];
		var nbCocons=1;
		var width=0;
		var MS=0;
		if( _nodeChildsNodes[n].length!=0) {
			for(var i in _nodeChildsNodes[n]) {
				if(_nodeChildsNodes[_nodeChildsNodes[n][i]].length==0) {
					ends.push(_nodeChildsNodes[n][i]);
					if(n==_root) {
						_cocons[0]=n;
						_g.nodes(n).cocon=0;
						_g.nodes(n).root=1;
					}
					width+=2*(_g.nodes(_nodeChildsNodes[n][i]).size+_marge);
					if(ends.length==1) MS+=2*Math.sin((_g.nodes(n).size+_marge)/(_g.nodes(n).lev*4*_maxSize));
				} else {
					childs.push(_nodeChildsNodes[n][i]);
					if(n==_root) {
						_cocons[nbCocons]=_nodeChildsNodes[n][i];
						_g.nodes(_nodeChildsNodes[n][i]).cocon=nbCocons;
						_g.nodes(_nodeChildsNodes[n][i]).root=1;
						nbCocons++;
					}
					setStructure(_nodeChildsNodes[n][i]);
					width+=_struct[_nodeChildsNodes[n][i]].width;
					MS+=_struct[_nodeChildsNodes[n][i]].ms;
				}
			}
		}
		var ms=0;
		if(n!=_root) {
			ms=Math.max(MS,2*Math.sin((_g.nodes(n).size+_marge)/(_g.nodes(n).lev*4*_maxSize)));
		} 
		var elt={root:n,ends:ends,childs:childs,ms:ms,width:Math.max(width,2*(_g.nodes(n).size+_marge))};
		_struct[n]=elt;
		_g.nodes(n).ms=ms;

	}
	function drawCocons(n) {
		var elt=_struct[n];
		_Oy=0;
		_g.nodes(n).x=0;
		_g.nodes(n).y=0;
		_g.nodes(n).tx=0;
		_g.nodes(n).ty=0;
		_g.nodes(n).a=2*Math.PI;
		_g.nodes(n).r=0;
		_g.nodes(n).w=elt.width;
		_g.nodes(n).c=0;
		for(var i=0;i<=_maxLev+1;i++) {
			_lc[i]=0;
		}
		drawChilds(n,elt);
	}
	function drawChilds(n,childs) {
		_Vstep=4*_maxSize;
		var Lx=_g.nodes(n).tx-(childs.width/2);
		if(childs.childs.length>0) {
			for(var i in childs.childs) {
				_lc[_g.nodes(childs.childs[i]).lev]+=2*(_g.nodes(childs.childs[i]).size+_marge);
				var elt=_struct[childs.childs[i]];
				var tx=Lx+(elt.width/2);
				var ty=_Oy+(_g.nodes(childs.childs[i]).lev*_Vstep);
				_g.nodes(childs.childs[i]).tx=tx;
				_g.nodes(childs.childs[i]).ty=ty;
				_g.nodes(childs.childs[i]).x=_g.nodes(childs.childs[i]).tx;
				_g.nodes(childs.childs[i]).y=_g.nodes(childs.childs[i]).ty;
				_g.nodes(childs.childs[i]).w=elt.width;
				//_g.nodes(childs.childs[i]).c="";
				_g.nodes(childs.childs[i]).lr=_g.nodes(childs.childs[i]).lev;
				drawChilds(childs.childs[i],elt);
				Lx+=elt.width;
				_Xmax=Math.max(_Xmax,_g.nodes(childs.childs[i]).x);
				_Xmin=Math.min(_Xmin,_g.nodes(childs.childs[i]).x);
				_Ymax=Math.max(_Ymax,_g.nodes(childs.childs[i]).y);
			}
		}
		if(childs.ends.length!=0 || childs.childs.length!=0) _todo.push(n);
		if(childs.ends.length==1) {
			_lc[_maxLev+1]+=2*(_g.nodes(childs.ends[0]).size+_marge);
			if(childs.childs.length==0) _g.nodes(childs.ends[0]).tx=_g.nodes(n).tx;
			else _g.nodes(childs.ends[0]).tx=Lx+_g.nodes(childs.ends[0]).size+_marge;
			_g.nodes(childs.ends[0]).ty=_Oy+(_g.nodes(childs.ends[0]).lev*_Vstep);
			_g.nodes(childs.ends[0]).x=_g.nodes(childs.ends[0]).tx;
			_g.nodes(childs.ends[0]).y=_g.nodes(childs.ends[0]).ty;
			_g.nodes(childs.ends[0]).lr=_maxLev+1;
			_g.nodes(childs.ends[0]).w=2*(_g.nodes(childs.ends[0]).size+_marge);
			/*if(n==_root) {
				_g.nodes(childs.ends[0]).c="";
			} else {
				if(childs.childs.length>0) _g.nodes(childs.ends[0]).c="";
				else _g.nodes(childs.ends[0]).c="";
			}*/
			_Xmax=Math.max(_Xmax,_g.nodes(childs.ends[0]).x);
			_Xmin=Math.min(_Xmin,_g.nodes(childs.ends[0]).x);
			_Ymax=Math.max(_Ymax,_g.nodes(childs.ends[0]).y);
		} else if(childs.ends.length>0) {
			for(var i in childs.ends) {
				_lc[_maxLev+1]+=2*(_g.nodes(childs.ends[i]).size+_marge);
				_g.nodes(childs.ends[i]).tx=Lx+_g.nodes(childs.ends[i]).size+_marge;
				_g.nodes(childs.ends[i]).ty=_Oy+(_g.nodes(childs.ends[i]).lev*_Vstep);
				_g.nodes(childs.ends[i]).x=_g.nodes(childs.ends[i]).tx;
				_g.nodes(childs.ends[i]).y=_g.nodes(childs.ends[i]).ty;
				_g.nodes(childs.ends[i]).lr=_maxLev+1;
				_g.nodes(childs.ends[i]).w=2*(_g.nodes(childs.ends[i]).size+_marge);
				/*if(n==_root) {
					_g.nodes(childs.ends[i]).c=n;
					_g.nodes(childs.ends[i]).m=0.5;
				} else {
					if(childs.childs.length>0) _g.nodes(childs.ends[i]).c="";
					else  {
						_g.nodes(childs.ends[i]).c=n;
						_g.nodes(childs.ends[i]).m=0.5;
					}
				}*/
				Lx+=2*(_g.nodes(childs.ends[i]).size+_marge);
				_Xmax=Math.max(_Xmax,_g.nodes(childs.ends[i]).x);
				_Xmin=Math.min(_Xmin,_g.nodes(childs.ends[i]).x);
				_Ymax=Math.max(_Ymax,_g.nodes(childs.ends[i]).y);
			}
		}
		
	}
	function orderChilds(n) {
		var result=new Array();
		var tmp=_nodeChildsNodes[n];
		for(var j in tmp) {
			orderChilds(tmp[j]);
			if(_nodeChildsNodes[tmp[j]].length!=0) result.push(tmp[j]);else result.unshift(tmp[j]);
		}
		_nodeChildsNodes[n]=result;
	}
	function affCircularNode(n) {
		if(_g.nodes(n).d==undefined) {
			_g.nodes(n).x=_g.nodes(n).r*Math.cos(_g.nodes(n).a);
			_g.nodes(n).y=_g.nodes(n).r*Math.sin(_g.nodes(n).a);
		} else {
			_g.nodes(n).x=_g.nodes(n).r*Math.cos(_g.nodes(n).a+_g.nodes(n).d);
			_g.nodes(n).y=_g.nodes(n).r*Math.sin(_g.nodes(n).a+_g.nodes(n).d);
		}
		_maxR=Math.max(_maxR,_g.nodes(n).r+_g.nodes(n).size+_marge);
		//_s.refresh();
		//alert(n+" : "+_g.nodes(n).color);
	}
	function calcPosCircular(n) {
		var elt=_struct[n];
		var totWidth=0;
		var endWidth=0;
		if(n!=_root) {
			var levSector=_g.nodes(n).s;
			var angle=_g.nodes(n).a-(_g.nodes(n).s/2);
			
		} else {
			var angle=0;
			var levSector=2*Math.PI;
			_g.nodes(n).s=2*Math.PI;
			_g.nodes(n).a=0;
			_g.nodes(n).r=0;
			_g.nodes(n).mr=_Rstep;
		}
		if(elt.childs.length!=0) {
			if(elt.ends.length!=0) {
				for(var i in elt.ends) {
					if(_g.nodes(elt.ends[i]).w==undefined) {
						_g.nodes(elt.ends[i]).w=2*(_g.nodes(elt.ends[i]).size+_marge);
					}
					endWidth+=_g.nodes(elt.ends[i]).w;
				}
				if(n!=_root) {
						//var subElt=_struct[elt.ends[0]];
					//if(subElt!=undefined && subElt.ms!=undefined) {
					//	_g.nodes(n).es=subElt.ms;
					//} else {
					if(elt.childs.length==1) {
						_g.nodes(n).es=2*Math.asin((_g.nodes(elt.ends[0]).size+_marge)/((_g.nodes(elt.ends[0]).lev*_Rstep)+_g.nodes(n).size+_g.nodes(elt.ends[0]).size+(2*_marge)));
					} else {
						_g.nodes(n).es=2*Math.asin((_g.nodes(elt.ends[0]).size+_marge)/((_g.nodes(n).lev*_Rstep)+_g.nodes(n).size+_g.nodes(elt.ends[0]).size+(2*_marge)));
					}
				} else _g.nodes(n).es=2*Math.PI*(endWidth/_g.nodes(_root).w);
				_g.nodes(n).ea=angle+(_g.nodes(n).es/2);
				levSector-=_g.nodes(n).es;
				angle+=_g.nodes(n).es;
				if(n==_root) {
					var nbr=elt.ends.length;
					if(nbr==1) {
						_g.nodes(elt.ends[0]).s=_g.nodes(n).es;
						_g.nodes(elt.ends[0]).a=_g.nodes(n).ea;
						_g.nodes(elt.ends[0]).r=_g.nodes(elt.ends[0]).lev*_Rstep;
						affCircularNode(elt.ends[0]);
						//_g.nodes(elt.ends[0]).color="grey";
					} else {
						var startS=Math.asin((_g.nodes(elt.ends[0]).size+_marge)/(_g.nodes(elt.ends[0]).lev*_Rstep))
						var endS=Math.asin((_g.nodes(elt.ends[elt.ends.length-1]).size+_marge)/(_g.nodes(elt.ends[elt.ends.length-1]).lev*_Rstep))
						var startA=_g.nodes(n).ea-(_g.nodes(n).es/2)+startS;
						var endA=_g.nodes(n).ea+(_g.nodes(n).es/2)-endS;
						var StepA=(endA-startA)/(elt.ends.length);
						var R=_g.nodes(elt.ends[0]).lev*_Rstep
						var Ss=(_g.nodes(elt.ends[0]).size+_marge);
						var Se=(_g.nodes(elt.ends[elt.ends.length-1]).size+_marge);
						_g.nodes(elt.ends[0]).s=startS;
						_g.nodes(elt.ends[0]).a=startA;
						_g.nodes(elt.ends[0]).r=_g.nodes(elt.ends[0]).lev*_Rstep;
						_g.nodes(elt.ends[0]).c=_g.nodes(n).ea;
						_g.nodes(elt.ends[0]).m=0.5;
						affCircularNode(elt.ends[0]);
						//_g.nodes(elt.ends[0]).color="grey";
						_g.nodes(elt.ends[elt.ends.length-1]).s=endS;
						_g.nodes(elt.ends[elt.ends.length-1]).a=endA;
						_g.nodes(elt.ends[elt.ends.length-1]).r=_g.nodes(elt.ends[elt.ends.length-1]).lev*_Rstep;
						_g.nodes(elt.ends[elt.ends.length-1]).c=_g.nodes(n).ea;
						_g.nodes(elt.ends[elt.ends.length-1]).m=0.5;
						affCircularNode(elt.ends[elt.ends.length-1]);
						//_g.nodes(elt.ends[elt.ends.length-1]).color="grey";
						if(nbr>2) {
							var count=Math.ceil(nbr/2);
							var pair=nbr%2;
							for(var i=1;i<count;i++) {
								var D=0,d=0;
								//if(i<count-1 || pair==1) {
									D=Math.cos(StepA)*R;
									d=Math.max(
									Math.sqrt(((Ss+_g.nodes(elt.ends[i]).size+_marge)*(Ss+_g.nodes(elt.ends[i]).size+_marge))-Math.sin(R)),
									Math.sqrt(((Se+_g.nodes(elt.ends[nbr-1-i]).size+_marge)*(Se+_g.nodes(elt.ends[nbr-1-i]).size+_marge))-Math.sin(R))
									);
								//}
								R=D+d;
								Ss=(_g.nodes(elt.ends[i]).size+_marge);
								Se=(_g.nodes(elt.ends[nbr-1-i]).size+_marge);
								if(R==0) {
									R=Math.max(Ss/Math.sin(StepA),Se/Math.sin(StepA));
								}
								if(i==count-1 && pair==1) {
									_g.nodes(elt.ends[i]).a=_g.nodes(n).ea;
									_g.nodes(elt.ends[nbr-1-i]).a=_g.nodes(n).ea;
								} else {
									_g.nodes(elt.ends[i]).a=startA+(i*StepA);
									_g.nodes(elt.ends[nbr-1-i]).a=endA-(i*StepA);
								}
								_g.nodes(elt.ends[i]).r=R;
								_g.nodes(elt.ends[i]).s=2*Math.asin(Ss/R);;
								_g.nodes(elt.ends[i]).c=_g.nodes(n).ea;
								_g.nodes(elt.ends[i]).m=0.5;
								affCircularNode(elt.ends[i]);
								//_g.nodes(elt.ends[i]).color="grey";
								
								_g.nodes(elt.ends[nbr-1-i]).r=R;
								_g.nodes(elt.ends[nbr-1-i]).s=2*Math.asin(Ss/R);;
								_g.nodes(elt.ends[nbr-1-i]).c=_g.nodes(n).ea;
								_g.nodes(elt.ends[nbr-1-i]).m=0.5;
								affCircularNode(elt.ends[nbr-1-i]);
								//_g.nodes(elt.ends[nbr-1-i]).color="grey";
							}
						}
						
					}
				} else {
					var startA=_g.nodes(n).a-(_g.nodes(n).s/2);
					//if(elt.childs.length==1 && _g.nodes(n).root==1) {
					//	var R=_g.nodes(elt.ends[0]).lev*_Rstep;
					//} else {
						var R=(_g.nodes(n).r)+_g.nodes(n).size+_g.nodes(elt.ends[0]).size+(2*_marge);
					//}
					var limitS=2*Math.asin((_g.nodes(elt.ends[0]).size+_marge)/R);
					startA+=limitS/2;
					var endA=_g.nodes(n).ea+(_g.nodes(n).es/2)-Math.asin((_g.nodes(elt.ends[elt.ends.length-1]).size+_marge)/_g.nodes(elt.ends[elt.ends.length-1]).ty);
					var StepA=(endA-startA)/(elt.ends.length-1);
					var S=(_g.nodes(elt.ends[0]).size+_marge);
					_g.nodes(elt.ends[0]).a=startA;
					_g.nodes(elt.ends[0]).r=R;
					_g.nodes(elt.ends[0]).s=2*Math.asin((_g.nodes(elt.ends[0]).size+_marge)/R);
					//_g.nodes(elt.ends[0]).c=startA;
					//_g.nodes(elt.ends[0]).m=1;
					affCircularNode(elt.ends[0]);
					//_g.nodes(elt.ends[0]).color="lightgrey";
					_g.nodes(n).mr=_g.nodes(elt.ends[0]).r;
					if(elt.ends.length>1) {
						R+=_g.nodes(elt.ends[0]).size+_marge;
						for(var i in elt.ends) {
							if(i>0) {
								//D=Math.cos(StepA)*R;
								//d=Math.sqrt(((S+_g.nodes(elt.ends[i]).size+_marge)*(S+_g.nodes(elt.ends[i]).size+_marge))-Math.sin(R));
								//R=D+d;
								R+=_g.nodes(elt.ends[i]).size+_marge;
								S=(_g.nodes(elt.ends[i]).size+_marge);
								_g.nodes(elt.ends[i]).w=2*(_g.nodes(elt.ends[i]).size+_marge);
								//_g.nodes(elt.ends[i]).a=startA+(i*StepA);
								_g.nodes(elt.ends[i]).a=startA;
								_g.nodes(elt.ends[i]).r=R;
								_g.nodes(elt.ends[i]).s=2*Math.asin(S/R);;
								//_g.nodes(elt.ends[i]).c=startA;
								//_g.nodes(elt.ends[i]).m=1;
								affCircularNode(elt.ends[i]);
								//_g.nodes(elt.ends[i]).color="lightgrey";
								R+=_g.nodes(elt.ends[i]).size+_marge;
							}
						}
						_g.nodes(n).mr=R;
					}
				}
			}
			for(var i in elt.childs) {
				var ns=2*Math.PI*_g.nodes(elt.childs[i]).w/_g.nodes(_root).w;
				var subElt=_struct[elt.childs[i]];
				if(ns>=subElt.ms) {
					_g.nodes(elt.childs[i]).s=0;
					totWidth+=_g.nodes(elt.childs[i]).w;
				} else {
					_g.nodes(elt.childs[i]).s=subElt.ms;
					levSector-=_g.nodes(elt.childs[i]).s;
				}
			}
			if(elt.childs.length==1) {
				//_g.nodes(elt.childs[0]).color="yellow";
				if(_g.nodes(n).es!=undefined) {
					_g.nodes(elt.childs[0]).s=_g.nodes(n).s-_g.nodes(n).es;
					_g.nodes(elt.childs[0]).a=_g.nodes(n).a+(_g.nodes(n).es/2);
					_g.nodes(elt.childs[0]).r=_g.nodes(n).mr+(2*(_g.nodes(elt.childs[0]).size+_marge));
				} else {
					_g.nodes(elt.childs[0]).s=_g.nodes(n).s;
					_g.nodes(elt.childs[0]).a=_g.nodes(n).a;
					_g.nodes(elt.childs[0]).r=(_g.nodes(n).r+(_g.nodes(elt.childs[0]).lev*_Rstep))/2;
				}
				angle+=_g.nodes(elt.childs[0]).s;
				calcPosCircular(elt.childs[0]);
				affCircularNode(elt.childs[0]);
			} else {
				if(_g.nodes(n).mr!=undefined) {
					var plus=_g.nodes(n).es/elt.childs.length;
				}
				for(var i in elt.childs) {
					var testBrothers=true;
					for(var j in elt.childs) {
						var subElt=_struct[elt.childs[j]];
						if(subElt.childs.length!=0) testBrothers=false;
					}
					if(_g.nodes(elt.childs[i]).s==0) {
						_g.nodes(elt.childs[i]).s=(levSector*( _g.nodes(elt.childs[i]).w/totWidth));
					}
					var subElt=_struct[elt.childs[i]];
					_g.nodes(elt.childs[i]).a=angle+(_g.nodes(elt.childs[i]).s/2);
					angle+=_g.nodes(elt.childs[i]).s;
					_g.nodes(elt.childs[i]).r=_g.nodes(n).r+_Rstep;
					if(n==_root) {
						_g.nodes(elt.childs[i]).r=Math.max(_g.nodes(elt.childs[i]).r,(_g.nodes(elt.childs[i]).size+_marge)/Math.sin(_g.nodes(elt.childs[i]).s/2));
					} else if(_g.nodes(n).es!=undefined && n!=_root) {
						//if(_g.nodes(elt.childs[i]).r>_g.nodes(n).mr+(2*(_g.nodes(elt.childs[i]).size+_marge))) {
							_g.nodes(elt.childs[i]).s+=plus;
							_g.nodes(elt.childs[i]).a-=(_g.nodes(n).es*(elt.childs.length-i)/elt.childs.length)-(plus/2);
						//}
						_g.nodes(elt.childs[i]).r=Math.max(_g.nodes(n).mr+_marge+_g.nodes(elt.childs[i]).size,(_g.nodes(elt.childs[i]).r+_g.nodes(n).mr)/2);
					} else if(subElt.childs.length==0 && testBrothers) {
						_g.nodes(elt.childs[i]).r=Math.max(_g.nodes(n).r+(_Rstep/2),(_g.nodes(elt.childs[i]).size+_marge)/Math.sin(_g.nodes(elt.childs[i]).s/2));
						//_g.nodes(elt.childs[i]).r=_g.nodes(n).r+(_Rstep/2);
					}
					if(subElt.childs.length==0 && subElt.ends.length==0) {
						//_g.nodes(elt.childs[i]).color="darkorange";
					} else if(subElt.childs.length==0) {
						//_g.nodes(elt.childs[i]).color="orange";
					} else {
						//_g.nodes(elt.childs[i]).color="black";
					}

					affCircularNode(elt.childs[i]);
					calcPosCircular(elt.childs[i]);
				}

			}
		} else {
			if(elt.ends.length==1) {
				//var startA=_g.nodes(n).a-(_g.nodes(n).s/2)+Math.asin((_g.nodes(elt.ends[0]).size+_marge)/_g.nodes(n).r);
				//var startR=_g.nodes(n).lev*_Rstep;
				_g.nodes(elt.ends[0]).w=2*(_g.nodes(elt.ends[0]).size+_marge);
				_g.nodes(elt.ends[0]).a=_g.nodes(n).a;
				_g.nodes(elt.ends[0]).r=(_g.nodes(n).r)+(2*(_g.nodes(elt.ends[0]).size+(2*_marge)+_g.nodes(n).size));
				_g.nodes(elt.ends[0]).s=2*Math.asin((_g.nodes(elt.ends[0]).size+_marge)/_g.nodes(elt.ends[0]).r);
				affCircularNode(elt.ends[0]);
				//_g.nodes(elt.ends[0]).color="white";
			} else {
				var startS=Math.asin(_maxSize/(_g.nodes(elt.ends[0]).lev*_Rstep))
				var endS=Math.asin(_maxSize/(_g.nodes(elt.ends[elt.ends.length-1]).lev*_Rstep))
				var S=startS+endS;
				var maxS=0;
				for(var i in elt.ends) {
					S+=2*Math.asin((_g.nodes(elt.ends[i]).size+_marge)/(_g.nodes(elt.ends[i]).lev*_Rstep));
					maxS=Math.max(maxS,_g.nodes(elt.ends[i]).size);
				}
				if(S<_g.nodes(n).s) {
					var startA=_g.nodes(n).a;
					var nbr=elt.ends.length;
					var count=Math.floor(nbr/2);
					var pair=nbr%2;
					var R=Math.max(maxS/(_g.nodes(n).s/elt.ends.length),_g.nodes(n).r+(2*(_g.nodes(n).size+(2*_marge)+maxS)));
					var Ss=Math.asin((maxS+_marge)/R);
					var Se=Math.asin((maxS+_marge)/R);
					var S=Math.asin((maxS+_marge)/R);
					if(pair==1) {
						_g.nodes(elt.ends[count]).w=2*(_g.nodes(elt.ends[count]).size+_marge);
						_g.nodes(elt.ends[count]).a=startA;
						_g.nodes(elt.ends[count]).r=R;
						_g.nodes(elt.ends[count]).s=2*Math.asin((_g.nodes(elt.ends[count]).size+_marge)/R);
						Se+=2*S;
						Ss+=2*S;
						affCircularNode(elt.ends[count]);
						//_g.nodes(elt.ends[count]).color="white";
					}
					for(var i=1;i<=count;i++) {
						var is=count-i;
						var ie=count+i-1+pair;
						_g.nodes(elt.ends[is]).w=2*(_g.nodes(elt.ends[is]).size+_marge);
						_g.nodes(elt.ends[is]).r=R;
						_g.nodes(elt.ends[is]).s=2*Math.asin((_g.nodes(elt.ends[is]).size+_marge)/R);
						_g.nodes(elt.ends[is]).a=startA-Ss;
						Ss+=2*S;
						affCircularNode(elt.ends[is]);
						//_g.nodes(elt.ends[is]).color="white";
						_g.nodes(elt.ends[ie]).w=2*(_g.nodes(elt.ends[ie]).size+_marge);
						_g.nodes(elt.ends[ie]).r=R;
						_g.nodes(elt.ends[ie]).s=2*Math.asin((_g.nodes(elt.ends[ie]).size+_marge)/R);
						_g.nodes(elt.ends[ie]).a=startA+Se;
						Se+=2*S;
						affCircularNode(elt.ends[ie]);
						//_g.nodes(elt.ends[ie]).color="white";
					}
				} else {
					if(elt.ends.length==1) {
						_g.nodes(elt.ends[0]).w=2*(_g.nodes(elt.ends[0]).size+_marge);
						_g.nodes(elt.ends[0]).a=_g.nodes(n).a-(_g.nodes(n).s/2);
						_g.nodes(elt.ends[0]).r=_g.nodes(elt.ends[0]).lev*_Rstep;
						_g.nodes(elt.ends[0]).s=_g.nodes(n).s;
						affCircularNode(elt.ends[0]);
						//_g.nodes(elt.ends[0]).color="lightblue";
					} else {
						var nbr=elt.ends.length;
						var testR=(((_g.nodes(n).lev+1)*_Rstep)+(_g.nodes(n).r))/2;
						var testS=2*(Math.asin((_g.nodes(elt.ends[0]).size+_marge)/testR)+Math.asin((_g.nodes(elt.ends[elt.ends.length-1]).size+_marge)/testR));
						if(testS>_g.nodes(n).s || nbr<7) {
							var startR=_g.nodes(n).r+_g.nodes(n).size+_marge;
							var R=startR;
							for(var i in elt.ends) {
								R+=2*(_g.nodes(elt.ends[i]).size+_marge);
							}
							var startA=_g.nodes(n).a-(_g.nodes(n).s/2)+Math.asin((_g.nodes(elt.ends[0]).size+_marge)/R);
							var endA=_g.nodes(n).a+(_g.nodes(n).s/2)-Math.asin((_g.nodes(elt.ends[nbr-1]).size+_marge)/startR);
							var StepA=(endA-startA)/(nbr-1);
							for(var i in elt.ends) {
								R-=_g.nodes(elt.ends[i]).size+_marge;
								_g.nodes(elt.ends[i]).a=startA+(i*StepA);
								_g.nodes(elt.ends[i]).r=R;
								_g.nodes(elt.ends[i]).s=2*Math.asin((_g.nodes(elt.ends[i]).size+_marge)/R);
								affCircularNode(elt.ends[i]);
								//_g.nodes(elt.ends[i]).color="blue";
								R-=_g.nodes(elt.ends[i]).size+_marge;
							}
						} else {
							//var R=((_g.nodes(elt.ends[0]).lev*_Rstep)+(_g.nodes(n).r))/2;
							var R=_g.nodes(n).r+(_Rstep/2);
							var startS=Math.asin((_g.nodes(elt.ends[0]).size+_marge)/R);
							var endS=Math.asin((_g.nodes(elt.ends[elt.ends.length-1]).size+_marge)/R);
							var startA=_g.nodes(n).a-(_g.nodes(n).s/2)+startS;
							var endA=_g.nodes(n).a+(_g.nodes(n).s/2)-endS;
							var StepA=(endA-startA)/(elt.ends.length);
							var Ss=(_g.nodes(elt.ends[0]).size+_marge);
							var Se=(_g.nodes(elt.ends[elt.ends.length-1]).size+_marge);
							_g.nodes(elt.ends[0]).s=startS;
							_g.nodes(elt.ends[0]).a=startA;
							//_g.nodes(elt.ends[0]).r=((_g.nodes(elt.ends[0]).lev*_Rstep)+(_g.nodes(n).r))/2;
							_g.nodes(elt.ends[0]).r=R;
							_g.nodes(elt.ends[0]).c=_g.nodes(n).a;
							_g.nodes(elt.ends[0]).m=0.5;
							affCircularNode(elt.ends[0]);
							//_g.nodes(elt.ends[0]).color="blue";
							_g.nodes(elt.ends[elt.ends.length-1]).s=endS;
							_g.nodes(elt.ends[elt.ends.length-1]).a=endA;
							//_g.nodes(elt.ends[elt.ends.length-1]).r=((_g.nodes(elt.ends[elt.ends.length-1]).lev*_Rstep)+(_g.nodes(n).r))/2;
							_g.nodes(elt.ends[elt.ends.length-1]).r=R;
							_g.nodes(elt.ends[elt.ends.length-1]).c=_g.nodes(n).a;
							_g.nodes(elt.ends[elt.ends.length-1]).m=0.5;
							affCircularNode(elt.ends[elt.ends.length-1]);
							//_g.nodes(elt.ends[elt.ends.length-1]).color="blue";
							var count=Math.ceil(nbr/2);
							var pair=nbr%2;
							for(var i=1;i<count;i++) {
								var D=0,d=0;
								//if(i<count-1 || pair==1) {
									D=Math.cos(StepA)*R;
									d=Math.max(
									Math.sqrt(((Ss+_g.nodes(elt.ends[i]).size)*(Ss+_g.nodes(elt.ends[i]).size))-Math.sin(R)),
									Math.sqrt(((Se+_g.nodes(elt.ends[nbr-1-i]).size)*(Se+_g.nodes(elt.ends[nbr-1-i]).size))-Math.sin(R))
									);
								//}
								R=D+d;
								Ss=(_g.nodes(elt.ends[i]).size+_marge);
								Se=(_g.nodes(elt.ends[nbr-1-i]).size+_marge);
								//if(R==0) {
								//	R=Math.max(Ss/Math.sin(StepA),Se/Math.sin(StepA));
								//}
								if(i==count-1 && pair==1) {
									_g.nodes(elt.ends[i]).a=_g.nodes(n).a;
									_g.nodes(elt.ends[nbr-1-i]).a=_g.nodes(n).a;
								} else {
									_g.nodes(elt.ends[i]).a=startA+(i*StepA);
									_g.nodes(elt.ends[nbr-1-i]).a=endA-(i*StepA);
								}
								_g.nodes(elt.ends[i]).r=R;
								_g.nodes(elt.ends[i]).s=2*Math.asin(Ss/R);;
								_g.nodes(elt.ends[i]).c=_g.nodes(n).a;
								_g.nodes(elt.ends[i]).m=0.5;
								affCircularNode(elt.ends[i]);
								//_g.nodes(elt.ends[i]).color="blue";
								
								_g.nodes(elt.ends[nbr-1-i]).r=R;
								_g.nodes(elt.ends[nbr-1-i]).s=2*Math.asin(Ss/R);;
								_g.nodes(elt.ends[nbr-1-i]).c=_g.nodes(n).a;
								_g.nodes(elt.ends[nbr-1-i]).m=0.5;
								affCircularNode(elt.ends[nbr-1-i]);
								//_g.nodes(elt.ends[nbr-1-i]).color="blue";
							}
						}
					}
				}

			}
		}
		affCircularNode(n);
	}
	/**
	* Interface
	* ------------------
	*
	* > var treeGraph = new sigma.plugins.treeGraph(s);
	*/
	var treeGraph = null;

	/**
	* This method takes the sigma instance and draw a vertical treeGraph
	*
	* @param  {object} the sigma instance.
	*/
	sigma.classes.graph.addMethod('verticalTree',function(s) {
		if(s.settings('treeGraph')!=undefined && s.settings('treeGraph')!="vertical") {
			var bgs= document.getElementsByClassName("sigma-background");
			var maxSize=0;
			var Xmax=0;
			var Ymax=0;
			var Xmin=0;
			var Ymin=0;
			var marge=s.settings('visNodeMargin');
			var sideMargin=s.settings('sideMargin');
			bgs.innerHTML="";
			s.graph.nodes().forEach(function(node) {
				node.x=node.tx;
				node.y=node.ty;
				maxSize=Math.max(maxSize,node.size+marge);
				Xmax=Math.max(Xmax,node.x);
				Xmin=Math.min(Xmin,node.x);
				Ymax=Math.max(Ymax,node.y);
				Ymin=Math.min(Ymin,node.y);
			});
			Xmax=Xmax+maxSize;
			Xmin=Xmin-maxSize;
			Ymax=Ymax+maxSize;
			Ymin=Ymin-maxSize;
			var ratio=Math.max((Xmax-Xmin+(2*sideMargin))/s.renderers[0].width,(Ymax-Ymin+(2*sideMargin))/s.renderers[0].height);
			//alert(((Xmax-Xmin)/(Ymax-Ymin))+" : "+(s.renderers[0].width/s.renderers[0].height));
			if(((Xmax-Xmin)/(Ymax-Ymin))>(s.renderers[0].width/s.renderers[0].height)){
				var pan=true;
			} else {
				var pan=false;
			}
			s.renderers[0].camera.ratio=ratio;
			s.renderers[0].camera.x=(Xmax+Xmin)/2;
			s.renderers[0].camera.y=(Ymax+Ymin)/2;
			s.settings({pan:pan,zoomMin:0.005,zoomMax:ratio,zoomFit:ratio,Cx:(Xmax+Xmin)/2,Cy:(Ymax+Ymin)/2,Xmax:Xmax,Xmin:Xmin,Ymax:Ymax,Ymin:Ymin,treeGraph:"vertical"});
			s.refresh();
		}
	})
	/**
	* This method takes the sigma instance and draw a vertical treeGraph
	*
	* @param  {object} the sigma instance.
	*/
	sigma.classes.graph.addMethod('horizontalTree',function(s) {
		if(s.settings('treeGraph')!=undefined && s.settings('treeGraph')!="horizontal") {
			var bgs= document.getElementsByClassName("sigma-background");
			var maxSize=0;
			var Xmax=0;
			var Ymax=0;
			var Xmin=0;
			var Ymin=0;
			var marge=s.settings('visNodeMargin');
			var sideMargin=s.settings('sideMargin');
			bgs.innerHTML="";
			s.graph.nodes().forEach(function(node) {
				node.x=node.ty;
				node.y=-node.tx;
				maxSize=Math.max(maxSize,node.size+marge);
				Xmax=Math.max(Xmax,node.x);
				Xmin=Math.min(Xmin,node.x);
				Ymax=Math.max(Ymax,node.y);
				Ymin=Math.min(Ymin,node.y);
			});
			Xmax=Xmax+maxSize;
			Xmin=Xmin-maxSize;
			Ymax=Ymax+maxSize;
			Ymin=Ymin-maxSize;
			var ratio=Math.max((Xmax-Xmin+(2*sideMargin))/s.renderers[0].width,(Ymax-Ymin+(2*sideMargin))/s.renderers[0].height);
			//alert(((Ymax-Ymin)/(Xmax-Xmin))+ " : "+(s.renderers[0].height/s.renderers[0].width));
			if(((Ymax-Ymin)/(Xmax-Xmin))>(s.renderers[0].height/s.renderers[0].width)) {
				var pan=true;
			} else {
				var pan=false;
			}
			s.renderers[0].camera.ratio=ratio;
			s.renderers[0].camera.x=(Xmax+Xmin)/2;
			s.renderers[0].camera.y=(Ymax+Ymin)/2;
			s.settings({pan:pan,zoomMin:0.005,zoomMax:ratio,zoomFit:ratio,Cx:(Xmax+Xmin)/2,Cy:(Ymax+Ymin)/2,Xmax:Xmax,Xmin:Xmin,Ymax:Ymax,Ymin:Ymin,treeGraph:"horizontal"});
			s.refresh();
		}
	})
	/**
	* This method takes the sigma instance and draw a circular treeGraph
	*
	* @param  {object} the sigma instance.
	*/
	sigma.classes.graph.addMethod('circularTree',function(s) {
		if(s.settings('treeGraph')!=undefined && s.settings('treeGraph')!="circular") {
			var bgs= document.getElementsByClassName("sigma-background");
			var maxSize=0;
			var maxR=0;
			var marge=s.settings('visNodeMargin');
			var sideMargin=s.settings('sideMargin');
			bgs.innerHTML="";
			s.graph.nodes().forEach(function(node) {
				node.x=node.r*Math.cos(node.a);
				node.y=node.r*Math.sin(node.a);
				maxR=Math.max(maxR,node.r+node.size+marge);
				maxSize=Math.max(maxSize,node.size+marge);
			});
			var ratio=Math.max((2*(maxR+sideMargin))/_s.renderers[0].width,(2*(maxR+sideMargin))/_s.renderers[0].height);
			s.renderers[0].camera.ratio=ratio;
			s.renderers[0].camera.x=0;
			s.renderers[0].camera.y=0;
			s.settings({zoomMin:0.005,zoomMax:50,zoomFit:ratio,Cx:0,Cy:0,maxR:maxR,maxSize:maxSize,treeGraph:"circular"});
			s.refresh();
		}
	});
	/**
	* This method takes the sigma instance and reset treeGraph
	*
	* @param  {object} the sigma instance.
	*/
	sigma.classes.graph.addMethod('resetTree',function(s) {
		if(s.settings('treeGraph')!=undefined && s.settings('treeGraph')!="") {
			var bgs= document.getElementsByClassName("sigma-background");
			bgs.innerHTML="";
			s.settings({treeGraph:""});
			s.refresh();
		}
	});
	/**
	* @param  {sigma} s The related sigma instance.
	*/
	sigma.plugins.treeGraph = function(s) {
		treeGraph = new TreeGraph(s);
		if(s.settings('visNodeMargin')) _marge=s.settings('visNodeMargin');
		if(s.settings('root')) _root=s.settings('root'); 
		_nLev.push([_root]);
		levelize(_root);
		setStructure(_root);
		drawCocons(_root);
		var sideMargin=_s.settings('sideMargin');
		_Rstep=4*(_maxSize+_marge);
		calcPosCircular(_root);
		var ratio=Math.max((2*(_maxR+sideMargin))/_s.renderers[0].width,(2*(_maxR+sideMargin))/_s.renderers[0].height);
		s.renderers[0].camera.ratio=ratio;
		s.renderers[0].camera.x=0;
		s.renderers[0].camera.y=0;
		s.settings({zoomMin:0.005,zoomMax:50,zoomFit:ratio,Cx:0,Cy:0,maxR:_maxR,maxSize:_maxSize,treeGraph:"circular"});
		if(_cocons[0]!=undefined) _s.settings({cocons:_cocons.length});
		else _s.settings({cocons:_cocons.length-1});
		_s.refresh();
		return treeGraph;
	};

}).call(this);
