<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?= site_url('/administrator/dashboard') ?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <li><a href="<?= site_url('/administrator/kontak') ?>">KONTAK</a></li>
        <li class="active">VIEW</li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="glyphicon glyphicon-phone"></i> KONTAK
        </h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body no-padding">
                <table class="table table-striped table-hover">
                    <tr>
                        <td width="30%" class="text-right"><b>NAMA</b></td>
                        <td width="5%">:</td>
                        <td><?= $contact->name ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>SUBJEK</b></td>
                        <td width="5%">:</td>
                        <td><?= $contact->subject ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>EMAIL</b></td>
                        <td width="5%">:</td>
                        <td><?= $contact->email ?></td>
                    </tr>
                    <tr>
                        <td width="30%" class="text-right"><b>PESAN</b></td>
                        <td width="5%">:</td>
                        <td><?= $contact->message ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>