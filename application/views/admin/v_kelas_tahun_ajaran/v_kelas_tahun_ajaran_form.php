        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <?php echo $button ?> Data Kelas Per Tahun Ajaran
                </h3>
            </div>
        </div>
        <!-- /.row -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Id Kelas Tahun Ajaran <?php echo form_error('id_kelas_tahun_ajaran') ?></label>
            <input type="text" class="form-control" name="id_kelas_tahun_ajaran" id="id_kelas_tahun_ajaran" placeholder="Id Kelas Tahun Ajaran" value="<?php echo $id_kelas_tahun_ajaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Kelas <?php echo form_error('id_kelas') ?></label>
            <input type="text" class="form-control" name="id_kelas" id="id_kelas" placeholder="Id Kelas" value="<?php echo $id_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Tahun <?php echo form_error('id_tahun') ?></label>
            <input type="text" class="form-control" name="id_tahun" id="id_tahun" placeholder="Id Tahun" value="<?php echo $id_tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Wali Kelas <?php echo form_error('nama_wali_kelas') ?></label>
            <input type="text" class="form-control" name="nama_wali_kelas" id="nama_wali_kelas" placeholder="Nama Wali Kelas" value="<?php echo $nama_wali_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kelas <?php echo form_error('nama_kelas') ?></label>
            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?php echo $nama_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="year">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $id_kelas_tahun_ajaran; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/v_kelas_tahun_ajaran') ?>" class="btn btn-default">Cancel</a>
	</form>