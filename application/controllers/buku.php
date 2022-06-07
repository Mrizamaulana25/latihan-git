<?php
class buku extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('template', 'pagination', 'form_validation', 'upload'));
        $this->load->model('m_buku');
    }
    function index()
    {
        $data['buku'] = $this->m_buku->tampilData()->result();
        $config['base_url'] = site_url('buku/index/');
        if ($this->uri->segment(3) == "delete_success")
            $data['message'] = "<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if ($this->uri->segment(3) == "add_success")
            $data['message'] = "<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message'] = '';
        $this->template->display('buku/index', $data);
    }
    function tambah()
    {
        $jenis_paket = $this->input->post('jenis_paket');
        if ($jenis_paket <> "") {
            $cek = $this->m_buku->cek($jenis_paket);
            if ($cek->num_rows() > 0) {
                $data['message'] = "<div class='alert alert-warning'>Buku sudah digunakan</div>";
                $this->template->display('buku/tambah', $data);
            } else {
                $isidata = array(
                    'jenis_paket' => $this->input->post('jenis_paket'),
                    'keterangan' => $this->input->post('keterangan'),
                    'harga' => $this->input->post('harga')
                );
                $this->m_buku->simpan($isidata);
                redirect('buku/index/add_success');
            }
        } else {
            $data['message'] = "";
            $this->template->display('buku/tambah', $data);
        }
    }
    function hapus()
    {
        $jenis_paket = $this->input->post('jenis_paket');
        $this->m_buku->hapus($jenis_paket);
    }
    function edit($id)
    {
        $jenis_paket = $this->input->post('jenis_paket');
        $keterangan = $this->input->post('keterangan');
        $harga = $this->input->post('harga');
        if ($jenis_paket <> "" and $keterangan <> "" and $harga <> "") {
            $isidata = array(
                'keterangan' => $this->input->post('keterangan'),
                'harga' => $this->input->post('harga')

            );
            $this->m_buku->update($jenis_paket, $isidata);
            $data['message'] = "<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['bk'] = $this->m_buku->cek($id)->row_array();
            $this->template->display('buku/edit', $data);
        } else {
            $data['bk'] = $this->m_buku->cek($id)->row_array();
            $data['message'] = "";
            $this->template->display('buku/edit', $data);
        }
    }
}
