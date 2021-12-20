<?php defined('BASEPATH') or exit('No direct script access allowed');

class Member_model extends CI_Model
{
    private $_table = "member";

    public $id_member;
    public $nama;
    public $alamat;
    public $email;
    public $password;
    public $notelp;
    public $created_at;
    public $updated_at;

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            $isPasswordTrue = $post["password"] == $user->password;
            // jika password benar dan dia admin
            if ($isPasswordTrue) {
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->session->set_userdata(['role' => 'Member']);
                $this->session->set_userdata(['nama' => $user->nama]);
                $this->session->set_userdata(['id_member' => $user->id_member]);
                $this->session->set_userdata(['id_login' => $user->id_member]);
                return true;
            }
        }

        // login gagal
        return false;
    }
}
