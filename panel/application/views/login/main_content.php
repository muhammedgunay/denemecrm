
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>DENEME</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Bilgilerinizle Girş Yapın</p>

    <form action="<?php echo base_url("login/do_login"); ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="E-posta" name="user_email">
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		<?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("user_email"); ?></small>
                <?php } ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="şifre" name="user_password">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		<?php if(isset($form_error)){ ?>
                    <small class="pull-right input-form-error"> <?php echo form_error("user_password"); ?></small>
                <?php } ?>
      </div>
      <div class="row">
     
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Giriş Yap</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   

    <a href="#">Şifremi unuttum</a><br>
    

  </div>
  <!-- /.login-box-body -->
</div>
