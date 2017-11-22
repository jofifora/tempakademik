<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_utama extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/halaman_utama/halaman_utama');
		$this->load->view('admin/footer');
	}
}
