<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">EDIT RENCANA TOL</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-map-marker"></i> EDIT RENCANA TOL
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form action="<?= site_url('/administrator/rencana-tol/rencana-tol') ?>" method="POST" role="form" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label>UPLOAD RENCANA TOL</label>
                        <input type="file" name="content" class="form-control" />
                    </div>
                    <hr />
                    <img id="zoom_image" src="<?= base_url("/assets/img/peta/" . $this->pages->find(md5(3))->content) ?>" data-zoom-image="<?= base_url("/assets/img/peta/" . $this->pages->find(md5(3))->content) ?>" alt="GAMBAR TRAYEK" width="100%">
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">
                        <i class="fa fa-save"></i> SIMPAN
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url('/assets/plugins/elevatezoom/jquery.elevatezoom.js') ?>"></script>
<script type="text/javascript">
    $("#zoom_image").elevateZoom({
          zoomType : "lens",
          lensShape : "round",
          lensSize : 300
    });
</script>