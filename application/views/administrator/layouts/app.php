<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title ?> | ADMINISTRATOR - GIS DISHUB KABUPATEN TEMANGGUNG</title>

        <link href="<?= base_url('assets/admin/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/datepicker3.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/css/styles.css') ?>" rel="stylesheet">

        <link href="<?= base_url('assets/admin/plugins/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/admin/plugins/datatables/css/dataTables.bootstrap.min.css') ?>" rel="stylesheet">
        
        <script src="<?= base_url('/assets/admin/js/jquery-1.11.1.min.js') ?>"></script>
        <script src="<?= base_url('/assets/admin/js/bootstrap.min.js') ?>"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= site_url('/administrator/dashboard') ?>">
                        <span>APLIKASI SIG</span> | ADMIN
                    </a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-user"></span> 
                                <?= strtoupper($this->session->userdata('login-username')) ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?= site_url('/administrator/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <ul class="nav menu">
                <li class="<?= $navigation == "dashboard" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/dashboard') ?>">
                        <span class="glyphicon glyphicon-dashboard"></span> DASHBOARD
                    </a>
                </li>

                <li role="presentation" class="divider"></li>
                
                <li class="<?= $navigation == "kategori" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/kategori') ?>">
                        <span class="glyphicon glyphicon-th-large"></span> KATEGORI OBJEK
                    </a>
                </li>
                
                <li class="<?= $navigation == "objek" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/objek') ?>">
                        <span class="glyphicon glyphicon-map-marker"></span> MARKER OBJEK
                    </a>
                </li>
                
                <li class="<?= $navigation == "tentang" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/tentang') ?>">
                        <span class="glyphicon glyphicon-bookmark"></span> EDIT TENTANG
                    </a>
                </li>

                <li class="<?= $navigation == "trayek" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/trayek') ?>">
                        <span class="glyphicon glyphicon-map-marker"></span> EDIT TRAYEK
                    </a>
                </li>

                <li class="<?= $navigation == "rencana-tol" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/rencana-tol') ?>">
                        <span class="glyphicon glyphicon-calendar"></span> EDIT RENCANA TOL
                    </a>
                </li>

                <li role="presentation" class="divider"></li>

                <li class="<?= $navigation == "kontak" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/kontak') ?>">
                        <span class="glyphicon glyphicon-phone"></span> KONTAK
                        <?= $this->contact->count() ? '<label class="label label-danger">'.$this->contact->count().'</label>' : '' ?>
                    </a>
                </li>
                
                <li class="<?= $navigation == "users" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/users') ?>">
                        <span class="glyphicon glyphicon-user"></span> USERS
                    </a>
                </li>

                <li class="<?= $navigation == "password" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/password') ?>">
                        <span class="glyphicon glyphicon-qrcode"></span> UBAH PASSWORD
                    </a>
                </li>

                <li class="<?= $navigation == "password" ? 'active' : '' ?>">
                    <a href="<?= site_url('/administrator/pengaturan') ?>">
                        <span class="glyphicon glyphicon-cog"></span> PENGATURAN
                    </a>
                </li>

                <li role="presentation" class="divider"></li>
                
                <li>
                    <a href="<?= site_url('/administrator/logout') ?>">
                        <span class="glyphicon glyphicon-log-out"></span> LOGOUT
                    </a>
                </li>
            </ul>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
            <?php $this->load->view($container); ?>
        </div>	<!--/.main-->

        <div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-delete-label">
                            <i class="fa fa-trash-o"></i> HAPUS DATA
                        </h4>
                    </div>
                    <div class="modal-body">
                        APAKAH ANDA AKAN HAPUS DATA?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">BATAL</button>
                        <a href="" class="btn btn-danger btnDlt">
                            <i class="fa fa-trash-o"></i> HAPUS
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url('/assets/admin/plugins/datatables/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('/assets/admin/plugins/datatables/js/dataTables.bootstrap.min.js') ?>"></script>

        <script src="<?= base_url('/assets/admin/plugins/tinymce/jquery.tinymce.min.js') ?>"></script>
        <script src="<?= base_url('/assets/admin/plugins/tinymce/tinymce.min.js') ?>"></script>

        <script src="<?= base_url('/assets/admin/js/custom.js') ?>"></script>
        
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3mVUiZMhu2GhKHMS5r0aeddJFcWw28l8&callback=initMap">
        </script>
        
        <script>
            function hapus(id) {
                $(".btnDlt").attr("href", $('.linkDlt-' + id).val());
            }

            tinymce.init({
                selector: '.edit-text',
                height: 300,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ],
                toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css']
            });
        </script>
    </body>

</html>
