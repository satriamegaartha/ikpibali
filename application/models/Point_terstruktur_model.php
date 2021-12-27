<?php defined('BASEPATH') or exit('No direct script access allowed');

class Point_terstruktur_model extends CI_Model
{
    private $_table = "point_terstruktur";

    public $id;
    public $id_peserta;
    public $id_event;
    public $point;
    public $role;
    public $tanggal;

    public function getByPeserta($id_peserta)
    {
        $query = "SELECT `point_terstruktur`.*, `ppl`.`nama` as `namappl`
                  FROM `point_terstruktur` 
                  JOIN `ppl`
                  ON `point_terstruktur`.`id_event` = `ppl`.`id_ppl`                 
                  WHERE `point_terstruktur`.`id_peserta` = $id_peserta    
                ";
        return  $this->db->query($query)->result_array();
    }

    public function getByPesertaByTahun($id_peserta, $tahun_select)
    {
        // $tgl_start = $tahun_select . '-01-01';
        $tgl_start = $tahun_select . '-01-01';
        $tgl_stop = $tahun_select . '-12-31';

        $query = "SELECT `point_terstruktur`.*, `ppl`.`nama` as `namappl` 
                    FROM `point_terstruktur` 
                    JOIN `ppl` 
                    ON `point_terstruktur`.`id_event` = `ppl`.`id_ppl` 
                    WHERE `point_terstruktur`.`id_peserta` = $id_peserta 
                    AND `point_terstruktur`.`tanggal` >= '$tgl_start'
                    AND `point_terstruktur`.`tanggal` <= '$tgl_stop'";
        return  $this->db->query($query)->result_array();
    }

    public function getTahun()
    {
        $this->db->select('tanggal');
        $this->db->from($this->_table);
        $this->db->order_by("tanggal", "desc");
        $temp = $this->db->get()->result_array();
        $temp2 = [];
        foreach ($temp as $t) {
            $date = date('Y', strtotime($t['tanggal']));
            array_push($temp2, $date);
        }
        $tahun = array_unique($temp2);
        return $tahun;
    }

    public function insert($id_peserta, $id_event, $point, $role, $tanggal)
    {
        $this->db->select('*');
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('id_event', $id_event);
        $check = $this->db->get($this->_table)->row_array();

        if ($check == NULL) {
            $this->id = "";
            $this->id_peserta = $id_peserta;
            $this->id_event = $id_event;
            $this->point = $point;
            $this->role = $role;
            $this->tanggal = $tanggal;
            return $this->db->insert($this->_table, $this);
        }
    }
    public function delete($id_peserta, $id_event)
    {
        $this->db->where('id_peserta', $id_peserta);
        $this->db->where('id_event', $id_event);
        return $this->db->delete($this->_table);
    }
}
