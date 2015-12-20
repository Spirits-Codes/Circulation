<?php 

/**
 * @package component circulation for Joomla! 3.x
 * @version $Id: com_circulation 1.0.0 2015-12-20 23:26:33Z $
 * @author Kian William Nowrouzian
 * @copyright (C) 2015- Kian William Nowrouzian
 * @license GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 
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
 
**/


?>

<?php 
defined('_JEXEC') or die;
JHtml::_('jquery.framework');
$document = &JFactory::getDocument();
  $document->addStyleSheet(JURI::Base()."components/com_circulation/assets/css/circulation.css");

if($this->item->params->get('lib')==1)
{
   $document->addScript(JURI::Base()."components/com_circulation/assets/js/jquery.js");
}
  $document->addScript(JURI::Base()."components/com_circulation/assets/js/panorama.js");
  $noConflict = "var cp = jQuery.noConflict()";
  $document->addScriptDeclaration($noConflict);
  
   $items = json_decode(str_replace("|qq|", "\"", $this->item->params->get('slides')));
   foreach($items as $i=>$item)
   { 
	
		$images[] = JURI::base().$item->imgname;	
		$texts[]=$item->imgtext;
	
   }
  $mycirculation = "
	cp(document).ready(function(){
		cp('#synodique').eve({width:'".$this->item->params->get('cube_width')."', height:'".$this->item->params->get('cube_height')."', bcolor:'".$this->item->params->get('backgroundcolor')."', color:'".$this->item->params->get('fontcolor')."', cubespeed:'".$this->item->params->get('cubespeed')."', imagespeed:'".$this->item->params->get('imagespeed')."'});
	});
	cp.fn.eve.defaults = {};
	cp.fn.eve.defaults.images = [];
	cp.fn.eve.defaults.descs= [];
	cp.fn.eve.defaults.width=100;
	cp.fn.eve.defaults.height=100;
	cp.fn.eve.defaults.bcolor='#B56DC5';
	cp.fn.eve.defaults.color='#fff';
	cp.fn.eve.defaults.imagespeed=1000;
	cp.fn.eve.defaults.cubespeed=1500;
	var myimages = ".json_encode($images).";
	var mydescs = ".json_encode($texts).";
	for(var g=0; g<myimages.length; g++)
	{
		cp.fn.eve.defaults.images[g] = myimages[g];	
		cp.fn.eve.defaults.descs[g] = mydescs[g];	
	}
	
  ";
  $document->addScriptDeclaration($mycirculation);
  $imgsize = "
	#synodique #cubecontainer #dynacube div img {
		width:".$this->item->params->get('cube_width')."px !important;
        height:".$this->item->params->get('cube_height')."px !important;

	}
  ";
  $document->addStyleDeclaration($imgsize);



?>

<div class="gallery<?php echo $this->pageclass_sfx?>">

	<div class="gallery<?php echo $this->pageclass_sfx?>">
         <?php if ($this->params->get('show_page_heading', 1)) : ?>
             <h1>
	             <?php echo $this->escape($this->params->get('page_heading')); ?>
             </h1>
         <?php endif; ?>
		 
	     <?php if ($this->item->title) : ?>
		    <h2>
			     <span class="gallery-name"><?php echo $this->item->title; ?></span>
		    </h2>
	     <?php endif;  ?>
		 <div id="synodique" class="circulation<?php echo $this->pageclass_sfx?>">
		 </div>

		 
	</div>

</div>