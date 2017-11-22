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
        <h2>T_guru List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nip</th>
		<th>Nama Guru</th>
		<th>Password</th>
		<th>Nuptk</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Alamat</th>
		<th>Agama</th>
		<th>Status</th>
		<th>Jenis Kepegawaian</th>
		
            </tr><?php
            foreach ($t_guru_data as $t_guru)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_guru->nip ?></td>
		      <td><?php echo $t_guru->nama_guru ?></td>
		      <td><?php echo $t_guru->password ?></td>
		      <td><?php echo $t_guru->nuptk ?></td>
		      <td><?php echo $t_guru->jenis_kelamin ?></td>
		      <td><?php echo $t_guru->tempat_lahir ?></td>
		      <td><?php echo $t_guru->tanggal_lahir ?></td>
		      <td><?php echo $t_guru->alamat ?></td>
		      <td><?php echo $t_guru->agama ?></td>
		      <td><?php echo $t_guru->status ?></td>
		      <td><?php echo $t_guru->jenis_kepegawaian ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>