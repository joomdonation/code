# Update records in a database table

1. Read documentation at Joomla documentation site https://docs.joomla.org/Inserting,_Updating_and_Removing_data_using_JDatabase#Inserting_a_Record

2. See and understand the code

```php
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
echo '<pre>' . $db->getQuery() . '</pre>';
```
3. Check the data stored in #__code_categories table after running the code
4. Write similar code to insert data into #__code_items table
