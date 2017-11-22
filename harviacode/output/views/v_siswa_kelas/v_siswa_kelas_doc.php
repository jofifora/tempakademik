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
        <h2>V_siswa_kelas List</h2>
        <table class="word-table" style="margin-bottom: 10px">
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
		
            </tr><?php
            foreach ($v_siswa_kelas_data as $v_siswa_kelas)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
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
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>