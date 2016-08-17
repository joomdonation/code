# Use JTable

This branch show you how to use JTable to perform various tasks like loading a record from database, update a record, insert new record and delete a record

## Init a JTable object
```php
$category = JTable::getInstance('category', 'CodeTable');
$item = JTable::getInstance('item', 'CodeTable');
```

## Loading a record from database
```php
$row = JTable::getInstance('category', 'CodeTable');
$row->load(1);
echo '<pre>';
echo $row->id . ':' . $row->title . ':' . $row->description;
echo '</pre>';
```

## Update data of a record
```php
$row->title       = 'New Title';
$row->description = 'New description';
$row->store();
```

## Insert new record
```php
$row              = JTable::getInstance('item', 'CodeTable');
$row->title       = 'New Record Title';
$row->description = 'New Record Description';
$row->store();
```

## Insert new record use bind() method with data stored in an array
```php
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
```

## Delete a record use delete() method
```php
$row = JTable::getInstance('category', 'CodeTable');
$row->load(1);
$row->delete();
```
