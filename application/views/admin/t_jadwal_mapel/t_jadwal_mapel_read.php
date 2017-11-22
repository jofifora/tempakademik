        <h2 style="margin-top:0px">T_jadwal_mapel Read</h2>
        <table class="table">
	    <tr><td>Id Mapel Detail</td><td><?php echo $id_mapel_detail; ?></td></tr>
	    <tr><td>Id Kelas Tahun Ajaran</td><td><?php echo $id_kelas_tahun_ajaran; ?></td></tr>
	    <tr><td>Hari Ke</td><td><?php echo $hari_ke; ?></td></tr>
	    <tr><td>Jam Mulai</td><td><?php echo $jam_mulai; ?></td></tr>
	    <tr><td>Jam Selesai</td><td><?php echo $jam_selesai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/t_jadwal_mapel') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>