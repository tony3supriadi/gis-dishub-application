<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">EDIT TRAYEK</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-map-marker"></i> EDIT TRAYEK
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form action="<?= site_url('/administrator/trayek/files') ?>" method="POST" role="form" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label>UPLOAD FILE TRAYEK</label>
                        <input type="file" name="excel" class="form-control" />
                    </div>
                    <hr />
                    FILES : 
                    <a target="_blank" href="<?= base_url("/assets/files/" . $this->pages->find(md5(4))->content) ?>">
                        <?= $this->pages->find(md5(4))->content ?>
                    </a>
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">
                        <i class="fa fa-upload"></i> UPLOAD
                    </button>
                </div>
            </div>
        </form>
        <hr />
        <form action="<?= site_url('/administrator/trayek/trayek') ?>" method="POST" role="form" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <label>UPLOAD GAMBAR TRAYEK</label>
                        <input type="file" name="content" class="form-control" />
                    </div>
                    <hr />
                    <img id="zoom_image" src="<?= base_url("/assets/img/peta/" . $this->pages->find(md5(2))->content) ?>" data-zoom-image="<?= base_url("/assets/img/peta/" . $this->pages->find(md5(2))->content) ?>" alt="GAMBAR TRAYEK" width="100%">
                </div>
                <div class="panel-footer text-right">
                    <button class="btn btn-primary">
                        <i class="fa fa-upload"></i> UPLOAD
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