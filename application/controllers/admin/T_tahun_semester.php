<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_tahun_semester extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_tahun_semester_model');
        $this->load->model('T_bantuan_semua_model', 'bantuan');  
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/t_tahun_semester/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/t_tahun_semester/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/t_tahun_semester/index.html';
            $config['first_url'] = base_url() . 'admin/t_tahun_semester/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_tahun_semester_model->total_rows($q);
        $t_tahun_semester = $this->T_tahun_semester_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_tahun_semester_data' => $t_tahun_semester,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
        $this->load->view('admin/t_tahun_semester/t_tahun_semester_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->T_tahun_semester_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tahun_semester' => $row->id_tahun_semester,
		'id_tahun' => $row->id_tahun,
		'semester' => $row->semester,
	    );
            $this->load->view('admin/header');
            $this->load->view('admin/t_tahun_semester/t_tahun_semester_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_tahun_semester'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/t_tahun_semester/create_action'),
    	    'id_tahun_semester' => set_value('id_tahun_semester'),
    	    'id_tahun' => set_value('id_tahun'),
    	    'semester' => set_value('semester'),
            'data_tahun' => $this->bantuan->get_tahun_all(),
	       );
        $this->load->view('admin/header');
        $this->load->view('admin/t_tahun_semester/t_tahun_semester_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'semester' => $this->input->post('semester',TRUE),
	    );

            $this->T_tahun_semester_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_tahun_semester'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_tahun_semester_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/t_tahun_semester/update_action'),
        		'id_tahun_semester' => set_value('id_tahun_semester', $row->id_tahun_semester),
        		'id_tahun' => set_value('id_tahun', $row->id_tahun),
        		'semester' => set_value('semester', $row->semester),
	    );
            $this->load->view('admin/header');
            $this->load->view('admin/t_tahun_semester/t_tahun_semester_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_tahun_semester'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tahun_semester', TRUE));
        } else {
            $data = array(
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'semester' => $this->input->post('semester',TRUE),
	    );

            $this->T_tahun_semester_model->update($this->input->post('id_tahun_semester', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_tahun_semester'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_tahun_semester_model->get_by_id($id);

        if ($row) {
            $this->T_tahun_semester_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_tahun_semester'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_tahun_semester'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_tahun', 'id tahun', 'trim|required');
	$this->form_validation->set_rules('semester', 'semester', 'trim|required');

	$this->form_validation->set_rules('id_tahun_semester', 'id_tahun_semester', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_tahun_semester.xls";
        $judul = "t_tahun_semester";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Semester");

	foreach ($this->T_tahun_semester_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->semester);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_tahun_semester.doc");

        $data = array(
            't_tahun_semester_data' => $this->T_tahun_semester_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('admin/t_tahun_semester/t_tahun_semester_doc',$data);
    }

}

/* End of file T_tahun_semester.php */
/* Location: ./application/controllers/T_tahun_semester.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:29 */
/* http://harviacode.com */