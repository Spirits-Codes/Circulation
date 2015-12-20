/*
  @package component circulation for Joomla! 3.x
  @version $Id: com_circulation 1.0.0 2015-12-20 23:26:33Z $
  @author Kian William Nowrouzian
  @copyright (C) 2015- Kian William Nowrouzian
  @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 
 This file is part of circulation.
    circulation is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
    circulation is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with circulation.  If not, see <http://www.gnu.org/licenses/>.
 
*/

(function($){
	$.fn.eve = function(options)
	{
		//return this.each(function(){
			var $container, $options;
			$container = $(this);
			$options = $.extend({}, $.fn.eve.defaults, options);
			var myeve = new Evee($container, $options);
			var interval = setInterval(function(){
				myeve.firstMove();
				clearInterval(interval);
			}, 3000);
		//});
	}
	
	function Evee($container, $options)
	{
		var myobj = this;
		this.interval;
		var w = ($options.width * 3)+ ($options.width / 10) * 4;
		var h = ($options.height * 3)+ ($options.width / 10) * 4;
		var lefts = [$options.width / 10, (($options.width / 10)*3)+(($options.width)*2)];
		var tops = [$options.width / 10, (($options.width / 10)*3)+(($options.height)*2)];
		var l = 0;
		var t = 0;
		var constant = $options.images.length/4;
		var index0, index1, index2, index3;
		var limit0, limit1, limit2, limit3;
		index0=0;
		index1=constant;
		index2= constant*2;
		index3 = constant*3;
		limit0 = index0+2;
		limit1 = index1+2;
		limit2 = index2+2;
		limit3 = index3+2;
		var l1, t1;
		
		
		
		$container.css({position:'relative', marginLeft:'auto', marginRight:'auto', backgroundColor:$options.bcolor, color:$options.color, width:w+'px', height:h+'px'});
		for(var i=0; i<4; i++)
		{
			$('<div id="dyna'+i+'"></div>').css({position:'absolute', left:lefts[l]+'px', top:tops[t]+'px', width:$options.width+'px', height:$options.height+'px', backgroundColor:'#fff'}).appendTo($container);
			switch(i)
			{
				case 0:
					l=1;
					t=0;
					break;
				case 1:
					l=0;
					t=1;
					break;
				case 2:
					l=1;
					t=1;
					break;
			}
		}
		$('<div id="cubecontainer"></div>').css({position:'relative', left:(parseInt($options.width)/10*2)+parseInt($options.width)+'px', top:(parseInt($options.width)/10*2)+parseInt($options.height)+'px', width:parseInt($options.width)+'px', height:parseInt($options.height)+'px', backgroundColor:'transparent',  perspective:'1200px', mozPerspective:'1200px', webkitPerspective:'1200px', oPerspective:'1200px'}).appendTo($container);
		$('<div id="dynacube"></div>').css({position:'absolute', left:0, top:0, display:'block', width:parseInt($options.width)+'px', height:parseInt($options.height)+'px', transformStyle:'preserve-3d', webkitTransformStyle:'preserve-3d', mozTransformStyle:'preserve-3d', oTransformStyle:'preserve-3d'}).appendTo('#cubecontainer');
		$('<div id="surface1"></div>').css({position:'absolute', display:'block', width:parseInt($options.width)+'px', height:parseInt($options.height)+'px', webkitTransform:' translateZ('+parseInt($options.height)/2+'px )',mozTransform:' translateZ('+parseInt($options.height)/2+'px )', oTransform: ' translateZ('+parseInt($options.height)/2+'px )', transform:' translateZ('+parseInt($options.height/2)+'px )'}).appendTo('#dynacube').append('<img title="" src="" width="'+$options.width+'px" height="'+$options.height+'px" />');
		$('<div id="surface2"></div>').css({position:'absolute', display:'block', width:parseInt($options.width)+'px', height:parseInt($options.height)+'px', webkitTransform:'rotateX(180deg) translateZ('+parseInt($options.height)/2+'px ) ',mozTransform:'rotateX(-180deg) translateZ('+parseInt($options.height)/2+'px )', oTransform: 'rotateX(-180deg) translateZ('+parseInt($options.height)/2+'px )', transform:'rotateX(180deg) translateZ('+parseInt($options.height)/2+'px )'}).appendTo('#dynacube').append('<img src="" title="" width="'+$options.width+'px" height="'+$options.height+'px" />');
		$('<div id="surface3"></div>').css({position:'absolute', display:'block', width:parseInt($options.width)+'px', height:parseInt($options.height)+'px', webkitTransform:'rotateY(   90deg ) translateZ('+parseInt($options.width)/2+'px ) ',mozTransform:' translateZ('+parseInt($options.width)/2+'px ) rotateY(   90deg )', oTransform: '  rotateY(   90deg ) translateZ('+parseInt($options.width)/2+'px )', transform:'rotateY(   90deg ) translateZ('+parseInt($options.width)/2+'px ) '}).appendTo('#dynacube').append('<img src="" title="" width="'+$options.width+'px" height="'+$options.height+'px" />');
		$('<div id="surface4"></div>').css({position:'absolute', display:'block', width:parseInt($options.width)+'px', height:parseInt($options.height)+'px', webkitTransform:' rotateY(   -90deg ) translateZ('+parseInt($options.width)/2+'px )',mozTransform:'  rotateY(   -90deg ) translateZ('+parseInt($options.width)/2+'px )', oTransform: ' rotateY(   -90deg )  translateZ('+parseInt($options.width)/2+'px )', transform:'rotateY(   -90deg ) translateZ('+parseInt($options.width)/2+'px ) '}).appendTo('#dynacube').append('<img src="" title="" width="'+$options.width+'px" height="'+$options.height+'px" />');
		$('<div id="surface5"></div>').css({position:'absolute', display:'block', width:parseInt($options.width)+'px', height:parseInt($options.height)+'px', webkitTransform:'rotateX(   90deg ) translateZ('+parseInt($options.height)/2+'px ) ',mozTransform:'  rotateX(   90deg ) translateZ('+parseInt($options.height)/2+'px )', oTransform: ' rotateX(   90deg )  translateZ('+parseInt($options.height)/2+'px )', transform:'rotateX(   90deg ) translateZ('+parseInt($options.height)/2+'px ) '}).appendTo('#dynacube').append('<img src="" title="" width="'+$options.width+'px" height="'+$options.height+'px" />');
		$('<div id="surface6"></div>').css({position:'absolute', display:'block', width:parseInt($options.width)+'px', height:parseInt($options.height)+'px', webkitTransform:'rotateX(   -90deg ) translateZ('+parseInt($options.height)/2+'px ) ',mozTransform:'  rotateX(   -90deg ) translateZ('+parseInt($options.height)/2+'px )', oTransform: '  rotateX(   -90deg ) translateZ('+parseInt($options.height)/2+'px )', transform:'rotateX(   -90deg ) translateZ('+parseInt($options.height)/2+'px ) '}).appendTo('#dynacube').append('<img src="" title="" width="'+$options.width+'px" height="'+$options.height+'px" />');
		$('#surface2').children('img').css({transform:'rotate(-180deg)', webkitTransform:'rotate(-180deg)', mozTransform:'rotate(-180deg)', oTransform:'rotate(-180deg)'});

		var num;
		for(i=0; i<4; i++)
		{
			switch(i)
			{
				case 0:
					num=index0;
					break;
				case 1:
					num=index1;
					break;
				case 2:
					num=index2;
					break;
				case 3:
					num=index3;
				   break;
			}
			$('<img />').attr('src', $options.images[num]).attr('title', $options.descs[num]).css({width:$options.width+'px', height:$options.height+'px'}).appendTo('#dyna'+i);
		}
		
		this.firstMove = function(){
		clearInterval(myobj.interval);
			for(var i=0; i<4; i++)
			{
				$('#dyna'+i).stop(true, true).animate({left:$('#cubecontainer').css('left'),top:$('#cubecontainer').css('top') },parseInt($options.imagespeed), function(){
						var n =parseInt($(this).attr('id').substring(4))+1;
					    $('#surface'+n).children('img').attr('src', $(this).children('img').attr('src'));
				 
						if(n==4)
						{
							 if(index0<limit0-1)
				             {
					           index0++;
				             }
				             else
							 {
					           index0=0;
							 }
				            if(index1<limit1-1)
				            {
					           index1++;
				            }
				            else
							{
					          index1=constant;
							}
				            if(index2<limit2-1)
				            {
					            index2++;
				            }
				            else
							{
					          index2=constant*2;
							}
				             if(index3<limit3-1)
				             {
					             index3++;
				               }
				             else
							 {
					            index3=constant*3;
							 }
							
							$('#dyna0').children('img').attr('src', $options.images[index0]);
							$('#dyna1').children('img').attr('src', $options.images[index1]);
							$('#dyna2').children('img').attr('src', $options.images[index2]);
							$('#dyna3').children('img').attr('src', $options.images[index3]);
							$('#dyna0').children('img').attr('title', $options.descs[index0]);
							$('#dyna1').children('img').attr('title', $options.descs[index1]);
							$('#dyna2').children('img').attr('title', $options.descs[index2]);
							$('#dyna3').children('img').attr('title', $options.descs[index3]);

								
							myobj.secondMove();
						}
				} )
			}
		}
		this.secondMove = function() {
			 $({deg:0}).animate({deg:360}, { duration:parseInt($options.cubespeed), step:function(n){$('#dynacube').css({
		      transform:'rotateY('+n+'deg) ', webkitTransform:'rotateY('+n+'deg)',mozTransform:'rotateY('+n+'deg)', msTransform:'rotateY('+n+'deg)'})},
			  complete:function()
		      {
				 
				
				for(var i=0; i<4; i++)
			    {
					
					switch(i)
					{
						case 0:
						case 2:
							l1= lefts[0]
							break;
						case 1:
						case 3:
							l1 = lefts[1];
							break;
					}
					
					switch(i)
					{
						case 0:
						case 1:
							t1 = tops[0];
							break;
						case 2:
						case 3:
							t1 = tops[1];
							break;
					}
					
				$('#dyna'+i).stop(true, true).animate({left:l1+'px',top:t1+'px' },parseInt($options.imagespeed), function(){
					
						var n =parseInt($(this).attr('id').substring(4));
						
						
										    
						if(n==3)
							myobj.callerOne();
				} )
			   }
			  }
			 });
		}
		
		
		
		
		
	}
	Evee.prototype.callerOne = function() {
		var myobj = this;
		myobj.interval = setInterval(function(){myobj.firstMove();}, 3000)
	}
	
}(jQuery));
