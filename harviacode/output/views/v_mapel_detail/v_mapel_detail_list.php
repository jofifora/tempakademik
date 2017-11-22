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
        <h2 style="margin-top:0px">V_mapel_detail List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('v_mapel_detail/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('v_mapel_detail/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('v_mapel_detail'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Mapel</th>
		<th>Id Guru</th>
		<th>Id Tahun</th>
		<th>Nama Mapel</th>
		<th>Nip</th>
		<th>Nama Guru</th>
		<th>Nuptk</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Agama</th>
		<th>Status</th>
		<th>Jenis Kepegawaian</th>
		<th>Tahun</th>
		<th>Action</th>
            </tr><?php
            foreach ($v_mapel_detail_data as $v_mapel_detail)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $v_mapel_detail->id_mapel_detail ?></td>
			<td><?php echo $v_mapel_detail->id_mapel ?></td>
			<td><?php echo $v_mapel_detail->id_guru ?></td>
			<td><?php echo $v_mapel_detail->id_tahun ?></td>
			<td><?php echo $v_mapel_detail->nama_mapel ?></td>
			<td><?php echo $v_mapel_detail->nip ?></td>
			<td><?php echo $v_mapel_detail->nama_guru ?></td>
			<td><?php echo $v_mapel_detail->nuptk ?></td>
			<td><?php echo $v_mapel_detail->jenis_kelamin ?></td>
			<td><?php echo $v_mapel_detail->tempat_lahir ?></td>
			<td><?php echo $v_mapel_detail->tanggal_lahir ?></td>
			<td><?php echo $v_mapel_detail->alamat ?></td>
			<td><?php echo $v_mapel_detail->agama ?></td>
			<td><?php echo $v_mapel_detail->status ?></td>
			<td><?php echo $v_mapel_detail->jenis_kepegawaian ?></td>
			<td><?php echo $v_mapel_detail->tahun ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('v_mapel_detail/read/'.$v_mapel_detail->),'Read'); 
				echo ' | '; 
				echo anchor(site_url('v_mapel_detail/update/'.$v_mapel_detail->),'Update'); 
				echo ' | '; 
				echo anchor(site_url('v_mapel_detail/delete/'.$v_mapel_detail->),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('v_mapel_detail/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('v_mapel_detail/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>