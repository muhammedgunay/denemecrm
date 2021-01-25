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
 $output .= '
 <div class="box-body table-responsive no padding">
 <table class="table table-hover">
 <tr>
 <th>Customer Name</th>
 <th>Address</th>
 <th>City</th>
 <th>Postal Code</th>
 <th>Country</th>
  <th>İşlemler</th>
 </tr>
 
 <tbody class="sortableList" postUrl="product/rankUpdate">';
 if($data->num_rows() > 0)
 {
   foreach($data->result() as $row)
   {
    $output .= '
    <tr id="sortId-'.$row->id.'">
    <td>'.$row->title.'</td>
    <td>'.$row->serial_number.'</td>
    <td>'.$row->price.'</td>
    <td>'.get_category_title($row->product_category).'</td>
    <td>'.get_brand_title($row->product_brand).'</td>
    <td>
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
             </td>
    </tr>';
  }

}
else
{
 $output .= '<tr>
 <td colspan="5">No Data Found</td>
 </tr>';
}
$output .= '</tbody>';
$output .= '</table>';
echo $output;
}

}