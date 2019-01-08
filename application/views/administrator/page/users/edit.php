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
            <form action="<?= site_url('/administrator/users/update/' . md5($user->id)) ?>" method="POST" role="form" class="form-horizontal">
                <div class="panel-body">
                    <div class="form-group <?= $this->session->flashdata('username') ? 'has-error' : '' ?>">
                        <label class="control-label col-lg-4">
                            <span style="color: #E13300">*</span>
                            USERNAME
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="username" class="form-control" value="<?= $user->username ?>" required="" readonly="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">INSTANSI</label>
                        <div class="col-lg-8">
                            <input type="text" name="instansi" value="<?= $user->instansi ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">JABATAN</label>
                        <div class="col-lg-8">
                            <input type="text" name="jabatan" value="<?= $user->jabatan ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">ALAMAT</label>
                        <div class="col-lg-8">
                            <input type="text" name="alamat" value="<?= $user->alamat ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">EMAIL</label>
                        <div class="col-lg-8">
                            <input type="email" name="email" value="<?= $user->email ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">NO TELP</label>
                        <div class="col-lg-8">
                            <input type="text" name="telp" value="<?= $user->telp ?>" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">LEVEL</label>
                        <div class="col-lg-8">
                            <select name="level" class="form-control">
                                <option value="">-- PILIH LEVEL --</option>
                                <?php if ($user->level == "Administrator") { ?>
                                    <option value="Administrator" selected="">Administrator</option>
                                    <option value="Pengguna">Pengguna</option>
                                <?php } else if ($user->level == "Pengguna") { ?>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Pengguna" selected="">Pengguna</option>
                                <?php } else { ?>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Pengguna" selected="">Pengguna</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <input type="hidden" name="blokir" value="<?= $user->blokir ?>">
                    <input type="hidden" name="key" value="<?= $user->key ?>">
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