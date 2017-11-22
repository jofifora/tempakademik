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
        <h2 style="margin-top:0px">T_nilai <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Id Mapel Detail <?php echo form_error('id_mapel_detail') ?></label>
            <input type="text" class="form-control" name="id_mapel_detail" id="id_mapel_detail" placeholder="Id Mapel Detail" value="<?php echo $id_mapel_detail; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Siswa Kelas <?php echo form_error('id_siswa_kelas') ?></label>
            <input type="text" class="form-control" name="id_siswa_kelas" id="id_siswa_kelas" placeholder="Id Siswa Kelas" value="<?php echo $id_siswa_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Tahun Semester <?php echo form_error('id_tahun_semester') ?></label>
            <input type="text" class="form-control" name="id_tahun_semester" id="id_tahun_semester" placeholder="Id Tahun Semester" value="<?php echo $id_tahun_semester; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tugas <?php echo form_error('tugas') ?></label>
            <input type="text" class="form-control" name="tugas" id="tugas" placeholder="Tugas" value="<?php echo $tugas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Uts <?php echo form_error('uts') ?></label>
            <input type="text" class="form-control" name="uts" id="uts" placeholder="Uts" value="<?php echo $uts; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Uas <?php echo form_error('uas') ?></label>
            <input type="text" class="form-control" name="uas" id="uas" placeholder="Uas" value="<?php echo $uas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sikap <?php echo form_error('sikap') ?></label>
            <input type="text" class="form-control" name="sikap" id="sikap" placeholder="Sikap" value="<?php echo $sikap; ?>" />
        </div>
	    <input type="hidden" name="id_nilai" value="<?php echo $id_nilai; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_nilai') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>