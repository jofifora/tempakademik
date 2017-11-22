<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_nilai_model extends CI_Model
{

    public $table = 'v_nilai';
    public $id = '';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('', $q);
	$this->db->or_like('id_nilai', $q);
	$this->db->or_like('id_mapel_detail', $q);
	$this->db->or_like('id_siswa_kelas', $q);
	$this->db->or_like('id_tahun_semester', $q);
	$this->db->or_like('tugas', $q);
	$this->db->or_like('uts', $q);
	$this->db->or_like('uas', $q);
	$this->db->or_like('sikap', $q);
	$this->db->or_like('id_mapel', $q);
	$this->db->or_like('id_guru', $q);
	$this->db->or_like('nama_mapel', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('nama_guru', $q);
	$this->db->or_like('nuptk', $q);
	$this->db->or_like('jenis_kelamin_guru', $q);
	$this->db->or_like('tempat_lahir_guru', $q);
	$this->db->or_like('tanggal_lahir_guru', $q);
	$this->db->or_like('alamat_guru', $q);
	$this->db->or_like('agama_guru', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('jenis_kepegawaian', $q);
	$this->db->or_like('id_kelas_tahun_ajaran', $q);
	$this->db->or_like('id_siswa', $q);
	$this->db->or_like('nis', $q);
	$this->db->or_like('nama_siswa', $q);
	$this->db->or_like('tahun_masuk', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('nama_ayah', $q);
	$this->db->or_like('nama_ibu', $q);
	$this->db->or_like('alamat_ortu', $q);
	$this->db->or_like('telp_ortu', $q);
	$this->db->or_like('pekerjaan_ayah', $q);
	$this->db->or_like('pekerjaan_ibu', $q);
	$this->db->or_like('nama_wali', $q);
	$this->db->or_like('alamat_wali', $q);
	$this->db->or_like('telp_wali', $q);
	$this->db->or_like('pekerjaan_wali', $q);
	$this->db->or_like('id_kelas', $q);
	$this->db->or_like('nama_wali_kelas', $q);
	$this->db->or_like('nama_kelas', $q);
	$this->db->or_like('id_tahun', $q);
	$this->db->or_like('semester', $q);
	$this->db->or_like('tahun', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('id_nilai', $q);
	$this->db->or_like('id_mapel_detail', $q);
	$this->db->or_like('id_siswa_kelas', $q);
	$this->db->or_like('id_tahun_semester', $q);
	$this->db->or_like('tugas', $q);
	$this->db->or_like('uts', $q);
	$this->db->or_like('uas', $q);
	$this->db->or_like('sikap', $q);
	$this->db->or_like('id_mapel', $q);
	$this->db->or_like('id_guru', $q);
	$this->db->or_like('nama_mapel', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('nama_guru', $q);
	$this->db->or_like('nuptk', $q);
	$this->db->or_like('jenis_kelamin_guru', $q);
	$this->db->or_like('tempat_lahir_guru', $q);
	$this->db->or_like('tanggal_lahir_guru', $q);
	$this->db->or_like('alamat_guru', $q);
	$this->db->or_like('agama_guru', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('jenis_kepegawaian', $q);
	$this->db->or_like('id_kelas_tahun_ajaran', $q);
	$this->db->or_like('id_siswa', $q);
	$this->db->or_like('nis', $q);
	$this->db->or_like('nama_siswa', $q);
	$this->db->or_like('tahun_masuk', $q);
	$this->db->or_like('jenis_kelamin', $q);
	$this->db->or_like('tempat_lahir', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('agama', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('nama_ayah', $q);
	$this->db->or_like('nama_ibu', $q);
	$this->db->or_like('alamat_ortu', $q);
	$this->db->or_like('telp_ortu', $q);
	$this->db->or_like('pekerjaan_ayah', $q);
	$this->db->or_like('pekerjaan_ibu', $q);
	$this->db->or_like('nama_wali', $q);
	$this->db->or_like('alamat_wali', $q);
	$this->db->or_like('telp_wali', $q);
	$this->db->or_like('pekerjaan_wali', $q);
	$this->db->or_like('id_kelas', $q);
	$this->db->or_like('nama_wali_kelas', $q);
	$this->db->or_like('nama_kelas', $q);
	$this->db->or_like('id_tahun', $q);
	$this->db->or_like('semester', $q);
	$this->db->or_like('tahun', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file V_nilai_model.php */
/* Location: ./application/models/V_nilai_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-11-20 09:06:31 */
/* http://harviacode.com */