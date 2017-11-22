<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_siswa_kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_siswa_kelas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 't_siswa_kelas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't_siswa_kelas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't_siswa_kelas/index.html';
            $config['first_url'] = base_url() . 't_siswa_kelas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_siswa_kelas_model->total_rows($q);
        $t_siswa_kelas = $this->T_siswa_kelas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_siswa_kelas_data' => $t_siswa_kelas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('t_siswa_kelas/t_siswa_kelas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->T_siswa_kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_siswa_kelas' => $row->id_siswa_kelas,
		'id_siswa' => $row->id_siswa,
		'id_kelas_tahun_ajaran' => $row->id_kelas_tahun_ajaran,
	    );
            $this->load->view('t_siswa_kelas/t_siswa_kelas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_siswa_kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t_siswa_kelas/create_action'),
	    'id_siswa_kelas' => set_value('id_siswa_kelas'),
	    'id_siswa' => set_value('id_siswa'),
	    'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran'),
	);
        $this->load->view('t_siswa_kelas/t_siswa_kelas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_siswa' => $this->input->post('id_siswa',TRUE),
		'id_kelas_tahun_ajaran' => $this->input->post('id_kelas_tahun_ajaran',TRUE),
	    );

            $this->T_siswa_kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t_siswa_kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_siswa_kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t_siswa_kelas/update_action'),
		'id_siswa_kelas' => set_value('id_siswa_kelas', $row->id_siswa_kelas),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran', $row->id_kelas_tahun_ajaran),
	    );
            $this->load->view('t_siswa_kelas/t_siswa_kelas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_siswa_kelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_siswa_kelas', TRUE));
        } else {
            $data = array(
		'id_siswa' => $this->input->post('id_siswa',TRUE),
		'id_kelas_tahun_ajaran' => $this->input->post('id_kelas_tahun_ajaran',TRUE),
	    );

            $this->T_siswa_kelas_model->update($this->input->post('id_siswa_kelas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t_siswa_kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_siswa_kelas_model->get_by_id($id);

        if ($row) {
            $this->T_siswa_kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t_siswa_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t_siswa_kelas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_siswa', 'id siswa', 'trim|required');
	$this->form_validation->set_rules('id_kelas_tahun_ajaran', 'id kelas tahun ajaran', 'trim|required');

	$this->form_validation->set_rules('id_siswa_kelas', 'id_siswa_kelas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_siswa_kelas.xls";
        $judul = "t_siswa_kelas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas Tahun Ajaran");

	foreach ($this->T_siswa_kelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_siswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kelas_tahun_ajaran);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_siswa_kelas.doc");

        $data = array(
            't_siswa_kelas_data' => $this->T_siswa_kelas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('t_siswa_kelas/t_siswa_kelas_doc',$data);
    }

}

/* End of file T_siswa_kelas.php */
/* Location: ./application/controllers/T_siswa_kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:28 */
/* http://harviacode.com */