<section class="content">
	<div class="row">
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">

				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="post" action="<?php echo base_url("product/add");?>">
				

					<div class="box-body col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Başlık</label>
							<input type="text" class="form-control" name="title">
						</div>
					</div>


			


					<div class="clearfix"></div>
					<div class="box-body col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Seri Numarası</label>
							<input type="text" class="form-control" name="serial_number">
						</div>

					</div>


					<div class="box-body col-md-6">
						<div class="form-group">
							<label for="exampleInputEmail1">Fiyatı</label>
							<input type="text" class="form-control" name="price">
						</div>
					</div>

					<div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Kategorisi</label>
                            <select class="form-control" name="product_type_id">
                                <?php foreach (get_product_category(array("isActive" => 1)) as $category){ ?>
                                    <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


			

					<div class="box-body col-md-6">
                        <div class="form-group">
                            <label>Markası</label>
                            <select class="form-control" name="product_brand_id">
                                <?php foreach (get_product_brand(array("isActive" => 1)) as $brand){ ?>
                                    <option value="<?php echo $brand->id; ?>"><?php echo $brand->title; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


			


			</div>











			<!-- /.box-body -->
			<div class="clearfix"></div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary">ekle</button>
			</div>
			</form>
		</div>
		<!-- /.box -->
	</div>

</section>
