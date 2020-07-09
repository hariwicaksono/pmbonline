<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}

		$this->load->library('upload');
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
		$site_name=$this->input->post('site_name', TRUE);
		$site_title=$this->input->post('site_title', TRUE);
		$site_address=$this->input->post('site_address', TRUE);
		$site_phone=$this->input->post('site_phone', TRUE);
		$site_email=$this->input->post('site_email', TRUE);
		$site_website=$this->input->post('site_website', TRUE);
		$site_facebook=$this->input->post('site_facebook', TRUE);
		$site_instagram=$this->input->post('site_instagram', TRUE);
		$site_youtube=$this->input->post('site_youtube', TRUE);

		$config['upload_path'] = './assets/images/';
	    $config['allowed_types'] = 'ico|png|jpg|jpeg';
		$config['encrypt_name'] = FALSE;
		
		$this->upload->initialize($config);
		if(!empty($_FILES['site_logo_header']['name']) && !empty($_FILES['site_favicon']['name']) )
		{    
			if ($this->upload->do_upload('site_logo_header')){
				$img_header = $this->upload->data();
				$site_logo_header=$img_header['file_name'];
			}
			if ($this->upload->do_upload('site_favicon')){
				$img_icon = $this->upload->data();
				$site_favicon=$img_icon['file_name'];
			}
		
			$data=array(
				'site_name'=>$site_name,
				'site_title'=>$site_title,
				'site_address'=>$site_address,
				'site_phone'=>$site_phone,
				'site_email'=>$site_email,
				'site_website'=>$site_website,
				'site_facebook'=>$site_facebook,
				'site_instagram'=>$site_instagram,
				'site_youtube'=>$site_youtube,
				'site_favicon'=>$site_favicon,
				'site_logo_header'=>$site_logo_header
				);
				$result=$this->model_admin->update_pengaturan($id,$data);
		} else {
			$old_favicon=$this->input->post('old_site_favicon', TRUE);
			$old_site_logo=$this->input->post('old_site_logo_header', TRUE);
			$data=array(
				'site_name'=>$site_name,
				'site_title'=>$site_title,
				'site_address'=>$site_address,
				'site_phone'=>$site_phone,
				'site_email'=>$site_email,
				'site_website'=>$site_website,
				'site_facebook'=>$site_facebook,
				'site_instagram'=>$site_instagram,
				'site_youtube'=>$site_youtube,
				'site_favicon'=>$old_favicon,
				'site_logo_header'=>$old_site_logo
				);
				$result=$this->model_admin->update_pengaturan($id,$data);
		}
		
		if ($result) {
			$msg['success'] = true;
			$msg['pesan'] = '<div class="alert alert-success" role="alert"><i class="fa fa-fw fa-check-square-o"></i> Pengaturan berhasil diperbarui</div>';
		}
		echo json_encode($msg);
	}

}

/* End of file Jenjang.php */
/* Location: ./application/controllers/Jenjang.php */