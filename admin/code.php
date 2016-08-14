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

$query->delete('#__code_categories')
	->where('id = 1');
$db->setQuery($query);
$db->execute();
echo '<pre>' . $db->getQuery() . '</pre>';

$query->clear()
	->delete('#__code_categories')
	->where('name = ' . $db->quote('Components'));
$db->setQuery($query);
$db->execute();
echo '<pre>' . $db->getQuery() . '</pre>';

$query->clear()
	->delete('#__code_categories')
	->where('ind IN (1, )');
$db->setQuery($query);
$db->execute();
echo '<pre>' . $db->getQuery() . '</pre>';
