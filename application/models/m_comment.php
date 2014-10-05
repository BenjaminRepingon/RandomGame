<?php if ( !defined( 'BASEPATH' ) ) exit('No direct script access allowed');

class m_Comment extends CI_Model
{
	/*
	 * ADD
	 */
	public function add( $content, $id_game, $author )
	{
		$data = array(
			'content' => $content,
			'id_game' => $id_game,
			'author' => $author
		);
		$this->db->insert( 'comments', $data );
	}

	/*
	 * DELETE
	 */
	public function del_by_id( $id )
	{
		$this->db->where( 'id', $id );
		$this->db->delete( 'comments' );
	}

	public function del_by_id_game( $id_game )
	{
		$this->db->where( 'id_game', $id_game );
		$this->db->delete( 'comments' );
	}

	/*
	 * UPDATE
	 */
	public function update_by_id( $id, Array $data )
	{
		$this->db->where( 'id', $id );
		$this->db->update( 'comments', $data );
	}

	/*
	 * SELECT
	 */
	public function select( $select, $where = NULL, $limit = NULL, $offset = NULL)
	{
		$this->db->select( $select );
		if ( $where != NULL )
			$this->db->where( $where );
		$query = $this->db->get('comments', $limit, $offset);
		return $query->result();
	}

	public function select_top( $select, $top, $where = NULL, $limit = NULL, $offset = NULL)
	{
		$this->db->select( $select );
		$this->db->order_by($top, 'ASC');
		if ( $where != NULL )
			$this->db->where( $where );
		$query = $this->db->get('comments', $limit, $offset);

		return $query->result();
	}

	public function select_by_id( $select, $id )
	{
		return $this->select( $select, array( 'id' => $id ) );
	}

	public function select_by_date_between( $select, $timestamp_min, $timestamp_max )
	{
		return $this->select( $select, array( 'date >' => $timestamp_min, 'date <' => $timestamp_max ) );
	}
}
