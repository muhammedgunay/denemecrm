
<section class="content">
	<div class="row">
		<a href="<?php echo base_url("productbrand/newPage");?>" class="btn btn-sm btn-primary mb10"><i class="fa fa-plus"></i> ekle </a>
		<div class="box">
			<div class="box-body table-responsive no padding">
				<table class="table table-hover">
					<thead>
						
						<th>id</th>
						<th>Baslik</th>
						
						<th class="col-md-2">İşlemler</th>

					</thead>
					<tbody class="sortableList" postUrl="productbrand/rankUpdate">
						<?php foreach ($rows as $row) {?>


							<tr id="sortId-<?php echo $row->id; ?>">

								<td><?php echo  $row->id; ?></td>
								<td><?php echo  $row->title; ?></td>
							
								<td>
									<a href="<?php echo base_url("productbrand/editPage/$row->id");?>">
										<i class="fa fa-edit"></i>
									</a>

									<a href="<?php echo base_url("productbrand/delete/$row->id");?>">
											<i class="fa fa-trash"></i>
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