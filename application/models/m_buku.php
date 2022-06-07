<?php
class m_buku extends CI_Model
{
    private $table = "buku";
    private $primary = "jenis_paket";
    function tampilData()
    {
        if (empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary, 'asc');
        else
            $this->db->order_by();
        return $this->db->get($this->table);
    }
    function jumlah()
    {
        return $this->db->count_all($this->table);
    }
    function cek($id)
    {
        $this->db->where($this->primary, $id);
        $query = $this->db->get($this->table);
        return $query;
    }
    function simpan($coba)
    {
        $this->db->insert($this->table, $coba);
        return $this->db->insert_id();
    }
    function update($jenis_paket, $harga)
    {
        $this->db->where($this->primary, $jenis_paket);
        $this->db->update($this->table, $harga);
    }
    function hapus($jenis_paket)
    {
        $this->db->where($this->primary, $jenis_paket);
        $this->db->delete($this->table);
    }
    function cari($cari)
    {
        $this->db->like($this->primary, $cari);
        $this->db->or_like("keterangan", $cari);
        return $this->db->get($this->table);
    }
}
