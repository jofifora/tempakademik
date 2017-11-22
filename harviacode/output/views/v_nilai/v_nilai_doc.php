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
        <h2>V_nilai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Nilai</th>
		<th>Id Mapel Detail</th>
		<th>Id Siswa Kelas</th>
		<th>Id Tahun Semester</th>
		<th>Tugas</th>
		<th>Uts</th>
		<th>Uas</th>
		<th>Sikap</th>
		<th>Id Mapel</th>
		<th>Id Guru</th>
		<th>Nama Mapel</th>
		<th>Nip</th>
		<th>Nama Guru</th>
		<th>Nuptk</th>
		<th>Jenis Kelamin Guru</th>
		<th>Tempat Lahir Guru</th>
		<th>Tanggal Lahir Guru</th>
		<th>Alamat Guru</th>
		<th>Agama Guru</th>
		<th>Status</th>
		<th>Jenis Kepegawaian</th>
		<th>Id Kelas Tahun Ajaran</th>
		<th>Id Siswa</th>
		<th>Nis</th>
		<th>Nama Siswa</th>
		<th>Tahun Masuk</th>
		<th>Jenis Kelamin</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Agama</th>
		<th>Alamat</th>
		<th>Nama Ayah</th>
		<th>Nama Ibu</th>
		<th>Alamat Ortu</th>
		<th>Telp Ortu</th>
		<th>Pekerjaan Ayah</th>
		<th>Pekerjaan Ibu</th>
		<th>Nama Wali</th>
		<th>Alamat Wali</th>
		<th>Telp Wali</th>
		<th>Pekerjaan Wali</th>
		<th>Id Kelas</th>
		<th>Nama Wali Kelas</th>
		<th>Nama Kelas</th>
		<th>Id Tahun</th>
		<th>Semester</th>
		<th>Tahun</th>
		
            </tr><?php
            foreach ($v_nilai_data as $v_nilai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $v_nilai->id_nilai ?></td>
		      <td><?php echo $v_nilai->id_mapel_detail ?></td>
		      <td><?php echo $v_nilai->id_siswa_kelas ?></td>
		      <td><?php echo $v_nilai->id_tahun_semester ?></td>
		      <td><?php echo $v_nilai->tugas ?></td>
		      <td><?php echo $v_nilai->uts ?></td>
		      <td><?php echo $v_nilai->uas ?></td>
		      <td><?php echo $v_nilai->sikap ?></td>
		      <td><?php echo $v_nilai->id_mapel ?></td>
		      <td><?php echo $v_nilai->id_guru ?></td>
		      <td><?php echo $v_nilai->nama_mapel ?></td>
		      <td><?php echo $v_nilai->nip ?></td>
		      <td><?php echo $v_nilai->nama_guru ?></td>
		      <td><?php echo $v_nilai->nuptk ?></td>
		      <td><?php echo $v_nilai->jenis_kelamin_guru ?></td>
		      <td><?php echo $v_nilai->tempat_lahir_guru ?></td>
		      <td><?php echo $v_nilai->tanggal_lahir_guru ?></td>
		      <td><?php echo $v_nilai->alamat_guru ?></td>
		      <td><?php echo $v_nilai->agama_guru ?></td>
		      <td><?php echo $v_nilai->status ?></td>
		      <td><?php echo $v_nilai->jenis_kepegawaian ?></td>
		      <td><?php echo $v_nilai->id_kelas_tahun_ajaran ?></td>
		      <td><?php echo $v_nilai->id_siswa ?></td>
		      <td><?php echo $v_nilai->nis ?></td>
		      <td><?php echo $v_nilai->nama_siswa ?></td>
		      <td><?php echo $v_nilai->tahun_masuk ?></td>
		      <td><?php echo $v_nilai->jenis_kelamin ?></td>
		      <td><?php echo $v_nilai->tempat_lahir ?></td>
		      <td><?php echo $v_nilai->tanggal_lahir ?></td>
		      <td><?php echo $v_nilai->agama ?></td>
		      <td><?php echo $v_nilai->alamat ?></td>
		      <td><?php echo $v_nilai->nama_ayah ?></td>
		      <td><?php echo $v_nilai->nama_ibu ?></td>
		      <td><?php echo $v_nilai->alamat_ortu ?></td>
		      <td><?php echo $v_nilai->telp_ortu ?></td>
		      <td><?php echo $v_nilai->pekerjaan_ayah ?></td>
		      <td><?php echo $v_nilai->pekerjaan_ibu ?></td>
		      <td><?php echo $v_nilai->nama_wali ?></td>
		      <td><?php echo $v_nilai->alamat_wali ?></td>
		      <td><?php echo $v_nilai->telp_wali ?></td>
		      <td><?php echo $v_nilai->pekerjaan_wali ?></td>
		      <td><?php echo $v_nilai->id_kelas ?></td>
		      <td><?php echo $v_nilai->nama_wali_kelas ?></td>
		      <td><?php echo $v_nilai->nama_kelas ?></td>
		      <td><?php echo $v_nilai->id_tahun ?></td>
		      <td><?php echo $v_nilai->semester ?></td>
		      <td><?php echo $v_nilai->tahun ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>