<?php
class laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('template', 'pagination', 'form_validation', 'upload'));
        $this->load->model('m_laporan');
    }
    function index()
    {
        $data['laporan'] = $this->m_laporan->tampilData()->result();
        $config['base_url'] = site_url('laporan/index/');
        $this->template->display('laporan/index', $data);
    }
}
