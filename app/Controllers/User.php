<?php

namespace App\Controllers;

use App\Models\MTiket;

class User extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('user/index', $data);
    }

    public function tiket_list()
    {
        $data['title'] = 'Tiket List';
        return view('user/tiket_list', $data);
    }
    
    public function data_tiket()
    {
        $model = new MTiket();
        $tiket_list = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua(); 
        $jumlah_filter = $model->jumlah_filter();
        
        
        $data = array();
        $no = $_POST['start'];
        foreach ($tiket_list as $tiket_value) {
            $no++;
            
            $row = array();
            
            $button = '<div class="btn-group" role="group" aria-label="Action Button">
                            <button type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-eraser"></i></button>
                        </div>';
            $row[] = $no;
            $row[] = $tiket_value->asal;
            $row[] = $tiket_value->tujuan;
            $row[] = date('d-m-Y');
            $row[] = $tiket_value->harga;
            $row[] = $tiket_value->seat;
            $row[] = date('H:i');
            $row[] = $tiket_value->status;
            $row[] = $button;
            

            $data[] = $row;
        }
        
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $jumlah_semua->jml,
			"recordsFiltered" => $jumlah_filter->jml,
			"data" => $data
		);
		echo json_encode($output);
    }
}