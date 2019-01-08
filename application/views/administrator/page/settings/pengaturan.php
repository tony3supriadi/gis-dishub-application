<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">PENGATURAN</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-cog"></i> PENGATURAN
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <form action="<?= site_url('/administrator/pengaturan/pengaturan') ?>" method="POST" role="form" class="form-horizontal">
                <div class="panel-body">
                    <?php if ($this->session->flashdata('Success')) { ?>
                        <div class="alert bg-success"><?= $this->session->flashdata('Success') ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            FACEBOOK
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="facebook" class="form-control" value="<?= $setting->facebook ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            FACEBOOK LINK
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="facebook_link" class="form-control" value="<?= $setting->facebook_link ?>" />
                        </div>
                    </div>

                    <hr />
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            TWITTER
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="twitter" class="form-control" value="<?= $setting->twitter ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            TWITTER LINK
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="twitter_link" class="form-control" value="<?= $setting->twitter_link ?>" />
                        </div>
                    </div>

                    <hr />
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            YOUTUBE
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="youtube" class="form-control" value="<?= $setting->youtube ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            YOUTUBE LINK
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="youtube_link" class="form-control" value="<?= $setting->youtube_link ?>" />
                        </div>
                    </div>

                    <hr />
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            WEBSITE
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="website" class="form-control" value="<?= $setting->website ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            WEBSITE LINK
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="website_link" class="form-control" value="<?= $setting->website_link ?>" />
                        </div>
                    </div>

                    <hr />
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            E-MAIL
                        </label>
                        <div class="col-lg-8">
                            <input type="email" name="email" class="form-control" value="<?= $setting->email ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            TELP
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="telp" class="form-control" value="<?= $setting->telp ?>" />
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