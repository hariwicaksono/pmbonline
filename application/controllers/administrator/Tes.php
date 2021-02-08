<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}
	}

	public function index()
	{
		$site_info = $this->db->get('pengaturan', 1)->row();
		$data['site_name'] = $site_info->site_name;
		$data['site_title'] = $site_info->site_title;
		$data['site_logo'] = $site_info->site_logo;
		$data['site_favicon'] = $site_info->site_favicon;
		$data['content']=$this->load->view('admin/tes/view', '', TRUE);
		$this->load->view('admin/home', $data);
	}

	public function add_tes()
	{
		$kode_thak=$this->Model_app->kode_thak_aktif();
		$tes=strtoupper($this->input->post('tes', TRUE));
		$tgl=$this->input->post('tgl_tes', TRUE);
		$mulai=$this->input->post('mulai', TRUE);
		$sampai=$this->input->post('sampai', TRUE);
		$ket=$this->input->post('ket', TRUE);
		$data=array(
			'thak'=>$kode_thak,
			'nama_tes'=>$tes,
			'mulai'=>$mulai,
			'sampai'=>$sampai,
			'tgl_tes'=>$tgl,
			'ket'=>$ket
			);
		$table='agenda_tes';
		$result=$this->Model_admin->auto_insert($table,$data);
		if ($result) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Jadwal berhasil di tambahkan</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function show_tes()
	{
		$kode_thak=$this->Model_app->kode_thak_aktif();
		$q=$this->Model_admin->get_all_tes($kode_thak);
		$html='';
		$no=1;
		if ($q) {
			foreach ($q as $data) {
				$html.='<tr>
						<td>'.$no.'</td>
						<td>'.$data->nama_tes.'</td>
						<td>'.$data->tgl_tes.'</td>
						<td>'.$data->mulai.'</td>
						<td>'.$data->sampai.'</td>
						<td>
						<a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick="edit('.$data->id.')"><i class="fa fa-edit"></i> Edit</a>
						<a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="hapus('.$data->id.')"><i class="fa fa-trash"></i> Hapus</a> 
						</td>
				</tr>';
				$no++;
			}
		}else{
			$html.='<tr><td colspan="6">Tidak Ada Data Jadwal</td></tr>';
		}
		echo $html;
	}

	public function get_tes($id)
	{
		$res=$this->Model_admin->ambil_tes($id);
		if ($res) {
			echo json_encode($res);
		}
	}

	public function update_tes()
	{
		$id=$this->input->post('key', TRUE);
		$tes=$this->input->post('tes', TRUE);
		$tgl=$this->input->post('tgl_tes', TRUE);
		$mulai=$this->input->post('mulai', TRUE);
		$sampai=$this->input->post('sampai', TRUE);
		$ket=$this->input->post('ket', TRUE);
		$data=array(
			'nama_tes'=>$tes,
			'mulai'=>$mulai,
			'sampai'=>$sampai,
			'tgl_tes'=>$tgl,
			'ket'=>$ket
			);
		$query=$this->Model_admin->update_tes($id,$data);
		if ($query) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Jadwal berhasil  di Update</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function delete_tes()
	{
		$id=$this->input->post('id', TRUE);
		$q=$this->Model_admin->hapus_tes($id);
		if ($q) {
			$msg['pesan']='<div class="alert alert-success" role="alert">Agenda Jadwal berhasil  di Di Hapus</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

}

/* End of file Tes.php */
/* Location: ./application/controllers/Tes.php */