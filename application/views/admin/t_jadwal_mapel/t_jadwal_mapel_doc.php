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
        <h2>T_jadwal_mapel List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Mapel Detail</th>
		<th>Id Kelas Tahun Ajaran</th>
		<th>Hari Ke</th>
		<th>Jam Mulai</th>
		<th>Jam Selesai</th>
		
            </tr><?php
            foreach ($t_jadwal_mapel_data as $t_jadwal_mapel)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_jadwal_mapel->id_mapel_detail ?></td>
		      <td><?php echo $t_jadwal_mapel->id_kelas_tahun_ajaran ?></td>
		      <td><?php echo $t_jadwal_mapel->hari_ke ?></td>
		      <td><?php echo $t_jadwal_mapel->jam_mulai ?></td>
		      <td><?php echo $t_jadwal_mapel->jam_selesai ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>