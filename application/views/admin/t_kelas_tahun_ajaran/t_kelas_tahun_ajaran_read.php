        <h2 style="margin-top:0px">T_kelas_tahun_ajaran Read</h2>
        <table class="table">
	    <tr><td>Id Kelas</td><td><?php echo $id_kelas; ?></td></tr>
	    <tr><td>Id Tahun</td><td><?php echo $id_tahun; ?></td></tr>
	    <tr><td>Nama Wali Kelas</td><td><?php echo $nama_wali_kelas; ?></td></tr>
	    <tr><td>Pass</td><td><?php echo $pass; ?></td></tr>
	    <tr><td>Token</td><td><?php echo $token; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/t_kelas_tahun_ajaran') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>