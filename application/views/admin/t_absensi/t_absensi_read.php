        <h2 style="margin-top:0px">T_absensi Read</h2>
        <table class="table">
	    <tr><td>Id Siswa Kelas</td><td><?php echo $id_siswa_kelas; ?></td></tr>
	    <tr><td>Id Tahun Semester</td><td><?php echo $id_tahun_semester; ?></td></tr>
	    <tr><td>Sakit</td><td><?php echo $sakit; ?></td></tr>
	    <tr><td>Ijin</td><td><?php echo $ijin; ?></td></tr>
	    <tr><td>Alpa</td><td><?php echo $alpa; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/t_absensi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>