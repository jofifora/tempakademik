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
        <h2>T_mapel_detail List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Mapel</th>
		<th>Id Guru</th>
		<th>Id Tahun</th>
		
            </tr><?php
            foreach ($t_mapel_detail_data as $t_mapel_detail)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $t_mapel_detail->id_mapel ?></td>
		      <td><?php echo $t_mapel_detail->id_guru ?></td>
		      <td><?php echo $t_mapel_detail->id_tahun ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>