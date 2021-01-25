<?php
class Ajaxsearch_model extends CI_Model
{
 function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("product");
  if($query != '')
  {
   $this->db->like('title', $query);
   $this->db->or_like('serial_number', $query);
   $this->db->or_like('price', $query);
   $this->db->or_like('product_category', $query);
   $this->db->or_like('product_brand', $query);
  }
  $this->db->order_by('id', 'DESC');
  return $this->db->get();
 }
}
?>