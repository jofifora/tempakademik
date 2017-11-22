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
        <h2>T_nilai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Mapel Detail</th>
		<th>Id Siswa Kelas</th>
		<th>Id Tahun Semester</th>
		<th>Tugas</th>
		<th>Uts</th>
		<th>Uas</th>
		<th>Sikap</th>
		
            </tr><?php
            foreach ($t_nilai_data as $t_nilai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_nilai->id_mapel_detail ?></td>
		      <td><?php echo $t_nilai->id_siswa_kelas ?></td>
		      <td><?php echo $t_nilai->id_tahun_semester ?></td>
		      <td><?php echo $t_nilai->tugas ?></td>
		      <td><?php echo $t_nilai->uts ?></td>
		      <td><?php echo $t_nilai->uas ?></td>
		      <td><?php echo $t_nilai->sikap ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>