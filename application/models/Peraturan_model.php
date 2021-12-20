<?php defined('BASEPATH') or exit('No direct script access allowed');

class Peraturan_model extends CI_Model
{
    private $_table = "peraturan";

    public $id_peraturan;
    public $nama;
    public $keterangan;
    public $file;
    public $created_at;
    public $updated_at;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_peraturan)
    {
        return $this->db->get_where($this->_table, ["id_peraturan" => $id_peraturan])->result();
    }

    public function menunggu()
    {
        return $this->db->get_where($this->_table, ["status" => 'menunggu'])->result();
    }

    public function terbaru()
    {
        $this->db->select('*');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        return $this->db->get($this->_table)->result();
    }

    public function get5()
    {
        $this->db->select('*');
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(5);
        return $this->db->get($this->_table)->result();
    }


    public function save()
    {
        $post = $this->input->post();
        $this->id_peraturan = "";
        $this->nama = $post["nama"];
        $this->keterangan = $post["keterangan"];
        $this->file = $this->_uploadImage();
        $this->status = "Menunggu";
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = "";
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->keterangan = $post["keterangan"];
        if (!empty($_FILES["file"]["name"])) {
            $this->file = $this->_uploadImage();
        } else {
            $this->file = $post["old_file"];
        }
        $this->status = $post["status"];
        $this->created_at = $post["created_at"];
        $this->updated_at = date('Y-m-d H:i:s');
        return $this->db->update($this->_table, $this, array('id_peraturan' => $post['id_peraturan']));
    }

    public function delete($id_peraturan)
    {
        return $this->db->delete($this->_table, array("id_peraturan" => $id_peraturan));
    }

    public function getNamaId()
    {
        $this->db->select('nama, id_peraturan');
        $this->db->order_by('created_at', 'DESC');
        $this->db->where('forum_fgd', '0');
        return $this->db->get($this->_table)->result_array();
    }

    public function updatefgd($id_peraturan)
    {
        $peraturan_old = $this->db->get_where($this->_table, ["id_peraturan" => $id_peraturan])->row_array();

        $this->id_peraturan = $peraturan_old["id_peraturan"];
        $this->nama = $peraturan_old["nama"];
        $this->keterangan = $peraturan_old["keterangan"];
        $this->file = $peraturan_old["old_file"];
        $this->status = $peraturan_old["status"];
        $this->forum_fgd = 1;
        $this->created_at = $peraturan_old["created_at"];
        $this->updated_at = $peraturan_old["updated_at"];

        return $this->db->update($this->_table, $this, array('id_peraturan' => $id_peraturan));
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './peraturan/';
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
