<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="<?= site_url('/administrator/objek/') ?>">MARKER OBJEK</a></li>
        <li class="active">ADD</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-map-marker"></i> DATA MARKER OBJEK
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div id="map" style="width:100%;height:494px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <form action="<?= base_url('/administrator/objek/create') ?>" method="POST" enctype="multipart/form-data">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">NAMA OBJEK</label>
                        <input type="text" name="objek[nama_objek]" class="form-control" required="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">KATEGORI</label>
                        <select name="objek[kategori_id]" class="form-control change-categories-values" required="">
                            <option value="">-- PILIH KATEGORI --</option>
                            <?php foreach ($this->category->all() as $val) { ?>
                                <option value="<?= $val->id ?>"><?= $val->name ?></option>
                            <?php } ?>
                        </select>

                        <input type="hidden" class="kategori_nama" name="objek[kategori_nama]" value="" />
                        <input type="hidden" class="kategori_icon" name="objek[kategori_icon]" value="" />
                        <input type="hidden" class="kategori_tipe" name="objek[kategori_tipe]" value="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-content-object"></div>

                <div class="panel-footer text-right">
                    <button type="reset" class="btn btn-default">
                        <i class="fa fa-refresh"></i> RESET
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-save"></i> SIMPAN
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- VALUE FOR OBJEK TIPE 1 -->
<?php $this->load->view('/administrator/page/objek/textarea'); ?>

<script>
    var type = "";
    var active = 0;
    var koordinat = new Array();
    var count_coordinate = 1;
    
    $('.change-categories-values').change(function () {
        $.getJSON('<?= base_url('/administrator/kategori/findget/') ?>' + $(this).val(), function (data) {
            type = data.type;
            
            $('.kategori_nama').val(data.name);
            $('.kategori_icon').val(data.icon);
            $('.kategori_tipe').val(data.type);
            $('.panel-content-object').html($('.' + data.type).val());
        });
    });
    
    function add_new_coordinate() {
        count_coordinate = count_coordinate + 1;
        active = count_coordinate - 1;
        
        show_form_coordinate();        
    }
    
    function edit_this_coordinate(index) {
        active = index;
        show_form_coordinate();
    }
    
    function delete_this_coordinate() {
        count_coordinate = count_coordinate - 1;
        active = count_coordinate - 1;
        
        show_form_coordinate();
    }
    
    function show_form_coordinate() {
        for (j = 1; j < count_coordinate; j++) {
            koordinat[j] = {
                "lat": $("#koordinat_lat_" + j).val(),
                "lng": $("#koordinat_lng_" + j).val()
            };
        }
        
        $('.form-coordinate').html('');
        for (i = 1; i < count_coordinate; i++) {
            $('.form-coordinate').html($('.form-coordinate').html() + form_coordinate(i));   
            disabled_this_form(i);
        }
        
        for (k = 1; k < koordinat.length; k++) {
            $("#koordinat_lat_" + k).val(koordinat[k]['lat']);
            $("#koordinat_lng_" + k).val(koordinat[k]['lng']);
        }
    }
    
    function form_coordinate(index) {
        var form = `<div class="form-coordinate-` + index + `">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="control-label">KOORDINAT (LATITUDE-` + index + `)</label>
                                <input type="text" id="koordinat_lat_` + index + `" name="koordinat_lat[]" class="form-control koordinate-lat-` + index + `" required="" />
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label class="control-label">KOORDINAT (LONGITUDE-` + index + `)</label>
                                <input type="text" id="koordinat_lng_` + index + `" name="koordinat_lng[]" class="form-control koordinate-lng-` + index + `" required="" />
                            </div>
                        </div>
                        <div class="col-md-2 text-center" style="padding-top: 35px;">
                            <button onclick="edit_this_coordinate(` + index + `)" type="button" class="btn btn-xs btn-default">
                                <i class="fa fa-edit"></i>
                            </button>
                        </div>
                    </div>`;
     return form;
    }
    
    function disabled_this_form(index) {
        if (index != active) {            
            $('.koordinate-lat-' + index).attr('readonly', '');
            $('.koordinate-lng-' + index).attr('readonly', '');
        }
    }
    
    function initMap() {
        var locations = {lat: -7.316147, lng: 110.175477};
        
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 14,
            center: locations,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        });

        google.maps.event.addListener(map, 'click', function (event) {
            if (type == "objek_tipe_6") {
                $("#koordinat_lat_" + active).val(event.latLng.lat());
                $("#koordinat_lng_" + active).val(event.latLng.lng());
            } else {
                $("#koordinat_lat").val(event.latLng.lat());
                $("#koordinat_long").val(event.latLng.lng());
            }
        });
    }
</script>