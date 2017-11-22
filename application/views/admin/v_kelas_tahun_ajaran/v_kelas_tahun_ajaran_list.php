        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Data Kelas Per Tahun
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/v_kelas_tahun_ajaran/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/v_kelas_tahun_ajaran/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/v_kelas_tahun_ajaran'); ?>" class="btn btn-default">Reset</a>
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
                <th>Nama Wali Kelas</th>        		
        		<th>Action</th>
            </tr><?php
            foreach ($v_kelas_tahun_ajaran_data as $v_kelas_tahun_ajaran)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $v_kelas_tahun_ajaran->tahun ?></td>
            <td><?php echo $v_kelas_tahun_ajaran->nama_kelas ?></td>
			<td><?php echo $v_kelas_tahun_ajaran->nama_wali_kelas ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('admin/v_kelas_tahun_ajaran/read/'.$v_kelas_tahun_ajaran->id_tahun_semester),'Read'); 
				echo ' | '; 
				echo anchor(site_url('admin/v_kelas_tahun_ajaran/update/'.$v_kelas_tahun_ajaran->id_tahun_semester),'Update'); 
				echo ' | '; 
				echo anchor(site_url('admin/v_kelas_tahun_ajaran/delete/'.$v_kelas_tahun_ajaran->id_tahun_semester),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('admin/v_kelas_tahun_ajaran/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('admin/v_kelas_tahun_ajaran/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>