        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Data Absensi
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/v_absensi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/v_absensi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/v_absensi'); ?>" class="btn btn-default">Reset</a>
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
				<th>Tahun</th>
				<th>Kelas</th>
				<th>Semester</th>
				<th>Nama Siswa</th>				
				<th>Sakit</th>
				<th>Ijin</th>
				<th>Alpa</th>	
				<th>Action</th>
            </tr><?php
            foreach ($v_absensi_data as $v_absensi)
            {
                ?>
            <tr>
				<td width="80px"><?php echo ++$start ?></td>		
				<td><?php echo $v_absensi->tahun ?></td>
				<td><?php echo $v_absensi->semester ?></td>
				<td><?php echo $v_absensi->nama_kelas ?></td>
				<td><?php echo $v_absensi->nama_siswa ?></td>
				<td><?php echo $v_absensi->sakit ?></td>
				<td><?php echo $v_absensi->ijin ?></td>
				<td><?php echo $v_absensi->alpa ?></td>
				<td style="text-align:center" width="200px">
					<?php 
					echo anchor(site_url('admin/v_absensi/read/'.$v_absensi->id_absensi),'Read'); 
					echo ' | '; 
					echo anchor(site_url('admin/v_absensi/update/'.$v_absensi->id_absensi),'Update'); 
					echo ' | '; 
					echo anchor(site_url('admin/v_absensi/delete/'.$v_absensi->id_absensi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('admin/v_absensi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('admin/v_absensi/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>