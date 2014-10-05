<?php if ( !defined( 'BASEPATH' ) ) exit('No direct script access allowed');

class m_User extends CI_Model
{
	public function add( $name, $password )
	{
		$data = array(
			'name' => $name,
			'password' => $password
		);
		$q = $this->db->insert( 'users', $data );
		if ( $q != NULL )
			return "";
	}

	public function check_id( $name, $password )
	{
		$this->db->where( 'name', $name );
		$this->db->where( 'password', $password );
		$q = $this->db->get( 'users' );
		if ( $q->num_rows() > 0 )
		{
			$res = $q->result();
			$this->session->set_userdata( array( 'id' => $res[0]->id, 'name' => $res[0]->name, 'admin' => $res[0]->admin ) );
			return true;
		}
		return false;
	}
}

?>