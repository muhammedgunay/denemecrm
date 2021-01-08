<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {


	public function __construct(){
	

		parent::__construct(); //extends ettiğimiz bir clasıı constructa cagırmak için
		$this->load->model("product_model"); //modelı burda yükledik çünkü her fonksıyonda tanımlanmaz
		$this->load->model("productimage_model");

		if(!get_active_user()){
			redirect(base_url("login"));
		}

	}

	public function index()
	{

		//public function get_all($where=array(),$order_by='id ASC',$selecet='*',$limit=array())  
		$viewData =new stdClass();
		$viewData->rows=$this->product_model->get_all(array(),"rank ASC");  // rank ASC den sonra eklenebilir ,"*",array("count"=>2,"start"=>2)
		
		$this->load->view('product',$viewData);
	}

	//eklemeyi açıcak sayfa
	public function newPage(){

		$this->load->view("new_product");
	}



	
	public function add(){

        

		$data = array(
            "title"                 => $this->input->post("title"),
            "serial_number" 		=> $this->input->post("serial_number"),
			"price" 		        => $this->input->post("price"),
			"product_category"		=> $this->input->post("product_type_id"),
			"product_brand" 		=> $this->input->post("product_brand_id"),
			
		);

		$insert = $this->product_model->add($data);
		
		if ($insert) {
			redirect(base_url("product"));
		}else{
			redirect(base_url("product/newPage"));
		}
	}





	public function editPage($id){

		$viewData= new stdClass();
		//modelden get yap , array içerisinde ver id si $id olan elemanı getir
		$viewData->row= $this->product_model->get(array("id"=>$id));

	$this->load->view("edit_product",$viewData);
	}



	public function edit($id){

        $data = array(
            "title"                 => $this->input->post("title"),
            "serial_number" 		=> $this->input->post("serial_number"),
			"price" 		        => $this->input->post("price"),
			"product_category"		=> $this->input->post("product_type_id"),
			"product_brand" 		=> $this->input->post("product_brand_id"),
			
		);

		$update = $this->product_model->update(
			array("id"=>$id),
			$data
		);
		
		if ($update) {
			redirect(base_url("product"));
		}else{
			redirect(base_url("product/editPage/$id"));
		}
	}



    
	public function delete($id){
		
		$delete=$this->product_model->delete(array("id"=>$id));
		redirect(base_url("product"));
	}

	public function rankUpdate(){

		
		parse_str($this->input->post("data"),$data);
		
		$items=$data["sortId"];

		foreach($items as $rank => $id){

			$this->product_model->update(
				array("id"=>$id),
				array("rank"=>$rank),
				array("rank" => $rank)
			);
		}

	}

	/*public function isActiveSetter()
	{
		$id = $this->input->post("id");
		$isActive=($this->input->post("isActive")=="true") ? 1 : 0;

		$update= $this->product_model->update(
			array("id"=> $id),
			array("isActive"=>$isActive)
		);
		
	}*/

	public function isActiveSetterForImage(){

		$id 	  = $this->input->post("id");
		$isActive = ($this->input->post("isActive") == "true") ? 1 : 0;

		$update = $this->productimage_model->update(
			array("id" => $id),
			array("isActive" => $isActive)
		);

	}



	public function productImageRankUpdate(){

		parse_str($this->input->post("data"), $data);

		$items = $data["sortId"];

		foreach($items as $rank => $id){

			$this->productimage_model->update(
				array(
					"id"      => $id,
					"rank !=" => $rank
				),
				array("rank" => $rank)
			);

		}

	}

	// main_contentten gelen id yi aldık
	public function imageUploadPage($product_id){

		$this->session->set_userdata("product_id", $product_id);

		$viewData = new stdClass();
		$viewData->rows = $this->productimage_model->get_all(
			array(
				"product_id"	=> $product_id,
			),"rank ASC"
		);

		$this->load->view("product_image", $viewData);

	}

	public function upload_image(){

		$config['upload_path']          = 'uploads/';
		$config['allowed_types']        = '*';
		$config['encrypt_name']			= true;

		$this->load->library('upload', $config);



		if ( ! $this->upload->do_upload('file'))
		{
			$error = array('error' => $this->upload->display_errors());

			print_r($error);

		}
		else
		{

			// Upload Basarili ise DB ye aktar..
			$data = array('upload_data' => $this->upload->data());
			$img_id = $data["upload_data"]['file_name'];

			$this->productimage_model->add(array(
					"img_id"	=> $img_id,
					"product_id"	=> $this->session->userdata("product_id"),
					
					"rank"		=> 0
				)

			);


		}

	
		

	}

	public function deleteImage($id){

		$image = $this->productimage_model->get(array("id" => $id));

		$file_name = FCPATH ."uploads/$image->img_id";

		if(unlink($file_name)){

			$delete = $this->productimage_model->delete(array("id"	=> $id));

			if($delete){

				redirect("product/imageUploadPage/$image->product_id");

			}
		}


	}



}