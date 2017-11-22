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
        <h2>T_absensi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Siswa Kelas</th>
		<th>Id Tahun Semester</th>
		<th>Sakit</th>
		<th>Ijin</th>
		<th>Alpa</th>
		
            </tr><?php
            foreach ($t_absensi_data as $t_absensi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_absensi->id_siswa_kelas ?></td>
		      <td><?php echo $t_absensi->id_tahun_semester ?></td>
		      <td><?php echo $t_absensi->sakit ?></td>
		      <td><?php echo $t_absensi->ijin ?></td>
		      <td><?php echo $t_absensi->alpa ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>