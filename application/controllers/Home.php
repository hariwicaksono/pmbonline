<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $data['site_phone'] = $site_info->site_phone;
        $data['site_email'] = $site_info->site_email;
        $data['site_website'] = $site_info->site_website;
        $data['site_facebook'] = $site_info->site_facebook;
        $data['site_youtube'] = $site_info->site_youtube;
        $data['site_instagram'] = $site_info->site_instagram;
        $data['site_theme'] = $site_info->site_theme;
        $kode_thak=$this->model_app->kode_thak_aktif();
        $data['informasi']=$this->model_app->get_all_info($kode_thak);
        $data['thak']=$this->model_admin->ambil_thak_aktif();
        $data['prodi']=$this->model_app->get_prodi();
        $data['prodi1']=$this->model_app->get_prodi();
        $data['cek_reg']=$this->model_cek->cek_reg();
        $data['jadwal_tes']=$this->model_admin->get_all_tes($kode_thak);
        $data['header'] = $this->load->view('header',$data, true);
        $data['footer'] = $this->load->view('footer',$data, true);
        $data['navbar'] = $this->load->view('navbar',$data, true);
        $slideshow= $this->db->get('slideshow', 1)->row();
        $data['slide_1'] = $slideshow->slide_1;
        $data['slide_2'] = $slideshow->slide_2;
        $data['slide_3'] = $slideshow->slide_3;
        $data['slide_1_headline'] = $slideshow->slide_1_headline;
        $data['slide_1_caption'] = $slideshow->slide_1_caption;
        $data['slide_2_headline'] = $slideshow->slide_2_headline;
        $data['slide_2_caption'] = $slideshow->slide_2_caption;
        $data['slide_3_headline'] = $slideshow->slide_3_headline;
        $data['slide_3_caption'] = $slideshow->slide_3_caption;
	$this->load->view('home',$data);
	}

	public function daftar()
	{
                $kode_thak=$this->model_app->kode_thak_aktif();
                $nisn=$this->input->post('nisn', TRUE);
                $cek=$this->cek_nisn($nisn);
                if ($cek) {
                        $config['upload_path']          = './photo/';
                        $config['allowed_types']        = 'jpg|png';
                        $config['max_size']             = 10000;
                        $config['max_width']            = 2000;
                        $config['max_height']           = 2000;

                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('userfile'))
                        {
                                $this->session->set_flashdata('error_daftar', '<div class="alert alert-danger">
                                <h3><i class="icon fa fa-warning"></i> Pilih Foto sesuai yang diperbolehkan</h3>
                                        </div>');
                                redirect('home');
                        }
                        else
                        {
                                $poto = $this->upload->data();
                              
                                $nisn=strtoupper($this->input->post('nisn', TRUE));
                                $nama=strtoupper($this->input->post('nama', TRUE));
                                $agama=strtoupper($this->input->post('agama', TRUE));
                                $jkel=$this->input->post('jenisKelamin', TRUE);
                                $tgl=$this->input->post('tgl_lahir', TRUE);
                                $alamat=strtoupper($this->input->post('alamat', TRUE));
                                $hp=$this->input->post('hp', TRUE);
                                $email=$this->input->post('email', TRUE);
                                $sekolah=strtoupper($this->input->post('sekolah', TRUE));
                                $kota=strtoupper($this->input->post('kota_sekolah', TRUE));
                                $nilai=$this->input->post('nilai_un', TRUE);
                                $prodi=$this->input->post('prodi', TRUE);
                                $poto=$poto['file_name'];
                                $t = date("Y-m-d H:i:s");

                                $data=array(
                                    'thak'=>$kode_thak,
                                    'nama_pendaftar'=>$nama,
                                    'nisn'=>$nisn,
                                    'tgl_lahir'=>$tgl,
                                    'jkel'=>$jkel,
                                    'agama'=>$agama,
                                    'sekolah'=>$sekolah,
                                    'kota'=>$kota,
                                    'alamat'=>$alamat,
                                    'no_hp'=>$hp,
                                    'email'=>$email,
                                    'prodi'=>$prodi,
                                    'nilai_un'=>$nilai,
                                    'daftar_tgl'=>$t,
                                    'foto'=>$poto
                                    );
                                $result=$this->model_app->register_siswa($data);
                                if ($result) {
                                       $this->session->set_flashdata('error_daftar', '<div class="alert alert-success  wow zoomInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                                            <h3><i class="icon fa fa-check-square-o"></i> Selamat!, Pendaftaran Berhasil.
                                            <br>Silakan Cetak Bukti Pendaftaran <a href="'.base_url('home/cetak_bukti/'.$nisn.'').'" target="_blank">Disini</a></h3>
                                             </div>');
                                }else{
                                        $this->session->set_flashdata('error_daftar', '<div class="alert alert-danger wow zoomInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                                            <h3><i class="icon fa fa-close "></i> Masalah Pendaftaran!
                                           </h3>
                                             </div>');
                                }
                                redirect('home');
                        }
                }else{
                        $this->session->set_flashdata('error_daftar', '<div class="alert alert-danger  wow zoomInUp" data-wow-delay="300ms" data-wow-duration="1000ms">
                        <h3><i class="icon fa fa-warning"></i> Maaf, NISN Sudah Terdaftar, Tidak Bisa Mendaftar ulang.
                        <br>Apakah Anda Lupa Mencetak Bukti Pendaftaran? <br><a href="'.base_url('home/cetak_bukti/'.$nisn.'').'" target="_blank">Cetak kembali bukti pendaftaran</a></h3>
                                </div>');
                        redirect('home');
                }
		
	}

    private function cek_nisn($nisn)
    {
            $cek=$this->model_cek->cek_nisn($nisn);
            if ($cek) {
                    return true;
            }else{
                    return false;
            }
    }

    public function cetak_bukti($id)
    {
        $site_info = $this->db->get('pengaturan', 1)->row();
        $d['site_name'] = $site_info->site_name;
        $d['site_title'] = $site_info->site_title;
        $d['site_logo'] = $site_info->site_logo;
        $d['site_address'] = $site_info->site_address;
        $d['site_phone'] = $site_info->site_phone;
        $d['site_email'] = $site_info->site_email;
        $kode_thak=$this->model_app->kode_thak_aktif();
        $d['data']=$this->model_app->cetak_form($id);
        $d['jadwal']=$this->model_admin->get_all_tes($kode_thak);
       // load mPDF library
        //$this->load->library('m_pdf');

       
        $pdfFilePath ="registrasi-".time()."-download.pdf";
 
        
        //actually, you can pass mPDF parameter on this load() function
        //$pdf = $this->m_pdf->load();
        $mpdf = new \Mpdf\Mpdf();
        $html=$this->load->view('bukti_reg',$d , true);

        //generate the PDF!
        $mpdf->WriteHTML($html);
        
        //offer it to user via browser download! (The PDF won't be saved on your server HDD)
        $mpdf->Output($pdfFilePath, "I");

    }

    public function pengumuman_maba($kode)
    {
        $thak=$this->model_app->kode_thak_aktif();
        $limit=$this->model_app->get_limit($kode);
        $array = array('pendaftaran.thak' => $thak, 'pendaftaran.prodi' => $kode);
        $d['det']=$this->model_app->detail_lulus_prodi($kode);
        $d['thak']=$this->model_admin->ambil_thak_aktif();
        $d['maba']=$this->model_app->siswa_lulus($array,$limit);
        $this->load->view('pengumuman',$d);
    }

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */