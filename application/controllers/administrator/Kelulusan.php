<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelulusan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$site_info = $this->db->get('pengaturan', 1)->row();
		$data['site_name'] = $site_info->site_name;
		$data['site_title'] = $site_info->site_title;
		$data['site_logo'] = $site_info->site_logo;
		$data['site_favicon'] = $site_info->site_favicon;
		$d['prodi']=$this->Model_app->get_prodi();
		$data['content']=$this->load->view('admin/kelulusan/view', $d, TRUE);
		$this->load->view('admin/home', $data);
	}

	public function prodi($kode_prodi)
	{
		$site_info = $this->db->get('pengaturan', 1)->row();
		$data['site_name'] = $site_info->site_name;
		$data['site_title'] = $site_info->site_title;
		$data['site_logo'] = $site_info->site_logo;
		$data['site_favicon'] = $site_info->site_favicon;
		$thak=$this->Model_app->kode_thak_aktif();
		$d['prodi']=$this->Model_app->ambil_prodi($kode_prodi);
		$d['siswa']=$this->Model_app->get_siswa_prodi($kode_prodi,$thak);
		$data['content']=$this->load->view('admin/kelulusan/prodi', $d, TRUE);
		$this->load->view('admin/home', $data);
	}

	// public function do_verifikasi($kode)
	// {
	// 	$thak=$this->Model_app->kode_thak_aktif();
	// 	$limit=$this->Model_app->get_limit($kode);
	// 	$filter=array(
	// 		'prodi'=>$kode,
	// 		'thak'=>$thak
	// 		);
	// 	$set_lulus=$this->Model_app->set_lulus($filter,$limit);
	// 	if ($set_lulus) {
	// 		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible">
	// 								                <h4><i class="icon fa fa-check"></i> Berhasil Verifikasi!</h4>
	// 								              </div>');
	// 	}else{
	// 		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible">
	// 								                <h4><i class="icon fa fa-check"></i> Gagal Verifikasi!</h4>
	// 								              </div>');
	// 	}
	// 	redirect('administrator/pengumuman/prodi/'.$kode);
	// }
 
	public function report_maba($kode)
	{
		$this->load->library('pdfgenerator');
		$kode_thak=$this->Model_app->kode_thak_aktif();
		$filter=array(
				'thak'=>$kode_thak,
				'prodi'=>$kode,
				'nilai_tes !='=>0
			);
		$limit=$this->Model_app->get_limit($kode);
		$d['thak_aktif']=$this->Model_admin->ambil_thak_aktif();
		$d['maba']=$this->Model_app->report($filter,$limit);
       //print_r($d['maba']);
        $d['prodi']=$this->Model_admin->ambil_prodi($kode);
        //$d['jadwal']=$this->Model_admin->get_all_tes($kode_thak);

        $pdfFilePath ="laporan-".$kode.time()."-download.pdf";
		$paper = 'A4';
        $orientation = "portrait";

        //$header = '';

		$footer = '<table width="100%" style="border-top: 2px solid #000000; vertical-align: bottom; font-family: serif; font-size: 8pt;color: #000000; font-weight: bold; font-style: italic;"><tr>

    <td width="33%"><span style="font-weight: bold; font-style: italic;">'.base_url().'</span></td>

    <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>

    <td width="33%" style="text-align: right; ">{DATE j-m-Y}</td>

    </tr></table>';

    //$mpdf->SetHTMLHeader($header);
	//$mpdf->SetHTMLFooter($footer);


        //$mpdf->AddPage('L', // L - landscape, P - portrait
            //'', '', '', '',
           // 20, // margin_left
           // 20, // margin right
           // 20, // margin top
           // 20, // margin bottom
          ///  10, // margin header
           // 12); // margin footer);

        $html=$this->load->view('admin/kelulusan/report',$d , true);
		$this->pdfgenerator->generate($html, $pdfFilePath, $paper, $orientation);

	}

}

/* End of file Pengumuman.php */
/* Location: ./application/controllers/Pengumuman.php */