<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_jadwal_mapel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_jadwal_mapel_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_jadwal_mapel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_jadwal_mapel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_jadwal_mapel/index.html';
            $config['first_url'] = base_url() . 't_jadwal_mapel/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_jadwal_mapel_model->total_rows($q);
        $t_jadwal_mapel = $this->T_jadwal_mapel_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_jadwal_mapel_data' => $t_jadwal_mapel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t_jadwal_mapel/t_jadwal_mapel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_jadwal_mapel_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jadwal_mapel' => $row->id_jadwal_mapel,
		'id_mapel_detail' => $row->id_mapel_detail,
		'id_kelas_tahun_ajaran' => $row->id_kelas_tahun_ajaran,
		'hari_ke' => $row->hari_ke,
		'jam_mulai' => $row->jam_mulai,
		'jam_selesai' => $row->jam_selesai,
	    );
            $this->load->view('t_jadwal_mapel/t_jadwal_mapel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_jadwal_mapel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_jadwal_mapel/create_action'),
	    'id_jadwal_mapel' => set_value('id_jadwal_mapel'),
	    'id_mapel_detail' => set_value('id_mapel_detail'),
	    'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran'),
	    'hari_ke' => set_value('hari_ke'),
	    'jam_mulai' => set_value('jam_mulai'),
	    'jam_selesai' => set_value('jam_selesai'),
	);
        $this->load->view('t_jadwal_mapel/t_jadwal_mapel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_mapel_detail' => $this->input->post('id_mapel_detail',TRUE),
		'id_kelas_tahun_ajaran' => $this->input->post('id_kelas_tahun_ajaran',TRUE),
		'hari_ke' => $this->input->post('hari_ke',TRUE),
		'jam_mulai' => $this->input->post('jam_mulai',TRUE),
		'jam_selesai' => $this->input->post('jam_selesai',TRUE),
	    );

            $this->T_jadwal_mapel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_jadwal_mapel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_jadwal_mapel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_jadwal_mapel/update_action'),
		'id_jadwal_mapel' => set_value('id_jadwal_mapel', $row->id_jadwal_mapel),
		'id_mapel_detail' => set_value('id_mapel_detail', $row->id_mapel_detail),
		'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran', $row->id_kelas_tahun_ajaran),
		'hari_ke' => set_value('hari_ke', $row->hari_ke),
		'jam_mulai' => set_value('jam_mulai', $row->jam_mulai),
		'jam_selesai' => set_value('jam_selesai', $row->jam_selesai),
	    );
            $this->load->view('t_jadwal_mapel/t_jadwal_mapel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_jadwal_mapel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jadwal_mapel', TRUE));
        } else {
            $data = array(
		'id_mapel_detail' => $this->input->post('id_mapel_detail',TRUE),
		'id_kelas_tahun_ajaran' => $this->input->post('id_kelas_tahun_ajaran',TRUE),
		'hari_ke' => $this->input->post('hari_ke',TRUE),
		'jam_mulai' => $this->input->post('jam_mulai',TRUE),
		'jam_selesai' => $this->input->post('jam_selesai',TRUE),
	    );

            $this->T_jadwal_mapel_model->update($this->input->post('id_jadwal_mapel', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_jadwal_mapel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_jadwal_mapel_model->get_by_id($id);

        if ($row) {
            $this->T_jadwal_mapel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_jadwal_mapel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_jadwal_mapel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_mapel_detail', 'id mapel detail', 'trim|required');
	$this->form_validation->set_rules('id_kelas_tahun_ajaran', 'id kelas tahun ajaran', 'trim|required');
	$this->form_validation->set_rules('hari_ke', 'hari ke', 'trim|required');
	$this->form_validation->set_rules('jam_mulai', 'jam mulai', 'trim|required');
	$this->form_validation->set_rules('jam_selesai', 'jam selesai', 'trim|required');

	$this->form_validation->set_rules('id_jadwal_mapel', 'id_jadwal_mapel', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_jadwal_mapel.xls";
        $judul = "t_jadwal_mapel";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas Tahun Ajaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Hari Ke");
	xlsWriteLabel($tablehead, $kolomhead++, "Jam Mulai");
	xlsWriteLabel($tablehead, $kolomhead++, "Jam Selesai");

	foreach ($this->T_jadwal_mapel_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_mapel_detail);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kelas_tahun_ajaran);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hari_ke);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jam_mulai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jam_selesai);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_jadwal_mapel.doc");

        $data = array(
            't_jadwal_mapel_data' => $this->T_jadwal_mapel_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_jadwal_mapel/t_jadwal_mapel_doc',$data);
    }

}

/* End of file T_jadwal_mapel.php */
/* Location: ./application/controllers/T_jadwal_mapel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:26 */
/* http://harviacode.com */