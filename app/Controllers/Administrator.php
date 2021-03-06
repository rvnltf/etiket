<?php

namespace App\Controllers;

use App\Models\MUser;
use App\Models\MBus;

class Administrator extends BaseController
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('administrator/index', $data);
    }
    
    public function user_list()
    {
        $data['title'] = 'User list';
        return view('administrator/user_list', $data);
    }
    
    public function bus_list()
    {
        $data['title'] = 'Bus List';
        return view('administrator/bus_list', $data);
    }

    public function data_user()
    {
        $model = new MUser();
        $user_list = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua(); 
        $jumlah_filter = $model->jumlah_filter();
        
        
        $data = array();
        $no = $_POST['start'];
        foreach ($user_list as $user_value) {
            $no++;
            
            $db = db_connect();
            $builder = $db->table('auth_groups_users');
            $query = $builder->select('user_id, group_id, auth_groups.name as akses')
                    ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
                    ->where("user_id = '$user_value->id'")
                    ->get();
            $akses_result = $query->getResult();
            $akses = '<ul class="list-group">';
            $button = '
            <div class="btn-group" role="group" aria-label="Action Button">
                <button type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i></button>';
            foreach ($akses_result as $akses_value) {
                $akses .= "<li class=\"list-group-item\">$akses_value->akses</li>";
                if($akses_value->akses != 'administrator'){
                    $button .= '<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-eraser"></i></button>';
                }
            }
            $akses .= '</ul>';
            $button .= '</div>';
            
            $row = array();
            
            $row[] = $no;
            $row[] = $user_value->firstname?$user_value->firstname:'-';
            $row[] = $user_value->lastname?$user_value->lastname:'-';
            $row[] = $user_value->username;
            $row[] = $user_value->email;
            $row[] = $akses;
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
    
    public function data_bus()
    {
        $model = new MBus();
        $bust_list = $model->get_datatables();
        $jumlah_semua = $model->jumlah_semua(); 
        $jumlah_filter = $model->jumlah_filter();
        
        
        $data = array();
        $no = $_POST['start'];
        foreach ($bust_list as $bus_value) {
            $no++;
            
            $row = array();
            
            $button = '<div class="btn-group" role="group" aria-label="Action Button">
                            <button type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-eraser"></i></button>
                        </div>';
            $row[] = $no;
            $row[] = $bus_value->nama_bus;
            $row[] = $bus_value->hari.' - '. date('H:i', strtotime($bus_value->waktu_berangkat));
            $row[] = $bus_value->asal;
            $row[] = $bus_value->tujuan;
            $row[] = $bus_value->harga;
            $row[] = $bus_value->isi_seat;
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