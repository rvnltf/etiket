<?php 

namespace App\Models;

use CodeIgniter\Model;

class MBus extends Model
{

	var $column_order = array('id', 'nama_bus', 'jadwal_bus.id_hari', 'asal', 'tujuan', 'harga', 'isi_seat', 'id');
	var $order = array('id' => 'asc');

	function get_datatables(){

		// search
		if($_POST['search']['value']){
			$search = $_POST['search']['value'];
			$search = "nama_bus LIKE '%$search%' OR hari LIKE '%$search%' OR asal LIKE '%$search%' OR tujuan LIKE '%$search%'";
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
		$builder = $db->table('jadwal_bus');
		$query = $builder->select('id, nama_bus, hari, waktu_berangkat, asal, tujuan, harga, isi_seat')
				->join('hari', 'hari.id_hari = jadwal_bus.id_hari')
				->where($search)
				->orderBy($result_order, $result_dir)
				->limit($_POST['length'], $_POST['start'])
				->get();
		return $query->getResult();

	}


	function jumlah_semua(){
		$sQuery = "SELECT COUNT(id) as jml FROM jadwal_bus";
		$db = db_connect();
		$query = $db->query($sQuery)->getRow();
		return $query;
	}

	function jumlah_filter(){
		// search
		if($_POST['search']['value']){
			$search = $_POST['search']['value'];
			$search = " AND (nama_bus LIKE '%$search%' OR hari LIKE '%$search%' OR asal LIKE '%$search%' OR tujuan LIKE '%$search%')";
		} else {
			$search = "";
		}
		$sQuery = "SELECT COUNT(id) as jml FROM jadwal_bus JOIN hari ON hari.id_hari = jadwal_bus.id_hari WHERE id != '' $search";
		$db = db_connect();
		$query = $db->query($sQuery)->getRow();
		return $query;
	}

}