<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_mapel_detail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_mapel_detail_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_mapel_detail/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_mapel_detail/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_mapel_detail/index.html';
            $config['first_url'] = base_url() . 't_mapel_detail/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_mapel_detail_model->total_rows($q);
        $t_mapel_detail = $this->T_mapel_detail_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_mapel_detail_data' => $t_mapel_detail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t_mapel_detail/t_mapel_detail_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_mapel_detail_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_mapel_detail' => $row->id_mapel_detail,
		'id_mapel' => $row->id_mapel,
		'id_guru' => $row->id_guru,
		'id_tahun' => $row->id_tahun,
	    );
            $this->load->view('t_mapel_detail/t_mapel_detail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_mapel_detail'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_mapel_detail/create_action'),
	    'id_mapel_detail' => set_value('id_mapel_detail'),
	    'id_mapel' => set_value('id_mapel'),
	    'id_guru' => set_value('id_guru'),
	    'id_tahun' => set_value('id_tahun'),
	);
        $this->load->view('t_mapel_detail/t_mapel_detail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_mapel' => $this->input->post('id_mapel',TRUE),
		'id_guru' => $this->input->post('id_guru',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
	    );

            $this->T_mapel_detail_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_mapel_detail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_mapel_detail_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_mapel_detail/update_action'),
		'id_mapel_detail' => set_value('id_mapel_detail', $row->id_mapel_detail),
		'id_mapel' => set_value('id_mapel', $row->id_mapel),
		'id_guru' => set_value('id_guru', $row->id_guru),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
	    );
            $this->load->view('t_mapel_detail/t_mapel_detail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_mapel_detail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_mapel_detail', TRUE));
        } else {
            $data = array(
		'id_mapel' => $this->input->post('id_mapel',TRUE),
		'id_guru' => $this->input->post('id_guru',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
	    );

            $this->T_mapel_detail_model->update($this->input->post('id_mapel_detail', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_mapel_detail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_mapel_detail_model->get_by_id($id);

        if ($row) {
            $this->T_mapel_detail_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_mapel_detail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_mapel_detail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_mapel', 'id mapel', 'trim|required');
	$this->form_validation->set_rules('id_guru', 'id guru', 'trim|required');
	$this->form_validation->set_rules('id_tahun', 'id tahun', 'trim|required');

	$this->form_validation->set_rules('id_mapel_detail', 'id_mapel_detail', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_mapel_detail.xls";
        $judul = "t_mapel_detail";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mapel");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Guru");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun");

	foreach ($this->T_mapel_detail_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mapel);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_guru);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tahun);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_mapel_detail.doc");

        $data = array(
            't_mapel_detail_data' => $this->T_mapel_detail_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_mapel_detail/t_mapel_detail_doc',$data);
    }

}

/* End of file T_mapel_detail.php */
/* Location: ./application/controllers/T_mapel_detail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:27 */
/* http://harviacode.com */