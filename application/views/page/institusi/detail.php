<div class="institusi-page">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-header">
                        <i class="fa fa-eercast"></i> <?= strtoupper($objek->nama_objek) ?>
                    </h3>

                    <div class="row">
                        <div class="col-lg-12">
                            <div id="map" style="width:100%;height:494px;"></div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-3">
                            <?php $img = $this->objeck_tipe->find($objek->kategori_tipe, md5($objek->id))->foto ?>
                            <img src="<?= base_url('/assets/img/images/' . $img) ?>" width="100%" height="120px">
                        </div>
                        <div class="col-lg-9">
                            <table class="table table-striped">
                                <?php $objek_tipe = $this->objeck_tipe->find($objek->kategori_tipe, md5($objek->id)); ?>
                                <?php foreach ($objek_tipe as $key => $val) { ?>
                                    <?php if ($key != "foto" && $key != "id" && $key != "objek_id") { ?>
                                        <tr>
                                            <td width="40%"><?= str_replace("_", " ", strtoupper($key)) ?></td>
                                            <td width="5%">:</td>
                                            <td><?= strtoupper($val) ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-th-large"></i>&nbsp; KATEGORI
                </div>
                <div class="list-group">
                    <a href="<?= site_url('/objek-dishub') ?>" class="list-group-item">
                        <i class="fa fa-angle-double-right"></i>&nbsp; SEMUA
                    </a>
                    <?php foreach ($this->category->all() as $val) { ?>
                        <a href="<?= site_url('/objek-dishub/o/' . strtolower($val->name) . '-' . md5($val->id)) ?>" class="list-group-item">
                            <i class="fa fa-angle-double-right"></i>&nbsp; <?= strtoupper($val->name) ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function initMap() {
        var locations = {lat: <?= $objek_tipe->koordinat_lat ?>, lng: <?= $objek_tipe->koordinat_long ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: locations,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        });

        var marker = new google.maps.Marker({
            position: locations,
            map: map,
            icon: "<?= base_url('/assets/img/icons/marker/' . $objek->kategori_icon) ?>"
        });
    }
</script>