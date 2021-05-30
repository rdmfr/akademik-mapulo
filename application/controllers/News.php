<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
	}

	public function news_data($news = false)
	{
		if (!$news) {
			$news['data'] = $this->News_model->read();
			echo json_encode($news, JSON_PRETTY_PRINT);
		} else {
			$news['data'] = $this->News_model->read([
				'slug' => $news
			]);
			echo json_encode($news, JSON_PRETTY_PRINT);
		}
	}
}
