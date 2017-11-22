<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kelas_tahun_ajaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_kelas_tahun_ajaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_kelas_tahun_ajaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_kelas_tahun_ajaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_kelas_tahun_ajaran/index.html';
            $config['first_url'] = base_url() . 't_kelas_tahun_ajaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_kelas_tahun_ajaran_model->total_rows($q);
        $t_kelas_tahun_ajaran = $this->T_kelas_tahun_ajaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_kelas_tahun_ajaran_data' => $t_kelas_tahun_ajaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t_kelas_tahun_ajaran/t_kelas_tahun_ajaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_kelas_tahun_ajaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kelas_tahun_ajaran' => $row->id_kelas_tahun_ajaran,
		'id_kelas' => $row->id_kelas,
		'id_tahun' => $row->id_tahun,
		'nama_wali_kelas' => $row->nama_wali_kelas,
		'pass' => $row->pass,
		'token' => $row->token,
	    );
            $this->load->view('t_kelas_tahun_ajaran/t_kelas_tahun_ajaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kelas_tahun_ajaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_kelas_tahun_ajaran/create_action'),
	    'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran'),
	    'id_kelas' => set_value('id_kelas'),
	    'id_tahun' => set_value('id_tahun'),
	    'nama_wali_kelas' => set_value('nama_wali_kelas'),
	    'pass' => set_value('pass'),
	    'token' => set_value('token'),
	);
        $this->load->view('t_kelas_tahun_ajaran/t_kelas_tahun_ajaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'nama_wali_kelas' => $this->input->post('nama_wali_kelas',TRUE),
		'pass' => $this->input->post('pass',TRUE),
		'token' => $this->input->post('token',TRUE),
	    );

            $this->T_kelas_tahun_ajaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_kelas_tahun_ajaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_kelas_tahun_ajaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_kelas_tahun_ajaran/update_action'),
		'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran', $row->id_kelas_tahun_ajaran),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
		'nama_wali_kelas' => set_value('nama_wali_kelas', $row->nama_wali_kelas),
		'pass' => set_value('pass', $row->pass),
		'token' => set_value('token', $row->token),
	    );
            $this->load->view('t_kelas_tahun_ajaran/t_kelas_tahun_ajaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kelas_tahun_ajaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelas_tahun_ajaran', TRUE));
        } else {
            $data = array(
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'nama_wali_kelas' => $this->input->post('nama_wali_kelas',TRUE),
		'pass' => $this->input->post('pass',TRUE),
		'token' => $this->input->post('token',TRUE),
	    );

            $this->T_kelas_tahun_ajaran_model->update($this->input->post('id_kelas_tahun_ajaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_kelas_tahun_ajaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_kelas_tahun_ajaran_model->get_by_id($id);

        if ($row) {
            $this->T_kelas_tahun_ajaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_kelas_tahun_ajaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_kelas_tahun_ajaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
	$this->form_validation->set_rules('id_tahun', 'id tahun', 'trim|required');
	$this->form_validation->set_rules('nama_wali_kelas', 'nama wali kelas', 'trim|required');
	$this->form_validation->set_rules('pass', 'pass', 'trim|required');
	$this->form_validation->set_rules('token', 'token', 'trim|required');

	$this->form_validation->set_rules('id_kelas_tahun_ajaran', 'id_kelas_tahun_ajaran', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_kelas_tahun_ajaran.xls";
        $judul = "t_kelas_tahun_ajaran";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wali Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Pass");
	xlsWriteLabel($tablehead, $kolomhead++, "Token");

	foreach ($this->T_kelas_tahun_ajaran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wali_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pass);
	    xlsWriteLabel($tablebody, $kolombody++, $data->token);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_kelas_tahun_ajaran.doc");

        $data = array(
            't_kelas_tahun_ajaran_data' => $this->T_kelas_tahun_ajaran_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_kelas_tahun_ajaran/t_kelas_tahun_ajaran_doc',$data);
    }

}

/* End of file T_kelas_tahun_ajaran.php */
/* Location: ./application/controllers/T_kelas_tahun_ajaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:27 */
/* http://harviacode.com */