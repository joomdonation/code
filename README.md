# Những method thường được sử dụng khi làm việc với database trong Joomla

## $db->loadObjectList()
Đây là method được sử dụng nhiểu nhất. Nó trả về một mảng các records trong SELECT command. Sau đó ta có thể hiển thị những records này tới user

```php
$db    = JFactory::getDbo();
$query = $db->getQuery(true);

$query->select('a.*, b.title AS category_title')
	->from('#__code_items AS a')
	->innerJoin('#__code_categories AS b ON a.category_id = b.id')
	->order('a.ordering');
$db->setQuery($query);
$rows = $db->loadObjectList();
```
