<?php $obj = $this->object->find(md5($id)); ?>
<?php $obd = $this->objeck_tipe->find($obj->kategori_tipe, md5($id)); ?>

<ul class="nav nav-tabs">
    <li class="active"><a  href="#1" data-toggle="tab">DETAIL</a></li>
    <li><a href="#2" data-toggle="tab">LATLNG</a></li>
    <li><a href="#3" data-toggle="tab">KETERANGAN</a></li>
</ul>

<div class="tab-content ">
    <div class="tab-pane active" id="1">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <img src="<?= base_url('/assets/img/images/' . $obd->foto) ?>" width="250px" height="180px" />
                        <table class="table table-striped">
                            <tr>
                                <td width="200px"><?= strtoupper($obj->nama_objek) ?></td>
                            </tr>
                        </table>
                        <hr />
                        <a href="<?= site_url('/objek-dishub/d/' . str_replace(" ", "_", strtolower($obj->nama_objek)) . "-" . md5($obj->id)) ?>">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="2">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ($obj->kategori_tipe == "objek_tipe_6") { ?>
                            <small><b>KOORDINAT AWAL (LAT)</b></small>
                            <p><?= $obd->koordinat_awal_lat ?></p>
                            <small><b>KOORDINAT AWAL (LNG)</b></small>
                            <p><?= $obd->koordinat_awal_long ?></p>
                            <small><b>KOORDINAT AKHIR (LAT)</b></small>
                            <p><?= $obd->koordinat_akhir_lat ?></p>
                            <small><b>KOORDINAT AKHIR (LNG)</b></small>
                            <p><?= $obd->koordinat_akhir_long ?></p>
                        <?php } else { ?>
                            <small><b>KOORDINAT (LAT)</b></small>
                            <p><?= $obd->koordinat_lat ?></p>
                            <small><b>KOORDINAT (LNG)</b></small>
                            <p><?= $obd->koordinat_long ?></p>
                        <?php } ?>
                        <hr />
                        <a href="<?= site_url('/objek-dishub/d/' . str_replace(" ", "_", strtolower($obj->nama_objek)) . "-" . md5($obj->id)) ?>">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="3">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= $obd->keterangan ?>
                        <hr />
                        <a href="<?= site_url('/objek-dishub/d/' . str_replace(" ", "_", strtolower($obj->nama_objek)) . "-" . md5($obj->id)) ?>">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>