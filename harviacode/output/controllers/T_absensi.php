<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_absensi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_absensi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_absensi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_absensi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_absensi/index.html';
            $config['first_url'] = base_url() . 't_absensi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_absensi_model->total_rows($q);
        $t_absensi = $this->T_absensi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_absensi_data' => $t_absensi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t_absensi/t_absensi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_absensi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_absensi' => $row->id_absensi,
		'id_siswa_kelas' => $row->id_siswa_kelas,
		'id_tahun_semester' => $row->id_tahun_semester,
		'sakit' => $row->sakit,
		'ijin' => $row->ijin,
		'alpa' => $row->alpa,
	    );
            $this->load->view('t_absensi/t_absensi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_absensi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_absensi/create_action'),
	    'id_absensi' => set_value('id_absensi'),
	    'id_siswa_kelas' => set_value('id_siswa_kelas'),
	    'id_tahun_semester' => set_value('id_tahun_semester'),
	    'sakit' => set_value('sakit'),
	    'ijin' => set_value('ijin'),
	    'alpa' => set_value('alpa'),
	);
        $this->load->view('t_absensi/t_absensi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_siswa_kelas' => $this->input->post('id_siswa_kelas',TRUE),
		'id_tahun_semester' => $this->input->post('id_tahun_semester',TRUE),
		'sakit' => $this->input->post('sakit',TRUE),
		'ijin' => $this->input->post('ijin',TRUE),
		'alpa' => $this->input->post('alpa',TRUE),
	    );

            $this->T_absensi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_absensi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_absensi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_absensi/update_action'),
		'id_absensi' => set_value('id_absensi', $row->id_absensi),
		'id_siswa_kelas' => set_value('id_siswa_kelas', $row->id_siswa_kelas),
		'id_tahun_semester' => set_value('id_tahun_semester', $row->id_tahun_semester),
		'sakit' => set_value('sakit', $row->sakit),
		'ijin' => set_value('ijin', $row->ijin),
		'alpa' => set_value('alpa', $row->alpa),
	    );
            $this->load->view('t_absensi/t_absensi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_absensi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_absensi', TRUE));
        } else {
            $data = array(
		'id_siswa_kelas' => $this->input->post('id_siswa_kelas',TRUE),
		'id_tahun_semester' => $this->input->post('id_tahun_semester',TRUE),
		'sakit' => $this->input->post('sakit',TRUE),
		'ijin' => $this->input->post('ijin',TRUE),
		'alpa' => $this->input->post('alpa',TRUE),
	    );

            $this->T_absensi_model->update($this->input->post('id_absensi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_absensi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_absensi_model->get_by_id($id);

        if ($row) {
            $this->T_absensi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_absensi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_absensi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_siswa_kelas', 'id siswa kelas', 'trim|required');
	$this->form_validation->set_rules('id_tahun_semester', 'id tahun semester', 'trim|required');
	$this->form_validation->set_rules('sakit', 'sakit', 'trim|required');
	$this->form_validation->set_rules('ijin', 'ijin', 'trim|required');
	$this->form_validation->set_rules('alpa', 'alpa', 'trim|required');

	$this->form_validation->set_rules('id_absensi', 'id_absensi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_absensi.xls";
        $judul = "t_absensi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Siswa Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun Semester");
	xlsWriteLabel($tablehead, $kolomhead++, "Sakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Ijin");
	xlsWriteLabel($tablehead, $kolomhead++, "Alpa");

	foreach ($this->T_absensi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_siswa_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tahun_semester);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sakit);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ijin);
	    xlsWriteNumber($tablebody, $kolombody++, $data->alpa);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_absensi.doc");

        $data = array(
            't_absensi_data' => $this->T_absensi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_absensi/t_absensi_doc',$data);
    }

}

/* End of file T_absensi.php */
/* Location: ./application/controllers/T_absensi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:25 */
/* http://harviacode.com */