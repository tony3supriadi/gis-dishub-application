<table class="table table-bordered table-striped table-data">
    <thead>
        <tr>
            <th>KATEGORI</th>
            <th>TYPE</th>
            <th></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>KATEGORI</th>
            <th>TYPE</th>
            <th></th>
        </tr>
    </tfoot>
    <tbody>
        <?php foreach ($this->category->all() as $val) { ?>
            <tr>
                <td>
                    <image src="<?= base_url('/assets/img/icons/marker/' . $val->icon) ?>" />&nbsp;
                    <?= $val->name ?>
                </td>
                <td><?= strtoupper(str_replace("_", " ", $val->type)) ?></td>
                <td class="text-center">
                    <a href="<?= site_url('/administrator/kategori/edit/' . md5($val->id)) ?>" class="btn btn-default btn-xs">
                        <i class="fa fa-edit"></i>
                    </a>
                    <input type="hidden" class="linkDlt-<?= $val->id ?>" value="<?= site_url('/administrator/kategori/delete/' . md5($val->id)) ?>" />
                    <a href="javascript::void()" onclick="hapus('<?= $val->id ?>')" data-toggle="modal" data-target=".modal-delete" class="btn btn-danger btn-xs">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>