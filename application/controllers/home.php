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
		$this->load->model( 'm_game' );
		$this->load->model( 'm_category' );
		$games = $this->m_game->select( '*' );

		$this->load->view( 'container/head/default' );
		$this->load->view( 'container/header/default' );
		$this->load->view( 'container/nav/default' );

		foreach ( $games as $game )
		{
			$game->category_name = $this->m_category->select_by_id( 'name', $game->id_category )[0]->name;
			$data['game'] = $game;
			$this->load->view( 'game', $data );
		}

		$this->load->view( 'container/sidebar/default' );
		$this->load->view( 'container/footer/default' );
	}
}
