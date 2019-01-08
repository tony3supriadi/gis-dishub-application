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
            <div class="panel-heading text-right">
                <a href="<?= site_url('/administrator/users/edit/' . md5($user->id)) ?>" class="btn btn-default btn-sm">
                    <i class="fa fa-edit"></i> EDIT
                </a>
                <a href="<?= site_url('/administrator/users') ?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-table"></i> DATA
                </a>
            </div>
            <div class="panel-body no-padding">
                <table class="table table-striped table-hover">
                    <tr>
                        <td width="30%" class="text-right"><b>USERNAME</b></td>
                        <td width="5%">:</td>
                        <td><?= $user->username ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>INSTANSI</b></td>
                        <td width="5%">:</td>
                        <td><?= $user->instansi ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>ALAMAT</b></td>
                        <td width="5%">:</td>
                        <td><?= $user->alamat ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>JABATAN</b></td>
                        <td width="5%">:</td>
                        <td><?= $user->jabatan ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>E-MAIL</b></td>
                        <td width="5%">:</td>
                        <td><?= $user->email ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>NO.TELP</b></td>
                        <td width="5%">:</td>
                        <td><?= $user->telp ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>LEVEL</b></td>
                        <td width="5%">:</td>
                        <td><?= $user->level ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>