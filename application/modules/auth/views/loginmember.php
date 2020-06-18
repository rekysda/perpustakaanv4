<!-- Login Baru -->
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url(); ?>">
    <br><b>Welcome</b> Back Member!</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your Library</p>

    <?= $this->session->flashdata('message'); ?>

    <form class="user" method="post" action="<?= base_url('auth/loginmember'); ?>">
      <div class="form-group has-feedback <?= form_error('kode') ? 'has-error' : '' ?>">
        <input type="text" name="kode" value="<?= set_value('kode'); ?>" class="form-control" placeholder="Kode Anggota">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('kode', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="form-group has-feedback <?= form_error('password') ? 'has-error' : '' ?>">
        <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password', '<div class="text-danger">', '</div>') ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
             
       <a href=<?= base_url(); ?> class="btn btn-success">Kembali</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->