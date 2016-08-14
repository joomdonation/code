# Insert a record into a database tabe

1. Read documentation at Joomla documentation site https://docs.joomla.org/Inserting,_Updating_and_Removing_data_using_JDatabase#Inserting_a_Record

2. See and understand the code

```php
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
```
3. Check the data stored in #__code_categories table after running the code
4. Write similar code to insert data into #__code_items table
