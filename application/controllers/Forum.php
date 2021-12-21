<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('auth_helper');
        $this->load->model("Forum_fgd_model", "forum_fgd");
        $this->load->model("Komentar_fgd_model", "komentar_fgd");
        $this->load->model("Peraturan_model", "peraturan");
        $this->load->model("Anggota_Model", "anggota");
        $this->load->model("Postingan_Model", "postingan");
    }

    public function indexfgd()
    {
        is_logged_in();
        $data['tahun'] = $this->postingan->getTahun();
        $data['forum_fgd'] = $this->forum_fgd->getForumFgdActive();

        $this->load->view('front/fgd/index', $data);
    }

    public function detailfgd($id_forumfgd)
    {
        is_logged_in();
        $data['tahun'] = $this->postingan->getTahun();
        $data['forum_fgd'] = $this->forum_fgd->getForumFgdAll($id_forumfgd);
        $data['komentar_fgd'] = $this->komentar_fgd->getKomentarByIdForumParent($id_forumfgd);
        $data['komentar_fgd_child'] = $this->komentar_fgd->getKomentarByIdForumChild($id_forumfgd);
        $data["id_login"] = $this->session->userdata('id_login');
        $this->load->view('front/fgd/detail', $data);
    }

    public function tambahforumfgd()
    {
        is_logged_in();
        $data['tahun'] = $this->postingan->getTahun();
        $data['peraturan'] = $this->peraturan->getNamaId();

        $this->load->view('front/fgd/tambah', $data);
    }

    public function addforumfgd()
    {
        is_logged_in();
        if ($this->input->post()) {
            if ($this->forum_fgd->save()) {
                $this->peraturan->updatefgd($this->input->post()["id_peraturan"]);
                echo "<script>
                alert('Forum Telah Ditambahkan, Tunggu Konfirmasi Admin!');                
                </script>";
                redirect('forum/indexfgd');
            } else {
                echo "<script>
                alert('Gagal Menambahkan Forum!);                
                </script>";
                redirect('forum/indexfgd');
            }
        }
    }

    public function indexfgdadmin()
    {
        is_logged_in();
        $data['forum_fgd'] = $this->forum_fgd->getForumFgd();
        $this->load->view('admin/fgd/index', $data);
    }

    public function editforumfgd($id_forumfgd)
    {
        is_logged_in();
        $data['forum_fgd'] = $this->forum_fgd->getbyId($id_forumfgd);

        // var_dump($data['forum_fgd']);
        // die;
        $this->load->view('admin/fgd/edit', $data);
    }

    public function updateforumfgd($id_forumfgd = null)
    {
        is_logged_in();
        if ($this->input->post()) {
            if ($this->forum_fgd->update($id_forumfgd)) {
                echo "<script>
                alert('FGD Telah Diperbaharui!');
                window.location.href='indexfgdadmin';
                </script>";
            } else {
                echo "<script>
                alert('Gagal Memperbaharui FGD! Silahkan Hubungi Admin);
                window.location.href='editforumfgd';
                </script>";
            }
        }
    }

    public function deleteforumfgd($id_forumfgd)
    {
        is_logged_in();
        $forum_fgd = $this->forum_fgd->getbyId($id_forumfgd);
        $this->db->set('forum_fgd', 0);
        $this->db->where('id_peraturan', $forum_fgd[0]["id_peraturan"]);
        $this->db->update('peraturan');

        $this->db->delete('forum_fgd', ['id_forumfgd' => $id_forumfgd]);
        echo "<script>
        alert('FGD Telah Dihapus!');        
        </script>";
        redirect('forum/indexfgd');
    }

    public function addkomentarfgd()
    {
        is_logged_in();
        if ($this->input->post()) {

            if ($this->komentar_fgd->save()) {
                echo "<script>
                alert('Komentar Telah Ditambahkan!');                
                </script>";
                redirect('forum/detailfgd/' . $this->input->post()["id_forumfgd"]);
            } else {
                echo "<script>
                alert('Gagal Menambahkan Komentar!);                
                </script>";
                redirect('forum/detailfgd/' . $this->input->post()["id_forumfgd"]);
            }
        }
    }

    public function deletekomentarfgd($id_komentarfgd)
    {
        is_logged_in();
        $komentarfgd = $this->komentar_fgd->getById($id_komentarfgd);
        $this->db->delete('komentar_fgd', ['id_komentarfgd' => $id_komentarfgd]);
        echo "<script>
        alert('FGD Telah Dihapus!');        
        </script>";
        redirect('forum/detailfgd/' . $komentarfgd["id_forumfgd"]);
    }

    public function deletekomentarparentfgd($id_komentarfgd)
    {
        is_logged_in();
        $komentarfgd = $this->komentar_fgd->getById($id_komentarfgd);

        $this->db->delete('komentar_fgd', ['id_komentarfgd' => $id_komentarfgd]);
        $this->db->delete('komentar_fgd', ['parent' => $id_komentarfgd]);
        echo "<script>
        alert('FGD Telah Dihapus!');        
        </script>";
        redirect('forum/detailfgd/' . $komentarfgd["id_forumfgd"]);
    }
}
