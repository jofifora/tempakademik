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
        <h2 style="margin-top:0px">T_guru List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t_guru/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t_guru/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t_guru'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nip</th>
		<th>Nama Guru</th>
		<th>Password</th>
		<th>Nuptk</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Agama</th>
		<th>Status</th>
		<th>Jenis Kepegawaian</th>
		<th>Action</th>
            </tr><?php
            foreach ($t_guru_data as $t_guru)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t_guru->nip ?></td>
			<td><?php echo $t_guru->nama_guru ?></td>
			<td><?php echo $t_guru->password ?></td>
			<td><?php echo $t_guru->nuptk ?></td>
			<td><?php echo $t_guru->jenis_kelamin ?></td>
			<td><?php echo $t_guru->tempat_lahir ?></td>
			<td><?php echo $t_guru->tanggal_lahir ?></td>
			<td><?php echo $t_guru->alamat ?></td>
			<td><?php echo $t_guru->agama ?></td>
			<td><?php echo $t_guru->status ?></td>
			<td><?php echo $t_guru->jenis_kepegawaian ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('t_guru/read/'.$t_guru->id_guru),'Read'); 
				echo ' | '; 
				echo anchor(site_url('t_guru/update/'.$t_guru->id_guru),'Update'); 
				echo ' | '; 
				echo anchor(site_url('t_guru/delete/'.$t_guru->id_guru),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('t_guru/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t_guru/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>