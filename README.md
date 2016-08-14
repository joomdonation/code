# Insert a record into a database tabe

1. Read documentation at Joomla documentation site https://docs.joomla.org/Inserting,_Updating_and_Removing_data_using_JDatabase#Inserting_a_Record

2. See and understand the code

```php
$db    = JFactory::getDbo();
$query = $db->getQuery(true);

// Remove the inserted data
$db->truncateTable('#__code_categories');
$db->truncateTable('#__code_items');

## Insert a record into database
$columns = array(
	'title',
	'alias',
	'description',
	'access',
	'ordering',
	'published',
);
$values  = array(
	$db->quote('Components'),
	$db->quote('components'),
	$db->quote('Joomla Components'),
	1,
	1,
	1,
);

$query->clear()
	->insert('#__code_categories')
	->columns($db->quoteName($columns))
	->values(implode(',', $values));

$db->setQuery($query);
$db->execute();
echo '<pre>' . $db->getQuery() . '</pre>';

// Insert a record into database using the values stored in variables
$name        = 'Modules';
$alias       = 'modules';
$description = 'Joomla Modules';
$access      = 1;
$ordering    = 2;
$published   = 1;

$query->clear()
	->insert('#__code_categories')
	->columns($db->quoteName($columns))
	->values(
		implode(',',
			array(
				$db->quote($name),
				$db->quote($alias),
				$db->quote($description),
				$access,
				$ordering,
				$published
			)
		)
	);
$db->setQuery($query);
$db->execute();
echo '<pre>' . $db->getQuery() . '</pre>';

$name        = 'Plugins';
$alias       = 'plugins';
$description = 'Joomla Plugins';
$access      = 1;
$ordering    = 3;
$published   = 1;

$query->clear()
	->insert('#__code_categories')
	->columns($db->quoteName(array('title', 'alias', 'description', 'access', 'ordering', 'published')))
	->values(
		implode(',',
			array(
				$db->quote($name),
				$db->quote($alias),
				$db->quote($description),
				$access,
				$ordering,
				$published
			)
		)
	);
$db->setQuery($query);
$db->execute();

echo '<pre>' . $db->getQuery() . '</pre>';
```
3. Check the data stored in #__code_categories table after running the code
4. Write similar code to insert data into #__code_items table
