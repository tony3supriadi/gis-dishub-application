<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">USERS</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-user"></i> DATA USERS
        </h1>
    </div>
    <div class="col-lg-6 text-right">
        <br /><br />
        <a href="<?= site_url('/administrator/users/add') ?>" class="btn btn-primary">
            <i class="fa fa-plus"></i> TAMBAH DATA
        </a>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-data" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>USERNAME</th>
                    <th>NO TELP</th>
                    <th>EMAIL</th>
                    <th>JABATAN</th>
                    <th>INSTANSI</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>USERNAME</th>
                    <th>NO TELP</th>
                    <th>EMAIL</th>
                    <th>JABATAN</th>
                    <th>INSTANSI</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($this->users->all() as $val) { ?>
                    <tr>
                        <td><?= $val->username ?></td>
                        <td><?= $val->telp ?></td>
                        <td><?= $val->email ?></td>
                        <td class="hidden-xs"><?= $val->jabatan ?></td>
                        <td class="hidden-sm"><?= $val->instansi ?></td>
                        <td class="text-center">
                            <a href="<?= site_url('/administrator/users/view/' . md5($val->id)) ?>" class="btn btn-info btn-xs">
                                <i class="fa fa-search"></i>
                            </a>
                            <a href="<?= site_url('/administrator/users/edit/' . md5($val->id)) ?>" class="btn btn-default btn-xs">
                                <i class="fa fa-edit"></i>
                            </a>
                            <input type="hidden" class="linkDlt-<?= $val->id ?>" value="<?= site_url('/administrator/users/delete/' . md5($val->id)) ?>" />
                            <a href="javascript::void()" onclick="hapus('<?= $val->id ?>')" data-toggle="modal" data-target=".modal-delete" class="btn btn-danger btn-xs" <?= $val->id == 1 ? 'disabled' : '' ?>>
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<br />