<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model("m_game");
	}

	public function index()
	{

	}

	public function games()
	{

	}

	public function play( $title )
	{
		$game = $this->m_game->select_by_title( "*", $title );

		$data['game'] = $game[0];
		load_container( $this, "game", $data );
	}
}