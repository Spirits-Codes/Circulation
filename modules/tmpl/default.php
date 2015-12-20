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
$document = &JFactory::getDocument();
$document->addStyleSheet(JURI::base()."components/com_circulation/assets/css/circulation.css");

  if($itemmod->params->get('jQuery')==0)
  {
	  $document->addScript(JURI::base()."components/com_circulation/assets/js/jquery.js");
  }
  $document->addScript(JURI::base()."components/com_circulation/assets/js/panorama.js");
$noConf = " var mcp = jQuery.noConflict(); ";
$document->addScriptDeclaration($noConf);
   $itemsmod = json_decode(str_replace("|qq|", "\"", $itemmod->params->get('slides')));
   foreach($itemsmod as $imod=>$itemm)
   {	
		$imagesmod[] = JURI::base().$itemm->imgname;	
		$textsmod[]=$itemm->imgtext;	
   }
   
   $modcirculation = "
		mcp(document).ready(function(){
		mcp('#msynodique').eve({width:'".$itemmod->params->get('cube_width')."', height:'".$itemmod->params->get('cube_height')."', bcolor:'".$itemmod->params->get('backgroundcolor')."', color:'".$itemmod->params->get('fontcolor')."', cubespeed:'".$itemmod->params->get('cubespeed')."', imagespeed:'".$itemmod->params->get('imagespeed')."'});
	});
	mcp.fn.eve.defaults = {};
	mcp.fn.eve.defaults.images = [];
	mcp.fn.eve.defaults.descs= [];
	mcp.fn.eve.defaults.width=100;
	mcp.fn.eve.defaults.height=100;
	mcp.fn.eve.defaults.bcolor='#B56DC5';
	mcp.fn.eve.defaults.color='#fff';
	mcp.fn.eve.defaults.imagespeed=1000;
	mcp.fn.eve.defaults.cubespeed=1500;
	var myimagesmod = ".json_encode($imagesmod).";
	var mydescsmod = ".json_encode($textsmod).";
	for(var g1=0; g1<myimagesmod.length; g1++)
	{
		mcp.fn.eve.defaults.images[g1] = myimagesmod[g1];	
		mcp.fn.eve.defaults.descs[g1] = mydescsmod[g1];	
	}
   ";
   $document->addScriptDeclaration($modcirculation);
   
   $imgsizeb = "
	#msynodique #cubecontainer #dynacube div img {
		width:".$itemmod->params->get('cube_width')."px !important;
        height:".$itemmod->params->get('cube_height')."px !important;

	}
  ";
  $document->addStyleDeclaration($imgsizeb);
 

?>
<div id="msynodique"></div>