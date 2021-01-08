<?php


class product_model extends CI_Model
{

	public function __construct(){
		
		parent::__construct();

		$this-> table= "product";
	}



	public function get_all($where=array(),$order_by='id ASC',$selecet='*',$limit=array())  
	//get_all bana kalmış bir fonksiyon değişebilirim adını
	{
			//select yap. burdan gelen selecti
		$this->db->select($selecet) 
		->from($this->table)
		->where($where);

		if(!empty($order_by)) {
			$this->db->order_by($order_by);
		}

		if(!empty($limit)){
			$this->db->limit($limit["count"],$limit["start"]);
		}
		
		$results = $this->db->get()->result();
		return $results;

	}
	
	public function get($where=array()){

		$row = $this->db->where($where)->get($this->table)->row();

		return $row;
	}


	public function add($data=array()){

		$insert = $this
		->db
		->insert($this->table,$data);

		return $insert;
	}


	public function update($where=array(),$data=array()){

		$update=$this->db
		->where($where)
		->update($this->table,$data);

		return $update;

	}


	
	public function delete($where=array()){
		$delete =$this->db
		->where($where)
		->delete($this->table);

		return $delete;
	}

    
}