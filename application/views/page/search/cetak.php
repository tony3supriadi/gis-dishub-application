<?php
if (isset($_GET['aksi'])) {
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=export-data-excel-".time().".xls");
}
$no = 1;
?>

HASIL PENCARIAN : <?= $keyword ?>
<br />
<table style="border:1px solid #000;border-collapse: collapse;" border="1px">
<?php foreach ($search as $val) { ?>
        <?php $data = $this->objeck_tipe->find($val->kategori_tipe, md5($val->id)); ?>
        <tr>
            <td width="30px"><?= $no++ ?></td>
            <td width="250px"><?= $val->nama_objek ?></td>
            <td width="200px"><?= $val->kategori_nama ?></td>
            <td width="150px"><?= $val->kategori_tipe ?></td>
            <td width="150px"><?= $data->koordinat_lat ?></td>
            <td width="150px"><?= $data->koordinat_long ?></td>
            <td width="200px"><?= $data->keterangan ?></td>
            <?php if (!isset($_GET['aksi'])) { ?>
            <td height="50px"><img height="50px" src="<?= base_url("/assets/img/images/" . $data->foto) ?>" /></td>
            <?php } ?>
        </tr>
<?php } ?>
</table>