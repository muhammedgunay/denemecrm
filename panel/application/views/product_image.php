<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("includes/head"); ?>
	<?php $this->load->view("product/image/page_style"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">


	<div class="wrapper">

		<?php $this->load->view("includes/header"); ?>
		<!-- Left side column. contains the logo and sidebar -->

		<?php $this->load->view("includes/left_side_bar"); ?>
		<!-- Content Wrapper. Contains page content -->
		
		<div class="content-wrapper">
			
			<?php  $this->load->view("product/image/breadcrumb");?>

			<?php $this->load->view("product/image/image_main_content"); ?>

		</div>

		<?php $this->load->view("includes/right_side_bar"); ?>

		
	</div>


	<?php $this->load->view("includes/footer"); ?>
	<?php $this->load->view("product/image/page_script"); ?>
</body>
</html>