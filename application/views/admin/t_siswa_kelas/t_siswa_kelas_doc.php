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
        <h2>T_siswa_kelas List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Siswa</th>
		<th>Id Kelas Tahun Ajaran</th>
		
            </tr><?php
            foreach ($t_siswa_kelas_data as $t_siswa_kelas)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_siswa_kelas->id_siswa ?></td>
		      <td><?php echo $t_siswa_kelas->id_kelas_tahun_ajaran ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>