<?php if ( !defined( 'BASEPATH' ) ) exit('No direct script access allowed');

class Categories extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		load_container( $this, 'categories' );
	}

	public function category( $name = NULL )
	{
		if ( $name == NULL )
			redirect( base_url() . 'categories' );
		$data['name'] = $name;
		load_container( $this, 'category', $data );
	}
}