        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">
                    <?php echo $button ?> Data Nilai
                </h3>
            </div>
        </div>
        <!-- /.row -->
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="bigint">Id Nilai <?php echo form_error('id_nilai') ?></label>
            <input type="text" class="form-control" name="id_nilai" id="id_nilai" placeholder="Id Nilai" value="<?php echo $id_nilai; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Mapel Detail <?php echo form_error('id_mapel_detail') ?></label>
            <input type="text" class="form-control" name="id_mapel_detail" id="id_mapel_detail" placeholder="Id Mapel Detail" value="<?php echo $id_mapel_detail; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Siswa Kelas <?php echo form_error('id_siswa_kelas') ?></label>
            <input type="text" class="form-control" name="id_siswa_kelas" id="id_siswa_kelas" placeholder="Id Siswa Kelas" value="<?php echo $id_siswa_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Tahun Semester <?php echo form_error('id_tahun_semester') ?></label>
            <input type="text" class="form-control" name="id_tahun_semester" id="id_tahun_semester" placeholder="Id Tahun Semester" value="<?php echo $id_tahun_semester; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tugas <?php echo form_error('tugas') ?></label>
            <input type="text" class="form-control" name="tugas" id="tugas" placeholder="Tugas" value="<?php echo $tugas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Uts <?php echo form_error('uts') ?></label>
            <input type="text" class="form-control" name="uts" id="uts" placeholder="Uts" value="<?php echo $uts; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Uas <?php echo form_error('uas') ?></label>
            <input type="text" class="form-control" name="uas" id="uas" placeholder="Uas" value="<?php echo $uas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sikap <?php echo form_error('sikap') ?></label>
            <input type="text" class="form-control" name="sikap" id="sikap" placeholder="Sikap" value="<?php echo $sikap; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Mapel <?php echo form_error('id_mapel') ?></label>
            <input type="text" class="form-control" name="id_mapel" id="id_mapel" placeholder="Id Mapel" value="<?php echo $id_mapel; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Guru <?php echo form_error('id_guru') ?></label>
            <input type="text" class="form-control" name="id_guru" id="id_guru" placeholder="Id Guru" value="<?php echo $id_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Mapel <?php echo form_error('nama_mapel') ?></label>
            <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="Nama Mapel" value="<?php echo $nama_mapel; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Guru <?php echo form_error('nama_guru') ?></label>
            <input type="text" class="form-control" name="nama_guru" id="nama_guru" placeholder="Nama Guru" value="<?php echo $nama_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nuptk <?php echo form_error('nuptk') ?></label>
            <input type="text" class="form-control" name="nuptk" id="nuptk" placeholder="Nuptk" value="<?php echo $nuptk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin Guru <?php echo form_error('jenis_kelamin_guru') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin_guru" id="jenis_kelamin_guru" placeholder="Jenis Kelamin Guru" value="<?php echo $jenis_kelamin_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir Guru <?php echo form_error('tempat_lahir_guru') ?></label>
            <input type="text" class="form-control" name="tempat_lahir_guru" id="tempat_lahir_guru" placeholder="Tempat Lahir Guru" value="<?php echo $tempat_lahir_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir Guru <?php echo form_error('tanggal_lahir_guru') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir_guru" id="tanggal_lahir_guru" placeholder="Tanggal Lahir Guru" value="<?php echo $tanggal_lahir_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Guru <?php echo form_error('alamat_guru') ?></label>
            <input type="text" class="form-control" name="alamat_guru" id="alamat_guru" placeholder="Alamat Guru" value="<?php echo $alamat_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Agama Guru <?php echo form_error('agama_guru') ?></label>
            <input type="text" class="form-control" name="agama_guru" id="agama_guru" placeholder="Agama Guru" value="<?php echo $agama_guru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kepegawaian <?php echo form_error('jenis_kepegawaian') ?></label>
            <input type="text" class="form-control" name="jenis_kepegawaian" id="jenis_kepegawaian" placeholder="Jenis Kepegawaian" value="<?php echo $jenis_kepegawaian; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Kelas Tahun Ajaran <?php echo form_error('id_kelas_tahun_ajaran') ?></label>
            <input type="text" class="form-control" name="id_kelas_tahun_ajaran" id="id_kelas_tahun_ajaran" placeholder="Id Kelas Tahun Ajaran" value="<?php echo $id_kelas_tahun_ajaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Siswa <?php echo form_error('id_siswa') ?></label>
            <input type="text" class="form-control" name="id_siswa" id="id_siswa" placeholder="Id Siswa" value="<?php echo $id_siswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nis <?php echo form_error('nis') ?></label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Nis" value="<?php echo $nis; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Siswa <?php echo form_error('nama_siswa') ?></label>
            <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $nama_siswa; ?>" />
        </div>
	    <div class="form-group">
            <label for="year">Tahun Masuk <?php echo form_error('tahun_masuk') ?></label>
            <input type="text" class="form-control" name="tahun_masuk" id="tahun_masuk" placeholder="Tahun Masuk" value="<?php echo $tahun_masuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Agama <?php echo form_error('agama') ?></label>
            <input type="text" class="form-control" name="agama" id="agama" placeholder="Agama" value="<?php echo $agama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Ortu <?php echo form_error('alamat_ortu') ?></label>
            <input type="text" class="form-control" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Ortu" value="<?php echo $alamat_ortu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp Ortu <?php echo form_error('telp_ortu') ?></label>
            <input type="text" class="form-control" name="telp_ortu" id="telp_ortu" placeholder="Telp Ortu" value="<?php echo $telp_ortu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pekerjaan Ayah <?php echo form_error('pekerjaan_ayah') ?></label>
            <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="<?php echo $pekerjaan_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pekerjaan Ibu <?php echo form_error('pekerjaan_ibu') ?></label>
            <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="<?php echo $pekerjaan_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Wali <?php echo form_error('nama_wali') ?></label>
            <input type="text" class="form-control" name="nama_wali" id="nama_wali" placeholder="Nama Wali" value="<?php echo $nama_wali; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Wali <?php echo form_error('alamat_wali') ?></label>
            <input type="text" class="form-control" name="alamat_wali" id="alamat_wali" placeholder="Alamat Wali" value="<?php echo $alamat_wali; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Telp Wali <?php echo form_error('telp_wali') ?></label>
            <input type="text" class="form-control" name="telp_wali" id="telp_wali" placeholder="Telp Wali" value="<?php echo $telp_wali; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pekerjaan Wali <?php echo form_error('pekerjaan_wali') ?></label>
            <input type="text" class="form-control" name="pekerjaan_wali" id="pekerjaan_wali" placeholder="Pekerjaan Wali" value="<?php echo $pekerjaan_wali; ?>" />
        </div>
	    <div class="form-group">
            <label for="bigint">Id Kelas <?php echo form_error('id_kelas') ?></label>
            <input type="text" class="form-control" name="id_kelas" id="id_kelas" placeholder="Id Kelas" value="<?php echo $id_kelas; ?>" />
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
            <label for="bigint">Id Tahun <?php echo form_error('id_tahun') ?></label>
            <input type="text" class="form-control" name="id_tahun" id="id_tahun" placeholder="Id Tahun" value="<?php echo $id_tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Semester <?php echo form_error('semester') ?></label>
            <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" value="<?php echo $semester; ?>" />
        </div>
	    <div class="form-group">
            <label for="year">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $id_nilai; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/v_nilai') ?>" class="btn btn-default">Cancel</a>
	</form>