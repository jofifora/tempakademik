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
        <h2 style="margin-top:0px">T_mapel_detail Read</h2>
        <table class="table">
	    <tr><td>Id Mapel</td><td><?php echo $id_mapel; ?></td></tr>
	    <tr><td>Id Guru</td><td><?php echo $id_guru; ?></td></tr>
	    <tr><td>Id Tahun</td><td><?php echo $id_tahun; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('t_mapel_detail') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>