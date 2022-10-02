<?php
class Book_m extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  // create
  function create($option)
  {
    $this->db->set('workspace', $this->session->userdata('workspace'));
    $this->db->set($option);

    $this->db->insert('book_master');
    $result = $this->db->insert_id();
    return $result;
  }

  // read book list
  function r_list($option = null)
  {
    $this->db->select('*');
    $this->db->order_by('status', 'ASC');
    $this->db->order_by('grade1', 'DESC');
    $this->db->order_by('grade2', 'ASC');

    if ($option) {
      $this->db->where('flag', 1);
      $this->db->where('workspace', $this->session->userdata('workspace'));
      $this->db->where($option);
    } else {
      $this->db->where('flag', 1);
      $this->db->where('workspace', $this->session->userdata('workspace'));
    }
    $result = $this->db->get('book_master')->result();
    return $result;
  }

  // read a book
  function r_get($book_id)
  {
    $this->db->select('*');

    $this->db->select('UNIX_TIMESTAMP(modified_time) AS modified_time');

    $this->db->where(
      array(
        'id' => $book_id
      )
    );
    $result = $this->db->get('book_master')->row();
    return $result;
  }


  // update a book
  function update($option)
  {
    $this->db->set($option);

    $this->db->where('id', $option['id']);

    $result = $this->db->update('book_master');

    return $result;
  }

  // delete a book
  function delete($book_id)
  {
    $this->db->where('id', $book_id);

    $result = $this->db->delete('book_master');

    return $result;
  }
}
