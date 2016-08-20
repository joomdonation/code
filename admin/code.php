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
require_once JPATH_COMPONENT .'/table/category.php';
require_once JPATH_COMPONENT .'/table/item.php';


echo '<h2>JTable Method</h2>';

// Init JTable object
$row = JTable::getInstance('category', 'CodeTable');

// Load a record from database
$row->load(1);
echo '<pre>';
echo $row->id . ':' . $row->title . ':' . $row->description;
echo '</pre>';

// Update data of that record
$row->title       = 'New Title';
$row->description = 'New description';
$row->store();

// Insert new record
$row              = JTable::getInstance('item', 'CodeTable');
$row->title       = 'New Record Title';
$row->description = 'New Record Description';
$row->store();

echo '<pre>';
echo 'ID of new record:' . $row->id;
echo '</pre>';

// Insert new record use bind method
$row  = JTable::getInstance('item', 'CodeTable');
$data = array(
	'title'       => 'Bind Method',
	'category_id' => 1,
	'title'       => 'New Record Created By Bind Method',
	'ordering'    => 1,
	'published'   => 1
);
$row->bind($data);
$row->store();

// Delete this record, uncomment the code below to see how it works
//$row->delete();











