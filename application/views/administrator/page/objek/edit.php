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
    <form action="<?= base_url('/administrator/objek/update/' . md5($objek->id)) ?>" method="POST" enctype="multipart/form-data">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">NAMA OBJEK</label>
                        <input type="text" name="objek[nama_objek]" value="<?= $objek->nama_objek ?>" class="form-control" required="" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">KATEGORI</label>
                        <select name="objek[kategori_id]" class="form-control change-categories-values" required="">
                            <option value="">-- PILIH KATEGORI --</option>
                            <?php foreach ($this->category->all() as $val) { ?>
                                <?php if ($val->type == $objek->kategori_tipe) { ?>
                                    <option value="<?= $val->id ?>" selected=""><?= $val->name ?></option>
                                <?php } else { ?>
                                    <option value="<?= $val->id ?>"><?= $val->name ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>

                        <input type="hidden" name="objek[id]" value="<?= $objek->id ?>" />
                        <input type="hidden" class="kategori_nama" name="objek[kategori_nama]" value="<?= $objek->kategori_nama ?>" />
                        <input type="hidden" class="kategori_icon" name="objek[kategori_icon]" value="<?= $objek->kategori_icon ?>" />
                        <input type="hidden" class="kategori_tipe" name="objek[kategori_tipe]" value="<?= $objek->kategori_tipe ?>" />
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-content-object">
                    <?php if ($objek->kategori_tipe == "objek_tipe_1") { ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LATITUDE)</label>
                                        <input type="text" id="koordinat_lat" name="objek_tipe[koordinat_lat]" value="<?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->koordinat_lat : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LONGITUDE)</label>
                                        <input type="text" id="koordinat_long" name="objek_tipe[koordinat_long]" value="<?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->koordinat_long : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KM</label>
                                        <input type="text" name="objek_tipe[km]" value="<?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->km : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">POSISI</label>
                                        <input type="text" name="objek_tipe[posisi]" value="<?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->posisi : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">LOKASI</label>
                                        <input type="text" name="objek_tipe[lokasi]" value="<?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->lokasi : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">NAMA PERLENGKAPAN</label>
                                        <input type="text" name="objek_tipe[nama_perlengkapan]" value="<?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->nama_perlengkapan : '' ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">KEBERADAAN</label>
                                        <select class="form-control" name="objek_tipe[keberadaan]">
                                            <option value="Kebutuhan" <?= $objek->keberadaan == "Kebutuhan" ? 'selected' : '' ?>>Kebutuhan</option>
                                            <option value="Terpasang" <?= $objek->keberadaan == "Terpasang" ? 'selected' : '' ?>>Terpasang</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">NAMA JALAN</label>
                                        <input type="text" name="objek_tipe[nama_jalan]" value="<?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->nama_jalan : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">STATUS JALAN</label>
                                        <input type="text" name="objek_tipe[status_jalan]" value="<?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->status_jalan : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">FOTO</label>
                                        <?= $objek->kategori_tipe == "objek_tipe_1" ? "<img src='" . base_url("/assets/img/images/" . $objekTipe->foto) . "' width='100px' />" : '' ?>
                                        <input type="file" name="foto" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KETERANGAN</label>
                                        <textarea name="objek_tipe[keterangan]" class="form-control" rows="4"><?= $objek->kategori_tipe == "objek_tipe_1" ? $objekTipe->keterangan : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($objek->kategori_tipe == "objek_tipe_2") { ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LATITUDE)</label>
                                        <input type="text" id="koordinat_lat" name="objek_tipe[koordinat_lat]" value="<?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->koordinat_lat : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LONGITUDE)</label>
                                        <input type="text" id="koordinat_long" name="objek_tipe[koordinat_long]" value="<?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->koordinat_long : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">JENIS</label>
                                        <input type="text" name="objek_tipe[jenis]" value="<?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->jenis : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">PANJANG</label>
                                        <input type="text" name="objek_tipe[panjang]" value="<?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->panjang : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">LOKASI</label>
                                        <input type="text" name="objek_tipe[lokasi]" value="<?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->lokasi : '' ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">NAMA JALAN</label>
                                        <input type="text" name="objek_tipe[nama_jalan]" value="<?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->nama_jalan : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">TIPE JALAN</label>
                                        <input type="text" name="objek_tipe[tipe_jalan]" value="<?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->tipe_jalan : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">STATUS JALAN</label>
                                        <input type="text" name="objek_tipe[status_jalan]" value="<?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->status_jalan : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KEBERADAAN</label>
                                        <select class="form-control" name="objek_tipe[keberadaan]">
                                            <option value="Kebutuhan" <?= $objek->keberadaan == "Kebutuhan" ? 'selected' : '' ?>>Kebutuhan</option>
                                            <option value="Terpasang" <?= $objek->keberadaan == "Terpasang" ? 'selected' : '' ?>>Terpasang</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <?= $objek->kategori_tipe == "objek_tipe_2" ? "<img src='" . base_url("/assets/img/images/" . $objekTipe->foto) . "' width='100px' />" : '' ?>
                                        <label class="control-label">FOTO</label>
                                        <input type="file" name="foto" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KETERANGAN</label>
                                        <textarea name="objek_tipe[keterangan]" class="form-control" rows="4"><?= $objek->kategori_tipe == "objek_tipe_2" ? $objekTipe->keterangan : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($objek->kategori_tipe == "objek_tipe_3") { ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">NAMA SIMPANG</label>
                                        <input type="text" name="objek_tipe[nama_simpang]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->nama_simpang : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LATITUDE)</label>
                                        <input type="text" id="koordinat_lat" name="objek_tipe[koordinat_lat]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->koordinat_lat : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LONGITUDE)</label>
                                        <input type="text" id="koordinat_long" name="objek_tipe[koordinat_long]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->koordinat_long : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">JENIS</label>
                                        <input type="text" name="objek_tipe[jenis]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->jenis : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">JUMLAH LENGAN</label>
                                        <input type="text" name="objek_tipe[jumlah_lengan]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->jumlah_lengan : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">LOKASI</label>
                                        <input type="text" name="objek_tipe[lokasi]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->lokasi : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">TAHUN</label>
                                        <input type="text" name="objek_tipe[tahun]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->tahun : '' ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">TIPE</label>
                                        <input type="text" name="objek_tipe[tipe]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->tipe : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">JENIS LAMPU</label>
                                        <input type="text" name="objek_tipe[jenis_lampu]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->jenis_lampu : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">WAKTU SIKLUS</label>
                                        <input type="text" name="objek_tipe[waktu_siklus]" value="<?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->waktu_siklus : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">FOTO</label>
                                        <?= $objek->kategori_tipe == "objek_tipe_3" ? "<img src='" . base_url("/assets/img/images/" . $objekTipe->foto) . "' width='100px' />" : '' ?>
                                        <input type="file" name="foto" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KETERANGAN</label>
                                        <textarea name="objek_tipe[keterangan]" class="form-control" rows="4"><?= $objek->kategori_tipe == "objek_tipe_3" ? $objekTipe->keterangan : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($objek->kategori_tipe == "objek_tipe_4") { ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LATITUDE)</label>
                                        <input type="text" id="koordinat_lat" name="objek_tipe[koordinat_lat]" value="<?= $objek->kategori_tipe == "objek_tipe_4" ? $objekTipe->koordinat_lat : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LONGITUDE)</label>
                                        <input type="text" id="koordinat_long" name="objek_tipe[koordinat_long]" value="<?= $objek->kategori_tipe == "objek_tipe_4" ? $objekTipe->koordinat_long : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">NAMA RUAS</label>
                                        <input type="text" name="objek_tipe[nama_ruas]" value="<?= $objek->kategori_tipe == "objek_tipe_4" ? $objekTipe->nama_ruas : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">STATUS JALAN</label>
                                        <input type="text" name="objek_tipe[status_jalan]" value="<?= $objek->kategori_tipe == "objek_tipe_4" ? $objekTipe->status_jalan : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">JUMLAH KEJADIAN</label>
                                        <input type="text" name="objek_tipe[jumlah_kejadian]" value="<?= $objek->kategori_tipe == "objek_tipe_4" ? $objekTipe->jumlah_kejadian : '' ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">JUMLAH KORBAN</label>
                                        <input type="text" name="objek_tipe[jumlah_korban]" value="<?= $objek->kategori_tipe == "objek_tipe_4" ? $objekTipe->jumlah_korban : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">FOTO</label>
                                        <?= $objek->kategori_tipe == "objek_tipe_4" ? "<img src='" . base_url("/assets/img/images/" . $objekTipe->foto) . "' width='100px' />" : '' ?>
                                        <input type="file" name="foto" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KETERANGAN</label>
                                        <textarea name="objek_tipe[keterangan]" class="form-control" rows="4"><?= $objek->kategori_tipe == "objek_tipe_4" ? $objekTipe->keterangan : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else if ($objek->kategori_tipe == "objek_tipe_5") { ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LATITUDE)</label>
                                        <input type="text" id="koordinat_lat" name="objek_tipe[koordinat_lat]" value="<?= $objek->kategori_tipe == "objek_tipe_5" ? $objekTipe->koordinat_lat : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KOORDINAT (LONGITUDE)</label>
                                        <input type="text" id="koordinat_long" name="objek_tipe[koordinat_long]" value="<?= $objek->kategori_tipe == "objek_tipe_5" ? $objekTipe->koordinat_long : '' ?>" class="form-control" required="" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">TRAYEK</label>
                                        <input type="text" name="objek_tipe[trayek]" value="<?= $objek->kategori_tipe == "objek_tipe_5" ? $objekTipe->trayek : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">JUMLAH TRAYEK</label>
                                        <input type="text" name="objek_tipe[jumlah_trayek]" value="<?= $objek->kategori_tipe == "objek_tipe_5" ? $objekTipe->jumlah_trayek : '' ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">TIPE</label>
                                        <input type="text" name="objek_tipe[tipe]" value="<?= $objek->kategori_tipe == "objek_tipe_5" ? $objekTipe->tipe : '' ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">FOTO</label>
                                        <?= $objek->kategori_tipe == "objek_tipe_4" ? "<img src='" . base_url("/assets/img/images/" . $objekTipe->foto) . "' width='100px' />" : '' ?>
                                        <input type="file" name="foto" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KETERANGAN</label>
                                        <textarea name="objek_tipe[keterangan]" class="form-control" rows="4"><?= $objek->kategori_tipe == "objek_tipe_5" ? $objekTipe->keterangan : '' ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button type="button" class="btn btn-primary btn-xs" onclick="add_new_coordinate()">
                                        <i class="fa fa-plus-square"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" onclick="delete_this_coordinate()">
                                        <i class="fa fa-minus-square"></i>
                                    </button>
                                </div>
                                <div class="form-coordinate">
                                    <?php $index = 1;  ?>
                                    <?php $koordinat = $this->koordinat->find(md5($objekTipe->id)); ?>
                                    <?php foreach ($koordinat as $koor) { ?>
                                        <div class="form-coordinate-<?=$index?>">
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="control-label">KOORDINAT (LATITUDE-<?=$index?>)</label>
                                                    <input type="text" id="koordinat_lat_<?=$index?>" name="koordinat_lat[]" value="<?= $koor->lat ?>" class="form-control koordinate-lat-<?=$index?>" required="" />
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <label class="control-label">KOORDINAT (LONGITUDE-<?= $index ?>)</label>
                                                    <input type="text" id="koordinat_lng_<?=$index?>" name="koordinat_lng[]" value="<?= $koor->lng ?>" class="form-control koordinate-lng-<?=$index?>" required="" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 text-center" style="padding-top: 35px;">
                                                <button onclick="edit_this_coordinate(<?=$index?>)" type="button" class="btn btn-xs btn-default">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <?php $index++; ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">NAMA TRAYEK</label>
                                        <input type="text" name="objek_tipe[nama_trayek]" value="<?= $objekTipe->nama_trayek ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">ARAH TRAYEK</label>
                                        <input type="text" name="objek_tipe[arah_trayek]" value="<?= $objekTipe->arah_trayek ?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">JUMLAH TRAYEK</label>
                                        <input type="text" name="objek_tipe[jumlah_trayek]" value="<?= $objekTipe->jumlah_trayek ?>" class="form-control" />
                                        <input type="hidden" name="objek_tipe_id" value="<?= $objekTipe->id ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">FOTO</label>
                                        <img src="<?= base_url("/assets/img/images/".$objekTipe->foto) ?>" width="100px" />
                                        <input type="file" name="foto" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">KETERANGAN</label>
                                        <textarea name="objek_tipe[keterangan]" class="form-control" rows="4"><?= $objekTipe->keterangan ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

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
    var type = "<?= $objek->kategori_tipe ?>";
    var koordinat = new Array();
    var active  = <?= isset($koordinat) ? count($koordinat) : 0 ?>;
    var count_coordinate = <?= isset($koordinat) ? count($koordinat) + 1 : 0 ?>;
    
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
        for (i = 1; i < index; i++) {
            if (i != active) {            
                $('.koordinate-lat-' + i).attr('readonly', '');
                $('.koordinate-lng-' + i).attr('readonly', '');
            }
        }
    }
    disabled_this_form(active);

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