<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Serve data with API
$route['api/news'] = 'news/news_data';
$route['api/event'] = 'event/event_data';

// Home - Landing Page
$route['home'] = 'welcome';
$route['login'] = 'welcome/login';

// Feature 1 For Student
$route['student'] = 'student';
$route['student/login'] = 'student/login';
$route['student/profile'] = 'student/profile';
$route['student/profile/change'] = 'student/edit_profile';
$route['student/register'] = 'student/register';
$route['student/logout'] = 'student/logout';

$route['student/news'] = 'student/show_news';
$route['student/news/(:any)'] = "student/show_news/$1";

$route['student/event'] = 'student/show_event';
$route['student/event/(:any)'] = "student/show_event/$1";

$route['student/result'] = 'student/show_result';
$route['student/material/list'] = 'student/list_material';

// Feature 2 For Admin
$route['staff'] = 'staff';
$route['staff/login'] = 'staff_auth/login';
$route['staff/register'] = 'staff/register';
$route['staff/profile'] = 'staff/profile';
$route['staff/profile/change'] = 'staff/edit_profile';
$route['staff/logout'] = 'staff_auth/logout';

$route['staff/student'] = 'staff/show_student';
$route['staff/student/(:num)'] = 'staff/show_student/$1';
$route['staff/student/add'] = 'staff/add_student';
$route['staff/student/update'] = 'staff/update_student';
$route['staff/student/delete'] = 'staff/delete_student';

$route['staff/subject'] = 'staff/show_subject';
$route['staff/subject/add'] = 'staff/add_subject';
$route['staff/subject/update'] = 'staff/update_subject';
$route['staff/subject/delete'] = 'staff/delete_subject';

$route['staff/semester'] = 'staff/show_semester';
$route['staff/semester/add'] = 'staff/add_semester';
$route['staff/semester/update'] = 'staff/update_semester';
$route['staff/semester/delete'] = 'staff/delete_semester';

$route['staff/result'] = 'staff/show_result';
$route['staff/result/add'] = 'staff/add_result';
$route['staff/result/update'] = 'staff/update_result';
$route['staff/result/delete'] = 'staff/delete_result';
$route['staff/result/send'] = 'staff/send_result';
$route['staff/result/send/email'] = 'mail/sendemail';
$route['staff/result/upload'] = 'staff/upload_material';
$route['staff/result/material'] = 'staff/list_material';


$route['staff/news'] = 'staff/show_news';
$route['staff/news/(:any)'] = "staff/show_news/$1";

$route['staff/event'] = 'staff/show_event';
$route['staff/event/add'] = 'staff/add_event';
$route['staff/event/(:any)'] = "staff/show_event/$1";


// feature 3 for faculty
$route['faculty'] = 'faculty';
$route['faculty/login'] = 'staff_auth/login';
$route['faculty/register'] = 'staff_auth/register';
$route['faculty/profile'] = 'faculty/profile';
$route['faculty/profile/change'] = 'faculty/edit_profile';
$route['faculty/logout'] = 'staff_auth/logout';

$route['faculty/news'] = 'faculty/show_news';
$route['faculty/news/(:any)'] = "faculty/show_news/$1";

$route['faculty/event'] = 'faculty/show_event';
$route['faculty/event/(:any)'] = "faculty/show_event/$1";

$route['faculty/result'] = 'faculty/show_result';
$route['faculty/result/add'] = 'faculty/add_result';
$route['faculty/result/upload'] = 'faculty/upload_material';
$route['faculty/result/material'] = 'faculty/list_material';
