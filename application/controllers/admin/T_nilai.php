<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_nilai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/t_nilai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/t_nilai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/t_nilai/index.html';
            $config['first_url'] = base_url() . 'admin/t_nilai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_nilai_model->total_rows($q);
        $t_nilai = $this->T_nilai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_nilai_data' => $t_nilai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
        $this->load->view('admin/t_nilai/t_nilai_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->T_nilai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_nilai' => $row->id_nilai,
		'id_mapel_detail' => $row->id_mapel_detail,
		'id_siswa_kelas' => $row->id_siswa_kelas,
		'id_tahun_semester' => $row->id_tahun_semester,
		'tugas' => $row->tugas,
		'uts' => $row->uts,
		'uas' => $row->uas,
		'sikap' => $row->sikap,
	    );
            $this->load->view('admin/header');
            $this->load->view('admin/t_nilai/t_nilai_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_nilai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/t_nilai/create_action'),
	    'id_nilai' => set_value('id_nilai'),
	    'id_mapel_detail' => set_value('id_mapel_detail'),
	    'id_siswa_kelas' => set_value('id_siswa_kelas'),
	    'id_tahun_semester' => set_value('id_tahun_semester'),
	    'tugas' => set_value('tugas'),
	    'uts' => set_value('uts'),
	    'uas' => set_value('uas'),
	    'sikap' => set_value('sikap'),
	);
        $this->load->view('admin/header');
        $this->load->view('admin/t_nilai/t_nilai_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_mapel_detail' => $this->input->post('id_mapel_detail',TRUE),
		'id_siswa_kelas' => $this->input->post('id_siswa_kelas',TRUE),
		'id_tahun_semester' => $this->input->post('id_tahun_semester',TRUE),
		'tugas' => $this->input->post('tugas',TRUE),
		'uts' => $this->input->post('uts',TRUE),
		'uas' => $this->input->post('uas',TRUE),
		'sikap' => $this->input->post('sikap',TRUE),
	    );

            $this->T_nilai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_nilai'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_nilai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/t_nilai/update_action'),
		'id_nilai' => set_value('id_nilai', $row->id_nilai),
		'id_mapel_detail' => set_value('id_mapel_detail', $row->id_mapel_detail),
		'id_siswa_kelas' => set_value('id_siswa_kelas', $row->id_siswa_kelas),
		'id_tahun_semester' => set_value('id_tahun_semester', $row->id_tahun_semester),
		'tugas' => set_value('tugas', $row->tugas),
		'uts' => set_value('uts', $row->uts),
		'uas' => set_value('uas', $row->uas),
		'sikap' => set_value('sikap', $row->sikap),
	    );
            $this->load->view('admin/header');
            $this->load->view('admin/t_nilai/t_nilai_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_nilai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_nilai', TRUE));
        } else {
            $data = array(
		'id_mapel_detail' => $this->input->post('id_mapel_detail',TRUE),
		'id_siswa_kelas' => $this->input->post('id_siswa_kelas',TRUE),
		'id_tahun_semester' => $this->input->post('id_tahun_semester',TRUE),
		'tugas' => $this->input->post('tugas',TRUE),
		'uts' => $this->input->post('uts',TRUE),
		'uas' => $this->input->post('uas',TRUE),
		'sikap' => $this->input->post('sikap',TRUE),
	    );

            $this->T_nilai_model->update($this->input->post('id_nilai', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_nilai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_nilai_model->get_by_id($id);

        if ($row) {
            $this->T_nilai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_nilai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_nilai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_mapel_detail', 'id mapel detail', 'trim|required');
	$this->form_validation->set_rules('id_siswa_kelas', 'id siswa kelas', 'trim|required');
	$this->form_validation->set_rules('id_tahun_semester', 'id tahun semester', 'trim|required');
	$this->form_validation->set_rules('tugas', 'tugas', 'trim|required');
	$this->form_validation->set_rules('uts', 'uts', 'trim|required');
	$this->form_validation->set_rules('uas', 'uas', 'trim|required');
	$this->form_validation->set_rules('sikap', 'sikap', 'trim|required');

	$this->form_validation->set_rules('id_nilai', 'id_nilai', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_nilai.xls";
        $judul = "t_nilai";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Mapel Detail");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Siswa Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun Semester");
	xlsWriteLabel($tablehead, $kolomhead++, "Tugas");
	xlsWriteLabel($tablehead, $kolomhead++, "Uts");
	xlsWriteLabel($tablehead, $kolomhead++, "Uas");
	xlsWriteLabel($tablehead, $kolomhead++, "Sikap");

	foreach ($this->T_nilai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mapel_detail);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_siswa_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tahun_semester);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tugas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->uts);
	    xlsWriteNumber($tablebody, $kolombody++, $data->uas);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sikap);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_nilai.doc");

        $data = array(
            't_nilai_data' => $this->T_nilai_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('admin/t_nilai/t_nilai_doc',$data);
    }

}

/* End of file T_nilai.php */
/* Location: ./application/controllers/T_nilai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:28 */
/* http://harviacode.com */