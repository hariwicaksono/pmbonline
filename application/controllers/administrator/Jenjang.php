<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenjang extends CI_Controller {

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
		$data['content']=$this->load->view('admin/jenjang/view','', TRUE);
		$this->load->view('admin/home', $data);
	}

	public function add_jenjang()
	{
		$jenjang=strtoupper($this->input->post('jenjang', TRUE));
		 $t = date("Y-m-d H:i:s");
		$data=array(
			'jenjang'=>$jenjang,
			'created_at'=>$t
			);
		$table='jenjang';
		$result=$this->Model_admin->auto_insert($table,$data);
		if ($result) {
			$msg['pesan']='<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Jenjang berhasil  di tambahkan !</div>';
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function show_jenjang()
	{
		$q=$this->Model_admin->data_jenjang();
		if ($q) {
			echo json_encode($q);
		}else{
			$msg['pesan'] = '<tr><td colspan="3">Tidak Ada Data</td></tr>';
			echo json_encode($msg);
		}
	}

	public function get_jenjang($id)
	{
		$res=$this->Model_admin->ambil_jenjang($id);
		if ($res) {
			echo json_encode($res);
		}else{
			echo json_encode("Gagal");
		}
	}

	public function edit_jenjang()
	{
		$id=$this->input->post('key', TRUE);
		$jenjang=strtoupper($this->input->post('jenjang', TRUE));
		$data=array(
			'jenjang'=>$jenjang
			);
		$result=$this->Model_admin->update_jenjang($id,$data);
		if ($result) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Jenjang berhasil  di Update !</div>';
		}
		echo json_encode($msg);
	}

	public function delete_jenjang()
	{
		$id=$this->input->post('id', TRUE);
		$q=$this->Model_admin->hapus_jenjang($id);
		if ($q) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Jenjang berhasil  di Hapus !</div>';
		}
		echo json_encode($msg);
	}

}

/* End of file Jenjang.php */
/* Location: ./application/controllers/Jenjang.php */