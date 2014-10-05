<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	public function index()
	{
		echo "Ajax";
	}

	public function login()
	{
		$name = $this->input->post('name');
		$pwd = $this->input->post('pwd');

		$this->load->model('m_user');
		echo $this->m_user->check_id( $name, hash('whirlpool', 'random_game'.$pwd.'42') );
	}

	public function logout()
	{
		$this->session->set_userdata( array( 'id' => NULL, 'name' => NULL ) );
		$this->session->unset_userdata( 'id' );
		$this->session->unset_userdata( 'name' );
		$this->session->sess_destroy();
		echo true;
	}

	public function comment()
	{
		$id_game = $this->input->post('id_game');
		$author = $this->input->post('author');
		$content = $this->input->post('content');

		$this->load->model("m_comment");
		$this->m_comment->add( $content, $id_game, $author);
		echo true;
	}
}