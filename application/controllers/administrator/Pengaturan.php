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
		$data['site_id'] = $site_info->site_id;
		$data['site_name'] = $site_info->site_name;
		$data['site_title'] = $site_info->site_title;
		$data['site_address'] = $site_info->site_address;
		$data['site_alurpmb'] = $site_info->site_alurpmb;
		$data['site_biaya'] = $site_info->site_biaya;
		$data['site_favicon'] = $site_info->site_favicon;
		$data['site_logo'] = $site_info->site_logo;
		$data['site_facebook'] = $site_info->site_facebook;
		$data['site_instagram'] = $site_info->site_instagram;
		$data['site_youtube'] = $site_info->site_youtube;
		$data['site_phone'] = $site_info->site_phone;
		$data['site_email'] = $site_info->site_email;
		$data['site_website'] = $site_info->site_website;
		$data['site_theme'] = $site_info->site_theme;
		$data['site_google_maps'] = $site_info->site_google_maps;
		$data['content']=$this->load->view('admin/pengaturan/view',$data, TRUE);
		$this->load->view('admin/home', $data);
	}

	function update(){
		$id=$this->input->post('site_id', TRUE);
		$site_name=$this->input->post('site_name', TRUE);
		$site_title=$this->input->post('site_title', TRUE);
		$site_address=$this->input->post('site_address', TRUE);
		$site_biaya=$this->input->post('site_biaya', TRUE);
		$site_phone=$this->input->post('site_phone', TRUE);
		$site_email=$this->input->post('site_email', TRUE);
		$site_website=$this->input->post('site_website', TRUE);
		$site_facebook=$this->input->post('site_facebook', TRUE);
		$site_instagram=$this->input->post('site_instagram', TRUE);
		$site_youtube=$this->input->post('site_youtube', TRUE);
		$site_theme=$this->input->post('site_theme', TRUE);
		$site_google_maps=$this->input->post('site_google_maps');

		$data=array(
			'site_name'=>$site_name,
			'site_title'=>$site_title,
			'site_address'=>$site_address,
			'site_biaya'=>$site_biaya,
			'site_phone'=>$site_phone,
			'site_email'=>$site_email,
			'site_website'=>$site_website,
			'site_facebook'=>$site_facebook,
			'site_instagram'=>$site_instagram,
			'site_youtube'=>$site_youtube,
			'site_theme'=>$site_theme,
			'site_google_maps'=>$site_google_maps
			);
	
		$config['upload_path'] = './assets/images/';
	    $config['allowed_types'] = 'ico|gif|jpg|png|jpeg';
	    $config['encrypt_name'] = FALSE;

	    $this->upload->initialize($config);
	   
		if ($this->upload->do_upload('site_favicon')){
			$icon = $this->upload->data();
			$data['site_favicon']=$icon['file_name'];
		}
		if ($this->upload->do_upload('site_logo')){
			$logo = $this->upload->data();
			$data['site_logo']=$logo['file_name'];
		}

		if ($this->upload->do_upload('site_alurpmb')){
			$logo = $this->upload->data();
			$data['site_alurpmb']=$logo['file_name'];
		}

		$result=$this->Model_admin->update_pengaturan($id,$data);
		$this->session->set_flashdata('msg','success');
		redirect('administrator/pengaturan');  
	}

	public function slideshow()
	{
		$site_info = $this->db->get('pengaturan', 1)->row();
		$data['site_name'] = $site_info->site_name;
		$data['site_title'] = $site_info->site_title;
		$data['site_favicon'] = $site_info->site_favicon;
		$data['site_logo'] = $site_info->site_logo;
		$slideshow= $this->db->get('slideshow', 1)->row();
		$data['id'] = $slideshow->id;
        $data['slide_1'] = $slideshow->slide_1;
        $data['slide_1_headline'] = $slideshow->slide_1_headline;
		$data['slide_1_caption'] = $slideshow->slide_1_caption;
		$data['slide_2'] = $slideshow->slide_2;
        $data['slide_2_headline'] = $slideshow->slide_2_headline;
		$data['slide_2_caption'] = $slideshow->slide_2_caption;
		$data['slide_3'] = $slideshow->slide_3;
        $data['slide_3_headline'] = $slideshow->slide_3_headline;
        $data['slide_3_caption'] = $slideshow->slide_3_caption;
		$data['content']=$this->load->view('admin/pengaturan/slideshow',$data, TRUE);
		$this->load->view('admin/home', $data);
	}

	function update_slideshow(){
		$id=$this->input->post('id', TRUE);
		$slide_1_headline=$this->input->post('slide_1_headline', TRUE);
		$slide_1_caption=$this->input->post('slide_1_caption', TRUE);
		$slide_2_headline=$this->input->post('slide_2_headline', TRUE);
		$slide_2_caption=$this->input->post('slide_2_caption', TRUE);
		$slide_3_headline=$this->input->post('slide_3_headline', TRUE);
		$slide_3_caption=$this->input->post('slide_3_caption', TRUE);

		$data=array(
			'slide_1_headline'=>$slide_1_headline,
			'slide_1_caption'=>$slide_1_caption,
			'slide_2_headline'=>$slide_2_headline,
			'slide_2_caption'=>$slide_2_caption,
			'slide_3_headline'=>$slide_3_headline,
			'slide_3_caption'=>$slide_3_caption
			);
	
		$config['upload_path'] = './assets/images/';
	    $config['allowed_types'] = 'jpg|png|jpeg';
	    $config['encrypt_name'] = FALSE;

	    $this->upload->initialize($config);
	   
		if ($this->upload->do_upload('slide_1')){
			$slide1 = $this->upload->data();
			$data['slide_1']=$slide1['file_name'];
		}
		if ($this->upload->do_upload('slide_2')){
			$slide2 = $this->upload->data();
			$data['slide_2']=$slide2['file_name'];
		}
		if ($this->upload->do_upload('slide_3')){
			$slide3 = $this->upload->data();
			$data['slide_3']=$slide3['file_name'];
		}

		$result=$this->Model_admin->update_slideshow($id,$data);
		$this->session->set_flashdata('msg','success');
		redirect('administrator/pengaturan/slideshow');  
	}


}

/* End of file Jenjang.php */
/* Location: ./application/controllers/Jenjang.php */