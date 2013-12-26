<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_players');
	}

	public function index()
	{
		$data['id'] = $this->model_players->get_player();
	}

	public function view($slug)
	{
		$data['id'] = $this->model_players->get_player($slug);
	}
}