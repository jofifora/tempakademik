<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_guru_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_guru/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_guru/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_guru/index.html';
            $config['first_url'] = base_url() . 't_guru/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_guru_model->total_rows($q);
        $t_guru = $this->T_guru_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_guru_data' => $t_guru,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t_guru/t_guru_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_guru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_guru' => $row->id_guru,
		'nip' => $row->nip,
		'nama_guru' => $row->nama_guru,
		'password' => $row->password,
		'nuptk' => $row->nuptk,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'alamat' => $row->alamat,
		'agama' => $row->agama,
		'status' => $row->status,
		'jenis_kepegawaian' => $row->jenis_kepegawaian,
	    );
            $this->load->view('t_guru/t_guru_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_guru'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_guru/create_action'),
	    'id_guru' => set_value('id_guru'),
	    'nip' => set_value('nip'),
	    'nama_guru' => set_value('nama_guru'),
	    'password' => set_value('password'),
	    'nuptk' => set_value('nuptk'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'alamat' => set_value('alamat'),
	    'agama' => set_value('agama'),
	    'status' => set_value('status'),
	    'jenis_kepegawaian' => set_value('jenis_kepegawaian'),
	);
        $this->load->view('t_guru/t_guru_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama_guru' => $this->input->post('nama_guru',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nuptk' => $this->input->post('nuptk',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jenis_kepegawaian' => $this->input->post('jenis_kepegawaian',TRUE),
	    );

            $this->T_guru_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_guru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_guru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_guru/update_action'),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'nip' => set_value('nip', $row->nip),
		'nama_guru' => set_value('nama_guru', $row->nama_guru),
		'password' => set_value('password', $row->password),
		'nuptk' => set_value('nuptk', $row->nuptk),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'alamat' => set_value('alamat', $row->alamat),
		'agama' => set_value('agama', $row->agama),
		'status' => set_value('status', $row->status),
		'jenis_kepegawaian' => set_value('jenis_kepegawaian', $row->jenis_kepegawaian),
	    );
            $this->load->view('t_guru/t_guru_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_guru'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_guru', TRUE));
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama_guru' => $this->input->post('nama_guru',TRUE),
		'password' => $this->input->post('password',TRUE),
		'nuptk' => $this->input->post('nuptk',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'status' => $this->input->post('status',TRUE),
		'jenis_kepegawaian' => $this->input->post('jenis_kepegawaian',TRUE),
	    );

            $this->T_guru_model->update($this->input->post('id_guru', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_guru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_guru_model->get_by_id($id);

        if ($row) {
            $this->T_guru_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_guru'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_guru'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('nama_guru', 'nama guru', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nuptk', 'nuptk', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('jenis_kepegawaian', 'jenis kepegawaian', 'trim|required');

	$this->form_validation->set_rules('id_guru', 'id_guru', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_guru.xls";
        $judul = "t_guru";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Nuptk");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kepegawaian");

	foreach ($this->T_guru_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_guru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nuptk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kepegawaian);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_guru.doc");

        $data = array(
            't_guru_data' => $this->T_guru_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_guru/t_guru_doc',$data);
    }

}

/* End of file T_guru.php */
/* Location: ./application/controllers/T_guru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:26 */
/* http://harviacode.com */