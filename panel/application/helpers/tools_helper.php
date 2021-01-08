<?php

function get_product_category(){
  
    $CI = &get_instance();

    $CI->load->model("productcategory_model");

    return $CI-> productcategory_model->get_all();

}

function get_product_brand(){
  
    $CI = &get_instance();

    $CI->load->model("productbrand_model");

    return $CI-> productbrand_model->get_all();

}

function get_category_title($category_id=0){
    $t = &get_instance();
    $t->load->model("productcategory_model");
    $category=$t ->productcategory_model->get(
        array(
            "id" => $category_id
        )
    );
    if($category)
    return $category->title;
    else
    return "<b style='color:red'>Tanımlı Değil</b>";
}

function get_brand_title($brand_id=0){
    $t = &get_instance();
    $t->load->model("productbrand_model");
    $brand=$t ->productbrand_model-> get(
        array(
            "id" => $brand_id
        )
    );
    if($brand)
    return $brand->title;
    else
    return "<b style='color:red'>Tanımlı Değil</b>";

}


function get_active_user(){

    $t =  &get_instance();
    $user = $t->session->userdata("user");

    if($user)
     return $user;
    else
     return false;

}







?>