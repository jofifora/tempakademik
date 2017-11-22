        <h2 style="margin-top:0px">T_absensi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Id Siswa Kelas <?php echo form_error('id_siswa_kelas') ?></label>
            <input type="text" class="form-control" name="id_siswa_kelas" id="id_siswa_kelas" placeholder="Id Siswa Kelas" value="<?php echo $id_siswa_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Tahun Semester <?php echo form_error('id_tahun_semester') ?></label>
            <input type="text" class="form-control" name="id_tahun_semester" id="id_tahun_semester" placeholder="Id Tahun Semester" value="<?php echo $id_tahun_semester; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sakit <?php echo form_error('sakit') ?></label>
            <input type="text" class="form-control" name="sakit" id="sakit" placeholder="Sakit" value="<?php echo $sakit; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Ijin <?php echo form_error('ijin') ?></label>
            <input type="text" class="form-control" name="ijin" id="ijin" placeholder="Ijin" value="<?php echo $ijin; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Alpa <?php echo form_error('alpa') ?></label>
            <input type="text" class="form-control" name="alpa" id="alpa" placeholder="Alpa" value="<?php echo $alpa; ?>" />
        </div>
	    <input type="hidden" name="id_absensi" value="<?php echo $id_absensi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_absensi') ?>" class="btn btn-default">Cancel</a>
	</form>