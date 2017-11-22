<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/icon1.png') ?>">

    <title>SI Akademik SMPN 11 Kupang</title>

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/sb-admin.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                  <img style="margin-top: -5px; width:30px; height:30px;" alt="Brand" src="<?php echo base_url('assets/icon1.png') ?>">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('admin/halaman_utama') ?>">SI Akademik SMPN 11 Kupang <span style="font-size: 10px;">Versi Admin</span></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo base_url('admin/halaman_utama') ?>"><i class="fa fa-fw fa-table"></i> Halaman Utama</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-table"></i> Tahun Ajaran <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?php echo base_url('admin/t_tahun') ?>">Data Tahun</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/t_tahun_semester') ?>">Data Semester Per Tahun</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/t_guru') ?>"><i class="fa fa-fw fa-table"></i> Data Guru</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#kelas"><i class="fa fa-fw fa-table"></i> Kelas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="kelas" class="collapse">
                            <li>
                                <a href="<?php echo base_url('admin/t_kelas') ?>">Data Kelas</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/v_kelas_tahun_ajaran') ?>">Data Kelas Per Tahun Ajaran</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#mapel"><i class="fa fa-fw fa-table"></i> Mapel <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="mapel" class="collapse">
                            <li>
                                <a href="<?php echo base_url('admin/t_mapel') ?>">Data Mapel</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/v_mapel_detail') ?>">Data Mapel Per Tahun Ajaran</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#siswa"><i class="fa fa-fw fa-table"></i> Siswa <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="siswa" class="collapse">
                            <li>
                                <a href="<?php echo base_url('admin/t_siswa') ?>">Data Siswa</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/v_siswa_kelas') ?>">Data Siswa Per Kelas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/v_jadwal_mapel') ?>"><i class="fa fa-fw fa-table"></i> Jadwal Mapel</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#penilaian"><i class="fa fa-fw fa-table"></i> Penilaian <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="penilaian" class="collapse">
                            <li>
                                <a href="<?php echo base_url('admin/v_absensi') ?>">Absensi</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/v_nilai') ?>">Nilai</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">