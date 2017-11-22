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
        <h2 style="margin-top:0px">V_jadwal_mapel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Id Jadwal Mapel <?php echo form_error('id_jadwal_mapel') ?></label>
            <input type="text" class="form-control" name="id_jadwal_mapel" id="id_jadwal_mapel" placeholder="Id Jadwal Mapel" value="<?php echo $id_jadwal_mapel; ?>" />
        </div>
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
	    <div class="form-group">
            <label for="bigint">Id Mapel <?php echo form_error('id_mapel') ?></label>
            <input type="text" class="form-control" name="id_mapel" id="id_mapel" placeholder="Id Mapel" value="<?php echo $id_mapel; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Guru <?php echo form_error('id_guru') ?></label>
            <input type="text" class="form-control" name="id_guru" id="id_guru" placeholder="Id Guru" value="<?php echo $id_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Tahun <?php echo form_error('id_tahun') ?></label>
            <input type="text" class="form-control" name="id_tahun" id="id_tahun" placeholder="Id Tahun" value="<?php echo $id_tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Mapel <?php echo form_error('nama_mapel') ?></label>
            <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="Nama Mapel" value="<?php echo $nama_mapel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Guru <?php echo form_error('nama_guru') ?></label>
            <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Nama Guru" value="<?php echo $nama_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nuptk <?php echo form_error('nuptk') ?></label>
            <input type="text" class="form-control" name="nuptk" id="nuptk" placeholder="Nuptk" value="<?php echo $nuptk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Agama <?php echo form_error('agama') ?></label>
            <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kepegawaian <?php echo form_error('jenis_kepegawaian') ?></label>
            <input type="text" class="form-control" name="jenis_kepegawaian" id="jenis_kepegawaian" placeholder="Jenis Kepegawaian" value="<?php echo $jenis_kepegawaian; ?>" />
        </div>
	    <div class="form-group">
            <label for="year">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Kelas <?php echo form_error('id_kelas') ?></label>
            <input type="text" class="form-control" name="id_kelas" id="id_kelas" placeholder="Id Kelas" value="<?php echo $id_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Wali Kelas <?php echo form_error('nama_wali_kelas') ?></label>
            <input type="text" class="form-control" name="nama_wali_kelas" id="nama_wali_kelas" placeholder="Nama Wali Kelas" value="<?php echo $nama_wali_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kelas <?php echo form_error('nama_kelas') ?></label>
            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?php echo $nama_kelas; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('v_jadwal_mapel') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>