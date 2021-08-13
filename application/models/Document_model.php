<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_model extends CI_Model {

  var $table = 'document';
  var $primary_key = 'document_id';

  public function __construct() {
    parent::__construct();
  }

  public function getAll() {
    $this->db->order_by('created_at', 'desc');
    return $this->db->get($this->table)->result();
  }

  public function getById($id = null) {
    $this->db->where($this->primary_key, $id);
    return $this->db->get($this->table)->row();
  }

  public function getWhere($where = []) {
    $this->db->where($where);
    return $this->db->get($this->table)->result();
  }

  public function getJoinUser() {
    $this->db->select("document.*,user.fullname");
    $this->db->from($this->table);
    $this->db->join('user', 'document.user_id = user.id');
    return $this->db->get()->result();
  }

}