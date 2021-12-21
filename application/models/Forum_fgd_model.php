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
    public function getForumFgdActive()
    {
        $query = "SELECT `forum_fgd`.*, `anggota`.`nama` as `namauser`, `anggota`.`profile` as `profileuser`
                  FROM `forum_fgd` 
                  JOIN `anggota`
                  ON `forum_fgd`.`id_user` = `anggota`.`nra`   
                  WHERE `forum_fgd`.`status` = 'Active'
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

    public function getById($id_forumfgd)
    {
        return $this->db->get_where($this->_table, ["id_forumfgd" => $id_forumfgd])->result_array();
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
        $this->status = "Pending";

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();

        $this->id_forumfgd = $post["id_forumfgd"];
        $this->judul = $post["judul"];
        $this->slug =  $post["slug"];
        $this->konten = $post["konten"];
        $this->id_user = $post["id_user"];
        $this->id_peraturan = $post["id_peraturan"];
        $this->status = $post["status"];
        $this->created_at = $post["created_at"];
        $this->updated_at = date('Y-m-d H:i:s');

        return $this->db->update($this->_table, $this, array('id_forumfgd' => $post['id_forumfgd']));
    }
}
