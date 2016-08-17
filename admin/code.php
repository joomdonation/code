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

echo '<h2>Select/Dropdown List</h2>';
$options   = array();
$options[] = JHtml::_('select.option', 0, JText::_('Select Gender'));
$options[] = JHtml::_('select.option', 1, JText::_('Male'));
$options[] = JHtml::_('select.option', 2, JText::_('Female'));

echo '<pre>';
echo JHtml::_('select.genericlist', $options, 'gender', '', 'value', 'text', 2);
echo '</pre>';

$options   = array();
$options[] = JHtml::_('select.option', 0, JText::_('Select Category'), 'id', 'title');
$query->select('id, title')
	->from('#__code_categories')
	->where('published = 1')
	->order('title');
$db->setQuery($query);
$options = array_merge($options, $db->loadObjectList());

echo '<pre>';
echo JHtml::_('select.genericlist', $options, 'category_id', '', 'id', 'title', 1);
echo '</pre>';

$options   = array();
$options[] = JHtml::_('select.option', 0, JText::_('Select Category'), 'id', 'description');
$query->clear()
	->select('id, description')
	->from('#__code_categories')
	->where('published = 1')
	->order('id');
$db->setQuery($query);
$options = array_merge($options, $db->loadObjectList());

echo '<pre>';
echo JHtml::_('select.genericlist', $options, 'category_id', '', 'id', 'description', 1);
echo '</pre>';


echo '<h2>Date Picker</h2>';
echo '<pre>';
echo JHtml::_('calendar', '2016-11-20', 'event_end_date', 'event_end_date', '%Y-%m-%d', array('class' => 'input-small'));
echo '</pre>';

echo '<h2>File Upload</h2>';
echo '<pre>';
echo '<input type="File" name="avatar" />';
echo '</pre>';

echo '<h2>HTML Editor</h2>';
$editor = JFactory::getEditor();
echo '<pre>';
echo $editor->display('description', 'This is the description', '100%', '250', '90', '10');
echo '</pre>';

echo '<h2>Select/Boolean</h2>';
echo '<pre>';
echo JHtml::_('select.booleanlist', 'enabled', ' class="input-large" ');
echo '</pre>';
