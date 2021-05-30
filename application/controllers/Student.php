<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model');
		$this->load->model('News_model');
		$this->load->model('Subject_model');
		$this->load->model('Semester_model');
		$this->load->model('Staff_model');
		$this->load->model('Result_model');
		$this->load->model('Branch_model');
	}

	public function index()
	{
		$data['page'] = 1;
		$data['news'] = $this->News_model->read(false, 3);
		$this->load->view('layout/head', ['title' => 'Dashboard - Student']);
		$this->load->view('layout/navbar');
		$this->load->view('student/index', $data);
		$this->load->view('layout/footer');
	}

	public function login()
	{
		if ($this->form_validation->run('login') == false) {
			$this->load->view('layout/head', ['title' => 'Student Login']);
			$this->load->view('login');
			$this->load->view('layout/footer');
		} else {
			$email = $this->input->post('email', true);
			$password = $this->input->post('password', true);

			$data = $this->Student_model->read(array(
				'email' => $email
			));
			if (count($data) === 1) {
				if ($password == $data[0]['password']) {
					$account = array(
						'id' => $data[0]['student_id'],
						'name' => $data[0]['first_name'] . " " . $data[0]['last_name'],
						'email' => $data[0]['email'],
						'level' => 'student',
					);
					$this->session->set_userdata('user', $account);
					$this->session->set_flashdata('message', 'You logged in as ' . 'student');
					redirect(base_url() . "student");
				} else {
					$this->session->set_flashdata('message', 'Your password is wrong');
					redirect('/student/login');
				}
			} else {
				$this->session->set_flashdata('message', 'Your Email is not found');
				redirect('/student/login');
			}
		}
	}

	public function register()
	{
		if ($this->form_validation->run('register') == FALSE) {
			$data['title'] = "Sign Up";
			$this->load->view('layout/head', $data);
			$this->load->view('registration');
			// $this->load->view('layout/footer');
		} else {
			$data["student_id"] = $this->input->post('id', true);
			$full_name = explode(' ', $this->input->post('name', true));
			$data["first_name"] = $full_name[0];
			$data["last_name"] = $full_name[1];
			$data["email"] = $this->input->post('email', true);
			$data["password"] = $this->input->post('password', true);
			// $data["password"] = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
			$this->Student_model->create($data);
			redirect('/student/login');
		}
	}


	public function profile()
	{
		$data['title'] = 'Profile';
		$data['myprofile'] = $this->Student_model->read([
			'student_id' => $this->session->user['id']
		]);
		$branch = '';
		if (isset($data['myprofile'][0]['branch'])) {
			$branch = $this->Branch_model->read([
				'branch_id' => $data['myprofile'][0]['branch']
			])[0]['branch'];
		}

		$data['branch'] = ($branch) ? $branch : '';

		$this->load->view('layout/head', ['title' => 'My Profile']);
		$this->load->view('layout/navbar');
		$this->load->view('student/profile', $data);
		$this->load->view('layout/footer');
	}

	public function edit_profile()
	{
		if ($this->form_validation->run('edit_student_profile') == FALSE) {
			$id = $this->input->get('id', true);
			$data['student'] = $this->Student_model->read([
				'student_id' => $this->session->user['id']
			]);
			$data['branch'] = $this->Branch_model->read();
			$data['title'] = 'Change Profile';

			$this->load->view('layout/head', $data);
			$this->load->view('layout/navbar');
			$this->load->view('student/edit_profile', $data);
			$this->load->view('layout/footer');
		} else {
			/* Retrieve Data */
			$data['first_name'] = $this->input->post('first_name', true);
			$data['last_name'] = $this->input->post('last_name', true);
			$data['gender'] = $this->input->post('gender', true);
			$data['contact_no'] = $this->input->post('contact_no', true);
			$data['address'] = $this->input->post('address', true);
			$data['branch'] = $this->input->post('branch', true);
			$data['enroll_no'] = $this->input->post('enroll_no', true);

			/* Change data in database */
			$this->Student_model->update($data, [
				'student_id' => $this->input->post('key', true)
			]);
			/* Give feedback to user */
			$this->session->set_flashdata('message', 'Data Successfully Changed');
			/* redirect */
			redirect('/student/profile');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->set_flashdata('message', 'Logout Successfully');
		redirect('/student/login');
	}

	public function show_news($news = false)
	{
		/* Get data from database to showed within table*/
		if ($news == false) {
			$data['news'] = $this->News_model->read();
			$data['title'] = 'News List';
			$this->load->view('layout/head', ['title' => 'News List']);
			$this->load->view('layout/navbar');
			$this->load->view('student/news/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data['news'] = $this->News_model->read([
				'slug' => rawurldecode($news)
			])[0];
			$data['other_news'] = $this->News_model->read([
				'slug !=' => rawurldecode($news)
			]);

			$data['title'] = $data['news']['title'];
			$this->load->view('layout/head', ['title' => $data['news']['title']]);
			$this->load->view('layout/navbar');
			$this->load->view("student/news/news_item", $data);
			$this->load->view('layout/footer');
		}
	}

	public function show_event($event = false)
	{
		/* Get data from database to showed within table*/
		if ($event == false) {
			$data['event'] = $this->News_model->read();
			$data['title'] = 'Event List';
			$this->load->view('layout/head', ['title' => 'Event List']);
			$this->load->view('layout/navbar');
			$this->load->view('student/event/index', $data);
			$this->load->view('layout/footer');
		} else {
			$data['event'] = $this->News_model->read([
				'slug' => rawurldecode($event)
			])[0];
			// var_dump($data);
			$data['title'] = $data['event']['title'];
			$this->load->view('layout/head', ['title' => $data['event']['title']]);
			$this->load->view('layout/navbar');
			$this->load->view("student/event/event_item", $data);
			$this->load->view('layout/footer');
		}
	}

	public function show_result()
	{
		/* student id */
		$id = $this->session->user['id'];
		/* Get data from database to showed within table*/
		$data['result'] = $this->Result_model->advance_read(
			array(
				[
					'field' => 'res.student_id',
					'value' => $id
				]
			)
		);
		$data['title'] = 'My Result';

		$this->load->view('layout/head', ['title' => 'My Result']);
		$this->load->view('layout/navbar');
		$this->load->view('student/result/index', $data);
		$this->load->view('layout/footer');
	}

	public function list_material()
	{
		/* Get data from database to showed within table*/
		$data['branch'] = $this->Branch_model->read();
		$data['subject'] = $this->Subject_model->read();
		$data['news'] = $this->Result_model->read();
		$data['title'] = 'Study Material List';

		$this->load->view('layout/head', $data);
		$this->load->view('layout/navbar');
		$this->load->view('student/result/list_material', $data);
		$this->load->view('layout/footer');
	}
}
