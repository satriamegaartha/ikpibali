<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth_helper');
		$this->load->model("Postingan_model", "postingan");
		$this->load->model("Peraturan_model", "peraturan");
		$this->load->model("Anggota_Model", "anggota");
		$this->load->model("Ppl_Model", "ppl");
		$this->load->model("Ppluser_Model", "ppluser");
	}
	public function index()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getAll();
		$data['peraturan'] = $this->peraturan->get5();
		$data['anggota'] = $this->anggota->terbaru5();
		$this->load->view('front/index', $data);
	}

	public function postingan()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getAll();
		$this->load->view('front/postingan/postingan', $data);
	}

	public function postinganlist()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getAll();
		$this->load->view('front/postingan/list', $data);
	}

	public function postinganlisttahun($tahun)
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->postingan->getPostinganTahun($tahun);
		$data['tahunaktif'] = $tahun;

		$this->load->view('front/postingan/list', $data);
	}

	public function detailpostingan($id_postingan)
	{
		$data['tahun'] = $this->postingan->getTahun();

		$data['postingan'] = $this->postingan->getByIdArray($id_postingan);
		$this->load->view('front/postingan/detailpostingan', $data);
	}

	public function peraturanlist()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['postingan'] = $this->peraturan->getAll();
		$this->load->view('front/peraturan/list', $data);
	}

	public function ppllist()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['ppl'] = $this->ppl->terbaruArrayActive();

		$this->load->view('front/ppl/list', $data);
	}

	public function detailppl($id_ppl)
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['ppl'] = $this->ppl->getbyIdArray($id_ppl);

		$this->load->view('front/ppl/detailppl', $data);
	}

	public function daftarppl($id_ppl)
	{
		is_logged_in();
		$data['tahun'] = $this->postingan->getTahun();

		// alert gak keluar
		if ($this->ppluser->daftar($id_ppl)) {
			echo "<script>
				alert('Pendaftaran Berhasil!');				
				</script>";
			redirect('front/pplstatus');
		} else {
			echo "<script>
                alert('Pendaftaran gagal!);                
                </script>";
			redirect('front/pplstatus');
		}
	}

	public function pplstatus()
	{
		is_logged_in();
		$data['tahun'] = $this->postingan->getTahun();
		$data['pplstatus'] = $this->ppluser->pplstatus();

		$this->load->view('front/ppl/status', $data);
	}

	public function ppluserdetail($id_ppluser)
	{
		is_logged_in();
		$data['tahun'] = $this->postingan->getTahun();
		$data['ppluser'] = $this->ppluser->getByIdArray($id_ppluser);
		$id_ppl = $data['ppluser']['id_ppl'];
		$data['ppl'] = $this->ppl->getbyIdArray($id_ppl);
		$this->load->view('front/ppl/ppluserdetail', $data);
	}

	public function uploadbuktitransfer($id_ppluser = null)
	{
		if ($this->input->post()) {
			if ($this->ppluser->update($id_ppluser)) {
				echo "<script>
                alert('Bukti Transfer Berhasil Diupload!');
                window.location.href='pplstatus';
                </script>";
			} else {
				echo "<script>
                alert('Bukti Transfer Gagal Diupload);
                window.location.href='editanggota';
                </script>";
				redirect('front/ppluserdetail/' . $id_ppluser);
			}
		}
	}

	public function anggotalist()
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['anggota'] = $this->anggota->getAll();
		$this->load->view('front/anggota/anggotalist', $data);
	}

	public function profileanggota($nra = null)
	{
		$data['tahun'] = $this->postingan->getTahun();
		$data['anggota'] = $this->anggota->getByIdresult($nra);
		$this->load->view('front/anggota/profile', $data);
	}
}
