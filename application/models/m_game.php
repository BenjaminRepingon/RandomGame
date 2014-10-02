<?php if ( !defined( 'BASEPATH' ) ) exit('No direct script access allowed');

class m_Game extends CI_Model
{
	/*
	 * ADD
	 */
	public function add( $title, $content, $id_category )
	{
		$data = array(
			'title' => $title,
			'content' => $content,
			'id_category' => $id_category
		);
		$this->db->insert( 'game', $data );
	}

	/*
	 * DELETE
	 */
	public function del_by_id( $id )
	{
		$this->db->where( 'id', $id );
		$this->db->delete( 'game' );
	}

	public function del_by_title( $title )
	{
		$this->db->where( 'title', $title );
		$this->db->delete( 'game' );
	}

	public function del_by_id_category( $id_category )
	{
		$this->db->where( 'id_category', $id_category );
		$this->db->delete( 'game' );
	}

	/*
	 * UPDATE
	 */
	public function update_by_id( $id, Array $data )
	{
		$this->db->where( 'id', $id );
		$this->db->update( 'game', $data );
	}

	public function update_by_title( $title, Array $data )
	{
		$this->db->where( 'title', $title );
		$this->db->update( 'game', $data );
	}

	/*
	 * SELECT
	 */
	public function select( $select, $where = NULL )
	{
		$this->db->select( $select );
		$this->db->from( 'game' );
		if ( $where != NULL )
			$this->db->where( $where );
		$query = $this->db->get();
		return $query->result();
	}

	public function select_by_id( $select, $id )
	{
		return $this->select( $select, array( 'id' => $id ) );
	}

	public function select_by_title( $select, $title )
	{
		return $this->select( $select, array( 'title' => $title ) );
	}

	public function select_by_date_between( $select, $timestamp_min, $timestamp_max )
	{
		return $this->select( $select, array( 'date >' => $timestamp_min, 'date <' => $timestamp_max ) );
	}
}
