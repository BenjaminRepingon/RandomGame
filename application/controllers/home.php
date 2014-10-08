<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library( 'email' );
	}

	public function index()
	{
		$games = $this->m_game->select( 'game.*, (`category`.`name`) AS category' );
		$top5 = $this->m_game->select_top( 'game.*, (`category`.`name`) AS category', 'plays', NULL, 5, 0 );
		$categories = $this->m_category->select( '*' );

		$data['games'] = $games;
		$data['top5'] = $top5;
		$data['categories'] = $categories;
		load_container( $this, "home", $data );
	}
}
