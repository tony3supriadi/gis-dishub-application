<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">MARKER OBJEK</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-map-marker"></i> DATA MARKER OBJEK
        </h1>
    </div>
    <div class="col-lg-6 text-right">
        <br /><br />
        <a href="<?= site_url('/administrator/objek/add') ?>" class="btn btn-primary">
            <i class="fa fa-plus"></i> TAMBAH DATA
        </a>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped table-bordered table-data" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NAMA OBJEK</th>
                    <th>KATEGORI</th>
                    <th>TIPE</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>NAMA OBJEK</th>
                    <th>KATEGORI</th>
                    <th>TIPE</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($this->object->all() as $val) { ?>
                    <?php $dataVal = $this->objeck_tipe->find($val->kategori_tipe, md5($val->id)); ?>
                    <?php if ($dataVal) { ?>
                        <tr>
                            <td><?= $val->nama_objek ?></td>
                            <td>
                                <image src="<?= base_url('/assets/img/icons/marker/' . $val->kategori_icon) ?>" />&nbsp;
                                <?= $val->kategori_nama ?>
                            </td>
                            <td><?= str_replace("_", " ", strtoupper($val->kategori_tipe)) ?></td>
                            <td class="text-center">
                                <a href="<?= site_url('/administrator/objek/edit/' . md5($val->id)) ?>" class="btn btn-default btn-xs">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <input type="hidden" class="linkDlt-<?= $val->id ?>" value="<?= site_url('/administrator/objek/delete/' . md5($val->id)) ?>" />
                                <a href="javascript::void()" onclick="hapus('<?= $val->id ?>')" data-toggle="modal" data-target=".modal-delete" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<br />