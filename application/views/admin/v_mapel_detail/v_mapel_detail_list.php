        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Mapel Per Tahun
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/v_mapel_detail/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('admin/v_mapel_detail/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('admin/v_mapel_detail'); ?>" class="btn btn-default">Reset</a>
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
        		<th>Nama Mapel</th>
        		<th>Nama Guru</th>
        		<th>Action</th>
            </tr><?php
            foreach ($v_mapel_detail_data as $v_mapel_detail)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $v_mapel_detail->tahun ?></td>
            <td><?php echo $v_mapel_detail->nama_mapel ?></td>
            <td><?php echo $v_mapel_detail->nama_guru ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('admin/v_mapel_detail/read/'.$v_mapel_detail->id_mapel_detail),'Read'); 
				echo ' | '; 
				echo anchor(site_url('admin/v_mapel_detail/update/'.$v_mapel_detail->id_mapel_detail),'Update'); 
				echo ' | '; 
				echo anchor(site_url('admin/v_mapel_detail/delete/'.$v_mapel_detail->id_mapel_detail),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('admin/v_mapel_detail/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('admin/v_mapel_detail/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>