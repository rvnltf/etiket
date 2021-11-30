<?php 

namespace App\Models;

use CodeIgniter\Model;

class MTiket extends Model
{

	var $column_order = array('penjualan_tiket.id', 'jadwal_bus.asal', 'jadwal_bus.tujuan', 'tanggal_berangkat', 'harga', 'seat.seat', 'waktu_berangkat', 'status', 'id');
	var $order = array('penjualan_tiket.id' => 'asc');

	function get_datatables(){

		// search
		if($_POST['search']['value']){
			$search = $_POST['search']['value'];
			$search = "asal LIKE '%$search%' OR tujuan LIKE '%$search%' OR seat.seat LIKE '%$search%'";
		} else {
			$search = "penjualan_tiket.id != ''";
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
		$builder = $db->table('penjualan_tiket');
		$query = $builder->select('penjualan_tiket.id, asal, tujuan, tanggal_berangkat, harga, seat.seat, waktu_berangkat, status')
				->join('jadwal_bus', 'jadwal_bus.id = penjualan_tiket.id_bus')
				->join('seat', 'seat.id_seat = penjualan_tiket.id_seat')
				->where($search)
				->orderBy($result_order, $result_dir)
				->limit($_POST['length'], $_POST['start'])
				->get();
		return $query->getResult();

	}


	function jumlah_semua(){
		$sQuery = "SELECT COUNT(id) as jml FROM penjualan_tiket";
		$db = db_connect();
		$query = $db->query($sQuery)->getRow();
		return $query;
	}

	function jumlah_filter(){
		// search
		if($_POST['search']['value']){
			$search = $_POST['search']['value'];
			$search = " AND (asal LIKE '%$search%' OR tujuan LIKE '%$search%' OR seat.seat LIKE '%$search%')";
		} else {
			$search = "";
		}
		$sQuery = "SELECT COUNT(penjualan_tiket.id) as jml FROM penjualan_tiket JOIN jadwal_bus ON jadwal_bus.id = penjualan_tiket.id_bus JOIN seat ON seat.id_seat = penjualan_tiket.id_seat WHERE penjualan_tiket.id != '' $search";
		$db = db_connect();
		$query = $db->query($sQuery)->getRow();
		return $query;
	}

}