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
        <h2>V_jadwal_mapel List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Jadwal Mapel</th>
		<th>Id Mapel Detail</th>
		<th>Id Kelas Tahun Ajaran</th>
		<th>Hari Ke</th>
		<th>Jam Mulai</th>
		<th>Jam Selesai</th>
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
		<th>Id Kelas</th>
		<th>Nama Wali Kelas</th>
		<th>Nama Kelas</th>
		
            </tr><?php
            foreach ($v_jadwal_mapel_data as $v_jadwal_mapel)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $v_jadwal_mapel->id_jadwal_mapel ?></td>
		      <td><?php echo $v_jadwal_mapel->id_mapel_detail ?></td>
		      <td><?php echo $v_jadwal_mapel->id_kelas_tahun_ajaran ?></td>
		      <td><?php echo $v_jadwal_mapel->hari_ke ?></td>
		      <td><?php echo $v_jadwal_mapel->jam_mulai ?></td>
		      <td><?php echo $v_jadwal_mapel->jam_selesai ?></td>
		      <td><?php echo $v_jadwal_mapel->id_mapel ?></td>
		      <td><?php echo $v_jadwal_mapel->id_guru ?></td>
		      <td><?php echo $v_jadwal_mapel->id_tahun ?></td>
		      <td><?php echo $v_jadwal_mapel->nama_mapel ?></td>
		      <td><?php echo $v_jadwal_mapel->nip ?></td>
		      <td><?php echo $v_jadwal_mapel->nama_guru ?></td>
		      <td><?php echo $v_jadwal_mapel->nuptk ?></td>
		      <td><?php echo $v_jadwal_mapel->jenis_kelamin ?></td>
		      <td><?php echo $v_jadwal_mapel->tempat_lahir ?></td>
		      <td><?php echo $v_jadwal_mapel->tanggal_lahir ?></td>
		      <td><?php echo $v_jadwal_mapel->alamat ?></td>
		      <td><?php echo $v_jadwal_mapel->agama ?></td>
		      <td><?php echo $v_jadwal_mapel->status ?></td>
		      <td><?php echo $v_jadwal_mapel->jenis_kepegawaian ?></td>
		      <td><?php echo $v_jadwal_mapel->tahun ?></td>
		      <td><?php echo $v_jadwal_mapel->id_kelas ?></td>
		      <td><?php echo $v_jadwal_mapel->nama_wali_kelas ?></td>
		      <td><?php echo $v_jadwal_mapel->nama_kelas ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>