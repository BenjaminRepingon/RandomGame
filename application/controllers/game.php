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

	public function play( $link_name )
	{
		$this->load->model("m_comment");
		$game = $this->m_game->select_by_link_name( 'game.*, (`category`.`name`) AS category', $link_name );

		if ( !isset($game[0]) )
		{
			show_404();
			return;
		}

		$comments = $this->m_comment->select_top( '*', 'date', array('id_game' => $game[0]->id) );

		$data['game'] = $game[0];
		$data['comments'] = $comments;
		load_container( $this, "game", $data );
	}

	public function add()
	{
		if ( $this->session->userdata('admin') != 1 )
			redirect(base_url());

		$this->load->model( 'm_category' );

		$categories = $this->m_category->select( '*' );

		$data['categories'] = $categories;
		load_container( $this, "add_game", $data );
	}

	public function upload()
	{
		$title = $this->input->post('title');
		$link_name = str_replace(' ', '_', strtolower($title));
		$link_name = str_replace('\'', '_', $link_name);
		$author = $this->input->post('author');
		$iframe = $this->input->post('iframe');
		$description = $this->input->post('description');
		$instructions = $this->input->post('instructions');
		$categoryId = $this->input->post('categoryId');

		if ( $title == NULL || $author == NULL || $iframe == NULL || $description == NULL || $instructions == NULL || $categoryId == NULL )
		{
			$this->add();
			return;
		}

		$config['upload_path'] = './uploads/img/original';
		$config['file_name'] = $link_name;
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '3000';
		$config['max_width']  = '1920';
		$config['max_height']  = '1080';

		if( !is_file('./uploads/img/original/'.$title.'.jpg') )
		{
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('img') )
			{
				echo $this->upload->display_errors('','');
				echo anchor(base_url(), 'Home');
			}

			// BIG
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = './uploads/img/original/'.$link_name.'.jpg';
			$config2['new_image'] = './uploads/img/big/'.$link_name.'.jpg';
			$config2['maintain_ratio'] = TRUE;
			$config2['width'] = 800;
			$config2['height'] = 600;

			$this->load->library('image_lib', $config2);

			if ( ! $this->image_lib->resize())
				echo $this->image_lib->display_errors();

			// MEDIUM
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = './uploads/img/original/'.$link_name.'.jpg';
			$config2['new_image'] = './uploads/img/medium/'.$link_name.'.jpg';
			$config2['maintain_ratio'] = TRUE;
			$config2['width'] = 400;
			$config2['height'] = 300;

			$this->image_lib->initialize($config2);

			if ( ! $this->image_lib->resize())
				echo $this->image_lib->display_errors();

			// SMALL
			$config2['image_library'] = 'gd2';
			$config2['source_image'] = './uploads/img/original/'.$link_name.'.jpg';
			$config2['new_image'] = './uploads/img/small/'.$link_name.'.jpg';
			$config2['maintain_ratio'] = TRUE;
			$config2['width'] = 200;
			$config2['height'] = 150;

			$this->image_lib->initialize($config2);

			if ( ! $this->image_lib->resize())
				echo $this->image_lib->display_errors();
		}

		$this->m_game->add( $title, $link_name, $author, $iframe, $description, $instructions, $categoryId, $config['file_name'].'.jpg' );
		$this->add();
	}
}