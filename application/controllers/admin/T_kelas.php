<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T_kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T_kelas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/t_kelas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/t_kelas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/t_kelas/index.html';
            $config['first_url'] = base_url() . 'admin/t_kelas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T_kelas_model->total_rows($q);
        $t_kelas = $this->T_kelas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't_kelas_data' => $t_kelas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
        $this->load->view('admin/t_kelas/t_kelas_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->T_kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kelas' => $row->id_kelas,
		'nama_kelas' => $row->nama_kelas,
	    );
            $this->load->view('admin/header');
            $this->load->view('admin/t_kelas/t_kelas_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/t_kelas/create_action'),
	    'id_kelas' => set_value('id_kelas'),
	    'nama_kelas' => set_value('nama_kelas'),
	);
        $this->load->view('admin/header');
        $this->load->view('admin/t_kelas/t_kelas_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
	    );

            $this->T_kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/t_kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->T_kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/t_kelas/update_action'),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'nama_kelas' => set_value('nama_kelas', $row->nama_kelas),
	    );
            $this->load->view('admin/header');
            $this->load->view('admin/t_kelas/t_kelas_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_kelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kelas', TRUE));
        } else {
            $data = array(
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
	    );

            $this->T_kelas_model->update($this->input->post('id_kelas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/t_kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->T_kelas_model->get_by_id($id);

        if ($row) {
            $this->T_kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/t_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/t_kelas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kelas', 'nama kelas', 'trim|required');

	$this->form_validation->set_rules('id_kelas', 'id_kelas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t_kelas.xls";
        $judul = "t_kelas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kelas");

	foreach ($this->T_kelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kelas);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t_kelas.doc");

        $data = array(
            't_kelas_data' => $this->T_kelas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('admin/t_kelas/t_kelas_doc',$data);
    }

}

/* End of file T_kelas.php */
/* Location: ./application/controllers/T_kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:26 */
/* http://harviacode.com */