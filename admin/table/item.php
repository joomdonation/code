<?php
/**
 * @version        1.0
 * @package        Joomla
 * @subpackage     Training
 * @author         Tuan Pham Ngoc
 * @copyright      Copyright (C) 2016 Ossolution Team
 * @license        GNU/GPL, see LICENSE.php
 */
class CodeTableItem extends JTable
{
	/**
	 * Constructor
	 *
	 * @param  JDatabaseDriver $db JDatabase A database connector object
	 *
	 */
	public function __construct(&$db)
	{
		parent::__construct('#__code_items', 'id', $db);
	}
}	