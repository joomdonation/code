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
for ($i = 0, $n = count($rows); $i < $n; $i++)
{
	$row = $rows[$i];
	// Do something with this record, for example echo $row->id;
}	
```

## $db->loadObject()
Sử dụng method này khi ta cần lấy về 1 record duy nhất từ SELECT command. Chẳng hạn lấy về dữ liệu của category với ID = 2

```php
$query->clear()
	->select('id, title, description')
	->from('#__code_categories')
	->where('id = 2');
$db->setQuery($query);
$row = $db->loadObject();
// Do something with this record, for example echo $row->id.':'.$row->title;
```
Câu lệnh trên tương đương với 
```php
$query->clear()
	->select('id, title, description')
	->from('#__code_categories')
	->where('id = 1');
$db->setQuery($query);
$rows = $db->loadObjectList();
$row = $rows[0];
// Do something with this record, for example echo $row->id.':'.$row->title;
```

## $db->loadResult()
Sử dụng method này khi SELECT command chỉ trả về một kết quả / field duy nhất. Ví dụ, khi câu truy vấn trả về tổng số bản ghi tử 1 bảng hoạc câu truy vấn lấy về title của 1 category với ID biết trước

```php
# Get total records from a table
$query->clear()
	->select('COUNT(*)')
	->from('#__code_categories');
$db->setQuery($query);
$total = $db->loadResult();
echo 'Total Records in #__code_categories table: ' . $total;

# Get title of category with ID = 1
$query->clear()
	->select('title')
	->from('#__code_categories')
	->where('id = 1');
$db->setQuery($query);
$categoryTitle = $db->loadResult();
echo 'Title of category with ID = 1: ' . $categoryTitle;
```
