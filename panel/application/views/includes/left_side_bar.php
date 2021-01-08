<?php

$parent     = $this->session->userdata("parent");
$activeItem = $this->session->userdata("activeItem");
$user =get_active_user();
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url("assets");?>/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $user->fullname;?></p>
                
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">İşlemler</li>
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>

            <li class="treeview <?php echo ($parent == "room_folder") ? "active" : ""; ?>">
                <a href="#">
                    <i class="fa fa-bed"></i>
                    <span>Ürün İşlemleri</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>

                <ul class="treeview-menu" id="room_folder">
                    <li class="<?php echo ($activeItem == "product") ? "active" : ""; ?>" id="product">
                        <a href="<?php echo base_url("product");?>"><i class="fa fa-circle-o"></i> Ürünler</a>
                    </li>
                    <li class="<?php echo ($activeItem == "product_category") ? "active" : ""; ?>" id="product_category">
                        <a href="<?php echo base_url("productcategory");?>"><i class="fa fa-circle-o"></i> Kategoriler</a>
                    </li>
                    <li class="<?php echo ($activeItem == "product_brand") ? "active" : ""; ?>" id="product_brand">
                        <a href="<?php echo base_url("productbrand");?>"><i class="fa fa-circle-o"></i> Markalar</a>
                    </li>
                   
                </ul>
            </li>

            <li class="treeview <?php echo ($parent == "usera") ? "active" : ""; ?>">
                <a href="#">
                    <i class="fa fa-bed"></i>
                    <span>Kullanıcı İşlemleri</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" id="user">
                    <li class="<?php echo ($activeItem == "usera") ? "active" : ""; ?>" id="user">
                        <a href="<?php echo base_url("users");?>"><i class="fa fa-circle-o"></i> Kullanıcılar</a>
                    </li>
                  
                   
                </ul>
             
            </li>


        </ul>

    </section>
    <!-- /.sidebar -->
</aside>