# Selecting data using JDatabase

1. Read documentation at Joomla documentation site https://docs.joomla.org/Selecting_data_using_JDatabase

2. See and understand the code

```php
$db    = JFactory::getDbo();
$query = $db->getQuery(true);

echo "<h2>SELECT ALL FIELDS FROM A TABLE</h2>\r\n";
$query->select('*')
	->from('#__code_categories');
$db->setQuery($query);
$rows = $db->loadObjectList();
echo '<pre>' . $db->getQuery() . '</pre>';
foreach ($rows as $row)
{
	echo $row->id . ':' . $row->title . ':' . $row->description . "\r\n";
}

echo "<h2>SELECT SOME FIELDS FROM A TABLE, USING ORDER BY TITLE</h2>\r\n";
$query->clear()
	->select('id, title')
	->from('#__code_categories')
	->order('title');
$db->setQuery($query);
$rows = $db->loadObjectList();
echo '<pre>' . $db->getQuery() . '</pre>';
foreach ($rows as $row)
{
	echo $row->id . ':' . $row->title . "\r\n";
}

echo "<h2>SELECT SOME FIELDS FROM A TABLE, USING ORDER BY ID DESC</h2>\r\n";
$query->clear()
	->select('id, title')
	->from('#__code_categories')
	->order('id DESC');
$db->setQuery($query);
$rows = $db->loadObjectList();
echo '<pre>' . $db->getQuery() . '</pre>';
foreach ($rows as $row)
{
	echo $row->id . ':' . $row->title . "\r\n";
}

echo "<h2>SELECT RECORD FROM A TABLE, WHERE ID = 1</h2>\r\n";
$query->clear()
	->select('id, title')
	->from('#__code_categories')
	->where('id = 1');
$db->setQuery($query);
$rows = $db->loadObjectList();
echo '<pre>' . $db->getQuery() . '</pre>';
foreach ($rows as $row)
{
	echo $row->id . ':' . $row->title . "\r\n";
}

echo "<h2>SELECT RECORD FROM A TABLE, WHERE NAME = Components</h2>\r\n";
$query->clear()
	->select('id, title')
	->from('#__code_categories')
	->where('title = ' . $db->quote('Components'));
$db->setQuery($query);
$rows = $db->loadObjectList();
echo '<pre>' . $db->getQuery() . '</pre>';
foreach ($rows as $row)
{
	echo $row->id . ':' . $row->title . "\r\n";
}


echo "<h2>JOIN 2 TABLES, INNER JOIN</h2>\r\n";
$query->clear()
	->select('a.id, a.title, b.title AS category_title')
	->from('#__code_items AS a')
	->innerJoin('#__code_categories AS b ON a.category_id = b.id');
$db->setQuery($query);
$rows = $db->loadObjectList();
echo '<pre>' . $db->getQuery() . '</pre>';
foreach ($rows as $row)
{
	echo $row->id . ':' . $row->title . "\r\n";
}

echo "<h2>JOIN 2 TABLES, LEFT JOIN</h2>\r\n";
$query->clear()
	->select('a.id, a.title, b.title AS category_title')
	->from('#__code_items AS a')
	->leftJoin('#__code_categories AS b ON a.category_id = b.id');
$db->setQuery($query);
$rows = $db->loadObjectList();
echo '<pre>' . $db->getQuery() . '</pre>';
foreach ($rows as $row)
{
	echo $row->id . ':' . $row->title . "\r\n";
}
```
