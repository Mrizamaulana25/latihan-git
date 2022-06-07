<?php
class peminjaman extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('template', 'pagination', 'form_validation', 'upload'));
        $this->load->model('m_peminjaman');
    }

    function index()
    {
        $data['title'] = "Transaksi order";
        $data['tgl_order'] = date('Y-m-d');
        $data['tgl_penerimaan'] = strtotime('+3 day', strtotime($data['tgl_order']));
        $data['noauto'] = $this->m_peminjaman->nootomatis();
        $data['anggota'] = $this->m_peminjaman->getMhs()->result();
        $data['tgl_penerimaan'] = date('Y-m-d', $data['tgl_penerimaan']);
        $this->template->display('peminjaman/index', $data);
    }
    function tampil()
    {
        $data['tmp'] = $this->m_peminjaman->tampilTmp()->result();
        $data['jumlahTmp'] = $this->m_peminjaman->jumlahTmp();
        $this->load->view('peminjaman/tampil', $data);
    }
    function sukses()
    {
        $tmp = $this->m_peminjaman->tampilTmp()->result();
        foreach ($tmp as $row) {
            $info = array(
                'id_peminjaman' => $this->input->post('id_peminjaman'),
                'No' => $this->input->post('No'),
                'nama' => $this->input->post('nama'),
                'jenis_paket' => $row->jenis_paket,
                'tgl_order' => $this->input->post('tgl_order'),
                'tgl_penerimaan' => $this->input->post('tgl_penerimaan'),
            );
            $this->m_peminjaman->simpan($info);
            //hapus data di temporary
            $this->m_peminjaman->hapusTmp($row->jenis_paket);
        }
    }
    function cariMahasiswa()
    {
        $No = $this->input->post('No');
        $mhs = $this->m_peminjaman->cariMahasiswa($No);
        if ($mhs->num_rows() > 0) {
            $mhs = $mhs->row_array();
            echo $mhs['nama'];
        }
    }

    function cariBuku()
    {
        $kode = $this->input->post('kode');
        $buku = $this->m_peminjaman->cariBuku($kode);
        if ($buku->num_rows() > 0) {
            $buku = $buku->row_array();
            echo $buku['keterangan'] . "|" . $buku['harga'];
        }
    }

    function tambah()
    {
        $kode = $this->input->post('kode');
        $cek = $this->m_peminjaman->cekTmp($kode);
        if ($cek->num_rows() < 1) {
            $isidata = array(
                'jenis_paket' => $this->input->post('kode'),
                'keterangan' => $this->input->post('keterangan'),
                'harga' => $this->input->post('harga')
            );
            $this->m_peminjaman->simpanTmp($isidata);
        }
    }

    function hapus()
    {
        $kode = $this->input->post('kode');
        $this->m_peminjaman->hapusTmp($kode);
    }
    function pencarianbuku()
    {
        $cari = $this->input->post('caribuku');
        $data['buku'] = $this->m_peminjaman->pencarianbuku($cari)->result();
        $this->load->view('peminjaman/pencarianbuku', $data);
    }
}
