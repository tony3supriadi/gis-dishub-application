
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistem Informasi Geografi Kabupaten Temanggung">
        <meta name="author" content="Toni Tri Supriadi">

        <title><?= $title ?> | SIG DISHUB KABUPATEN TEMANGGUNG</title>

        <link href="<?= base_url('/assets/css/app.css') ?>" rel="stylesheet">
        <link href="<?= base_url('/assets/plugins/icheck/skins/all.css') ?>" rel="stylesheet">
        
        <script src="<?= base_url('/assets/js/jquery.min.js') ?>"></script>
        <script src="<?= base_url('/assets/js/bootstrap.min.js') ?>"></script>

        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>

    <body>
        <header>
            <div class="top-header">
                <div class="container">
                    <div class="col-sm-6 hidden-sm hidden-xs">
                        <?= $this->dateid->day_encode(date('l')) ?>, 
                        <?= $this->dateid->date_encode(date('Y-m-d')) ?> <?= date("H:i:s") ?>
                    </div>
                    <div class="col-sm-6 hidden-sm hidden-xs text-right">
                        <a href="<?=$this->settings->find(md5(1))->facebook_link?>" target="_blank" class="link-facebook">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="<?=$this->settings->find(md5(1))->twitter_link?>" target="_blank" class="link-twitter">
                            <i class="fa fa-twitter-square"></i>
                        </a>
                        <a href="<?=$this->settings->find(md5(1))->youtube_link?>" target="_blank" class="link-youtube">
                            <i class="fa fa-youtube-square"></i>
                        </a>&nbsp;
                        <a href="<?= site_url('/login') ?>">Login</a>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-default" style="height: 120px; background: url('<?= base_url('/assets/img/header.png') ?>') no-repeat center; background-size: cover">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
<!--                        <a class="navbar-brand" href="<?= site_url('/home') ?>">
                            <img src="<?= base_url('/assets/img/logo.png') ?>" alt="logo kabupaten temanggung">
                        </a>-->
                    </div>
                    <div id="navbar" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right" style="margin-right: 60px">
                            <li><a href="<?= site_url('/home') ?>" style="color: #000">HOME</a></li>
                            <li><a href="<?= site_url('/p/tentang-kami') ?>" style="color: #000">TENTANG KAMI</a></li>
                            <li><a href="<?= site_url('/institusi-wilayah') ?>"style="color: #000">INSTITUSI WILAYAH</a></li>
                            <li><a href="<?= site_url('/objek-dishub') ?>" style="color: #000">OBJEK DISHUB</a></li>
                            <li class="dropdown">
                                <a href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #000">
                                    PETA <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                    <li><a href="<?= site_url('/peta/trayek') ?>" style="padding:15px"><i class="fa fa-arrow-circle-o-right"></i> TRAYEK</a></li>
                                    <li><a href="<?= site_url('/peta/rencana-tol') ?>" style="padding:15px"><i class="fa fa-arrow-circle-o-right"></i> RENCANA TOL</a></li>
                                    <li><a href="<?= site_url('/peta/wilayah-jalan') ?>" style="padding:15px"><i class="fa fa-arrow-circle-o-right"></i> WILAYAH & JALAN</a></li>
                                </ul>
                            </li>
                            <li><a href="<?= site_url('/p/kontak') ?>" style="color: #000">KONTAK</a></li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </div><!-- /.container -->
            </nav><!-- /.navbar -->
        </header>

        <section class="page-content">
            <div class="container">
                <?php $this->load->view($container); ?>
            </div><!--/.container-->
        </section>

        <footer>
            <div class="container text-center">
                <span>Copyright &copy; <?= date('Y') ?> <a href="">DISHUB TEMANGGUNG</a>. All Right Recerved.</span>
            </div>
        </footer>

        <script src="<?= base_url('/assets/js/ie10-viewport-bug-workaround.js') ?>"></script>
        <script src="<?= base_url('/assets/js/offcanvas.js') ?>"></script>

        <!--<script src="<?= base_url('/assets/plugins/icheck/icheck.min.js') ?>"></script>-->

        <script src="<?= base_url('/assets/js/custom.js') ?>"></script>
        <script async defer
                src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBHDgTgLQShXW2W32kojOEbehp2Vo8w1XY&callback=initMap">
        </script>
        <!-- <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3mVUiZMhu2GhKHMS5r0aeddJFcWw28l8&callback=initMap">
        </script> -->
    </body>
</html>
