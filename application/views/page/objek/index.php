<div class="institusi-page">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-header">
                        <i class="fa fa-eercast"></i> OBJEK DISHUB
                    </h3>

                    <div class="row">
                        <?php
                        foreach ($this->object->all() as $val) { ?>
                            <?php $img = $this->objeck_tipe->find($val->kategori_tipe, md5($val->id)); ?>
                            <?php if (isset($img)) { ?>
                            <div class="col-md-4 instansi-item">
                                <a href="<?= site_url('/objek-dishub/d/' . str_replace(" ", "_", strtolower($val->nama_objek)) . '-' . md5($val->id)) ?>">
                                    <div class="panel panel-default">
                                        <img src="<?= base_url('/assets/img/images/' . $img->foto) ?>" width="100%" height="170px">
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
                        <?php } ?>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <?= $this->pagination->create_links(); ?>
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