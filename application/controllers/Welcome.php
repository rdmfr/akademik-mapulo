<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model');
		$this->load->model('News_model');
		$this->load->model('Event_model');
	}

	public function index()
	{
		$data['news'] = $this->News_model->read();
		$data['event'] = $this->Event_model->read();
		// $this->load->view('layout/head');
		$this->load->view('index', $data);
		$this->load->view('layout/footer');
	}
}
