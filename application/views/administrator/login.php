<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LOGIN | SIG DISHUB KABUPATEN TEMANGGUNG</title>

        <link href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/datepicker3.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/styles.css') ?>" rel="stylesheet">

        <link href="<?= base_url('assets/admin/plugins/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <form action="" method="POST" role="form">
                            <div class="panel-heading text-center">HALAMAN LOGIN</div>
                            <div class="panel-body">

                                <?php if ($this->session->flashdata('failed')) { ?>
                                    <div class="alert bg-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign"></span> 
                                        <?= $this->session->flashdata('failed') ?>
                                    </div>
                                <?php } ?>

                                <fieldset>
                                    <div class="form-group <?= $this->session->flashdata('MsgUname') ? 'has-error' : '' ?>">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus="" value="<?= $this->session->flashdata('OldUname') ? $this->session->flashdata('OldUname') : '' ?>">

                                        <?php if ($this->session->flashdata('MsgUname')) { ?>
                                            <small style="color:#E13300"><?= $this->session->flashdata('MsgUname') ?></small>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group <?= $this->session->flashdata('MsgPaswd') ? 'has-error' : '' ?>">
                                        <input class="form-control" placeholder="Password" name="password" type="password">
                                        <?php if ($this->session->flashdata('MsgPaswd')) { ?>
                                            <small style="color:#E13300"><?= $this->session->flashdata('MsgPaswd') ?></small>
                                        <?php } ?>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" name="submit" class="btn btn-primary btn-block">
                                    <i class="fa fa-sign-in"></i> LOGIN
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->	
        </div>
        <script src="<?= base_url('/assets/admin/js/jquery-1.11.1.min.js') ?>"></script>
        <script src="<?= base_url('/assets/admin/js/bootstrap.min.js') ?>"></script>
    </body>

</html>
