
<section class="content">
	<div class="row">
		<a href="<?php echo base_url("product/newPage");?>" class="btn btn-sm btn-primary mb10"><i class="fa fa-plus"></i> ekle </a>
		<div class="box">

		
            
            <div class="box-body">
              
              <div class="input-group margin">
                <input type="text" class="form-control" placeholder="bul">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">Bul</button>
                    </span>
              </div>
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
         




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
										
                                        </a>

										</td>


									</tr>

								<?php } ?>

							</tbody>
						</table>
					</div>

				</div>

			</div>
</section>