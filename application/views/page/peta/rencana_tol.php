<div class="about-page">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-header"><i class="fa fa-thumb-tack"></i>&nbsp; RENCANA TOL</h3>

                    <img id="zoom_image" src="<?= base_url("/assets/img/peta/" . $this->pages->find(md5(3))->content) ?>" data-zoom-image="<?= base_url("/assets/img/peta/" . $this->pages->find(md5(3))->content) ?>" alt="GAMBAR TRAYEK" width="100%">
                </div>
            </div>
        </div>
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