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

$query->select('a.*, b.title AS category_title')
	->from('#__code_items AS a')
	->innerJoin('#__code_categories AS b ON a.category_id = b.id')
	->order('a.ordering');
$db->setQuery($query);
$rows = $db->loadObjectList();

echo '<h2>$db->loadObjectList() method</h2>';
?>
	<table class="adminlist table table-striped">
		<thead>
		<th>ID</th>
		<th>Title</th>
		<th>Description</th>
		<th>Ordering</th>
		<th>Published</th>
		</thead>
		<tbody>
		<?php
		for ($i = 0, $n = count($rows); $i < $n; $i++)
		{
			$row = $rows[$i];
			?>
			<tr>
				<td>
					<?php echo $row->id; ?>
				</td>
				<td>
					<?php echo $row->title; ?>
				</td>
				<td>
					<?php echo $row->description; ?>
				</td>
				<td>
					<?php echo $row->ordering; ?>
				</td>
				<td>
					<?php
					if ($row->published)
					{
						echo 'Yes';
					}
					else
					{
						echo 'No';
					}
					?>
				</td>
			</tr>
			<?php
		}
		?>
		</tbody>
	</table>
<?php
$query->clear()
	->select('id, title, description')
	->from('#__code_categories')
	->where('id = 1');
$db->setQuery($query);
$row = $db->loadObject();
echo '<h2>$db->loadObject() method</h2>';
echo '<pre>';
echo $row->id . ':' . $row->title;
echo '</pre>';

echo '<h2>$db->Result() method</h2>';
$query->clear()
	->select('COUNT(*)')
	->from('#__code_categories');
$db->setQuery($query);
$total = $db->loadResult();
echo '<pre>';
echo 'Total Records in #__code_categories table: ' . $total;
echo '</pre>';

$query->clear()
	->select('title')
	->from('#__code_categories')
	->where('id = 1');
$db->setQuery($query);
$categoryTitle = $db->loadResult();
echo '<pre>';
echo 'Title of category with ID = 1: ' . $categoryTitle;
echo '</pre>';

echo '<h2>$db->loadColumn() method</h2>';
$query->clear()
	->select('id')
	->from('#__code_categories');
$db->setQuery($query);
$categoryIds = $db->loadColumn();
echo '<pre>';
var_dump($categoryIds);
echo '</pre>';

$query->clear()
	->select('title')
	->from('#__code_categories');
$db->setQuery($query);
$categoryTitles = $db->loadColumn();
echo '<pre>';
var_dump($categoryTitles);
echo '</pre>';


$query->clear()
	->select('DISTINCT category_id')
	->from('#__code_items');
$db->setQuery($query);
$categoryIds = $db->loadColumn();
echo '<pre>';
var_dump($categoryIds);
echo '</pre>';
