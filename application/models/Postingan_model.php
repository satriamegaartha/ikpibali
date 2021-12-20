<?php defined('BASEPATH') or exit('No direct script access allowed');

class Postingan_model extends CI_Model
{
    private $_table = "postingan";

    public $id_postingan;
    public $tanggal;
    public $nama;
    public $keterangan;
    public $gambar1;
    public $gambar2;
    public $gambar3;
    public $gambar4;
    public $gambar5;
    public $gambar6;
    public $gambar7;
    public $gambar8;
    public $gambar9;
    public $gambar10;
    public $gambar11;
    public $gambar12;
    public $gambar13;
    public $gambar14;
    public $gambar15;
    public $keterangan1;
    public $keterangan2;
    public $keterangan3;
    public $keterangan4;
    public $keterangan5;
    public $keterangan6;
    public $keterangan7;
    public $keterangan8;
    public $keterangan9;
    public $keterangan10;
    public $keterangan11;
    public $keterangan12;
    public $keterangan13;
    public $keterangan14;
    public $keterangan15;
    public $created_at;
    public $updated_at;

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->order_by("tanggal", "desc");
        $postingan = $this->db->get()->result();

        return $postingan;

        // return $this->db->get($this->_table)->result();
    }

    public function getTahun()
    {
        $this->db->select('tanggal');
        $this->db->from($this->_table);
        $this->db->order_by("tanggal", "asc");
        $temp = $this->db->get()->result_array();
        $temp2 = [];
        foreach ($temp as $t) {
            $date = date('Y', strtotime($t['tanggal']));
            array_push($temp2, $date);
        }
        $tahun = array_unique($temp2);
        return $tahun;
    }

    public function getPostinganTahun($tahun)
    {
        $awal = $tahun . '-01-01';
        $akhir = $tahun . '-12-31';

        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('tanggal >=', $awal);
        $this->db->where('tanggal <=', $akhir);
        $this->db->order_by("tanggal", "asc");
        $postingan = $this->db->get()->result();

        return $postingan;
    }

    public function getById($id_postingan)
    {
        return $this->db->get_where($this->_table, ["id_postingan" => $id_postingan])->result();
    }

    public function getByIdArray($id_postingan)
    {
        return $this->db->get_where($this->_table, ["id_postingan" => $id_postingan])->result_array();
    }

    public function getByIdrow($id_postingan)
    {
        return $this->db->get_where($this->_table, ["id_postingan" => $id_postingan])->row();
    }

    // public function menunggu()
    // {
    //     return $this->db->get_where($this->_table, ["status" => 'menunggu'])->result();
    // }

    public function terbaru()
    {
        $this->db->select('*');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->_table)->result();
    }

    public function terbaruArray()
    {
        $this->db->select('*');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get($this->_table)->result_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_postingan = "";
        $this->tanggal = $post["tanggal"];
        $this->nama = $post["nama"];
        $this->keterangan = $post["keterangan"];

        $config['upload_path']          = './postingan/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        $keterangan_gambar = $this->input->post('keterangan_gambar');
        $jumlah_gambar = count($_FILES['gambar']['name']);
        for ($i = 0; $i < $jumlah_gambar; $i++) {
            if (!empty($_FILES['gambar']['name'][$i])) {
                $_FILES['file']['name'] = date('d-m-Y_H-i-s') . '-' . $_FILES['gambar']['name'][$i];
                $_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
                $_FILES['file']['size'] = $_FILES['gambar']['size'][$i];

                $j = $i + 1;
                $temp_gambar = 'gambar' . $j;
                $this->$temp_gambar = str_replace(' ', '_', $_FILES['file']['name']);
                $temp_keterangan = 'keterangan' . $j;
                $this->$temp_keterangan = $keterangan_gambar[$i];

                if ($this->upload->do_upload('file')) {
                    // var_dump($temp_gambar);
                    $uploadData = $this->upload->data('file_name');
                }
            }
        }

        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = "";
        return $this->db->insert($this->_table, $this);
    }


    public function update()
    {
        $post = $this->input->post();
        $old_data = $this->db->get_where($this->_table, ["id_postingan" => $post['id_postingan']])->row_array();
        $this->id_postingan = $post["id_postingan"];
        $this->tanggal = $post["tanggal"];
        $this->nama = $post["nama"];
        $this->keterangan = $post["keterangan"];

        $config['upload_path']          = './postingan/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 2048;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        $keterangan_gambar = $this->input->post('keterangan_gambar');
        $jumlah_gambar = count($_FILES['gambar']['name']);
        for ($i = 0; $i < $jumlah_gambar; $i++) {

            $j = $i + 1;
            $temp_gambar = 'gambar' . $j;
            $old_image = $old_data[$temp_gambar];


            if (!empty($_FILES['gambar']['name'][$i])) {
                $_FILES['file']['name'] = date('d-m-Y_H-i-s') . '-' . $_FILES['gambar']['name'][$i];
                $_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
                $_FILES['file']['size'] = $_FILES['gambar']['size'][$i];

                if ($old_image) {
                    unlink(FCPATH . './postingan/' . $old_image);
                }

                $this->$temp_gambar = str_replace(' ', '_', $_FILES['file']['name']);
                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data('file_name');
                }
            } else {
                $this->$temp_gambar = $old_image;
            }
        }

        $jumlah_keterangan_gambar = count($keterangan_gambar);
        for ($i = 0; $i < $jumlah_keterangan_gambar; $i++) {
            $j = $i + 1;
            $temp_keterangan = 'keterangan' . $j;
            $this->$temp_keterangan = $keterangan_gambar[$i];
        }


        if (isset($post["deleteGambar"])) {

            foreach ($post["deleteGambar"] as $d) {
                $temp_gambarx = 'gambar' . $d;
                $this->$temp_gambarx = "";
                $temp_keteranganx = 'keterangan' . $d;
                $this->$temp_keteranganx = "";
                // var_dump($old_data[$temp_gambarx]);
                unlink(FCPATH . './postingan/' . $old_data[$temp_gambarx]);
            }
        }





        $this->created_at = $post["created_at"];
        $this->updated_at = date('Y-m-d H:i:s');
        return $this->db->update($this->_table, $this, array('id_postingan' => $post['id_postingan']));
    }

    public function delete($id_postingan)
    {
        $old_data = $this->db->get_where($this->_table, ["id_postingan" => $id_postingan])->row_array();
        for ($i = 0; $i < 15; $i++) {
            $j = $i + 1;
            $temp_gambar = 'gambar' . $j;
            $old_image = $old_data[$temp_gambar];
            if ($old_image) {
                unlink(FCPATH . './postingan/' . $old_image);
            }
        }
        return $this->db->delete($this->_table, array("id_postingan" => $id_postingan));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './postingan/';
        $config['allowed_types']        = 'pdf|jpg|png|jpeg';
        $config['max_size']                = 2048;
        $config['file_name']            = date('d-m-Y') . '-' . $this->nama;
        $config['overwrite']            = true;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        return "default.jpg";
    }
}
