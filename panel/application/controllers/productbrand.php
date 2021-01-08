<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class productbrand extends CI_Controller {


	public function __construct(){
		
 

		parent::__construct(); //extends ettiğimiz bir clasıı constructa cagırmak için
		$this->load->model("productbrand_model"); //modelı burda yükledik çünkü her fonksıyonda tanımlanmaz

		if(!get_active_user()){
			redirect(base_url("login"));
		}

	}

	public function index()
	{

		//public function get_all($where=array(),$order_by='id ASC',$selecet='*',$limit=array())  
		$viewData =new stdClass();
		$viewData->rows=$this->productbrand_model->get_all(array(),"rank ASC");  // rank ASC den sonra eklenebilir ,"*",array("count"=>2,"start"=>2)
		
		$this->load->view('productbrand',$viewData);
	}

	//eklemeyi açıcak sayfa
	public function newPage(){

		$this->load->view("new_productbrand");
	}

	
	public function add(){

		$data = array(
			"title" => $this->input->post("title")
		);

		$insert = $this->productbrand_model->add($data);
		
		if ($insert) {
			redirect(base_url("productbrand"));
		}else{
			redirect(base_url("productbrand/newPage"));
		}
	}


	public function editPage($id){

		$viewData= new stdClass();
		//modelden get yap , array içerisinde ver id si $id olan elemanı getir
		$viewData->row= $this->productbrand_model->get(array("id"=>$id));

	$this->load->view("edit_productbrand",$viewData);
	}

	public function edit($id){

		$data = array(
			"title" => $this->input->post("title")
		);

		$update = $this->productbrand_model->update(
			array("id"=>$id),
			$data
		);
		
		if ($update) {
			redirect(base_url("productbrand"));
		}else{
			redirect(base_url("productbrand/editPage/$id"));
		}
	}

	public function delete($id){
		
		$delete=$this->productbrand_model->delete(array("id"=>$id));
		redirect(base_url("productbrand"));
	}

	public function rankUpdate(){

		
		parse_str($this->input->post("data"),$data);
		
		$items=$data["sortId"];

		foreach($items as $rank => $id){

			$this->productbrand_model->update(
				array("id"=>$id),
				array("rank"=>$rank),
				array("rank" => $rank)
			);
		}

	}





}