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
        <form action="<?= site_url('/administrator/kategori/update/' . md5($category->id)) ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-lg-4">KATEGORI</label>
                        <div class="col-lg-8">
                            <input type="text" name="name" class="form-control" required="" value="<?= $category->name ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">ICON</label>
                        <div class="col-lg-1 text-left">
                            <img src="<?= base_url('/assets/img/icons/marker/' . $category->icon) ?>" />
                        </div>
                        <div class="col-lg-7">
                            <input type="file" name="icon" class="form-control" />
                            <small style="color: #E13300">UKURAN ICON : 20x20px</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-4">TIPE</label>
                        <div class="col-lg-8">
                            <select name="type" class="form-control">
                                <option value="">-- PILIH TIPE --</option>
                                <?php $type = ['objek_tipe_1', 'objek_tipe_2', 'objek_tipe_3', 'objek_tipe_4', 'objek_tipe_5', 'objek_tipe_6']; ?>
                                <?php foreach ($type as $ty) { ?>
                                    <?php if ($ty == $category->type) { ?>
                                <option value="<?= $ty ?>" selected=""><?= strtoupper(str_replace("_", " ", $ty)) ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $ty ?>"><?= strtoupper(str_replace("_", " ", $ty)) ?></option>
                                    <?php } ?>
                                <?php } ?>
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