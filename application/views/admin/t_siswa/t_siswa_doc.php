<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T_siswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
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
		
            </tr><?php
            foreach ($t_siswa_data as $t_siswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>