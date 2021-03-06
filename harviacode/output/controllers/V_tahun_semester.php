<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_tahun_semester extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('V_tahun_semester_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'v_tahun_semester/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'v_tahun_semester/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'v_tahun_semester/index.html';
            $config['first_url'] = base_url() . 'v_tahun_semester/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->V_tahun_semester_model->total_rows($q);
        $v_tahun_semester = $this->V_tahun_semester_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'v_tahun_semester_data' => $v_tahun_semester,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('v_tahun_semester/v_tahun_semester_list', $data);
    }

    public function read($id) 
    {
        $row = $this->V_tahun_semester_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tahun_semester' => $row->id_tahun_semester,
		'id_tahun' => $row->id_tahun,
		'semester' => $row->semester,
		'tahun' => $row->tahun,
	    );
            $this->load->view('v_tahun_semester/v_tahun_semester_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_tahun_semester'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('v_tahun_semester/create_action'),
	    'id_tahun_semester' => set_value('id_tahun_semester'),
	    'id_tahun' => set_value('id_tahun'),
	    'semester' => set_value('semester'),
	    'tahun' => set_value('tahun'),
	);
        $this->load->view('v_tahun_semester/v_tahun_semester_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tahun_semester' => $this->input->post('id_tahun_semester',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->V_tahun_semester_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('v_tahun_semester'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->V_tahun_semester_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('v_tahun_semester/update_action'),
		'id_tahun_semester' => set_value('id_tahun_semester', $row->id_tahun_semester),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
		'semester' => set_value('semester', $row->semester),
		'tahun' => set_value('tahun', $row->tahun),
	    );
            $this->load->view('v_tahun_semester/v_tahun_semester_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_tahun_semester'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_tahun_semester' => $this->input->post('id_tahun_semester',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'semester' => $this->input->post('semester',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->V_tahun_semester_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('v_tahun_semester'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->V_tahun_semester_model->get_by_id($id);

        if ($row) {
            $this->V_tahun_semester_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('v_tahun_semester'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_tahun_semester'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_tahun_semester', 'id tahun semester', 'trim|required');
	$this->form_validation->set_rules('id_tahun', 'id tahun', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v_tahun_semester.xls";
        $judul = "v_tahun_semester";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun Semester");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Semester");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");

	foreach ($this->V_tahun_semester_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tahun_semester);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->semester);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=v_tahun_semester.doc");

        $data = array(
            'v_tahun_semester_data' => $this->V_tahun_semester_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('v_tahun_semester/v_tahun_semester_doc',$data);
    }

}

/* End of file V_tahun_semester.php */
/* Location: ./application/controllers/V_tahun_semester.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:32 */
/* http://harviacode.com */