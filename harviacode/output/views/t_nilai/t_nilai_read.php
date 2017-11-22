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
        <h2 style="margin-top:0px">T_nilai Read</h2>
        <table class="table">
	    <tr><td>Id Mapel Detail</td><td><?php echo $id_mapel_detail; ?></td></tr>
	    <tr><td>Id Siswa Kelas</td><td><?php echo $id_siswa_kelas; ?></td></tr>
	    <tr><td>Id Tahun Semester</td><td><?php echo $id_tahun_semester; ?></td></tr>
	    <tr><td>Tugas</td><td><?php echo $tugas; ?></td></tr>
	    <tr><td>Uts</td><td><?php echo $uts; ?></td></tr>
	    <tr><td>Uas</td><td><?php echo $uas; ?></td></tr>
	    <tr><td>Sikap</td><td><?php echo $sikap; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_nilai') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>