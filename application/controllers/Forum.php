<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('auth_helper');
        $this->load->model("Forum_fgd_model", "forum_fgd");
        $this->load->model("Peraturan_model", "peraturan");
        $this->load->model("Anggota_Model", "anggota");
        $this->load->model("Postingan_Model", "postingan");
    }

    public function indexfgd()
    {
        $data['tahun'] = $this->postingan->getTahun();
        $data['forum_fgd'] = $this->forum_fgd->getForumFgd();

        $this->load->view('front/fgd/index', $data);
    }

    public function detailfgd($id_forumfgd)
    {
        $data['tahun'] = $this->postingan->getTahun();
        $data['forum_fgd'] = $this->forum_fgd->getForumFgdAll($id_forumfgd);

        $this->load->view('front/fgd/detail', $data);
    }

    public function tambahforumfgd()
    {
        $data['tahun'] = $this->postingan->getTahun();
        $data['peraturan'] = $this->peraturan->getNamaId();

        $this->load->view('front/fgd/tambah', $data);
    }

    public function addforumfgd()
    {
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
}
