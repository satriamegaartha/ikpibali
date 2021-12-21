<?php defined('BASEPATH') or exit('No direct script access allowed');

class Komentar_fgd_model extends CI_Model
{
    private $_table = "komentar_fgd";

    public $id_komentarfgd;
    public $konten;
    public $id_user;
    public $id_forumfgd;
    public $parent;
    public $created_at;
    public $updated_at;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_komentarfgd)
    {
        return $this->db->get_where($this->_table, ["id_komentarfgd" => $id_komentarfgd])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();

        $this->id_komentarfgd = "";
        $this->konten = $post["konten"];
        $this->id_user = $this->session->userdata('id_login');
        $this->id_forumfgd = $post["id_forumfgd"];
        $this->parent = $post["parent"];
        $this->updated_at = date('Y-m-d H:i:s');

        return $this->db->insert($this->_table, $this);
    }


    public function getKomentarByIdForumParent($id)
    {
        $query = "SELECT `komentar_fgd`.*, `anggota`.`nama` as `namauser`, `anggota`.`profile` as `profileuser`
                  FROM `komentar_fgd` 
                  JOIN `anggota`
                  ON `komentar_fgd`.`id_user` = `anggota`.`nra`   
                  WHERE `komentar_fgd`.`id_forumfgd` = $id AND `komentar_fgd`.`parent` = 0
                  ORDER BY `komentar_fgd`.`created_at` DESC                                     
                ";
        return $this->db->query($query)->result_array();
    }

    public function getKomentarByIdForumChild($id)
    {
        $query = "SELECT `komentar_fgd`.*, `anggota`.`nama` as `namauser`, `anggota`.`profile` as `profileuser`
                  FROM `komentar_fgd` 
                  JOIN `anggota`
                  ON `komentar_fgd`.`id_user` = `anggota`.`nra`   
                  WHERE `komentar_fgd`.`id_forumfgd` = $id AND `komentar_fgd`.`parent` != 0
                  ORDER BY `komentar_fgd`.`created_at` ASC                                  
                ";
        return $this->db->query($query)->result_array();
    }
}
