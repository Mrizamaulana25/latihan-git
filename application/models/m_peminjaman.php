<?php
class m_peminjaman extends CI_Model
{
    private $table = "peminjaman";
    function nootomatis()
    {
        $today = date('Ymd');

        //$query = mysql_query("select max(id_peminjaman) as last from peminjaman where id_peminjaman like '$today%'");
        //$data = mysql_fetch_array($query);

        $conn = mysqli_connect("localhost", "root", "", "ci");
        $query = mysqli_query($conn, "select max(id_peminjaman) as last from peminjaman where id_peminjaman like '$today%'");
        $data = mysqli_fetch_array($query);

        $lastNoFaktur = $data['last'];
        $lastNoUrut = substr($lastNoFaktur, 8, 3);
        $nextNoUrut = intval($lastNoUrut) + 1;
        $nextNoTransaksi = $today . sprintf('%03s', $nextNoUrut);
        return $nextNoTransaksi;
    }
    function getMhs()
    {
        return $this->db->get("mahasiswa");
    }
    function cariMahasiswa($No)
    {
        $this->db->where("No", $No);
        return $this->db->get("mahasiswa");
    }
    function cariBuku($kode)
    {
        $this->db->where("jenis_paket", $kode);
        return $this->db->get("buku");
    }
    function simpanTmp($info)
    {
        $this->db->insert("tmp", $info);
    }
    function tampilTmp()
    {
        return $this->db->get("tmp");
    }
    function cekTmp($kode)
    {
        $this->db->where("jenis_paket", $kode);
        return $this->db->get("tmp");
    }
    function jumlahTmp()
    {
        // $jml = "SELECT COUNT(harga) FROM tmp";
        // return  $this->db->query($jml);
        return $this->db->COUNT_ALL("tmp");
    }
    function hapusTmp($kode)
    {
        $this->db->where("jenis_paket", $kode);
        $this->db->delete("tmp");
    }
    function simpan($info)
    {
        $this->db->insert("peminjaman", $info);
    }
    function pencarianbuku($cari)
    {
        $this->db->like("keterangan", $cari);
        return $this->db->get("buku");
    }
}
