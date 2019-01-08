<div class="about-page">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="page-header"><i class="fa fa-phone-square"></i>&nbsp; KONTAK</h3>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php if ($this->session->flashdata('success')) { ?>
                                <span class="alert alert-success col-md-12">
                                    <?= $this->session->flashdata('success') ?>
                                </span>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <form action="<?= site_url('/p/contact') ?>" method="POST" class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-md-3">NAMA LENGKAP</label>
                                    <div class="col-md-4">
                                        <input type="text" name="name" required="" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">SUBJEK</label>
                                    <div class="col-md-4">
                                        <input type="text" name="subject" class="form-control" required="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">E-MAIL</label>
                                    <div class="col-md-4">
                                        <input type="email" name="email" class="form-control" required="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3">PESAN</label>
                                    <div class="col-md-7">
                                        <textarea name="message" class="form-control" rows="5" required=""></textarea>
                                    </div>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-7">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-send"></i>&nbsp; KIRIM PESAN
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-rss"></i>&nbsp; FOLLOW ME
                </div>
                <div class="list-group">
                    <a href="mailto:<?= $social->email ?>" class="list-group-item">
                        <i class="fa fa-envelope"></i>&nbsp; : <?= $social->email ?>
                    </a>
                    <a href="<?= $social->facebook_link ?>" target="_blank" class="list-group-item">
                        <i class="fa fa-facebook-square"></i>&nbsp; : <?= $social->facebook ?>
                    </a>
                    <a href="<?= $social->twitter_link ?>" target="_blank" class="list-group-item">
                        <i class="fa fa-twitter-square"></i>&nbsp; : <?= $social->twitter ?>
                    </a>
                    <a href="#" target="_blank" class="list-group-item">
                        <i class="fa fa-phone-square"></i>&nbsp; : <?= $social->telp ?>
                    </a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-link"></i>&nbsp; LINK
                </div>
                <div class="list-group">
                    <a href="<?= $social->website_link ?>" target="_blank" class="list-group-item">
                        <i class="fa fa-globe"></i>&nbsp; : <?= $social->website ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>