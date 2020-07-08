<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

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
		$data['site_logo'] = $site_info->site_logo_header;
		$data['site_favicon'] = $site_info->site_favicon;
		$data['content']=$this->load->view('admin/pengaturan/view','', TRUE);
		$this->load->view('admin/home', $data);
	}

	public function show_pengaturan()
	{
		$q=$this->model_admin->data_pengaturan();
		if ($q) {
			echo json_encode($q);
		}else{
			$msg['pesan'] = '<tr><td colspan="3">Tidak Ada Data</td></tr>';
			echo json_encode($msg);
		}
	}

	public function get_pengaturan($id)
	{
		$res=$this->model_admin->ambil_pengaturan($id);
		if ($res) {
			echo json_encode($res);
		}else{
			echo json_encode("Gagal");
		}
	}

	public function edit_pengaturan()
	{
		$id=$this->input->post('key', TRUE);
		$site_name=strtoupper($this->input->post('site_name', TRUE));
		$data=array(
			'site_name'=>$site_name
			);
		$result=$this->model_admin->update_pengaturan($id,$data);
		if ($result) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Pengaturan berhasil diperbarui</div>';
		}
		echo json_encode($msg);
	}

}

/* End of file Jenjang.php */
/* Location: ./application/controllers/Jenjang.php */