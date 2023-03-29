<?php
defined('BASEPATH') or exit('No direct script access allowed');

class detail_qc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
        $this->load->database();
    }

    public function index()
    {
        $data['title'] = "Detail QC";
        $data['detail_qc'] = $this->admin->get('detail_qc');
        $this->template->load('templates/dashboard', 'detail_qc/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('detail_qc', 'Detail QC', 'required|trim');
    }

    public function add()
    {
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Detail QC PT Siemens Indonesia";
            $this->template->load('templates/dashboard', 'detail_qc/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $insert = $this->admin->insert('detail_qc', $input);
            if ($insert) {
                set_pesan('Data has been saved!');
                redirect('detail_qc');
            } else {
                set_pesan('Something went wrong', false);
                redirect('detail_qc/add');
            }
        }
    }

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Detail QC";
            $data['detail_qc'] = $this->admin->get('detail_qc', ['id_detail_qc' => $id]);
            $this->template->load('templates/dashboard', 'detail_qc/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('detail_qc', 'id_detail_qc', $id, $input);
            if ($update) {
                set_pesan('Data Saved!');
                redirect('detail_qc');
            } else {
                set_pesan('Something went wrong', false);
                redirect('detail_qc/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->admin->delete('detail_qc', 'id_detail_qc', $id)) {
            set_pesan('Data Deleted');
        } else {
            set_pesan('Something went wrong', false);
        }
        redirect('detail_qc');
    }

    public function detail($id)
    {
        $data['title'] = "Detail QC";
        $data['detail_qc'] = $this->admin->get('detail_qc');
        $data['nama'] = $this->db->select('nama_jenis')->where('id_jenis', $id)->get('jenis')->result_array()[0]['nama_jenis'];
        $this->template->load('templates/dashboard', 'detail_qc/data', $data);
    }
}
