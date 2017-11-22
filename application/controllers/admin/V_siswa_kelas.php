<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_siswa_kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('V_siswa_kelas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/v_siswa_kelas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/v_siswa_kelas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/v_siswa_kelas/index.html';
            $config['first_url'] = base_url() . 'admin/v_siswa_kelas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->V_siswa_kelas_model->total_rows($q);
        $v_siswa_kelas = $this->V_siswa_kelas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'v_siswa_kelas_data' => $v_siswa_kelas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('admin/header');
        $this->load->view('admin/v_siswa_kelas/v_siswa_kelas_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->V_siswa_kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_siswa_kelas' => $row->id_siswa_kelas,
		'id_kelas_tahun_ajaran' => $row->id_kelas_tahun_ajaran,
		'id_siswa' => $row->id_siswa,
		'nis' => $row->nis,
		'nama_siswa' => $row->nama_siswa,
		'tahun_masuk' => $row->tahun_masuk,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'agama' => $row->agama,
		'alamat' => $row->alamat,
		'nama_ayah' => $row->nama_ayah,
		'nama_ibu' => $row->nama_ibu,
		'alamat_ortu' => $row->alamat_ortu,
		'telp_ortu' => $row->telp_ortu,
		'pekerjaan_ayah' => $row->pekerjaan_ayah,
		'pekerjaan_ibu' => $row->pekerjaan_ibu,
		'nama_wali' => $row->nama_wali,
		'alamat_wali' => $row->alamat_wali,
		'telp_wali' => $row->telp_wali,
		'pekerjaan_wali' => $row->pekerjaan_wali,
		'id_kelas' => $row->id_kelas,
		'id_tahun' => $row->id_tahun,
		'nama_wali_kelas' => $row->nama_wali_kelas,
		'nama_kelas' => $row->nama_kelas,
		'tahun' => $row->tahun,
	    );
            $this->load->view('admin/header');
            $this->load->view('admin/v_siswa_kelas/v_siswa_kelas_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/v_siswa_kelas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/v_siswa_kelas/create_action'),
	    'id_siswa_kelas' => set_value('id_siswa_kelas'),
	    'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran'),
	    'id_siswa' => set_value('id_siswa'),
	    'nis' => set_value('nis'),
	    'nama_siswa' => set_value('nama_siswa'),
	    'tahun_masuk' => set_value('tahun_masuk'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'agama' => set_value('agama'),
	    'alamat' => set_value('alamat'),
	    'nama_ayah' => set_value('nama_ayah'),
	    'nama_ibu' => set_value('nama_ibu'),
	    'alamat_ortu' => set_value('alamat_ortu'),
	    'telp_ortu' => set_value('telp_ortu'),
	    'pekerjaan_ayah' => set_value('pekerjaan_ayah'),
	    'pekerjaan_ibu' => set_value('pekerjaan_ibu'),
	    'nama_wali' => set_value('nama_wali'),
	    'alamat_wali' => set_value('alamat_wali'),
	    'telp_wali' => set_value('telp_wali'),
	    'pekerjaan_wali' => set_value('pekerjaan_wali'),
	    'id_kelas' => set_value('id_kelas'),
	    'id_tahun' => set_value('id_tahun'),
	    'nama_wali_kelas' => set_value('nama_wali_kelas'),
	    'nama_kelas' => set_value('nama_kelas'),
	    'tahun' => set_value('tahun'),
	);
        $this->load->view('admin/header');
        $this->load->view('admin/v_siswa_kelas/v_siswa_kelas_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_siswa_kelas' => $this->input->post('id_siswa_kelas',TRUE),
		'id_kelas_tahun_ajaran' => $this->input->post('id_kelas_tahun_ajaran',TRUE),
		'id_siswa' => $this->input->post('id_siswa',TRUE),
		'nis' => $this->input->post('nis',TRUE),
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'tahun_masuk' => $this->input->post('tahun_masuk',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
		'telp_ortu' => $this->input->post('telp_ortu',TRUE),
		'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah',TRUE),
		'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu',TRUE),
		'nama_wali' => $this->input->post('nama_wali',TRUE),
		'alamat_wali' => $this->input->post('alamat_wali',TRUE),
		'telp_wali' => $this->input->post('telp_wali',TRUE),
		'pekerjaan_wali' => $this->input->post('pekerjaan_wali',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'nama_wali_kelas' => $this->input->post('nama_wali_kelas',TRUE),
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->V_siswa_kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/v_siswa_kelas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->V_siswa_kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/v_siswa_kelas/update_action'),
		'id_siswa_kelas' => set_value('id_siswa_kelas', $row->id_siswa_kelas),
		'id_kelas_tahun_ajaran' => set_value('id_kelas_tahun_ajaran', $row->id_kelas_tahun_ajaran),
		'id_siswa' => set_value('id_siswa', $row->id_siswa),
		'nis' => set_value('nis', $row->nis),
		'nama_siswa' => set_value('nama_siswa', $row->nama_siswa),
		'tahun_masuk' => set_value('tahun_masuk', $row->tahun_masuk),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'agama' => set_value('agama', $row->agama),
		'alamat' => set_value('alamat', $row->alamat),
		'nama_ayah' => set_value('nama_ayah', $row->nama_ayah),
		'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
		'alamat_ortu' => set_value('alamat_ortu', $row->alamat_ortu),
		'telp_ortu' => set_value('telp_ortu', $row->telp_ortu),
		'pekerjaan_ayah' => set_value('pekerjaan_ayah', $row->pekerjaan_ayah),
		'pekerjaan_ibu' => set_value('pekerjaan_ibu', $row->pekerjaan_ibu),
		'nama_wali' => set_value('nama_wali', $row->nama_wali),
		'alamat_wali' => set_value('alamat_wali', $row->alamat_wali),
		'telp_wali' => set_value('telp_wali', $row->telp_wali),
		'pekerjaan_wali' => set_value('pekerjaan_wali', $row->pekerjaan_wali),
		'id_kelas' => set_value('id_kelas', $row->id_kelas),
		'id_tahun' => set_value('id_tahun', $row->id_tahun),
		'nama_wali_kelas' => set_value('nama_wali_kelas', $row->nama_wali_kelas),
		'nama_kelas' => set_value('nama_kelas', $row->nama_kelas),
		'tahun' => set_value('tahun', $row->tahun),
	    );
            $this->load->view('admin/header');
            $this->load->view('admin/v_siswa_kelas/v_siswa_kelas_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/v_siswa_kelas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_siswa_kelas' => $this->input->post('id_siswa_kelas',TRUE),
		'id_kelas_tahun_ajaran' => $this->input->post('id_kelas_tahun_ajaran',TRUE),
		'id_siswa' => $this->input->post('id_siswa',TRUE),
		'nis' => $this->input->post('nis',TRUE),
		'nama_siswa' => $this->input->post('nama_siswa',TRUE),
		'tahun_masuk' => $this->input->post('tahun_masuk',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'nama_ayah' => $this->input->post('nama_ayah',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat_ortu' => $this->input->post('alamat_ortu',TRUE),
		'telp_ortu' => $this->input->post('telp_ortu',TRUE),
		'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah',TRUE),
		'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu',TRUE),
		'nama_wali' => $this->input->post('nama_wali',TRUE),
		'alamat_wali' => $this->input->post('alamat_wali',TRUE),
		'telp_wali' => $this->input->post('telp_wali',TRUE),
		'pekerjaan_wali' => $this->input->post('pekerjaan_wali',TRUE),
		'id_kelas' => $this->input->post('id_kelas',TRUE),
		'id_tahun' => $this->input->post('id_tahun',TRUE),
		'nama_wali_kelas' => $this->input->post('nama_wali_kelas',TRUE),
		'nama_kelas' => $this->input->post('nama_kelas',TRUE),
		'tahun' => $this->input->post('tahun',TRUE),
	    );

            $this->V_siswa_kelas_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/v_siswa_kelas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->V_siswa_kelas_model->get_by_id($id);

        if ($row) {
            $this->V_siswa_kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/v_siswa_kelas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/v_siswa_kelas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_siswa_kelas', 'id siswa kelas', 'trim|required');
	$this->form_validation->set_rules('id_kelas_tahun_ajaran', 'id kelas tahun ajaran', 'trim|required');
	$this->form_validation->set_rules('id_siswa', 'id siswa', 'trim|required');
	$this->form_validation->set_rules('nis', 'nis', 'trim|required');
	$this->form_validation->set_rules('nama_siswa', 'nama siswa', 'trim|required');
	$this->form_validation->set_rules('tahun_masuk', 'tahun masuk', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('nama_ayah', 'nama ayah', 'trim|required');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
	$this->form_validation->set_rules('alamat_ortu', 'alamat ortu', 'trim|required');
	$this->form_validation->set_rules('telp_ortu', 'telp ortu', 'trim|required');
	$this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan ayah', 'trim|required');
	$this->form_validation->set_rules('pekerjaan_ibu', 'pekerjaan ibu', 'trim|required');
	$this->form_validation->set_rules('nama_wali', 'nama wali', 'trim|required');
	$this->form_validation->set_rules('alamat_wali', 'alamat wali', 'trim|required');
	$this->form_validation->set_rules('telp_wali', 'telp wali', 'trim|required');
	$this->form_validation->set_rules('pekerjaan_wali', 'pekerjaan wali', 'trim|required');
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
        $namaFile = "v_siswa_kelas.xls";
        $judul = "v_siswa_kelas";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas Tahun Ajaran");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Nis");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Siswa");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan Ayah");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wali");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat Wali");
	xlsWriteLabel($tablehead, $kolomhead++, "Telp Wali");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan Wali");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tahun");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Wali Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Tahun");

	foreach ($this->V_siswa_kelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_siswa_kelas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kelas_tahun_ajaran);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_siswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_siswa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tahun_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan_ayah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->telp_wali);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan_wali);
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
        header("Content-Disposition: attachment;Filename=v_siswa_kelas.doc");

        $data = array(
            'v_siswa_kelas_data' => $this->V_siswa_kelas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('admin/v_siswa_kelas/v_siswa_kelas_doc',$data);
    }

}

/* End of file V_siswa_kelas.php */
/* Location: ./application/controllers/V_siswa_kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:31 */
/* http://harviacode.com */