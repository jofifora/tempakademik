        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <?php echo $button ?> Data Semester Per Tahun Ajaran
                </h3>
            </div>
        </div>
        <!-- /.row -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Id Tahun <?php echo form_error('id_tahun') ?></label>
            <select class="form-control" name="id_tahun" id="id_tahun">
                <?php foreach ($data_tahun as $key) { ?>
                <option value="<?php echo $key->id_tahun;?>" <?php ($id_tahun == $key->id_tahun) ? ("selected") : ("") ; ; ?>><?php echo($key->tahun) ?></option>                    
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="bigint">Semester <?php echo form_error('semester') ?></label>
            <select class="form-control" name="semester" id="semester">
                <option value="ganjil" <?php ($semester == "ganjil") ? ("selected") : ("") ; ; ?>>Ganjil</option>                    
                <option value="genap" <?php ($semester == "genap") ? ("selected") : ("") ; ; ?>>Genap</option>                    
            </select>
        </div>
	    <input type="hidden" name="" value="<?php echo $id_tahun_semester; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/v_tahun_semester') ?>" class="btn btn-default">Cancel</a>
	</form>