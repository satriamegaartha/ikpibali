<?php defined('BASEPATH') or exit('No direct script access allowed');

class Komentar_fgd_model extends CI_Model
{
    private $_table = "komentar_fgd";

    public $id_komentarfgd;
    public $konten;
    public $id_user;
    public $id_forum;
    public $parent;
    public $created_at;
    public $updated_at;

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
}
