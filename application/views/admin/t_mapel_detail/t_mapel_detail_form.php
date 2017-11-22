        <h2 style="margin-top:0px">T_mapel_detail <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Id Mapel <?php echo form_error('id_mapel') ?></label>
            <input type="text" class="form-control" name="id_mapel" id="id_mapel" placeholder="Id Mapel" value="<?php echo $id_mapel; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Guru <?php echo form_error('id_guru') ?></label>
            <input type="text" class="form-control" name="id_guru" id="id_guru" placeholder="Id Guru" value="<?php echo $id_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Tahun <?php echo form_error('id_tahun') ?></label>
            <input type="text" class="form-control" name="id_tahun" id="id_tahun" placeholder="Id Tahun" value="<?php echo $id_tahun; ?>" />
        </div>
	    <input type="hidden" name="id_mapel_detail" value="<?php echo $id_mapel_detail; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/t_mapel_detail') ?>" class="btn btn-default">Cancel</a>
	</form>