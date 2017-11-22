        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Siswa Per Kelas
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/v_siswa_kelas/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/v_siswa_kelas/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/v_siswa_kelas'); ?>" class="btn btn-default">Reset</a>
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
                <th>Nama Kelas</th>
				<th>NIS</th>
				<th>Nama Siswa</th>		
				<th>Action</th>
            </tr><?php
            foreach ($v_siswa_kelas_data as $v_siswa_kelas)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $v_siswa_kelas->tahun ?></td>			
			<td><?php echo $v_siswa_kelas->nama_kelas ?></td>
			<td><?php echo $v_siswa_kelas->nis ?></td>
			<td><?php echo $v_siswa_kelas->nama_siswa ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('admin/v_siswa_kelas/read/'.$v_siswa_kelas->id_siswa_kelas),'Read'); 
				echo ' | '; 
				echo anchor(site_url('admin/v_siswa_kelas/update/'.$v_siswa_kelas->id_siswa_kelas),'Update'); 
				echo ' | '; 
				echo anchor(site_url('admin/v_siswa_kelas/delete/'.$v_siswa_kelas->id_siswa_kelas),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('admin/v_siswa_kelas/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('admin/v_siswa_kelas/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>