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
        <h2>V_absensi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Absensi</th>
		<th>Id Siswa Kelas</th>
		<th>Id Tahun Semester</th>
		<th>Sakit</th>
		<th>Ijin</th>
		<th>Alpa</th>
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
		<th>Nama Wali Kelas</th>
		<th>Nama Kelas</th>
		<th>Id Tahun</th>
		<th>Semester</th>
		<th>Tahun</th>
		
            </tr><?php
            foreach ($v_absensi_data as $v_absensi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $v_absensi->id_absensi ?></td>
		      <td><?php echo $v_absensi->id_siswa_kelas ?></td>
		      <td><?php echo $v_absensi->id_tahun_semester ?></td>
		      <td><?php echo $v_absensi->sakit ?></td>
		      <td><?php echo $v_absensi->ijin ?></td>
		      <td><?php echo $v_absensi->alpa ?></td>
		      <td><?php echo $v_absensi->id_kelas_tahun_ajaran ?></td>
		      <td><?php echo $v_absensi->id_siswa ?></td>
		      <td><?php echo $v_absensi->nis ?></td>
		      <td><?php echo $v_absensi->nama_siswa ?></td>
		      <td><?php echo $v_absensi->tahun_masuk ?></td>
		      <td><?php echo $v_absensi->jenis_kelamin ?></td>
		      <td><?php echo $v_absensi->tempat_lahir ?></td>
		      <td><?php echo $v_absensi->tanggal_lahir ?></td>
		      <td><?php echo $v_absensi->agama ?></td>
		      <td><?php echo $v_absensi->alamat ?></td>
		      <td><?php echo $v_absensi->nama_ayah ?></td>
		      <td><?php echo $v_absensi->nama_ibu ?></td>
		      <td><?php echo $v_absensi->alamat_ortu ?></td>
		      <td><?php echo $v_absensi->telp_ortu ?></td>
		      <td><?php echo $v_absensi->pekerjaan_ayah ?></td>
		      <td><?php echo $v_absensi->pekerjaan_ibu ?></td>
		      <td><?php echo $v_absensi->nama_wali ?></td>
		      <td><?php echo $v_absensi->alamat_wali ?></td>
		      <td><?php echo $v_absensi->telp_wali ?></td>
		      <td><?php echo $v_absensi->pekerjaan_wali ?></td>
		      <td><?php echo $v_absensi->id_kelas ?></td>
		      <td><?php echo $v_absensi->nama_wali_kelas ?></td>
		      <td><?php echo $v_absensi->nama_kelas ?></td>
		      <td><?php echo $v_absensi->id_tahun ?></td>
		      <td><?php echo $v_absensi->semester ?></td>
		      <td><?php echo $v_absensi->tahun ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>