<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ppluser_model extends CI_Model
{
    private $_table = "ppluser";

    public $id;
    public $id_ppl;
    public $nama;
    public $harga_pendaftaran;
    public $id_pendaftar;
    public $role;
    public $tanggal_daftar;
    public $status_pembayaran;
    public $bukti_transfer;
    public $kehadiran;
    public $tanggal;


    public function getByIdArray($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row_array();
    }

    public function getPesertaAnggota($id_ppl)
    {
        $query = "SELECT `ppluser`.`id`, `ppluser`.`id_pendaftar`, `anggota`.`nama`, `anggota`.`email`, `anggota`.`notelp`, `ppluser`.`role`, `ppluser`.`status_pembayaran`
                  FROM `ppluser` 
                  JOIN `anggota`
                  ON `ppluser`.`id_pendaftar` = `anggota`.`nra`                 
                  WHERE `ppluser`.`id_ppl` = $id_ppl    
                ";
        $anggota =  $this->db->query($query)->result_array();

        return $anggota;
    }

    public function getPesertaMember($id_ppl)
    {
        $query = "SELECT `ppluser`.`id`, `ppluser`.`id_pendaftar`, `member`.`nama`, `member`.`email`, `member`.`notelp`, `ppluser`.`role`, `ppluser`.`status_pembayaran`
                  FROM `ppluser` 
                  JOIN `member`
                  ON `ppluser`.`id_pendaftar` = `member`.`id_member`                 
                  WHERE `ppluser`.`id_ppl` = $id_ppl    
                ";
        $member =  $this->db->query($query)->result_array();

        return $member;
    }

    public function getPeserta($id_ppl)
    {
        $query = "SELECT `ppluser`.`id`, `ppluser`.`id_pendaftar`, `anggota`.`nama`, `anggota`.`email`, `anggota`.`notelp`, `ppluser`.`role`, `ppluser`.`status_pembayaran`, `ppluser`.`kehadiran`
                  FROM `ppluser` 
                  JOIN `anggota`
                  ON `ppluser`.`id_pendaftar` = `anggota`.`nra`                 
                  WHERE `ppluser`.`id_ppl` = $id_ppl    
                ";
        $anggota =  $this->db->query($query)->result_array();
        $query = "SELECT `ppluser`.`id`, `ppluser`.`id_pendaftar`, `member`.`nama`, `member`.`email`, `member`.`notelp`, `ppluser`.`role`, `ppluser`.`status_pembayaran`, `ppluser`.`kehadiran`
                  FROM `ppluser` 
                  JOIN `member`
                  ON `ppluser`.`id_pendaftar` = `member`.`id_member`                 
                  WHERE `ppluser`.`id_ppl` = $id_ppl    
                ";
        $member =  $this->db->query($query)->result_array();

        $peserta = [];
        foreach ($anggota as $a) {
            array_push($peserta, $a);
        }
        foreach ($member as $m) {
            array_push($peserta, $m);
        }
        return $peserta;
    }


    public function getPesertaDetail($id)
    {
        $query = "SELECT `ppluser`.*, `anggota`.`nama` as `namapeserta`, `anggota`.`email` as `emailpeserta`,`anggota`.`alamat` as `alamatpeserta`,`anggota`.`notelp` as `notelppeserta`
                  FROM `ppluser` 
                  JOIN `anggota`
                  ON `ppluser`.`id_pendaftar` = `anggota`.`nra`                 
                  WHERE `ppluser`.`id` = $id    
                ";
        $anggota =  $this->db->query($query)->row_array();
        $query = "SELECT `ppluser`.*, `member`.`nama` as `namapeserta`, `member`.`email` as `emailpeserta`, `member`.`alamat` as `alamatpeserta`,`member`.`notelp` as `notelppeserta`
                  FROM `ppluser` 
                  JOIN `member`
                  ON `ppluser`.`id_pendaftar` = `member`.`id_member`                 
                  WHERE `ppluser`.`id` = $id    
                ";
        $member =  $this->db->query($query)->row_array();

        if ($member) {
            return $member;
        } elseif ($anggota) {
            return $anggota;
        }
    }

    public function daftar($id_ppl)
    {
        $role = $this->session->userdata('role');

        $ppl = $this->ppl->getbyIdArray($id_ppl);
        $this->db->select('*');
        $this->db->where('id_ppl', $ppl["id_ppl"]);
        $this->db->where('id_pendaftar', $this->session->userdata('id_login'));
        $checkdaftar = $this->db->get($this->_table)->row_array();

        if ($checkdaftar == NULL) {
            $this->id = "";
            $this->id_ppl = $ppl["id_ppl"];
            $this->nama = $ppl["nama"];
            $this->harga_pendaftaran = $ppl["harga_pendaftaran"];
            $this->id_pendaftar = $this->session->userdata('id_login');
            $this->role = $this->session->userdata('role');
            $this->tanggal_daftar = date("Y-m-d");
            $this->status_pembayaran = 'Upload Bukti Pembayaran';
            $this->bukti_transfer = "";
            $this->kehadiran = "Tidak Hadir";
            $this->point = $ppl["point"];
            $this->tanggal = $ppl["tanggal"];
            return $this->db->insert($this->_table, $this);
        }
    }

    public function pplstatus()
    {
        $id_login = $this->session->userdata('id_login');
        $this->db->select('*');
        $this->db->where('id_pendaftar', $id_login);
        return $this->db->get($this->_table)->result_array();
    }

    public function update()
    {
        $post = $this->input->post();
        $ppluser = $this->db->get_where($this->_table, ["id" => $post["id_ppluser"]])->row_array();

        $this->id = $post["id_ppluser"];
        $this->id_ppl = $ppluser["id_ppl"];
        $this->nama = $ppluser["nama"];
        $this->harga_pendaftaran = $ppluser["harga_pendaftaran"];
        $this->id_pendaftar = $ppluser["id_pendaftar"];
        $this->role = $ppluser["role"];
        $this->tanggal_daftar = $ppluser["tanggal_daftar"];
        $this->status_pembayaran = 'Pending';
        $this->bukti_transfer = $this->do_upload();
        $this->kehadiran = $ppluser["kehadiran"];
        $this->point = $ppluser["point"];
        $this->tanggal = $ppluser["tanggal"];

        return $this->db->update($this->_table, $this, array('id' => $post['id_ppluser']));
    }

    public function updatepeserta()
    {
        $post = $this->input->post();
        $ppluser = $this->db->get_where($this->_table, ["id" => $post["id_ppluser"]])->row_array();

        $this->id = $post["id_ppluser"];
        $this->id_ppl = $ppluser["id_ppl"];
        $this->nama = $ppluser["nama"];
        $this->harga_pendaftaran = $ppluser["harga_pendaftaran"];
        $this->id_pendaftar = $ppluser["id_pendaftar"];
        $this->role = $ppluser["role"];
        $this->tanggal_daftar = $ppluser["tanggal_daftar"];
        $this->status_pembayaran = $post['status_pembayaran'];
        $this->bukti_transfer = $ppluser["bukti_transfer"];
        $this->kehadiran = $ppluser["kehadiran"];
        $this->point = $ppluser["point"];
        $this->tanggal = $ppluser["tanggal"];

        return $this->db->update($this->_table, $this, array('id' => $post['id_ppluser']));
    }

    public function checkabsensi($id_ppl)
    {
        $this->load->model('Point_terstruktur_model', 'point_terstruktur');
        $post = $this->input->post();

        $ppluser = $this->db->get_where($this->_table, ["id_ppl" => $id_ppl])->result_array();

        if ($post) {
            foreach ($ppluser as $p) {
                for ($i = 0; $i < count($post["absensi"]); $i++) {
                    if ($post["absensi"][$i] == $p["id"]) {
                        $this->kehadiran = "Hadir";
                        // insert point
                        $this->point_terstruktur->insert($p["id_pendaftar"], $p["id_ppl"], $p["point"], $p["role"], $p["tanggal"]);
                        break;
                    } else {
                        $this->kehadiran = "Tidak Hadir";
                    }
                }
                $this->id = $p["id"];
                $this->id_ppl = $p["id_ppl"];
                $this->nama = $p["nama"];
                $this->harga_pendaftaran = $p["harga_pendaftaran"];
                $this->id_pendaftar = $p["id_pendaftar"];
                $this->role = $p["role"];
                $this->tanggal_daftar = $p["tanggal_daftar"];
                $this->status_pembayaran = $p['status_pembayaran'];
                $this->bukti_transfer = $p["bukti_transfer"];
                $this->point = $p["point"];
                $this->tanggal = $p["tanggal"];
                $this->db->update($this->_table, $this, array('id' => $p["id"]));

                // delete point
                if ($this->kehadiran == "Tidak Hadir") {
                    $this->point_terstruktur->delete($p["id_pendaftar"], $p["id_ppl"]);
                }
            }
            return true;
        } else {
            foreach ($ppluser as $p) {
                $this->kehadiran = "Tidak Hadir";

                $this->id = $p["id"];
                $this->id_ppl = $p["id_ppl"];
                $this->nama = $p["nama"];
                $this->harga_pendaftaran = $p["harga_pendaftaran"];
                $this->id_pendaftar = $p["id_pendaftar"];
                $this->role = $p["role"];
                $this->tanggal_daftar = $p["tanggal_daftar"];
                $this->status_pembayaran = $p['status_pembayaran'];
                $this->bukti_transfer = $p["bukti_transfer"];
                $this->point = $p["point"];
                $this->tanggal = $p["tanggal"];
                $this->db->update($this->_table, $this, array('id' => $p["id"]));

                // delete point
                if ($this->kehadiran == "Tidak Hadir") {
                    $this->point_terstruktur->delete($p["id_pendaftar"], $p["id_ppl"]);
                }
            }
            return true;
        }
    }


    public function updatebuktihadir()
    {
        $post = $this->input->post();
        // var_dump($post);
        // die;
        $ppluser = $this->db->get_where($this->_table, ["id" => $post["id_ppluser"]])->row_array();

        $this->id = $post["id_ppluser"];
        $this->id_ppl = $ppluser["id_ppl"];
        $this->nama = $ppluser["nama"];
        $this->harga_pendaftaran = $ppluser["harga_pendaftaran"];
        $this->id_pendaftar = $ppluser["id_pendaftar"];
        $this->role = $ppluser["role"];
        $this->tanggal_daftar = $ppluser["tanggal_daftar"];
        $this->status_pembayaran = $ppluser["status_pembayaran"];
        $this->bukti_transfer = $ppluser["bukti_transfer"];
        $this->kehadiran = $ppluser["kehadiran"];
        $this->point = $ppluser["point"];
        $this->tanggal = $ppluser["tanggal"];
        $this->bukti_hadir = $this->do_upload_hadir();

        return $this->db->update($this->_table, $this, array('id' => $post['id_ppluser']));
    }

    private function do_upload()
    {
        $config['upload_path']          = './bukti_transfer_ppl/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']                = 2048;
        $config['file_name']            = date('d-m-Y_H-i-s');
        $config['overwrite']            = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti_transfer')) {
            return $this->upload->data("file_name");
        }
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
        exit;
    }

    private function do_upload_hadir()
    {
        $config['upload_path']          = './bukti_hadir/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']                = 2048;
        $config['file_name']            = date('d-m-Y_H-i-s');
        $config['overwrite']            = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bukti_hadir')) {
            return $this->upload->data("file_name");
        }
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
        exit;
    }
}
