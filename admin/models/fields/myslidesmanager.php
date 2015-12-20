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

defined('_JEXEC') or die('Restricted access');

JText::script('COM_CIRCULATION_SELECT_IMAGE_LABEL');
JText::script('COM_CIRCULATION_SELECT_IMAGE_DESC');
JText::script('COM_CIRCULATION_SELECT_IMAGE_TEXT_LABEL');
JText::script('COM_CIRCULATION_SELECT_IMAGE_TEXT_DESC');
JText::script('COM_CIRCULATION_SELECT_SLIDESHOW_REMOVE_LABEL');


jimport('joomla.html.html');
jimport('joomla.form.formfield');

class JFormFieldMyslidesmanager extends JFormField {
	
	protected $type = 'myslidesmanager';
	
	protected function getInput() {

		$document = JFactory::getDocument();
		$document->addScriptDeclaration("JURI='" . JURI::root() . "'");
		$path = 'administrator/components/com_circulation/models/fields/myslides/';
		JHTML::_('behavior.modal');		
		JHTML::_('stylesheet', $path . 'slides.css');
		JHTML::_('script', $path . 'slides.js');
		$html = '<input name="' . $this->name . '" id="myslides" type="hidden" value="' . $this->value . '" />'
				. '<input name="myaddslide" id="myaddslide"  type="button" value="' . JText::_('COM_CIRCULATION_ADDSLIDE') . '"  onclick="javascript:addslidemy();" />'
				. '<ul id="myslideslist" style="clear:both;"></ul>'
				. '<input name="myaddslide" id="myaddslide" type="button" value="' . JText::_('COM_CIRCULATION_ADDSLIDE') . '"  onclick="javascript:addslidemy();" />';

		return $html;
	}
	
	protected function getPathToImages() {
		$localpath = dirname(__FILE__);
		$rootpath = JPATH_ROOT;
		$httppath = trim(JURI::root(), "/");
		$pathtoimages = str_replace("\\", "/", str_replace($rootpath, $httppath, $localpath));
		return $pathtoimages;
	}
	
	protected function getLabel()
	{
		return $this->label;
	}
}




