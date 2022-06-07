<?php
class m_laporan extends CI_Model
{
    private $table = "peminjaman";
    private $primary = "id_peminjaman";
    function tampilData()
    {
        if (empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary, 'asc');
        else
            $this->db->order_by();
        return $this->db->get($this->table);
    }
}
