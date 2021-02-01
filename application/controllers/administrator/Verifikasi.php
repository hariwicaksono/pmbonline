<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Verifikasi extends CI_Controller {
	
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
			$data['content']=$this->load->view('admin/verifikasi/view','', TRUE);
			$this->load->view('admin/home', $data);
		}
	
		public function show_pendaftaran()
		{
			$kode_thak=$this->model_app->kode_thak_aktif();
			$q=$this->model_admin->get_all_siswa($kode_thak);
			$html='';
			$no=1;
			if ($q) {
				foreach ($q as $data) {

					if ($data->verifikasi_tgl==0) {
						$tes='<a href="'.base_url('administrator/verifikasi/do_verifikasi/'.$data->id_daftar.'').'" class="btn btn-danger btn-sm" title="Lakukan Verifikasi"><i class="fa fa-exclamation-triangle"></i> Belum Verifikasi</a>';
					}else{
						$tes='<a href="'.base_url('administrator/verifikasi/do_verifikasi/'.$data->id_daftar.'').'" class="btn btn-primary btn-sm" title="Edit Verifikasi"><i class="fa fa-check-square-o"></i> Sudah Verifikasi</a>
							<a href="'.base_url('administrator/verifikasi/cetak_verifikasi/'.$data->id_daftar.'').'" class="btn bg-maroon btn-sm" title="Cetak Kartu Ujian" target="_blank"><i class="fa fa-print"></i> Cetak Kartu Ujian</a>';
					}

					if ($data->fc_ijazah == 1) {
						$fc_ijazah='<span class="badge bg-green"><i class="fa fa-check"></i></span>';
					}else{
						$fc_ijazah='<span class="badge bg-red"><i class="fa fa-times"></i></span>';
					}

					if ($data->fc_skhu == 1) {
						$fc_skhu='<span class="badge bg-green"><i class="fa fa-check"></i></span>';
					}else{
						$fc_skhu='<span class="badge bg-red"><i class="fa fa-times"></i></span>';
					}

					$html.='<tr>
							<td>'.$no.'</td>
							<td>'.$data->nama_pendaftar.'</td>
							<td>'.$data->nisn.'</td>
							<td>'.$data->sekolah.'</td>
							<td>'.$data->jenjang.' '.$data->nama_prodi.'</td>
							<td>'.$fc_ijazah.'</td>
							<td>'.$fc_skhu.'</td>
							<td>'.$tes.'</td>
					</tr>';
					$no++;
				}
			}else{
				$html.='<tr><td colspan="7">Tidak Ada Data</td></tr>';
			}
			echo $html;
		}

		public function do_verifikasi($id=NULL)
		{
			if (!empty($id))
	        {
	        	if (isset($_POST['submit'])) {
					$ibu=$this->input->post('nama_ibu_kandung', TRUE);
					$ayah=$this->input->post('nama_ayah_kandung', TRUE);
	        		$pas_foto=$this->input->post('pas_foto', TRUE);
	        		$fc_ijazah=$this->input->post('fc_ijazah', TRUE);
	        		$fc_skhu=$this->input->post('fc_skhu', TRUE);
	        		$t = date("Y-m-d H:i:s");
	        		$data=array(
						'nama_ibu_kandung'=>$ibu,
						'nama_ayah_kandung'=>$ayah,
						'pas_foto'=>$pas_foto,
	        					'fc_ijazah'=>$fc_ijazah,
	        					'fc_skhu'=>$fc_skhu,
	        					'verifikasi_tgl'=>$t);
					$result=$this->model_app->do_verifikasi($data,$id);
					$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Berhasil Melakukan Verifikasi</strong>
					</div>');
	        		redirect('administrator/verifikasi');
	        	}else{
					$site_info = $this->db->get('pengaturan', 1)->row();
					$d['site_name'] = $site_info->site_name;
					$d['site_title'] = $site_info->site_title;
					$d['site_logo'] = $site_info->site_logo;
					$d['site_favicon'] = $site_info->site_favicon;
					$d['site_biaya'] = $site_info->site_biaya;
	        		$d['siswa']=$this->model_admin->get_detail_siswa($id);
	        		$d['content']=$this->load->view('admin/verifikasi/do_verifikasi',$d, TRUE);
	       			$this->load->view('admin/home', $d); 
	        	}
	        }else{
	        	// Whoops, we don't have a page for that!
            	show_404();
	        }
		
		}
 
		public function cetak_verifikasi($id=NULL)
		{
			$this->load->library('pdfgenerator');
			$site_info = $this->db->get('pengaturan', 1)->row();
			$d['site_name'] = $site_info->site_name;
			$d['site_title'] = $site_info->site_title;
			$d['site_logo'] = $site_info->site_logo;
			$d['site_address'] = $site_info->site_address;
			$d['site_phone'] = $site_info->site_phone;
			$d['site_email'] = $site_info->site_email;
			if (!empty($id)){
	        	$kode_thak=$this->model_app->kode_thak_aktif();
		        $d['data']=$this->model_app->cetak_ver($id);
		        $d['jadwal']=$this->model_admin->get_all_tes($kode_thak);
		       //print_r($data);
		        
		        $pdfFilePath ="registrasi-".time()."-download.pdf";
				$paper = 'A4';
				$orientation = "portrait";
				
		        $html=$this->load->view('admin/verifikasi/cetak_verifikasi',$d, true);
				$this->pdfgenerator->generate($html, $pdfFilePath, $paper, $orientation);
	
	        }
	        else{
	        	// Whoops, we don't have a page for that!
            	show_404();
	        }
		}
	}
	
	/* End of file Verifikasi.php */
	/* Location: ./application/controllers/Verifikasi.php */	