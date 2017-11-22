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
        <h2 style="margin-top:0px">V_siswa_kelas List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('v_siswa_kelas/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('v_siswa_kelas/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('v_siswa_kelas'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Siswa Kelas</th>
		<th>Id Kelas Tahun Ajaran</th>
		<th>Id Siswa</th>
		<th>Nis</th>
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
		<th>Id Kelas</th>
		<th>Id Tahun</th>
		<th>Nama Wali Kelas</th>
		<th>Nama Kelas</th>
		<th>Tahun</th>
		<th>Action</th>
            </tr><?php
            foreach ($v_siswa_kelas_data as $v_siswa_kelas)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $v_siswa_kelas->id_siswa_kelas ?></td>
			<td><?php echo $v_siswa_kelas->id_kelas_tahun_ajaran ?></td>
			<td><?php echo $v_siswa_kelas->id_siswa ?></td>
			<td><?php echo $v_siswa_kelas->nis ?></td>
			<td><?php echo $v_siswa_kelas->nama_siswa ?></td>
			<td><?php echo $v_siswa_kelas->tahun_masuk ?></td>
			<td><?php echo $v_siswa_kelas->jenis_kelamin ?></td>
			<td><?php echo $v_siswa_kelas->tempat_lahir ?></td>
			<td><?php echo $v_siswa_kelas->tanggal_lahir ?></td>
			<td><?php echo $v_siswa_kelas->agama ?></td>
			<td><?php echo $v_siswa_kelas->alamat ?></td>
			<td><?php echo $v_siswa_kelas->nama_ayah ?></td>
			<td><?php echo $v_siswa_kelas->nama_ibu ?></td>
			<td><?php echo $v_siswa_kelas->alamat_ortu ?></td>
			<td><?php echo $v_siswa_kelas->telp_ortu ?></td>
			<td><?php echo $v_siswa_kelas->pekerjaan_ayah ?></td>
			<td><?php echo $v_siswa_kelas->pekerjaan_ibu ?></td>
			<td><?php echo $v_siswa_kelas->nama_wali ?></td>
			<td><?php echo $v_siswa_kelas->alamat_wali ?></td>
			<td><?php echo $v_siswa_kelas->telp_wali ?></td>
			<td><?php echo $v_siswa_kelas->pekerjaan_wali ?></td>
			<td><?php echo $v_siswa_kelas->id_kelas ?></td>
			<td><?php echo $v_siswa_kelas->id_tahun ?></td>
			<td><?php echo $v_siswa_kelas->nama_wali_kelas ?></td>
			<td><?php echo $v_siswa_kelas->nama_kelas ?></td>
			<td><?php echo $v_siswa_kelas->tahun ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('v_siswa_kelas/read/'.$v_siswa_kelas->),'Read'); 
				echo ' | '; 
				echo anchor(site_url('v_siswa_kelas/update/'.$v_siswa_kelas->),'Update'); 
				echo ' | '; 
				echo anchor(site_url('v_siswa_kelas/delete/'.$v_siswa_kelas->),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('v_siswa_kelas/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('v_siswa_kelas/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>