<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

 function index()
 {
  $this->load->view('ajaxsearch');
}

function fetch()
{
  $output = '';
  $query = '';
  $this->load->model('ajaxsearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
 }
 $data = $this->ajaxsearch_model->fetch_data($query);

 if($data->num_rows() > 0)
 {
   foreach($data->result() as $row)
   {
    $output .= '
    <div class="inbox-item">
    <div class="inbox-item-img"><img
    src="'.base_url("assets").'/images/users/user-2.jpg"
    class="rounded-circle" alt=""></div>
    <p class="inbox-item-author">'.$row->title.'</p>
    <p class="inbox-item-author">'.$row->serial_number.'</p>
    <p class="inbox-item-text"> '.get_category_title($row->product_category).'</p>
    <p class="inbox-item-date">


    <a href=' .base_url("product/editPage/$row->id").'>
    <i class="fa fa-edit" style="font-size:16px;"></i>
    </a> 
    <a href=' .base_url("product/delete/$row->id").'>
    <i class="fa fa-trash" style="font-size:16px;"></i>
    </a>  
    <a href=' .base_url("product/imageUploadPage/$row->id").'>
    <i class="fa fa-image" style="font-size:16px;"></i>
    </a>  
    
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message'.$row->id.'">Message</button>

    </p>




    </div>




    ';
  }

}
else
{
 $output .= '<tr>
 <td colspan="5">No Data Found</td>
 </tr>';
}

echo $output;
}

}