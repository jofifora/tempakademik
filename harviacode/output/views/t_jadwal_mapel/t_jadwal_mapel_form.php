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
        <h2 style="margin-top:0px">T_jadwal_mapel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Id Mapel Detail <?php echo form_error('id_mapel_detail') ?></label>
            <input type="text" class="form-control" name="id_mapel_detail" id="id_mapel_detail" placeholder="Id Mapel Detail" value="<?php echo $id_mapel_detail; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Kelas Tahun Ajaran <?php echo form_error('id_kelas_tahun_ajaran') ?></label>
            <input type="text" class="form-control" name="id_kelas_tahun_ajaran" id="id_kelas_tahun_ajaran" placeholder="Id Kelas Tahun Ajaran" value="<?php echo $id_kelas_tahun_ajaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Hari Ke <?php echo form_error('hari_ke') ?></label>
            <input type="text" class="form-control" name="hari_ke" id="hari_ke" placeholder="Hari Ke" value="<?php echo $hari_ke; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Jam Mulai <?php echo form_error('jam_mulai') ?></label>
            <input type="text" class="form-control" name="jam_mulai" id="jam_mulai" placeholder="Jam Mulai" value="<?php echo $jam_mulai; ?>" />
        </div>
	    <div class="form-group">
            <label for="time">Jam Selesai <?php echo form_error('jam_selesai') ?></label>
            <input type="text" class="form-control" name="jam_selesai" id="jam_selesai" placeholder="Jam Selesai" value="<?php echo $jam_selesai; ?>" />
        </div>
	    <input type="hidden" name="id_jadwal_mapel" value="<?php echo $id_jadwal_mapel; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_jadwal_mapel') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>