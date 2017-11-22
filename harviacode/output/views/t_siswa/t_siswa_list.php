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
        <h2 style="margin-top:0px">T_siswa List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('t_siswa/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('t_siswa/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('t_siswa'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nis</th>
		<th>Password</th>
		<th>Nama Siswa</th>
		<th>Tahun Masuk</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Agama</th>
		<th>Alamat</th>
		<th>Nama Ayah</th>
		<th>Nama Ibu</th>
		<th>Alamat Ortu</th>
		<th>Telp Ortu</th>
		<th>Pekerjaan Ayah</th>
		<th>Pekerjaan Ibu</th>
		<th>Nama Wali</th>
		<th>Alamat Wali</th>
		<th>Telp Wali</th>
		<th>Pekerjaan Wali</th>
		<th>Action</th>
            </tr><?php
            foreach ($t_siswa_data as $t_siswa)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $t_siswa->nis ?></td>
			<td><?php echo $t_siswa->password ?></td>
			<td><?php echo $t_siswa->nama_siswa ?></td>
			<td><?php echo $t_siswa->tahun_masuk ?></td>
			<td><?php echo $t_siswa->jenis_kelamin ?></td>
			<td><?php echo $t_siswa->tempat_lahir ?></td>
			<td><?php echo $t_siswa->tanggal_lahir ?></td>
			<td><?php echo $t_siswa->agama ?></td>
			<td><?php echo $t_siswa->alamat ?></td>
			<td><?php echo $t_siswa->nama_ayah ?></td>
			<td><?php echo $t_siswa->nama_ibu ?></td>
			<td><?php echo $t_siswa->alamat_ortu ?></td>
			<td><?php echo $t_siswa->telp_ortu ?></td>
			<td><?php echo $t_siswa->pekerjaan_ayah ?></td>
			<td><?php echo $t_siswa->pekerjaan_ibu ?></td>
			<td><?php echo $t_siswa->nama_wali ?></td>
			<td><?php echo $t_siswa->alamat_wali ?></td>
			<td><?php echo $t_siswa->telp_wali ?></td>
			<td><?php echo $t_siswa->pekerjaan_wali ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('t_siswa/read/'.$t_siswa->id_siswa),'Read'); 
				echo ' | '; 
				echo anchor(site_url('t_siswa/update/'.$t_siswa->id_siswa),'Update'); 
				echo ' | '; 
				echo anchor(site_url('t_siswa/delete/'.$t_siswa->id_siswa),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('t_siswa/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('t_siswa/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>