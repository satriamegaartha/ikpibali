<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth_helper');
		$this->load->model("Anggota_model", "anggota");
		$this->load->model("Member_model", "member");
		$this->load->model("Peraturan_model", "peraturan");
		$this->load->model("Postingan_model", "postingan");
		$this->load->model("Ppl_model", "ppl");
		$this->load->model("Ppluser_model", "ppluser");
	}

	public function index()
	{
		$this->load->view('admin/dashboard');
	}
	public function comingsoon()
	{
		$this->load->view('admin/404');
	}

	public function login()
	{
		$this->load->view('admin/login');
	}
	public function logout()
	{
		$this->anggota->logout();
		redirect('anggota/login');
	}
	public function loginaction()
	{
		// jika form login disubmit
		if ($this->input->post()) {
			if ($this->anggota->doLogin()) {
				redirect('front/index');
				// redirect('anggota/peraturan');
			} else {
				if ($this->member->doLogin()) {
					redirect('front/index');
				} else {
					echo "<script>
					alert('Username atau Password yang anda masukan Salah!');
					window.location.href='login';
					</script>";
				}
			}
		}
	}

	public function register()
	{
		$this->load->view('admin/register');
	}

	public function registeraction()
	{
		if ($this->anggota->save()) {
			echo "<script>
                alert('Pendaftaran Berhasil! Silahkan Login');
                window.location.href='login';
                </script>";
		} else {
			echo "<script>
                alert('Pendaftaran gagal! Silahkan Hubungi Admin!');
                window.location.href='';
                </script>";
		};
	}

	public function editprofilelogin()
	{
		$user_logged = $this->session->userdata('user_logged');

		$data['anggota'] = $this->anggota->getById($user_logged->nra);

		$this->load->view('admin/editprofilelogin', $data);
	}

	public function updateprofilelogin($nra = null)
	{
		if ($this->input->post()) {
			if ($this->anggota->update($nra)) {;

				$this->db->where('nra', $this->session->userdata('nra'));
				$user = $this->db->get('anggota')->row();

				$this->session->set_userdata(['user_logged' => $user]);
				$this->session->set_userdata(['nama' => $user->nama]);
				$this->session->set_userdata(['nra' => $user->nra]);
				$this->session->set_userdata(['profile' => $user->profile]);

				echo "<script>
				alert('Anggota Telah Diperbaharui!');
				window.location.href='postingan';
				</script>";
			} else {
				echo "<script>
				alert('Gagal Memperbaharui Anggota! Silahkan Hubungi Admin);
				window.location.href='editprofilelogin';
				</script>";
			}
		}
	}

	public function anggota()
	{
		$data['anggota'] = $this->anggota->getAll();
		$this->load->view('admin/anggota/index', $data);
	}

	public function profileanggota($nra = null)
	{
		$data['anggota'] = $this->anggota->getByIdresult($nra);
		$this->load->view('admin/anggota/profile', $data);
	}

	public function anggotaedit($nra)
	{
		$data['anggota'] = $this->anggota->getById($nra);
		$this->load->view('admin/anggota/edit', $data);
	}

	public function updateanggota($nra = null)
	{
		if ($this->input->post()) {
			if ($this->anggota->update($nra)) {
				echo "<script>
                alert('Anggota Telah Diperbaharui!');
                window.location.href='anggota';
                </script>";
			} else {
				echo "<script>
                alert('Gagal Memperbaharui Anggota! Silahkan Hubungi Admin);
                window.location.href='editanggota';
                </script>";
			}
		}
	}

	public function peraturan()
	{
		$data['peraturan'] = $this->peraturan->terbaru();
		$this->load->view('admin/peraturan/index', $data);
	}

	public function tambahperaturan()
	{
		$this->load->view('admin/peraturan/tambah');
	}

	public function editperaturan($id_peraturan)
	{
		$data['peraturan'] = $this->peraturan->getbyId($id_peraturan);
		$this->load->view('admin/peraturan/edit', $data);
	}
	public function pendingperaturan()
	{
		$data["peraturan"] = $this->peraturan->menunggu();
		$this->load->view('admin/peraturan/pending', $data);
	}
	public function addperaturan()
	{
		if ($this->input->post()) {
			if ($this->peraturan->save()) {
				echo "<script>
                alert('Peraturan Baru Telah Ditambahkan!');
                window.location.href='peraturan';
                </script>";
			} else {
				echo "<script>
                alert('Gagal Menambahkan Peraturan! Silahkan Hubungi Admin);
                window.location.href='tambahperaturan';
                </script>";
			}
		}
	}
	public function updateperaturan($id_peraturan = null)
	{
		if ($this->input->post()) {
			if ($this->peraturan->update($id_peraturan)) {
				echo "<script>
                alert('Peraturan Telah Diperbaharui!');
                window.location.href='peraturan';
                </script>";
			} else {
				echo "<script>
                alert('Gagal Memperbaharui Peraturan! Silahkan Hubungi Admin);
                window.location.href='editperaturan';
                </script>";
			}
		}
	}


	public function postingan()
	{
		is_logged_in();
		$data['postingan'] = $this->postingan->terbaruArray();
		$this->load->view('admin/postingan/index', $data);
	}

	public function tambahpostingan()
	{
		is_logged_in();
		$this->load->view('admin/postingan/tambah');
	}

	public function addpostingan()
	{
		is_logged_in();
		if ($this->input->post()) {
			if ($this->postingan->save()) {
				echo "<script>
				alert('Kegiatan Baru Telah Ditambahkan!');
				window.location.href='postingan';
				</script>";
			} else {
				echo "<script>
                alert('Gagal Menambahkan Kegiatan! Silahkan Hubungi Admin);
                window.location.href='tambahpostingan';
                </script>";
			}
		}
	}

	public function editpostingan($id_postingan)
	{
		is_logged_in();
		$data['postingan'] = $this->postingan->getbyId($id_postingan);
		$this->load->view('admin/postingan/edit', $data);
	}

	public function updatepostingan($id_postingan = null)
	{
		is_logged_in();
		if ($this->input->post()) {
			if ($this->postingan->update($id_postingan)) {
				echo "<script>
				alert('Kegiatan Telah Diperbaharui!');
				window.location.href='postingan';
				</script>";
			} else {
				echo "<script>
                alert('Gagal Memperbaharui Kegiatan! Silahkan Hubungi Admin);
                window.location.href='editpostingan';
                </script>";
			}
		}
	}

	public function deletepostingan($id_postingan)
	{
		is_logged_in();
		$old_data = $this->db->get_where('postingan', ["id_postingan" => $id_postingan])->row_array();
		for ($i = 0; $i < 15; $i++) {
			$j = $i + 1;
			$temp_gambar = 'gambar' . $j;
			$old_image = $old_data[$temp_gambar];
			if ($old_image) {
				unlink(FCPATH . './postingan/' . $old_image);
			}
		}
		$this->db->delete('postingan', ['id_postingan' => $id_postingan]);
		echo "<script>
					alert('Kegiatan Telah Dihapus!');
					window.location.href='postingan';
					</script>";
		redirect('anggota/postingan');
	}

	public function ppl()
	{
		is_logged_in();
		$data['ppl'] = $this->ppl->terbaruArray();
		$this->load->view('admin/ppl/index', $data);
	}

	public function tambahppl()
	{
		is_logged_in();
		$this->load->view('admin/ppl/tambah');
	}

	public function addppl()
	{
		is_logged_in();
		if ($this->input->post()) {
			if ($this->ppl->save()) {
				echo "<script>
				alert('PPL Baru Telah Ditambahkan!');
				window.location.href='ppl';
				</script>";
			} else {
				echo "<script>
                alert('Gagal Menambahkan PPL! Silahkan Hubungi Admin);
                window.location.href='tambahppl';
                </script>";
			}
		}
	}

	public function editppl($id_ppl)
	{
		is_logged_in();
		$data['ppl'] = $this->ppl->getbyId($id_ppl);
		$this->load->view('admin/ppl/edit', $data);
	}

	public function updateppl($id_ppl = null)
	{
		is_logged_in();
		if ($this->input->post()) {
			if ($this->ppl->update($id_ppl)) {
				echo "<script>
 				alert('PPL Telah Diperbaharui!');								
				window.location.href='ppl';
				 </script>";
				redirect('anggota/ppl');
			} else {
				echo "<script>
				alert('Gagal Memperbaharui PPL! Silahkan Hubungi Admin);
				window.location.href='editppl';
				</script>";
			}
		}
	}

	public function deleteppl($id_ppl)
	{
		is_logged_in();
		$old_data = $this->db->get_where('ppl', ["id_ppl" => $id_ppl])->row_array();

		$old_image = $old_data['gambar'];
		if ($old_image) {
			unlink(FCPATH . './ppl/' . $old_image);
		}

		$this->db->delete('ppl', ['id_ppl' => $id_ppl]);
		echo "<script>
					alert('PPL Telah Dihapus!');
					window.location.href='ppl';
					</script>";
		redirect('anggota/ppl');
	}

	public function listpesertappl($id_ppl)
	{
		is_logged_in();
		$data['pesertappl'] = $this->ppluser->getPeserta($id_ppl);
		$data['ppl'] = $this->ppl->getByIdArray($id_ppl);

		$this->load->view('admin/ppl/listpeserta', $data);
	}

	public function pesertadetail($id_ppluser)
	{
		is_logged_in();
		$data['pesertappldetail'] = $this->ppluser->getPesertaDetail($id_ppluser);
		$data['ppl'] = $this->ppl->getByIdArray($data['pesertappldetail']['id_ppl']);

		$this->load->view('admin/ppl/pesertadetail', $data);
	}

	public function updatepesertappl($id_ppl = null)
	{
		is_logged_in();
		if ($this->input->post()) {
			if ($this->ppluser->updatepeserta($id_ppl)) {
				echo "<script>
 				alert('Peserta PPL Telah Diperbaharui!');												
				 </script>";
				$ppluser = $this->ppluser->getByIdArray($id_ppl);
				redirect('anggota/listpesertappl/' . $ppluser["id_ppl"]);
			} else {
				echo "<script>
				alert('Gagal Memperbaharui Peserta PPL! Silahkan Hubungi Admin);
				window.location.href='editppl';
				</script>";
			}
		}
	}

	public function daftarhadirppl($id_ppl)
	{
		$data['pesertapplanggota'] = $this->ppluser->getPesertaAnggota($id_ppl);
		$data['pesertapplmember'] = $this->ppluser->getPesertaMember($id_ppl);
		$data['ppl'] = $this->ppl->getByIdArray($id_ppl);
		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "daftar-hadir-ppl " . $data['ppl']['nama'] . ".pdf";
		$this->pdf->load_view('admin/ppl/daftarhadirppl', $data);
	}

	public function absensippl($id_ppl)
	{
		is_logged_in();
		$data['pesertappl'] = $this->ppluser->getPeserta($id_ppl);
		$data['ppl'] = $this->ppl->getByIdArray($id_ppl);

		$this->load->view('admin/ppl/absensi', $data);
	}

	public function checkabsensippl($id_ppl)
	{
		is_logged_in();
		$data['ppl'] = $this->ppl->getByIdArray($id_ppl);


		if ($this->ppluser->checkabsensi($id_ppl)) {
			echo "<script>
				alert('Absensi Peserta PPL Telah Diperbaharui!');																
				 </script>";
			redirect('anggota/listpesertappl/' . $data['ppl']["id_ppl"]);
		} else {
			echo "<script>
				alert('Absensi Gagal Memperbaharui Peserta PPL! Silahkan Hubungi Admin);
				window.location.href='editppl';
				</script>";
		}
	}
}
