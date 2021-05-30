<?php
$config = [
	'login' => [
		[
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'
		],
		[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|alpha_numeric|min_length[6]|max_length[26]'
		],
	],
	'register' => [
		// [
		// 	'field' => 'id',
		// 	'label' => 'ID',
		// 	'rules' => 'required|numeric'
		// ],
		[
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|alpha_numeric_spaces'
		],
		[
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'
		],
		[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|alpha_numeric|min_length[6]|max_length[26]'
		],
		[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|alpha_numeric|min_length[6]|max_length[26]|matches[password]'
		],
	],
	'edit_student_profile' => [
		[
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required|alpha'
		],
		[
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'required|alpha'
		],
		[
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'required'
		],
		[
			'field' => 'contact_no',
			'label' => 'Contact No',
			'rules' => 'required|numeric'
		],
		[
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required'
		],
		[
			'field' => 'branch',
			'label' => 'Branch',
			'rules' => 'required'
		],
		[
			'field' => 'enroll_no',
			'label' => 'Enroll No',
			'rules' => 'numeric'
		]
	],

	'edit_faculty_profile' => [
		[
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|alpha_numeric_spaces'
		],
		[
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'required'
		],
		[
			'field' => 'contact_no',
			'label' => 'Contact No',
			'rules' => 'required|numeric'
		],
		[
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required'
		],
	],

	'student' => [
		[
			'field' => 'student_id',
			'label' => 'Student ID',
			'rules' => 'required'
		],
		[
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required|alpha'
		],
		[
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'required|alpha'
		],
		[
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'
		],
		[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|alpha_numeric|min_length[6]|max_length[26]'
		],
		[
			'field' => 'gender',
			'label' => 'Gender',
			'rules' => 'required'
		],
		[
			'field' => 'contact_no',
			'label' => 'Contact No',
			'rules' => 'required|numeric'
		],
		[
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required'
		],
		[
			'field' => 'branch',
			'label' => 'Branch',
			'rules' => 'required'
		],
		[
			'field' => 'enroll_no',
			'label' => 'Enroll No',
			'rules' => 'numeric'
		]
	],
	'email' => [
		[
			'field' => 'emailaddress',
			'label' => 'EmailAddress',
			'rules' => 'required|valid_email'
		],
		[
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|alpha'
		],
		[
			'field' => 'title',
			'label' => 'Title',
			'rules' => 'required'
		],
		[
			'field' => 'message',
			'label' => 'MessageBody',
			'rules' => 'required'
		]
	],
	'subject' => [
		'subject_id' => [
			'field' => 'subject_id',
			'label' => 'Subject ID',
			'rules' => 'required|numeric|is_unique[subject.subject_id]'
		],
		'subject' => [
			'field' => 'subject',
			'label' => 'Subject',
			'rules' => 'required|alpha_numeric_spaces'
		],
	],
	'semester' => [
		'semester_id' => [
			'field' => 'semester_id',
			'label' => 'Semester ID',
			'rules' => 'required|numeric|is_unique[semester.semester_id]'
		],
		'semester' => [
			'field' => 'semester',
			'label' => 'Semester',
			'rules' => 'required|alpha'
		],
	],
	'result' => [
		// 'result_id' => [
		// 	'field' => 'result_id',
		// 	'label' => 'Semester ID',
		// 	'rules' => 'required|numeric|is_unique[semester.result_id]'
		// ],
		'semester' => [
			'field' => 'semester',
			'label' => 'Semester',
			'rules' => 'required|numeric'
		],
		'subject' => [
			'field' => 'subject',
			'label' => 'Subject',
			'rules' => 'required|numeric'
		],
		'year' => [
			'field' => 'year',
			'label' => 'Year',
			'rules' => 'required|numeric'
		],
		'branch' => [
			'field' => 'branch',
			'label' => 'Branch',
			'rules' => 'required|numeric'
		],
		'student' => [
			'field' => 'student',
			'label' => 'Student',
			'rules' => 'required|numeric'
		],
		'score' => [
			'field' => 'score',
			'label' => 'Score',
			'rules' => 'required|greater_than_equal_to[0]|less_than_equal_to[100]'
		],
	],

];
