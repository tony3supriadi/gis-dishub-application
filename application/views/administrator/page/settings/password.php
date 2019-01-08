<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">PASSWORD</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-qrcode"></i> UBAH PASSWORD!!
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <form action="<?= site_url('/administrator/password/password') ?>" method="POST" role="form" class="form-horizontal">
                <div class="panel-body">
                    <?php if ($this->session->flashdata('Success')) { ?>
                        <div class="alert bg-success"><?= $this->session->flashdata('Success') ?></div>
                    <?php } ?>
                    <div class="form-group <?= $this->session->flashdata('MsgErrPassword') ? 'has-error' : '' ?>"">
                        <label class="control-label col-lg-4">
                            <span style="color: #E13300">*</span>
                            PASSWORD LAMA
                        </label>
                        <div class="col-lg-8">
                            <input type="password" name="password" class="form-control" required="" />

                            <?php if ($this->session->flashdata('MsgErrPassword')) { ?>
                                <small style="color:#E13300"><?= $this->session->flashdata('MsgErrPassword') ?></small>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group <?= $this->session->flashdata('MsgErrNewPassword') ? 'has-error' : '' ?>"">
                        <label class="control-label col-lg-4">
                            <span style="color: #E13300">*</span>
                            PASSWORD BARU
                        </label>
                        <div class="col-lg-8">
                            <input type="password" name="baru_password" class="form-control" required="" />

                            <?php if ($this->session->flashdata('MsgErrNewPassword')) { ?>
                                <small style="color:#E13300"><?= $this->session->flashdata('MsgErrNewPassword') ?></small>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group <?= $this->session->flashdata('MsgErrConfPassword') ? 'has-error' : '' ?>"">
                        <label class="control-label col-lg-4">
                            <span style="color: #E13300">*</span>
                            PASSWORD ULANG
                        </label>
                        <div class="col-lg-8">
                            <input type="password" name="konfirmasi_password" class="form-control" required="" />

                            <?php if ($this->session->flashdata('MsgErrConfPassword')) { ?>
                                <small style="color:#E13300"><?= $this->session->flashdata('MsgErrConfPassword') ?></small>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <button type="reset" class="btn btn-default">
                        <i class="fa fa-refresh"></i> RESET
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> SIMPAN
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>