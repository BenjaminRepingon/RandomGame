<?php if ( !defined( 'BASEPATH' ) ) exit('No direct script access allowed');

class m_Game extends CI_Model
{
	/*
	 * ADD
	 */
	public function add( $title, $link_name, $author, $iframe, $description, $instructions, $id_category, $img )
	{
		$data = array(
			'title' => $title,
			'link_name' => $link_name,
			'author' => $author,
			'iframe' => $iframe,
			'description' => $description,
			'instructions' => $instructions,
			'id_category' => $id_category,
			'img' => $img,
			'rating' => 0,
			'plays' => 0
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
	public function select( $select, $where = NULL, $limit = NULL, $offset = NULL)
	{
		$this->db->select( $select );
		$this->db->join('category', 'category.id = game.id_category');
		if ( $where != NULL )
			$this->db->where( $where );
		$query = $this->db->get('game', $limit, $offset);
		return $query->result();
	}

	public function select_top( $select, $top, $where = NULL, $limit = NULL, $offset = NULL)
	{
		$this->db->select( $select );
		$this->db->order_by($top, 'ASC');
		$this->db->join('category', 'category.id = game.id_category');
		if ( $where != NULL )
			$this->db->where( $where );
		$query = $this->db->get('game', $limit, $offset);
		return $query->result();
	}

	public function select_by_id( $select, $id )
	{
		return $this->select( $select, array( 'id' => $id ) );
	}

	public function select_by_link_name( $select, $title )
	{
		return $this->select( $select, array( 'link_name' => $title ) );
	}

	public function select_by_date_between( $select, $timestamp_min, $timestamp_max )
	{
		return $this->select( $select, array( 'date >' => $timestamp_min, 'date <' => $timestamp_max ) );
	}
}
