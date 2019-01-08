<div class="institusi-page">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-header col-md-6">
                        <i class="fa fa-search"></i> PENCARIAN OBJEK
                    </h3>

                    <div class="col-md-6 text-right">
                        <a href="<?= site_url('/search/cetak/?aksi=cetak&src=' . $this->input->get('src')) . '&kategori=' . $_GET['kategori'] ?>" target="_blank" class="btn btn-default">
                            <i class="fa fa-file-excel-o"></i> &nbsp; EXCEL
                        </a>
                        <a href="javascript:cetak()" class="btn btn-default">
                            <i class="fa fa-print"></i> &nbsp; CETAK
                        </a>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <form action="<?= site_url('/search') ?>" method="get">
                                <label class="control-label">PENCARIAN OBJEK</label>
                                <div class="input-group ">
                                    <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                    <input type="text" name="src" class="form-control fo" placeholder="Pencarian..." value="<?= $this->input->get('src') ? $this->input->get('src') : '' ?>">
                                    <select class="form-control" name="kategori">
                                        <?php foreach ($this->category->all() as $val) { ?>
                                            <?php if ($_GET['kategori'] == md5($val->id)) { ?>
                                                <option value="<?= md5($val->id) ?>" selected="" ><?= $val->name ?></option>
                                            <?php } else { ?>
                                                <option value="<?= md5($val->id) ?>"><?= $val->name ?></option>
                                            <?php } ?>
                                        <?php } ?>?>
                                    </select>
                                    <div type="submit" class="input-group-addon">CARI</div>
                                </div>
                            </form>
                            <hr />
                        </div>
                        <?php foreach ($search as $val) { ?>
                            <?php $img = $this->objeck_tipe->find($val->kategori_tipe, md5($val->id))->foto ?>
                            <div class="col-md-4 instansi-item">
                                <a href="<?= site_url('/objek-dishub/d/' . str_replace(" ", "_", strtolower($val->nama_objek)) . '-' . md5($val->id)) ?>">
                                    <div class="panel panel-default">
                                        <img src="<?= base_url('/assets/img/images/' . $img) ?>" width="100%" height="170px">
                                        <div class="label-instansi">
                                            <span class="label-bg-transparan"></span>
                                            <span class="label-instansi-text">
                                                <?= $val->nama_objek ?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>

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


<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

<script>

    function cetak() {
        var b = "";
        $.get('<?= base_url('/search/cetak?src=' . $this->input->get('src')) . '&kategori=' . $_GET['kategori'] ?>', function (data) {
            var a = document.getElementById('printing-css').value;
            window.frames["print_frame"].document.title = document.title;
            window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + data;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        });
    }
</script>