<?php defined('BASEPATH') or exit('No direct script access allowed');

class Forum_fgd_model extends CI_Model
{
    private $_table = "forum_fgd";

    public $id_forumfgd;
    public $judul;
    public $slug;
    public $konten;
    public $id_user;
    public $created_at;
    public $updated_at;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    public function getForumFgd()
    {
        $query = "SELECT `forum_fgd`.*, `anggota`.`nama` as `namauser`, `anggota`.`profile` as `profileuser`
                  FROM `forum_fgd` 
                  JOIN `anggota`
                  ON `forum_fgd`.`id_user` = `anggota`.`nra`   
                  ORDER BY `forum_fgd`.`created_at` DESC;                                   
                ";
        return $this->db->query($query)->result_array();
    }
    public function getForumFgdAll($id)
    {
        $query = "SELECT `forum_fgd`.*, `anggota`.`nama` as `namauser`, `anggota`.`profile` as `profileuser`
                  FROM `forum_fgd` 
                  JOIN `anggota`
                  ON `forum_fgd`.`id_user` = `anggota`.`nra`   
                  WHERE `forum_fgd`.`id_forumfgd` = $id                                      
                ";
        return $this->db->query($query)->row_array();
    }

    public function save()
    {
        $post = $this->input->post();

        $peraturan = $this->db->get_where('peraturan', ["id_peraturan" => $post["id_peraturan"]])->row_array();

        $this->id_forumfgd = "";
        $this->judul = $peraturan["nama"];
        $this->slug = url_title($peraturan["nama"], 'dash', true);
        $this->konten = $post["konten"];
        $this->id_user = $this->session->userdata('id_login');
        $this->id_peraturan = $post["id_peraturan"];

        return $this->db->insert($this->_table, $this);
    }
}
