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
        <h2>T_kelas_tahun_ajaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Kelas</th>
		<th>Id Tahun</th>
		<th>Nama Wali Kelas</th>
		<th>Pass</th>
		<th>Token</th>
		
            </tr><?php
            foreach ($t_kelas_tahun_ajaran_data as $t_kelas_tahun_ajaran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_kelas_tahun_ajaran->id_kelas ?></td>
		      <td><?php echo $t_kelas_tahun_ajaran->id_tahun ?></td>
		      <td><?php echo $t_kelas_tahun_ajaran->nama_wali_kelas ?></td>
		      <td><?php echo $t_kelas_tahun_ajaran->pass ?></td>
		      <td><?php echo $t_kelas_tahun_ajaran->token ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>