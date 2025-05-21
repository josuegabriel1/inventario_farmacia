<?php
require_once('../database/Database.php');
require_once('../interface/iStock.php');
$con = new Connection(); //for debugging only
class Stock extends Database implements iStock {
	public function all_stockList()
	{
		/*$sql = "SELECT *
				FROM stock s 
				INNER JOIN item i 
				ON s.item_id = i.item_id
				INNER JOIN item_type it 
				ON i.item_type_id - it.item_type_id
				WHERE s.stock_qty != ?
				ORDER BY s.stock_added ASC";*/
				
			$sql = "SELECT * FROM item, stock,  item_type where item_type.item_type_id=item.item_type_id and item.item_id=stock.item_id and stock.stock_qty!=?";	
		return $this->getRows($sql, [0]);
	}//end all_stockList

	public function get_stockList($stock_id)
	{
		$sql = "SELECT *
				FROM stock s 
				INNER JOIN item i 
				ON s.item_id = i.item_id
				WHERE s.stock_id = ?";
		return $this->getRow($sql, [$stock_id]);
	}//end get_stocklist

	public function del_stockList($stock_id)
	{
		$sql = "DELETE FROM stock 
				WHERE stock_id = ?";
		return $this->deleteRow($sql, [$stock_id]);
	}//end del_stockList

	public function add_stock($item_id, $qty, $xDate, $manu, $purc)
	{
		$sql = "INSERT INTO stock(item_id, stock_qty, stock_expiry, stock_manufactured, stock_purchased)
				VALUES(?,?,?,?,?)";
		// return true;
		return $this->insertRow($sql, [$item_id, $qty, $xDate, $manu, $purc]);
	}//end add_stock

	public function edit_fuck($item_id, $qty, $xDate, $manu, $purc)
	{
//$con = new Connection(); //for debugging only

		$connection = mysqli_connect("localhost", "root", "","inventario_farmacia");
		$query = "UPDATE stock set stock_qty='" . $qty . "', stock_expiry='" . $xDate . "', stock_manufactured='" . $manu . "', stock_purchased='" . $purc ." WHERE item_id ='" . $item_id . "'";
		$result = mysqli_query($connection, $query);

		//mysqli_query($con, "UPDATE stock set stock_qty='" . $qty . "', stock_expiry='" . $xDate . "', stock_manufactured='" . $manu . "', stock_purchased='" . $purc ."WHERE item_id='" . $item_id . "'");
		// $sql = "INSERT INTO stock(item_id, stock_qty, stock_expiry, stock_manufactured, stock_purchased)
		// 		VALUES(?,?,?,?,?)";
		// // return true;
		// return $this->insertRow($sql, [$item_id, $qty, $xDate, $manu, $purc]);
	}//end add_stock

	public function all_stockGroup()
	{
		$sql = "SELECT s.stock_id,i.item_id,i.item_name, i.item_price,SUM(stock_qty) as qty
				FROM stock s 
				INNER JOIN item i
				ON s.item_id = i.item_id
				GROUP BY s.item_id
				ORDER BY i.item_name ASC";
		return $this->getRows($sql);
	}//end all_stockGroup

	public function pacientes_lista()
	{
		$sql = "SELECT *
				FROM cat_clientes
				ORDER BY cat_clientes.nombre ASC";
		return $this->getRows($sql);
	}//end pacientes_lista

	public function mas_vendidos($inicio, $fin)
	{
		//$finicio = date("Y-m-d", strtotime($inicio));
		//$ffin = date("Y-m-d", strtotime($fin));

		$sql = "SELECT item_code, generic_name, type as tipo, SUM(qty) as suma FROM `sales` WHERE date_sold BETWEEN '".$inicio."' AND '".$fin."'  GROUP BY generic_name ORDER BY SUM(qty) desc";
		return $this->getRows($sql);
	}//end pacientes_lista

	public function update_stockQty($stock_id, $stock_qty)
	{
		$sql = "UPDATE stock
				SET stock_qty = ?
				WHERE stock_id = ?";
		return $this->updateRow($sql, [$stock_qty, $stock_id]);
	}//end update_stockQty

	public function get_stockQty($stock_id)
	{
		$sql = "SELECT *
				FROM stock 
				WHERE stock_id = ?";
		return $this->getRow($sql, [$stock_id]);
	}//end get_stockQty

	public function add_fuck($item_id, $qty, $xDate, $manu, $purc)
	{
		$sql = "INSERT INTO stock(item_id, stock_qty, stock_expiry, stock_manufactured, stock_purchased)
				VALUES(?,?,?,?,?)";
		return $this->insertRow($sql, [$item_id, $qty, $xDate, $manu, $purc]);
	}//end add_stock

}//end class Stock
$stock = new Stock();
/* End of file Stock.php */
/* Location: .//D/xampp/htdocs/regis/class/Stock.php */