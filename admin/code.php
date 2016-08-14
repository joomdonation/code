<?php
/**
 * @version        1.0
 * @package        Joomla
 * @subpackage     Training
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2016 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die;

$db    = JFactory::getDbo();
$query = $db->getQuery(true);
$query->update('#__code_categories')
	->set('name = ' . $db->quote('Joomla Component'))
	->where('id = 1');
$db->setQuery($query);
$db->execute();
echo '<pre>' . $db->getQuery() . '</pre>';

$newName = 'Joomla Modules';
$query->clear()
	->update('#__code_categories')
	->set('name = ' . $db->quote($newName))
	->where('id = 2');
$db->setQuery($query);
$db->execute();

$query->clear()
	->update('#__code_categories')
	->set('name = ' . $db->quote('Joomla Plugins'))
	->where('name = ' . $db->quote('Plugins'));
$db->setQuery($query);
$db->execute();






