<div class="row">
    <div class="col-xs-12 col-sm-9">
        <form action="<?= site_url('/search') ?>" method="get">
            <label class="control-label">PENCARIAN OBJEK</label>
            <div class="input-group form-group-lg">
                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                <input type="text" name="src" class="form-control fo" placeholder="Pencarian...">
                <select class="form-control" name="kategori">
                    <?php foreach ($this->category->all() as $val) { ?>
                        <option value="<?= md5($val->id) ?>"><?= $val->name ?></option>
                    <?php } ?>
                </select>
                <div class="input-group-addon">CARI</div>
            </div>
        </form>
        <br />
        <div id="map" style="width:100%;height:494px;"></div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-search-plus"></i>&nbsp; LEGENDA
                </h3>
            </div>
            <ul class="list-group" style="overflow-y: scroll; height: 532px">
                <?php foreach ($this->category->all() as $val) { ?>
                    <li class="list-group-item legend-item">
                        <input type="checkbox" name="kategori" id="kategori" value="<?= $val->id . "-" . $val->type ?>">&nbsp; 
                        <a href="<?= site_url('/objek-dishub/o/' . str_replace("(", "", str_replace(")", "", str_replace(" ", "_", strtolower($val->name)) . '-' . md5($val->id)))) ?>">
                            <img src="<?= base_url('/assets/img/icons/marker/' . $val->icon) ?>" width="20px">&nbsp; 
                            <?= $val->name ?> 

                            <button class="btn btn-link pull-right"><i class="fa fa-angle-double-right"></i></button>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div><!--/row-->

<script>
    function initMap() {
        var locations = {lat: -7.316147, lng: 110.175477};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: locations,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        });

        setPolyline(map);
        setMarkers(map);
    }

    var beaches = [];

    function getMarkers() {
        $.ajax({
            async: false,
            type: "GET",
            global: false,
            dataType: 'json',
            url: "<?= base_url('/home/beaches') ?>",
            data: {request: "", target: "arrange_url", method: "method_target"},
            success: function (data) {
                beaches = data;
            }
        });
    }
    getMarkers();

    function changeMarkers() {
        var selected = new Array();
        $("input[name=kategori]").change(function () {
            if (this.checked) {
                selected = $("input[name=kategori]:checked").map(
                        function () {
                            return this.value;
                        }).get().join(",");
            } else {
                selected = $("input[name=kategori]:checked").map(
                        function () {
                            return this.value;
                        }).get().join(",");
            }
            
            if (selected.search("objek_tipe_6") > 0) {
                getPolyline();
            } else {
                Polyline = [];
            }

            if (selected) {
                console.log(selected);
                $.ajax({
                    async: false,
                    type: "POST",
                    global: false,
                    dataType: 'json',
                    url: "<?= base_url('/home/set_beaches') ?>",
                    data: {"data": selected},
                    success: function (data) {
                        beaches = data;
                        console.log(data);
                    }
                });
            } else {
                console.log(selected);
                beaches = [];
            }
            initMap();
        });
    }
    changeMarkers();

    function setMarkers(map) {
        for (var i = 0; i < beaches.length; i++) {
            var beach = beaches[i];
            if (beach[6] != "objek_tipe_6") {
                var marker = new google.maps.Marker({
                    position: {lat: parseFloat(beach[2]), lng: parseFloat(beach[3])},
                    map: map,
                    icon: "<?= base_url('/assets/img/icons/marker') ?>/" + beach[5],
                    title: beach[1],
                    zIndex: parseFloat(beach[4])
                });
                infoWindow(map, marker);
            } 
        }
    }

    function infoWindow(map, marker) {
        var contentString = "";
        $.ajax({
            async: false,
            type: "GET",
            global: false,
            dataType: 'html',
            url: "<?= base_url('/home/infoWindow') ?>/" + marker.zIndex,
            data: {request: "", target: "arrange_url", method: "method_target"},
            success: function (data) {
                contentString = data;
            }
        });

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        marker.addListener('click', function () {
            infowindow.open(map, marker);
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