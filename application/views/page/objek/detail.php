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
                        <a href="<?= site_url('/objek-dishub/o/' . str_replace("(", "", str_replace(")", "", str_replace(" ", "_", strtolower($val->name)) . '-' . md5($val->id)))) ?>" class="list-group-item">
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
        var locations = {lat: -7.316147, lng: 110.175477};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: locations,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        });

        var objek = "<?= $objek->kategori_tipe ?>";
        if (objek == "objek_tipe_6") {
            setPolyline(map);
        } else {
            setMarker(map, locations);
        }
    }

    function setMarker(map, locations) {
        var marker = new google.maps.Marker({
            position: {lat: <?= isset($objek_tipe->koordinat_lat) ? $objek_tipe->koordinat_lat : 0 ?>, lng: <?= isset($objek_tipe->koordinat_long) ? $objek_tipe->koordinat_long : 0 ?>},
            map: map,
            icon: "<?= base_url('/assets/img/icons/marker/' . $objek->kategori_icon) ?>"
        });
    }

    var Polyline = [];

    function getPolyline() {
        $.ajax({
            async: false,
            type: "GET",
            global: false,
            dataType: 'json',
            url: "<?= base_url('/home/polyline') ?>",
            data: {request: "", target: "arrange_url", method: "method_target"},
            success: function (data) {
                Polyline = data;
            }
        });
    }
    getPolyline();

    function setPolyline(map) {
        for (var i = 0; i < Polyline.length; i++) {
            var flightPath = new google.maps.Polyline({
                path: Polyline[i],
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            flightPath.setMap(map);
        }
    }
</script>