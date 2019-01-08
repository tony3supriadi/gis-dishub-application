<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">KATEGORI</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-user"></i> DATA KATEGORI
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-6">
        <form action="<?= site_url('/administrator/kategori/create') ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-4">KATEGORI</label>
                        <div class="col-lg-8">
                            <input type="text" name="name" class="form-control" required="" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">ICON</label>
                        <div class="col-lg-8">
                            <input type="file" name="icon" class="form-control" />
                            <small style="color: #E13300">UKURAN ICON : 20x20px</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">TIPE</label>
                        <div class="col-lg-8">
                            <select name="type" class="form-control">
                                <option value="">-- PILIH TIPE --</option>
                                <option value="objek_tipe_1">OBJEK TIPE 1</option>
                                <option value="objek_tipe_2">OBJEK TIPE 2</option>
                                <option value="objek_tipe_3">OBJEK TIPE 3</option>
                                <option value="objek_tipe_4">OBJEK TIPE 4</option>
                                <option value="objek_tipe_5">OBJEK TIPE 5</option>
                                <option value="objek_tipe_6">OBJEK TIPE 6</option>
                            </select>
                        </div>
                    </div>
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
        </form>
    </div>
    <div class="col-lg-6">
        <?php $this->load->view('/administrator/page/kategori/tables'); ?>
    </div>
</div>
<br />