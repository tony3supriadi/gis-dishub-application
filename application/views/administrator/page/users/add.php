<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="<?= site_url('/administrator/users') ?>">USERS</a></li>
        <li class="active">ADD</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-dashboard"></i> USERS | TAMBAH DATA
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <form action="<?= site_url('/administrator/users/create') ?>" method="POST" role="form" class="form-horizontal">
                <div class="panel-body">
                    <div class="form-group <?= $this->session->flashdata('MsgErrUsername') ? 'has-error' : '' ?>"">
                        <label class="control-label col-lg-4">
                            <span style="color: #E13300">*</span>
                            USERNAME
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="username" class="form-control" required="" value="<?=$this->session->flashdata('username') ? $this->session->flashdata('username') : '' ?>" />
                            
                            <?php if ($this->session->flashdata('MsgErrUsername')) { ?>
                                <small style="color:#E13300"><?= $this->session->flashdata('MsgErrUsername') ?></small>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">
                            <span style="color: #E13300">*</span>
                            PASSWORD
                        </label>
                        <div class="col-lg-8">
                            <input type="password" name="password" class="form-control" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">INSTANSI</label>
                        <div class="col-lg-8">
                            <input type="text" name="instansi" class="form-control" value="<?=$this->session->flashdata('instansi') ? $this->session->flashdata('instansi') : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">JABATAN</label>
                        <div class="col-lg-8">
                            <input type="text" name="jabatan" class="form-control" value="<?=$this->session->flashdata('jabatan') ? $this->session->flashdata('jabatan') : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">ALAMAT</label>
                        <div class="col-lg-8">
                            <input type="text" name="alamat" class="form-control" value="<?=$this->session->flashdata('alamat') ? $this->session->flashdata('alamat') : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">EMAIL</label>
                        <div class="col-lg-8">
                            <input type="email" name="email" class="form-control" value="<?=$this->session->flashdata('email') ? $this->session->flashdata('email') : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">NO TELP</label>
                        <div class="col-lg-8">
                            <input type="text" name="telp" class="form-control" value="<?=$this->session->flashdata('telp') ? $this->session->flashdata('telp') : '' ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">LEVEL</label>
                        <div class="col-lg-8">
                            <select name="level" class="form-control">
                                <option value="">-- PILIH LEVEL --</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Pengguna" selected="">Pengguna</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <input type="hidden" name="blokir" value="N">
                    <input type="hidden" name="key" value="<?= md5(rand(1111, 9999)) ?>">
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