<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">V_kelas_tahun_ajaran Read</h2>
        <table class="table">
	    <tr><td>Id Kelas Tahun Ajaran</td><td><?php echo $id_kelas_tahun_ajaran; ?></td></tr>
	    <tr><td>Id Kelas</td><td><?php echo $id_kelas; ?></td></tr>
	    <tr><td>Id Tahun</td><td><?php echo $id_tahun; ?></td></tr>
	    <tr><td>Nama Wali Kelas</td><td><?php echo $nama_wali_kelas; ?></td></tr>
	    <tr><td>Nama Kelas</td><td><?php echo $nama_kelas; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('v_kelas_tahun_ajaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>