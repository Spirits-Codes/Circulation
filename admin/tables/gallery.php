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
class CirculationTableGallery extends JTable{
	
	public function __construct(&$db)
	{
		parent::__construct('#__circulation_gallery', 'id', $db);
	}
	public function bind($array, $ignore = '')
	{
		if (isset($array['params']) && is_array($array['params'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string)$registry;
		}
		if (isset($array['visual']) && is_array($array['visual'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['visual']);
			$array['visual'] = (string)$registry;
		}
		
		if(empty($array['alias'])) {
			$array['alias'] = $array['title'];
		}
				
				
	  return parent::bind($array, $ignore);

		
	}
	
}

