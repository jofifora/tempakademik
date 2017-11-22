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
        <h2>V_mapel_detail List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Mapel Detail</th>
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
		
            </tr><?php
            foreach ($v_mapel_detail_data as $v_mapel_detail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $v_mapel_detail->id_mapel_detail ?></td>
		      <td><?php echo $v_mapel_detail->id_mapel ?></td>
		      <td><?php echo $v_mapel_detail->id_guru ?></td>
		      <td><?php echo $v_mapel_detail->id_tahun ?></td>
		      <td><?php echo $v_mapel_detail->nama_mapel ?></td>
		      <td><?php echo $v_mapel_detail->nip ?></td>
		      <td><?php echo $v_mapel_detail->nama_guru ?></td>
		      <td><?php echo $v_mapel_detail->nuptk ?></td>
		      <td><?php echo $v_mapel_detail->jenis_kelamin ?></td>
		      <td><?php echo $v_mapel_detail->tempat_lahir ?></td>
		      <td><?php echo $v_mapel_detail->tanggal_lahir ?></td>
		      <td><?php echo $v_mapel_detail->alamat ?></td>
		      <td><?php echo $v_mapel_detail->agama ?></td>
		      <td><?php echo $v_mapel_detail->status ?></td>
		      <td><?php echo $v_mapel_detail->jenis_kepegawaian ?></td>
		      <td><?php echo $v_mapel_detail->tahun ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>