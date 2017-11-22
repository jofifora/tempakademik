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
        <h2 style="margin-top:0px">T_siswa_kelas Read</h2>
        <table class="table">
	    <tr><td>Id Siswa</td><td><?php echo $id_siswa; ?></td></tr>
	    <tr><td>Id Kelas Tahun Ajaran</td><td><?php echo $id_kelas_tahun_ajaran; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_siswa_kelas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>