<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">KONTAK</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-user"></i> DATA PESAN
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-data" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NAMA</th>
                    <th>SUBJEK/th>
                    <th>EMAIL</th>
                    <th>DIBUAT PADA</th>
                    <th>STATUS</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>NAMA</th>
                    <th>SUBJEK/th>
                    <th>EMAIL</th>
                    <th>DIBUAT PADA</th>
                    <th>STATUS</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($this->contact->all() as $val) { ?>
                    <tr>
                        <td><?= $val->name ?></td>
                        <td><?= $val->subject ?></td>
                        <td><?= $val->email ?></td>
                        <td><?= $val->created_at ?></td>
                        <td class="text-center"><?= $val->action == '0' ? '<label class="label label-warning">BELUM DIBACA</label>' : '<label class="label label-success">TERBACA</label>' ?></td>
                        <td class="text-center">
                            <a href="<?= site_url('/administrator/kontak/view/' . md5($val->id)) ?>" class="btn btn-info btn-xs">
                                <i class="fa fa-search"></i>
                            </a>
                            <input type="hidden" class="linkDlt-<?= $val->id ?>" value="<?= site_url('/administrator/kontak/delete/' . md5($val->id)) ?>" />
                            <a href="javascript::void()" onclick="hapus('<?= $val->id ?>')" data-toggle="modal" data-target=".modal-delete" class="btn btn-danger btn-xs">
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