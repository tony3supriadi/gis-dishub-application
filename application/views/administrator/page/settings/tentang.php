<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">EDIT TENTANG</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-bookmark"></i> EDIT TENTANG
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <form action="<?= site_url('/administrator/tentang/tentang') ?>" method="POST" role="form">
            <div class="panel panel-default">
                <div class="panel-body">
                    <textarea name="content" class="edit-text form-control"><?= $page->content ?></textarea>
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