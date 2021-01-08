<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {


	public function __construct(){
	
		

		parent::__construct(); //extends ettiğimiz bir clasıı constructa cagırmak için
		$this->load->model("users_model"); //modelı burda yükledik çünkü her fonksıyonda tanımlanmaz

		if(!get_active_user()){
			redirect(base_url("login"));
		}
 

	}

	public function index()
	{

		//public function get_all($where=array(),$order_by='id ASC',$selecet='*',$limit=array())  
		$viewData =new stdClass();
		$viewData->rows=$this->users_model->get_all(array());  // rank ASC den sonra eklenebilir ,"*",array("count"=>2,"start"=>2)
		
		$this->load->view('users',$viewData);
	}

	//eklemeyi açıcak sayfa
	public function newPage(){

		$this->load->view("new_users");
	}

	
	public function add(){

		$data = array(
            "fullname" => $this->input->post("fullname"),
            "email" => $this->input->post("email"),
            "password" => $this->input->post("password")
		);

		$insert = $this->users_model->add($data);
		
		if ($insert) {
			redirect(base_url("users"));
		}else{
			redirect(base_url("users/newPage"));
		}
	}


	public function editPage($id){

		$viewData= new stdClass();
		//modelden get yap , array içerisinde ver id si $id olan elemanı getir
		$viewData->row= $this->users_model->get(array("id"=>$id));

	$this->load->view("edit_users",$viewData);
	}

	public function edit($id){

		$data = array(
			"fullname" => $this->input->post("fullname"),
            "email" => $this->input->post("email"),
            "password" => $this->input->post("password")
		);

		$update = $this->users_model->update(
			array("id"=>$id),
			$data
		);
		
		if ($update) {
			redirect(base_url("users"));
		}else{
			redirect(base_url("users/editPage/$id"));
		}
	}

	public function delete($id){
		
		$delete=$this->users_model->delete(array("id"=>$id));
		redirect(base_url("users"));
    }
    
    public function isActiveSetter(){

		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;

		$update = $this->users_model->update(
			array("id" => $id),
			array("isActive" => $isActive)
		);

	}







}