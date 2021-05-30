<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Staff_auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model');
		$this->load->model('Subject_model');
		$this->load->model('Semester_model');
		$this->load->model('Staff_model');
		$this->load->model('Result_model');
		$this->load->model('Branch_model');
	}

	public function login()
	{
		if ($this->form_validation->run('login') == false) {
			$this->load->view('layout/head', ['title' => 'Login']);
			$this->load->view('login');
			$this->load->view('layout/footer');
		} else {
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);

			$data = $this->Staff_model->read(array(
				'email' => $email
			));
			if (count($data) === 1) {
				if (password_verify($password, $data[0]['password'])) {
					$account = array(
						'id' => $data[0]['id'],
						'name' => $data[0]['name'],
						'email' => $data[0]['email'],
						'level' => $data[0]['level'],
					);

					$this->session->set_userdata('user', $account);
					$this->session->set_flashdata('message', 'You logged in as ' . $data[0]['level']);
					switch ($data[0]['level']) {
						case 'admin':
							redirect(base_url() . "staff");
							break;
						case 'faculty':
							redirect(base_url() . "faculty");
							break;
						default:
							break;
					}
				} else {
					$this->session->set_flashdata('message', 'Your password is wrong');
					redirect('/staff/login');
				}
			} else {
				$this->session->set_flashdata('message', 'Your Email is not found');
				redirect('/staff/login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->set_flashdata('message', 'Logout Successfully');
		redirect('/staff/login');
	}
}
