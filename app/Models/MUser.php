<?php 

namespace App\Models;

use CodeIgniter\Model;

class MUser extends Model
{

	var $column_order = array('id', 'firstname', 'lastname', 'username', 'email', 'id', 'id');
	var $order = array('id' => 'asc');

	function get_datatables(){

		// search
		if($_POST['search']['value']){
			$search = $_POST['search']['value'];
			$search = "firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%'";
		} else {
			$search = "id != ''";
		}

		// order
		if($_POST['order']){
			$result_order = $this->column_order[$_POST['order']['0']['column']];
			$result_dir = $_POST['order']['0']['dir'];
		} else {
			$order = $this->order;
			$result_order = key($order);
			$result_dir = $order[key($order)];
		}


		if($_POST['length']!=-1);
		$db = db_connect();
		$builder = $db->table('users');
		$query = $builder->select('id, firstname, lastname, username, email')
				->where($search)
				->orderBy($result_order, $result_dir)
				->limit($_POST['length'], $_POST['start'])
				->get();
		return $query->getResult();

	}


	function jumlah_semua(){
		$sQuery = "SELECT COUNT(id) as jml FROM users";
		$db = db_connect();
		$query = $db->query($sQuery)->getRow();
		return $query;
	}

	function jumlah_filter(){
		// search
		if($_POST['search']['value']){
			$search = $_POST['search']['value'];
			$search = " AND (firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%')";
		} else {
			$search = "";
		}
		$sQuery = "SELECT COUNT(id) as jml FROM users WHERE Id != '' $search";
		$db = db_connect();
		$query = $db->query($sQuery)->getRow();
		return $query;
	}

}