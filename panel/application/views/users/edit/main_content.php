<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url("users/edit/$row->id");?>">
                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adı Soyadı</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Adı Soyadı" value="<?php echo $row->fullname; ?>">                        </div>
                    </div>
                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-Posta</label>
                            <input type="text" class="form-control" name="email" placeholder="E-posta" value="<?php echo $row->email; ?>">                        </div>
                    </div>

                    <div class="box-body col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Şifre</label>
                            <input type="text" class="form-control" name="password" placeholder="E-posta" value="<?php echo $row->password; ?>">                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="clearfix"></div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
</section>
<!-- /.content -->