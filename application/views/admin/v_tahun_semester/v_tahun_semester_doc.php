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
        <h2>V_tahun_semester List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Tahun Semester</th>
		<th>Id Tahun</th>
		<th>Semester</th>
		<th>Tahun</th>
		
            </tr><?php
            foreach ($v_tahun_semester_data as $v_tahun_semester)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $v_tahun_semester->id_tahun_semester ?></td>
		      <td><?php echo $v_tahun_semester->id_tahun ?></td>
		      <td><?php echo $v_tahun_semester->semester ?></td>
		      <td><?php echo $v_tahun_semester->tahun ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>