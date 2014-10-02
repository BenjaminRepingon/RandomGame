<?php if ( !defined( 'BASEPATH' ) ) exit('No direct script access allowed');

class m_Category extends CI_Model
{
	/*
	 * ADD
	 */
	public function add( $name )
	{
		$data = array(
			'name' => $name
		);
		$this->db->insert( 'category', $data );
	}

	/*
	 * DELETE
	 */
	public function del_by_id( $id, $del_article = false )
	{
		if ( $del_article )
		{
			$this->load->model( 'm_Article' );
			$this->m_Article->del_by_id_category( $id );
		}
		$this->db->where( 'id', $id );
		$this->db->delete( 'category' );
	}

	public function del_by_name( $name, $del_article = false )
	{
		if ( $del_article )
		{
			$this->db->select( 'id' );
			$this->db->from( 'category' );
			$this->db->where( 'name', $name );
			$query = $this->db->get();
			$res = $query->result();
			if ( isset($res[0]) )
			{
				$this->load->model( 'm_Article' );
				$this->m_Article->del_by_id_category( $res[0]->id );
			}
		}
		$this->db->where( 'name', $name );
		$this->db->delete( 'category' );
	}

	/*
	 * UPDATE
	 */
	public function update_by_id( $id, Array $data )
	{
		$this->db->where( 'id', $id );
		$this->db->update( 'category', $data );
	}

	public function update_by_name( $name, Array $data )
	{
		$this->db->where( 'name', $name );
		$this->db->update( 'category', $data );
	}

	/*
	 * SELECT
	 */
	public function select( $select, $where = NULL )
	{
		$this->db->select( $select );
		$this->db->from( 'category' );
		if ( $where != NULL )
			$this->db->where( $where );
		$query = $this->db->get();
		return $query->result();
	}

	public function select_by_id( $select, $id )
	{
		return $this->select( $select, array( 'id' => $id ) );
	}

	public function select_by_name( $select, $name )
	{
		return $this->select( $select, array( 'name' => $name ) );
	}
}
