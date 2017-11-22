<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_kelas_tahun_ajaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('V_kelas_tahun_ajaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'v_kelas_tahun_ajaran/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'v_kelas_tahun_ajaran/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'v_kelas_tahun_ajaran/index.html';
            $config['first_url'] = base_url() . 'v_kelas_tahun_ajaran/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->V_kelas_tahun_ajaran_model->total_rows($q);
        $v_kelas_tahun_ajaran = $this->V_kelas_tahun_ajaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'v_kelas_tahun_ajaran_data' => $v_kelas_tahun_ajaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('v_kelas_tahun_ajaran/v_kelas_tahun_ajaran_list', $data);
    }

    public function read($id) 
    {
        $row = $this->V_kelas_tahun_ajaran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kelas_tahun_ajaran' => $row->id_kelas_tahun_ajaran,
		'id_kelas' => $row->id_kelas,
		'id_tahun' => $row->id_tahun,
		'nama_wali_kelas' => $row->nama_wali_kelas,
		'nama_kelas' => $row->nama_kelas,
		'tahun' => $row->tahun,
	    );
            $this->load->view('v_kelas_tahun_ajaran/v_kelas_tahun_ajaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_kelas_tahun_ajaran'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('v_kelas_tahun_ajaran/create_action'),
	    'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran'),
	    'id_kelas' => set_value('id_kelas'),
	    'id_tahun' => set_value('id_tahun'),
	    'nama_wali_kelas' => set_value('nama_wali_kelas'),
	    'nama_kelas' => set_value('nama_kelas'),
	    'tahun' => set_value('tahun'),
	);
        $this->load->view('v_kelas_tahun_ajaran/v_kelas_tahun_ajaran_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_kelas_tahun_ajaran' => $this->input->post('id_kelas_tahun_ajaran',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'nama_wali_kelas' => $this->input->post('nama_wali_kelas',TRUE),
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->V_kelas_tahun_ajaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('v_kelas_tahun_ajaran'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->V_kelas_tahun_ajaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('v_kelas_tahun_ajaran/update_action'),
		'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran', $row->id_kelas_tahun_ajaran),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
		'nama_wali_kelas' => set_value('nama_wali_kelas', $row->nama_wali_kelas),
		'nama_kelas' => set_value('nama_kelas', $row->nama_kelas),
		'tahun' => set_value('tahun', $row->tahun),
	    );
            $this->load->view('v_kelas_tahun_ajaran/v_kelas_tahun_ajaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_kelas_tahun_ajaran'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_kelas_tahun_ajaran' => $this->input->post('id_kelas_tahun_ajaran',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'nama_wali_kelas' => $this->input->post('nama_wali_kelas',TRUE),
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->V_kelas_tahun_ajaran_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('v_kelas_tahun_ajaran'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->V_kelas_tahun_ajaran_model->get_by_id($id);

        if ($row) {
            $this->V_kelas_tahun_ajaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('v_kelas_tahun_ajaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('v_kelas_tahun_ajaran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_kelas_tahun_ajaran', 'id kelas tahun ajaran', 'trim|required');
	$this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
	$this->form_validation->set_rules('id_tahun', 'id tahun', 'trim|required');
	$this->form_validation->set_rules('nama_wali_kelas', 'nama wali kelas', 'trim|required');
	$this->form_validation->set_rules('nama_kelas', 'nama kelas', 'trim|required');
	$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v_kelas_tahun_ajaran.xls";
        $judul = "v_kelas_tahun_ajaran";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas Tahun Ajaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wali Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");

	foreach ($this->V_kelas_tahun_ajaran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kelas_tahun_ajaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tahun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wali_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kelas);
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
        header("Content-Disposition: attachment;Filename=v_kelas_tahun_ajaran.doc");

        $data = array(
            'v_kelas_tahun_ajaran_data' => $this->V_kelas_tahun_ajaran_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('v_kelas_tahun_ajaran/v_kelas_tahun_ajaran_doc',$data);
    }

}

/* End of file V_kelas_tahun_ajaran.php */
/* Location: ./application/controllers/V_kelas_tahun_ajaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:30 */
/* http://harviacode.com */