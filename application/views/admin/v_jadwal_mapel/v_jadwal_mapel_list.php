        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Jadwal Mapel
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/v_jadwal_mapel/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/v_jadwal_mapel/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/v_jadwal_mapel'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
                <th>Tahun Ajaran</th>
				<th>Kelas</th>
				<th>Hari Ke</th>
				<th>Waktu</th>
				<th>Mapel</th>
				<th>Guru</th>
				<th>Action</th>
            </tr><?php
            foreach ($v_jadwal_mapel_data as $v_jadwal_mapel)
            {
                ?>
            <tr>
				<td width="80px"><?php echo ++$start ?></td>
				<td><?php echo $v_jadwal_mapel->tahun ?></td>
				<td><?php echo $v_jadwal_mapel->nama_kelas ?></td>
				<td><?php echo $v_jadwal_mapel->hari_ke ?></td>
				<td><?php echo $v_jadwal_mapel->jam_mulai." - ".$v_jadwal_mapel->jam_selesai ?></td>
				<td><?php echo $v_jadwal_mapel->nama_mapel ?></td>
				<td><?php echo $v_jadwal_mapel->nama_guru ?></td>
				<td style="text-align:center" width="200px">
					<?php 
					echo anchor(site_url('admin/v_jadwal_mapel/read/'.$v_jadwal_mapel->id_jadwal_mapel),'Read'); 
					echo ' | '; 
					echo anchor(site_url('admin/v_jadwal_mapel/update/'.$v_jadwal_mapel->id_jadwal_mapel),'Update'); 
					echo ' | '; 
					echo anchor(site_url('admin/v_jadwal_mapel/delete/'.$v_jadwal_mapel->id_jadwal_mapel),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
					?>
				</td>
			</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('admin/v_jadwal_mapel/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('admin/v_jadwal_mapel/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>