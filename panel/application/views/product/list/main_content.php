
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<section class="content">
	<div class="row">
		<a href="<?php echo base_url("product/newPage");?>" class="btn btn-sm btn-primary mb10"><i class="fa fa-plus"></i> ekle </a>
		<div class="box">
			



			<div class="box-body">

				<div class="input-group margin">
					<input type="text" name="search_text" id="search_text" class="form-control" placeholder="bul">
					<span class="input-group-btn">
						<button type="button" class="btn btn-info btn-flat">Bul</button>
					</span>
				</div>
				<!-- /input-group -->
			</div>
			<!-- /.box-body -->

 <div id="result"></div>



			<div class="box-body table-responsive no padding">
				<table class="table table-hover">
					<thead>
						
						
						<th>Baslik</th>
						<th>Seri Numarası</th>
						<th>Fiyat</th>
						<th>Kategori</th>

						<th>Marka</th>
						<th>İşlemler</th>
						

					</thead>
					<tbody class="sortableList" postUrl="product/rankUpdate">
					<?php foreach ($rows as $row) {?>

							<tr id="sortId-<?php echo $row->id; ?>">

								<td><?php echo  $row->title; ?></td>
								<td><?php echo  $row->serial_number; ?></td>
								<td><?php echo  $row->price; ?></td>
								<td><?php echo  get_category_title($row->product_category); ?></td>
								<td><?php echo  get_brand_title($row->product_brand); ?></td>

								<td>
									<a href="<?php echo base_url("product/editPage/$row->id");?>">
										<i class="fa fa-edit" style="font-size:16px;"></i>
									</a> 
									<a class="removeBtn"  dataURL="<?php echo base_url("product/delete/$row->id"); ?>">
										<i class="fa fa-trash" style="font-size:16px;"></i>
									</a> 

									<a href="<?php echo base_url("product/imageUploadPage/$row->id"); ?>">
										<i class="fa fa-image" style="font-size:16px;"></i>
									</a> 

									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $row->id;?>">Message</button>

									

								</td>


							</tr>

<!--
<a href="<?php echo base_url("product/delete/$row->id"); ?>" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash" style="font-size:16px;"></i></a> -->



							<div id="message<?php echo $row->id;?>" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Modal Header</h4>
										</div>
										<div class="modal-body">
											<p>Some text in the modal.</p>
											<?php echo $row->id;?>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>

								</div>
							</div>

						<?php } ?>

					</tbody>
				</table>
			</div>

		</div>
		
	</div>

</section>



<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>Ajaxsearch/fetch",
   method:"POST",
   data:{query:query},
   success:function(data){
    $('#result').html(data);
   }
  })
 }

 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>


