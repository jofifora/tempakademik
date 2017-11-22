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
        <h2 style="margin-top:0px">T_nilai List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t_nilai/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t_nilai/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t_nilai'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Mapel Detail</th>
		<th>Id Siswa Kelas</th>
		<th>Id Tahun Semester</th>
		<th>Tugas</th>
		<th>Uts</th>
		<th>Uas</th>
		<th>Sikap</th>
		<th>Action</th>
            </tr><?php
            foreach ($t_nilai_data as $t_nilai)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t_nilai->id_mapel_detail ?></td>
			<td><?php echo $t_nilai->id_siswa_kelas ?></td>
			<td><?php echo $t_nilai->id_tahun_semester ?></td>
			<td><?php echo $t_nilai->tugas ?></td>
			<td><?php echo $t_nilai->uts ?></td>
			<td><?php echo $t_nilai->uas ?></td>
			<td><?php echo $t_nilai->sikap ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('t_nilai/read/'.$t_nilai->id_nilai),'Read'); 
				echo ' | '; 
				echo anchor(site_url('t_nilai/update/'.$t_nilai->id_nilai),'Update'); 
				echo ' | '; 
				echo anchor(site_url('t_nilai/delete/'.$t_nilai->id_nilai),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('t_nilai/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t_nilai/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>