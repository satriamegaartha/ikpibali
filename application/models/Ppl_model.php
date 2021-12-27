<?php defined('BASEPATH') or exit('No direct script access allowed');

class Ppl_model extends CI_Model
{
    private $_table = "ppl";

    public $id_ppl;
    public $nama;
    public $tanggal_ppl;
    public $tanggal_pendaftaran_buka;
    public $tanggal_pendaftaran_tutup;
    public $jumlah_peserta_anggota;
    public $jumlah_peserta_user;
    public $harga_pendaftaran;
    public $gambar;
    public $keterangan;
    public $point;

    public function terbaruArray()
    {
        $this->db->select('*');
        $this->db->order_by('tanggal_ppl', 'ASC');
        return $this->db->get($this->_table)->result_array();
    }

    public function terbaruArrayActive()
    {
        $this->db->select('*');
        $this->db->where('tanggal_ppl >=', date("Y-m-d"));
        $this->db->order_by('tanggal_ppl', 'ASC');
        return $this->db->get($this->_table)->result_array();
    }

    public function getById($id_ppl)
    {
        return $this->db->get_where($this->_table, ["id_ppl" => $id_ppl])->result();
    }

    public function getByIdArray($id_ppl)
    {
        return $this->db->get_where($this->_table, ["id_ppl" => $id_ppl])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_ppl = "";
        $this->nama = $post["nama"];
        $this->tanggal_ppl = $post["tanggal_ppl"];
        $this->tanggal_pendaftaran_buka = $post["tanggal_pendaftaran_buka"];
        $this->tanggal_pendaftaran_tutup = $post["tanggal_pendaftaran_tutup"];
        $this->jumlah_peserta_anggota = 0;
        $this->jumlah_peserta_user = 0;
        $this->harga_pendaftaran = $post["harga_pendaftaran"];
        $this->gambar = $this->do_upload();
        $this->keterangan = $post["keterangan"];
        $this->point = $post["point"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->id_ppl = $post["id_ppl"];
        $this->nama = $post["nama"];
        $this->tanggal_ppl = $post["tanggal_ppl"];
        $this->tanggal_pendaftaran_buka = $post["tanggal_pendaftaran_buka"];
        $this->tanggal_pendaftaran_tutup = $post["tanggal_pendaftaran_tutup"];
        $this->jumlah_peserta_anggota = 0;
        $this->jumlah_peserta_user = 0;
        $this->harga_pendaftaran = $post["harga_pendaftaran"];
        $this->keterangan = $post["keterangan"];
        $this->point = $post["point"];

        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->do_upload();
            unlink(FCPATH . './ppl/' . $post["old_gambar"]);
        } else {
            $this->gambar = $post["old_gambar"];
        }

        return $this->db->update($this->_table, $this, array('id_ppl' => $post['id_ppl']));
    }

    private function do_upload()
    {
        $config['upload_path']          = './ppl/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']                = 2048;
        $config['file_name']            = date('d-m-Y_H-i-s');
        $config['overwrite']            = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
        $error = array('error' => $this->upload->display_errors());
        print_r($error);
        exit;
    }
}
