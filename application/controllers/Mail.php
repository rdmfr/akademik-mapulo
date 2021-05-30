<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Mail extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Result_model');
	}
	public function sendEmail()
	{
		$id = $this->input->get('id', true);
		$resultData = $this->Result_model->advance_read([
			[
				'field' => 'res.result_id',
				'value' => $id
			]
		])[0];
		print_r($resultData);
		//Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                   				//Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'test.accon12@gmail.com';                     //SMTP username
			$mail->Password   = 'Accon4test.';                               //SMTP password
			// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

			//Recipients
			$mail->setFrom('test.accon12@gmail.com');
			$name = $resultData['student'];
			$email = $resultData['email'];
			$subject = $resultData['subject'];
			$score = $resultData['score'];

			$mail->addAddress($email);
			$mail->isHTML(true);

			//Content
			$mail->Subject = 'Result Report';
			$mail->Body    = "Hello $name, this is the result report of your $subject exam <br> Your Result is : $score";
			$mail->AltBody = "Hello $name, this is the result report of your $subject exam <br> Your Result is : $score";
			$mail->send();
			// $mail->addReplyTo('info@example.com', 'Information');

			$this->session->set_flashdata('message', 'Message has been sent');
			redirect('/staff/result');
		} catch (Exception $e) {
			$this->session->set_flashdata('message', "Message could not be sent. $mail->ErrorInfo");
			redirect('/staff/result');
		}
	}
}
