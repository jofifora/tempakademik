<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">T_mapel <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Mapel <?php echo form_error('nama_mapel') ?></label>
            <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="Nama Mapel" value="<?php echo $nama_mapel; ?>" />
        </div>
	    <input type="hidden" name="id_mapel" value="<?php echo $id_mapel; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_mapel') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>