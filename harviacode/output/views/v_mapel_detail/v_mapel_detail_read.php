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
        <h2 style="margin-top:0px">V_mapel_detail Read</h2>
        <table class="table">
	    <tr><td>Id Mapel Detail</td><td><?php echo $id_mapel_detail; ?></td></tr>
	    <tr><td>Id Mapel</td><td><?php echo $id_mapel; ?></td></tr>
	    <tr><td>Id Guru</td><td><?php echo $id_guru; ?></td></tr>
	    <tr><td>Id Tahun</td><td><?php echo $id_tahun; ?></td></tr>
	    <tr><td>Nama Mapel</td><td><?php echo $nama_mapel; ?></td></tr>
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Nama Guru</td><td><?php echo $nama_guru; ?></td></tr>
	    <tr><td>Nuptk</td><td><?php echo $nuptk; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Agama</td><td><?php echo $agama; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Jenis Kepegawaian</td><td><?php echo $jenis_kepegawaian; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('v_mapel_detail') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>