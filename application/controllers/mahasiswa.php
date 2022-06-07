<?php
class mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //Statment
        $this->load->library(array('template', 'pagination', 'form_validation', 'upload'));
        $this->load->model('m_mahasiswa');
    }

    // function index()
    // {
    //     $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
    //     //print_r($data['mahasiswa']);
    //     //exit();
    //     $this->load->view('mahasiswa', $data);
    // }

    function index()
    {
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
        $config['base_url'] = site_url('mahasiswa/index/');

        if ($this->uri->segment(3) == "delete_success")
            $data['message'] = "<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if ($this->uri->segment(3) == "add_success")
            $data['message'] = "<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message'] = '';
        $this->template->display('mahasiswa/index', $data);
    }

    // function tambah()
    // {
    //     $this->load->helper('url');
    //     $this->load->view('input_mahasiswa.php');
    // }

    function tambah()
    {
        $No = $this->input->post('No');
        if ($No <> "") {
            $cek = $this->m_mahasiswa->cek($No);
            if ($cek->num_rows() > 0) {
                $data['message'] = "<div class='alert alert-warning'>No sudah digunakan</div>";
                $this->template->display('mahasiswa/tambah', $data);
            } else {
                $isidata = array(
                    'No' => $this->input->post('No'),
                    'No_Hp' => $this->input->post('No_Hp'),
                    'nama' => $this->input->post('nama'),
                    'jenis_sepatu' => $this->input->post('jenis_sepatu'),
                    'alamat' => $this->input->post('alamat')
                );
                $this->m_mahasiswa->simpan($isidata);
                redirect('mahasiswa/index/add_success');
            }
        } else {
            $data['message'] = "";
            $this->template->display('mahasiswa/tambah', $data);
        }
    }

    function insert()
    {
        $No = $this->input->post('No');
        $No_Hp = $this->input->post('No_Hp');
        $nama = $this->input->post('nama');
        $jenis_sepatu = $this->input->post('jenis_sepatu');
        $alamat = $this->input->post('alamat');

        $data = array(
            'No' => $No,
            'No_Hp' => $No_Hp,
            'nama' => $nama,
            'jenis_sepatu' => $jenis_sepatu,
            'alamat' => $alamat
        );

        $this->m_mahasiswa->save($data);
        redirect('mahasiswa/index');
    }

    function edit($id) //123
    {
        $No = $this->input->post('No');
        $No_Hp = $this->input->post('No_Hp');
        $nama = $this->input->post('nama');
        $jenis_sepatu = $this->input->post('jenis_sepatu');
        $alamat = $this->input->post('alamat');
        if ($No <> "" and $No_Hp <> "" and $nama <> "" and $jenis_sepatu <> "" and $alamat <> "") {
            $isidata = array(
                'No_Hp' => $this->input->post('No_Hp'),
                'nama' => $this->input->post('nama'),
                'jenis_sepatu' => $this->input->post('jenis_sepatu'),
                'alamat' => $this->input->post('alamat')
            );
            $this->m_mahasiswa->update($No, $isidata);
            $data['message'] = "<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $data['mhs'] = $this->m_mahasiswa->cek($id)->row_array();
            $this->template->display('mahasiswa/edit', $data);
        } else {
            $data['mhs'] = $this->m_mahasiswa->cek($id)->row_array();
            $data['message'] = "";
            $this->template->display('mahasiswa/edit', $data);
        }
    }

    // function delete($No)
    // {
    //     $this->m_mahasiswa->delete($No);
    //     redirect('mahasiswa/index');
    // }

    function hapus()
    {
        $No = $this->input->post('kode');
        $this->m_mahasiswa->hapus($No);
    }
}
