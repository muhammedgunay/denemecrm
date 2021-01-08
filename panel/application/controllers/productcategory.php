<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productcategory extends CI_Controller {


	public function __construct(){
	
		

		parent::__construct(); //extends ettiğimiz bir clasıı constructa cagırmak için
		$this->load->model("productcategory_model"); //modelı burda yükledik çünkü her fonksıyonda tanımlanmaz

		if(!get_active_user()){
			redirect(base_url("login"));
		}
 

	}

	public function index()
	{

		//public function get_all($where=array(),$order_by='id ASC',$selecet='*',$limit=array())  
		$viewData =new stdClass();
		$viewData->rows=$this->productcategory_model->get_all(array(),"rank ASC");  // rank ASC den sonra eklenebilir ,"*",array("count"=>2,"start"=>2)
		
		$this->load->view('productcategory',$viewData);
	}

	//eklemeyi açıcak sayfa
	public function newPage(){

		$this->load->view("new_productcategory");
	}

	
	public function add(){

		$data = array(
			"title" => $this->input->post("title")
		);

		$insert = $this->productcategory_model->add($data);
		
		if ($insert) {
			redirect(base_url("productcategory"));
		}else{
			redirect(base_url("productcategory/newPage"));
		}
	}


	public function editPage($id){

		$viewData= new stdClass();
		//modelden get yap , array içerisinde ver id si $id olan elemanı getir
		$viewData->row= $this->productcategory_model->get(array("id"=>$id));

	$this->load->view("edit_productcategory",$viewData);
	}

	public function edit($id){

		$data = array(
			"title" => $this->input->post("title")
		);

		$update = $this->productcategory_model->update(
			array("id"=>$id),
			$data
		);
		
		if ($update) {
			redirect(base_url("productcategory"));
		}else{
			redirect(base_url("productcategory/editPage/$id"));
		}
	}

	public function delete($id){
		
		$delete=$this->productcategory_model->delete(array("id"=>$id));
		redirect(base_url("productcategory"));
	}

	public function rankUpdate(){

		
		parse_str($this->input->post("data"),$data);
		
		$items=$data["sortId"];

		foreach($items as $rank => $id){

			$this->productcategory_model->update(
				array("id"=>$id),
				array("rank"=>$rank),
				array("rank" => $rank)
			);
		}

	}





}