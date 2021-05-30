<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model');
	}


	public function event_data($event = false)
	{
		if (!$event) {
			$events = $this->Event_model->read();
			$repack = [];
			foreach ($events as $ev) {
				$temp = [];
				$temp['id'] = $ev['event_id'];
				$temp['name'] = $ev['name'];
				$temp['description'] = $ev['description'];
				$temp['date'] = [$ev['first_date'], $ev['last_date']];
				$temp['type'] = 'event';
				array_push($repack, $temp);
			}
			header("Access-Control-Allow-Origin: *");
			header("Access-Control-Allow-Headers: *");
			echo json_encode($repack, JSON_PRETTY_PRINT);
		} else {
			$event['data'] = $this->News_model->read([
				'id' => $event
			]);
			header("Access-Control-Allow-Origin: *");
			header("Access-Control-Allow-Headers: *");
			echo json_encode($event, JSON_PRETTY_PRINT);
		}
	}
}
