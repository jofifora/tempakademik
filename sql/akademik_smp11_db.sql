-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 11:04 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik_smp11_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_absensi`
--

CREATE TABLE `t_absensi` (
  `id_absensi` bigint(20) UNSIGNED NOT NULL,
  `id_siswa_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_tahun_semester` bigint(20) UNSIGNED NOT NULL,
  `sakit` int(11) DEFAULT NULL,
  `ijin` int(11) DEFAULT NULL,
  `alpa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE `t_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `password` varchar(15) DEFAULT NULL,
  `nuptk` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT 'Laki-laki',
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT '2017-11-19',
  `alamat` varchar(50) DEFAULT NULL,
  `agama` enum('Kristen Protestan','Kristen Katolik','Islam','Hindu','Budha') DEFAULT 'Kristen Protestan',
  `status` varchar(50) DEFAULT NULL,
  `jenis_kepegawaian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal_mapel`
--

CREATE TABLE `t_jadwal_mapel` (
  `id_jadwal_mapel` bigint(20) UNSIGNED NOT NULL,
  `id_mapel_detail` bigint(20) UNSIGNED NOT NULL,
  `id_kelas_tahun_ajaran` bigint(20) UNSIGNED NOT NULL,
  `hari_ke` enum('2','3','4','5','6','7') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas_tahun_ajaran`
--

CREATE TABLE `t_kelas_tahun_ajaran` (
  `id_kelas_tahun_ajaran` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_tahun` bigint(20) UNSIGNED NOT NULL,
  `nama_wali_kelas` varchar(30) DEFAULT NULL,
  `pass` varchar(25) DEFAULT NULL,
  `token` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_mapel`
--

CREATE TABLE `t_mapel` (
  `id_mapel` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_mapel_detail`
--

CREATE TABLE `t_mapel_detail` (
  `id_mapel_detail` bigint(20) UNSIGNED NOT NULL,
  `id_mapel` bigint(20) UNSIGNED NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_tahun` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai`
--

CREATE TABLE `t_nilai` (
  `id_nilai` bigint(20) UNSIGNED NOT NULL,
  `id_mapel_detail` bigint(20) UNSIGNED NOT NULL,
  `id_siswa_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_tahun_semester` bigint(20) UNSIGNED NOT NULL,
  `tugas` int(11) DEFAULT NULL,
  `uts` int(11) DEFAULT NULL,
  `uas` int(11) DEFAULT NULL,
  `sikap` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `tahun_masuk` year(4) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT 'Laki-laki',
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT '2017-11-19',
  `agama` enum('Kristen Protestan','Kristen Katolik','Islam','Hindu','Budha') DEFAULT 'Kristen Protestan',
  `alamat` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `alamat_ortu` varchar(50) DEFAULT NULL,
  `telp_ortu` varchar(50) DEFAULT NULL,
  `pekerjaan_ayah` varchar(50) DEFAULT NULL,
  `pekerjaan_ibu` varchar(50) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `alamat_wali` varchar(50) DEFAULT NULL,
  `telp_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa_kelas`
--

CREATE TABLE `t_siswa_kelas` (
  `id_siswa_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas_tahun_ajaran` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_tahun`
--

CREATE TABLE `t_tahun` (
  `id_tahun` bigint(20) UNSIGNED NOT NULL,
  `tahun` year(4) NOT NULL DEFAULT '2017'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_tahun_semester`
--

CREATE TABLE `t_tahun_semester` (
  `id_tahun_semester` bigint(20) UNSIGNED NOT NULL,
  `id_tahun` bigint(20) UNSIGNED NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_absensi`
-- (See below for the actual view)
--
CREATE TABLE `v_absensi` (
`id_absensi` bigint(20) unsigned
,`id_siswa_kelas` bigint(20) unsigned
,`id_tahun_semester` bigint(20) unsigned
,`sakit` int(11)
,`ijin` int(11)
,`alpa` int(11)
,`id_kelas_tahun_ajaran` bigint(20) unsigned
,`id_siswa` int(11)
,`nis` varchar(30)
,`nama_siswa` varchar(30)
,`tahun_masuk` year(4)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tempat_lahir` varchar(50)
,`tanggal_lahir` date
,`agama` enum('Kristen Protestan','Kristen Katolik','Islam','Hindu','Budha')
,`alamat` varchar(50)
,`nama_ayah` varchar(50)
,`nama_ibu` varchar(50)
,`alamat_ortu` varchar(50)
,`telp_ortu` varchar(50)
,`pekerjaan_ayah` varchar(50)
,`pekerjaan_ibu` varchar(50)
,`nama_wali` varchar(50)
,`alamat_wali` varchar(50)
,`telp_wali` varchar(50)
,`pekerjaan_wali` varchar(50)
,`id_kelas` bigint(20) unsigned
,`nama_wali_kelas` varchar(30)
,`nama_kelas` varchar(20)
,`id_tahun` bigint(20) unsigned
,`semester` enum('Ganjil','Genap')
,`tahun` year(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_jadwal_mapel`
-- (See below for the actual view)
--
CREATE TABLE `v_jadwal_mapel` (
`id_jadwal_mapel` bigint(20) unsigned
,`id_mapel_detail` bigint(20) unsigned
,`id_kelas_tahun_ajaran` bigint(20) unsigned
,`hari_ke` enum('2','3','4','5','6','7')
,`jam_mulai` time
,`jam_selesai` time
,`id_mapel` bigint(20) unsigned
,`id_guru` int(11)
,`id_tahun` bigint(20) unsigned
,`nama_mapel` varchar(30)
,`nip` varchar(30)
,`nama_guru` varchar(30)
,`nuptk` varchar(50)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tempat_lahir` varchar(50)
,`tanggal_lahir` date
,`alamat` varchar(50)
,`agama` enum('Kristen Protestan','Kristen Katolik','Islam','Hindu','Budha')
,`status` varchar(50)
,`jenis_kepegawaian` varchar(50)
,`tahun` year(4)
,`id_kelas` bigint(20) unsigned
,`nama_wali_kelas` varchar(30)
,`nama_kelas` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_kelas_tahun_ajaran`
-- (See below for the actual view)
--
CREATE TABLE `v_kelas_tahun_ajaran` (
`id_kelas_tahun_ajaran` bigint(20) unsigned
,`id_kelas` bigint(20) unsigned
,`id_tahun` bigint(20) unsigned
,`nama_wali_kelas` varchar(30)
,`nama_kelas` varchar(20)
,`tahun` year(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mapel_detail`
-- (See below for the actual view)
--
CREATE TABLE `v_mapel_detail` (
`id_mapel_detail` bigint(20) unsigned
,`id_mapel` bigint(20) unsigned
,`id_guru` int(11)
,`id_tahun` bigint(20) unsigned
,`nama_mapel` varchar(30)
,`nip` varchar(30)
,`nama_guru` varchar(30)
,`nuptk` varchar(50)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tempat_lahir` varchar(50)
,`tanggal_lahir` date
,`alamat` varchar(50)
,`agama` enum('Kristen Protestan','Kristen Katolik','Islam','Hindu','Budha')
,`status` varchar(50)
,`jenis_kepegawaian` varchar(50)
,`tahun` year(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_nilai`
-- (See below for the actual view)
--
CREATE TABLE `v_nilai` (
`id_nilai` bigint(20) unsigned
,`id_mapel_detail` bigint(20) unsigned
,`id_siswa_kelas` bigint(20) unsigned
,`id_tahun_semester` bigint(20) unsigned
,`tugas` int(11)
,`uts` int(11)
,`uas` int(11)
,`sikap` int(11)
,`id_mapel` bigint(20) unsigned
,`id_guru` int(11)
,`nama_mapel` varchar(30)
,`nip` varchar(30)
,`nama_guru` varchar(30)
,`nuptk` varchar(50)
,`jenis_kelamin_guru` enum('Laki-laki','Perempuan')
,`tempat_lahir_guru` varchar(50)
,`tanggal_lahir_guru` date
,`alamat_guru` varchar(50)
,`agama_guru` enum('Kristen Protestan','Kristen Katolik','Islam','Hindu','Budha')
,`status` varchar(50)
,`jenis_kepegawaian` varchar(50)
,`id_kelas_tahun_ajaran` bigint(20) unsigned
,`id_siswa` int(11)
,`nis` varchar(30)
,`nama_siswa` varchar(30)
,`tahun_masuk` year(4)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tempat_lahir` varchar(50)
,`tanggal_lahir` date
,`agama` enum('Kristen Protestan','Kristen Katolik','Islam','Hindu','Budha')
,`alamat` varchar(50)
,`nama_ayah` varchar(50)
,`nama_ibu` varchar(50)
,`alamat_ortu` varchar(50)
,`telp_ortu` varchar(50)
,`pekerjaan_ayah` varchar(50)
,`pekerjaan_ibu` varchar(50)
,`nama_wali` varchar(50)
,`alamat_wali` varchar(50)
,`telp_wali` varchar(50)
,`pekerjaan_wali` varchar(50)
,`id_kelas` bigint(20) unsigned
,`nama_wali_kelas` varchar(30)
,`nama_kelas` varchar(20)
,`id_tahun` bigint(20) unsigned
,`semester` enum('Ganjil','Genap')
,`tahun` year(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_siswa_kelas`
-- (See below for the actual view)
--
CREATE TABLE `v_siswa_kelas` (
`id_siswa_kelas` bigint(20) unsigned
,`id_kelas_tahun_ajaran` bigint(20) unsigned
,`id_siswa` int(11)
,`nis` varchar(30)
,`nama_siswa` varchar(30)
,`tahun_masuk` year(4)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`tempat_lahir` varchar(50)
,`tanggal_lahir` date
,`agama` enum('Kristen Protestan','Kristen Katolik','Islam','Hindu','Budha')
,`alamat` varchar(50)
,`nama_ayah` varchar(50)
,`nama_ibu` varchar(50)
,`alamat_ortu` varchar(50)
,`telp_ortu` varchar(50)
,`pekerjaan_ayah` varchar(50)
,`pekerjaan_ibu` varchar(50)
,`nama_wali` varchar(50)
,`alamat_wali` varchar(50)
,`telp_wali` varchar(50)
,`pekerjaan_wali` varchar(50)
,`id_kelas` bigint(20) unsigned
,`id_tahun` bigint(20) unsigned
,`nama_wali_kelas` varchar(30)
,`nama_kelas` varchar(20)
,`tahun` year(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_tahun_semester`
-- (See below for the actual view)
--
CREATE TABLE `v_tahun_semester` (
`id_tahun_semester` bigint(20) unsigned
,`id_tahun` bigint(20) unsigned
,`semester` enum('Ganjil','Genap')
,`tahun` year(4)
);

-- --------------------------------------------------------

--
-- Structure for view `v_absensi`
--
DROP TABLE IF EXISTS `v_absensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_absensi`  AS  select `t_absensi`.`id_absensi` AS `id_absensi`,`t_absensi`.`id_siswa_kelas` AS `id_siswa_kelas`,`t_absensi`.`id_tahun_semester` AS `id_tahun_semester`,`t_absensi`.`sakit` AS `sakit`,`t_absensi`.`ijin` AS `ijin`,`t_absensi`.`alpa` AS `alpa`,`t_siswa_kelas`.`id_kelas_tahun_ajaran` AS `id_kelas_tahun_ajaran`,`t_siswa`.`id_siswa` AS `id_siswa`,`t_siswa`.`nis` AS `nis`,`t_siswa`.`nama_siswa` AS `nama_siswa`,`t_siswa`.`tahun_masuk` AS `tahun_masuk`,`t_siswa`.`jenis_kelamin` AS `jenis_kelamin`,`t_siswa`.`tempat_lahir` AS `tempat_lahir`,`t_siswa`.`tanggal_lahir` AS `tanggal_lahir`,`t_siswa`.`agama` AS `agama`,`t_siswa`.`alamat` AS `alamat`,`t_siswa`.`nama_ayah` AS `nama_ayah`,`t_siswa`.`nama_ibu` AS `nama_ibu`,`t_siswa`.`alamat_ortu` AS `alamat_ortu`,`t_siswa`.`telp_ortu` AS `telp_ortu`,`t_siswa`.`pekerjaan_ayah` AS `pekerjaan_ayah`,`t_siswa`.`pekerjaan_ibu` AS `pekerjaan_ibu`,`t_siswa`.`nama_wali` AS `nama_wali`,`t_siswa`.`alamat_wali` AS `alamat_wali`,`t_siswa`.`telp_wali` AS `telp_wali`,`t_siswa`.`pekerjaan_wali` AS `pekerjaan_wali`,`t_kelas_tahun_ajaran`.`id_kelas` AS `id_kelas`,`t_kelas_tahun_ajaran`.`nama_wali_kelas` AS `nama_wali_kelas`,`t_kelas`.`nama_kelas` AS `nama_kelas`,`t_tahun_semester`.`id_tahun` AS `id_tahun`,`t_tahun_semester`.`semester` AS `semester`,`t_tahun`.`tahun` AS `tahun` from ((((((`t_absensi` join `t_siswa_kelas` on((`t_absensi`.`id_siswa_kelas` = `t_siswa_kelas`.`id_siswa_kelas`))) join `t_tahun_semester` on((`t_absensi`.`id_tahun_semester` = `t_tahun_semester`.`id_tahun_semester`))) join `t_siswa` on((`t_siswa_kelas`.`id_siswa` = `t_siswa`.`id_siswa`))) join `t_kelas_tahun_ajaran` on((`t_siswa_kelas`.`id_kelas_tahun_ajaran` = `t_kelas_tahun_ajaran`.`id_kelas_tahun_ajaran`))) join `t_kelas` on((`t_kelas_tahun_ajaran`.`id_kelas` = `t_kelas`.`id_kelas`))) join `t_tahun` on((`t_tahun_semester`.`id_tahun` = `t_tahun`.`id_tahun`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_jadwal_mapel`
--
DROP TABLE IF EXISTS `v_jadwal_mapel`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_jadwal_mapel`  AS  select `t_jadwal_mapel`.`id_jadwal_mapel` AS `id_jadwal_mapel`,`t_jadwal_mapel`.`id_mapel_detail` AS `id_mapel_detail`,`t_jadwal_mapel`.`id_kelas_tahun_ajaran` AS `id_kelas_tahun_ajaran`,`t_jadwal_mapel`.`hari_ke` AS `hari_ke`,`t_jadwal_mapel`.`jam_mulai` AS `jam_mulai`,`t_jadwal_mapel`.`jam_selesai` AS `jam_selesai`,`t_mapel_detail`.`id_mapel` AS `id_mapel`,`t_mapel_detail`.`id_guru` AS `id_guru`,`t_mapel_detail`.`id_tahun` AS `id_tahun`,`t_mapel`.`nama_mapel` AS `nama_mapel`,`t_guru`.`nip` AS `nip`,`t_guru`.`nama_guru` AS `nama_guru`,`t_guru`.`nuptk` AS `nuptk`,`t_guru`.`jenis_kelamin` AS `jenis_kelamin`,`t_guru`.`tempat_lahir` AS `tempat_lahir`,`t_guru`.`tanggal_lahir` AS `tanggal_lahir`,`t_guru`.`alamat` AS `alamat`,`t_guru`.`agama` AS `agama`,`t_guru`.`status` AS `status`,`t_guru`.`jenis_kepegawaian` AS `jenis_kepegawaian`,`t_tahun`.`tahun` AS `tahun`,`t_kelas_tahun_ajaran`.`id_kelas` AS `id_kelas`,`t_kelas_tahun_ajaran`.`nama_wali_kelas` AS `nama_wali_kelas`,`t_kelas`.`nama_kelas` AS `nama_kelas` from ((((((`t_jadwal_mapel` join `t_mapel_detail` on((`t_jadwal_mapel`.`id_mapel_detail` = `t_mapel_detail`.`id_mapel_detail`))) join `t_mapel` on((`t_mapel_detail`.`id_mapel` = `t_mapel`.`id_mapel`))) join `t_guru` on((`t_mapel_detail`.`id_guru` = `t_guru`.`id_guru`))) join `t_tahun` on((`t_mapel_detail`.`id_tahun` = `t_tahun`.`id_tahun`))) join `t_kelas_tahun_ajaran` on((`t_jadwal_mapel`.`id_kelas_tahun_ajaran` = `t_kelas_tahun_ajaran`.`id_kelas_tahun_ajaran`))) join `t_kelas` on((`t_kelas_tahun_ajaran`.`id_kelas` = `t_kelas`.`id_kelas`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_kelas_tahun_ajaran`
--
DROP TABLE IF EXISTS `v_kelas_tahun_ajaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kelas_tahun_ajaran`  AS  select `t_kelas_tahun_ajaran`.`id_kelas_tahun_ajaran` AS `id_kelas_tahun_ajaran`,`t_kelas_tahun_ajaran`.`id_kelas` AS `id_kelas`,`t_kelas_tahun_ajaran`.`id_tahun` AS `id_tahun`,`t_kelas_tahun_ajaran`.`nama_wali_kelas` AS `nama_wali_kelas`,`t_kelas`.`nama_kelas` AS `nama_kelas`,`t_tahun`.`tahun` AS `tahun` from ((`t_kelas_tahun_ajaran` join `t_kelas` on((`t_kelas_tahun_ajaran`.`id_kelas` = `t_kelas`.`id_kelas`))) join `t_tahun` on((`t_kelas_tahun_ajaran`.`id_tahun` = `t_tahun`.`id_tahun`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_mapel_detail`
--
DROP TABLE IF EXISTS `v_mapel_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mapel_detail`  AS  select `t_mapel_detail`.`id_mapel_detail` AS `id_mapel_detail`,`t_mapel_detail`.`id_mapel` AS `id_mapel`,`t_mapel_detail`.`id_guru` AS `id_guru`,`t_mapel_detail`.`id_tahun` AS `id_tahun`,`t_mapel`.`nama_mapel` AS `nama_mapel`,`t_guru`.`nip` AS `nip`,`t_guru`.`nama_guru` AS `nama_guru`,`t_guru`.`nuptk` AS `nuptk`,`t_guru`.`jenis_kelamin` AS `jenis_kelamin`,`t_guru`.`tempat_lahir` AS `tempat_lahir`,`t_guru`.`tanggal_lahir` AS `tanggal_lahir`,`t_guru`.`alamat` AS `alamat`,`t_guru`.`agama` AS `agama`,`t_guru`.`status` AS `status`,`t_guru`.`jenis_kepegawaian` AS `jenis_kepegawaian`,`t_tahun`.`tahun` AS `tahun` from (((`t_mapel_detail` join `t_mapel` on((`t_mapel_detail`.`id_mapel` = `t_mapel`.`id_mapel`))) join `t_guru` on((`t_mapel_detail`.`id_guru` = `t_guru`.`id_guru`))) join `t_tahun` on((`t_mapel_detail`.`id_tahun` = `t_tahun`.`id_tahun`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_nilai`
--
DROP TABLE IF EXISTS `v_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_nilai`  AS  select `t_nilai`.`id_nilai` AS `id_nilai`,`t_nilai`.`id_mapel_detail` AS `id_mapel_detail`,`t_nilai`.`id_siswa_kelas` AS `id_siswa_kelas`,`t_nilai`.`id_tahun_semester` AS `id_tahun_semester`,`t_nilai`.`tugas` AS `tugas`,`t_nilai`.`uts` AS `uts`,`t_nilai`.`uas` AS `uas`,`t_nilai`.`sikap` AS `sikap`,`t_mapel_detail`.`id_mapel` AS `id_mapel`,`t_mapel_detail`.`id_guru` AS `id_guru`,`t_mapel`.`nama_mapel` AS `nama_mapel`,`t_guru`.`nip` AS `nip`,`t_guru`.`nama_guru` AS `nama_guru`,`t_guru`.`nuptk` AS `nuptk`,`t_guru`.`jenis_kelamin` AS `jenis_kelamin_guru`,`t_guru`.`tempat_lahir` AS `tempat_lahir_guru`,`t_guru`.`tanggal_lahir` AS `tanggal_lahir_guru`,`t_guru`.`alamat` AS `alamat_guru`,`t_guru`.`agama` AS `agama_guru`,`t_guru`.`status` AS `status`,`t_guru`.`jenis_kepegawaian` AS `jenis_kepegawaian`,`t_siswa_kelas`.`id_kelas_tahun_ajaran` AS `id_kelas_tahun_ajaran`,`t_siswa_kelas`.`id_siswa` AS `id_siswa`,`t_siswa`.`nis` AS `nis`,`t_siswa`.`nama_siswa` AS `nama_siswa`,`t_siswa`.`tahun_masuk` AS `tahun_masuk`,`t_siswa`.`jenis_kelamin` AS `jenis_kelamin`,`t_siswa`.`tempat_lahir` AS `tempat_lahir`,`t_siswa`.`tanggal_lahir` AS `tanggal_lahir`,`t_siswa`.`agama` AS `agama`,`t_siswa`.`alamat` AS `alamat`,`t_siswa`.`nama_ayah` AS `nama_ayah`,`t_siswa`.`nama_ibu` AS `nama_ibu`,`t_siswa`.`alamat_ortu` AS `alamat_ortu`,`t_siswa`.`telp_ortu` AS `telp_ortu`,`t_siswa`.`pekerjaan_ayah` AS `pekerjaan_ayah`,`t_siswa`.`pekerjaan_ibu` AS `pekerjaan_ibu`,`t_siswa`.`nama_wali` AS `nama_wali`,`t_siswa`.`alamat_wali` AS `alamat_wali`,`t_siswa`.`telp_wali` AS `telp_wali`,`t_siswa`.`pekerjaan_wali` AS `pekerjaan_wali`,`t_kelas_tahun_ajaran`.`id_kelas` AS `id_kelas`,`t_kelas_tahun_ajaran`.`nama_wali_kelas` AS `nama_wali_kelas`,`t_kelas`.`nama_kelas` AS `nama_kelas`,`t_tahun_semester`.`id_tahun` AS `id_tahun`,`t_tahun_semester`.`semester` AS `semester`,`t_tahun`.`tahun` AS `tahun` from (((((((((`t_nilai` join `t_mapel_detail` on((`t_nilai`.`id_mapel_detail` = `t_mapel_detail`.`id_mapel_detail`))) join `t_siswa_kelas` on((`t_nilai`.`id_siswa_kelas` = `t_siswa_kelas`.`id_siswa_kelas`))) join `t_tahun_semester` on((`t_nilai`.`id_tahun_semester` = `t_tahun_semester`.`id_tahun_semester`))) join `t_mapel` on((`t_mapel_detail`.`id_mapel` = `t_mapel`.`id_mapel`))) join `t_guru` on((`t_mapel_detail`.`id_guru` = `t_guru`.`id_guru`))) join `t_siswa` on((`t_siswa_kelas`.`id_siswa` = `t_siswa`.`id_siswa`))) join `t_kelas_tahun_ajaran` on((`t_siswa_kelas`.`id_kelas_tahun_ajaran` = `t_kelas_tahun_ajaran`.`id_kelas_tahun_ajaran`))) join `t_kelas` on((`t_kelas_tahun_ajaran`.`id_kelas` = `t_kelas`.`id_kelas`))) join `t_tahun` on((`t_tahun_semester`.`id_tahun` = `t_tahun`.`id_tahun`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_siswa_kelas`
--
DROP TABLE IF EXISTS `v_siswa_kelas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_siswa_kelas`  AS  select `t_siswa_kelas`.`id_siswa_kelas` AS `id_siswa_kelas`,`t_siswa_kelas`.`id_kelas_tahun_ajaran` AS `id_kelas_tahun_ajaran`,`t_siswa`.`id_siswa` AS `id_siswa`,`t_siswa`.`nis` AS `nis`,`t_siswa`.`nama_siswa` AS `nama_siswa`,`t_siswa`.`tahun_masuk` AS `tahun_masuk`,`t_siswa`.`jenis_kelamin` AS `jenis_kelamin`,`t_siswa`.`tempat_lahir` AS `tempat_lahir`,`t_siswa`.`tanggal_lahir` AS `tanggal_lahir`,`t_siswa`.`agama` AS `agama`,`t_siswa`.`alamat` AS `alamat`,`t_siswa`.`nama_ayah` AS `nama_ayah`,`t_siswa`.`nama_ibu` AS `nama_ibu`,`t_siswa`.`alamat_ortu` AS `alamat_ortu`,`t_siswa`.`telp_ortu` AS `telp_ortu`,`t_siswa`.`pekerjaan_ayah` AS `pekerjaan_ayah`,`t_siswa`.`pekerjaan_ibu` AS `pekerjaan_ibu`,`t_siswa`.`nama_wali` AS `nama_wali`,`t_siswa`.`alamat_wali` AS `alamat_wali`,`t_siswa`.`telp_wali` AS `telp_wali`,`t_siswa`.`pekerjaan_wali` AS `pekerjaan_wali`,`t_kelas_tahun_ajaran`.`id_kelas` AS `id_kelas`,`t_kelas_tahun_ajaran`.`id_tahun` AS `id_tahun`,`t_kelas_tahun_ajaran`.`nama_wali_kelas` AS `nama_wali_kelas`,`t_kelas`.`nama_kelas` AS `nama_kelas`,`t_tahun`.`tahun` AS `tahun` from ((((`t_siswa_kelas` join `t_siswa` on((`t_siswa_kelas`.`id_siswa` = `t_siswa`.`id_siswa`))) join `t_kelas_tahun_ajaran` on((`t_siswa_kelas`.`id_kelas_tahun_ajaran` = `t_kelas_tahun_ajaran`.`id_kelas_tahun_ajaran`))) join `t_kelas` on((`t_kelas_tahun_ajaran`.`id_kelas` = `t_kelas`.`id_kelas`))) join `t_tahun` on((`t_kelas_tahun_ajaran`.`id_tahun` = `t_tahun`.`id_tahun`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_tahun_semester`
--
DROP TABLE IF EXISTS `v_tahun_semester`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tahun_semester`  AS  select `t_tahun_semester`.`id_tahun_semester` AS `id_tahun_semester`,`t_tahun_semester`.`id_tahun` AS `id_tahun`,`t_tahun_semester`.`semester` AS `semester`,`t_tahun`.`tahun` AS `tahun` from (`t_tahun_semester` join `t_tahun` on((`t_tahun_semester`.`id_tahun` = `t_tahun`.`id_tahun`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_absensi`
--
ALTER TABLE `t_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `FK_t_absensi_t_siswa_kelas` (`id_siswa_kelas`),
  ADD KEY `FK_t_absensi_t_tahun_semester` (`id_tahun_semester`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `t_jadwal_mapel`
--
ALTER TABLE `t_jadwal_mapel`
  ADD PRIMARY KEY (`id_jadwal_mapel`),
  ADD KEY `id_detail_mapel` (`id_mapel_detail`),
  ADD KEY `id_kelas` (`id_kelas_tahun_ajaran`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `t_kelas_tahun_ajaran`
--
ALTER TABLE `t_kelas_tahun_ajaran`
  ADD PRIMARY KEY (`id_kelas_tahun_ajaran`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_tahun_ajaran` (`id_tahun`);

--
-- Indexes for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `t_mapel_detail`
--
ALTER TABLE `t_mapel_detail`
  ADD PRIMARY KEY (`id_mapel_detail`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_tahun_ajaran` (`id_tahun`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `t_nilai`
--
ALTER TABLE `t_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `FK_t_nilai_t_siswa_kelas` (`id_siswa_kelas`),
  ADD KEY `FK_t_nilai_t_tahun_semester` (`id_tahun_semester`),
  ADD KEY `FK_t_nilai_t_mapel_detail` (`id_mapel_detail`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `t_siswa_kelas`
--
ALTER TABLE `t_siswa_kelas`
  ADD PRIMARY KEY (`id_siswa_kelas`),
  ADD KEY `id_kelas` (`id_kelas_tahun_ajaran`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `t_tahun`
--
ALTER TABLE `t_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `t_tahun_semester`
--
ALTER TABLE `t_tahun_semester`
  ADD PRIMARY KEY (`id_tahun_semester`),
  ADD KEY `FK_t_tahun_semester_t_tahun` (`id_tahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_absensi`
--
ALTER TABLE `t_absensi`
  MODIFY `id_absensi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_guru`
--
ALTER TABLE `t_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_jadwal_mapel`
--
ALTER TABLE `t_jadwal_mapel`
  MODIFY `id_jadwal_mapel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_kelas`
--
ALTER TABLE `t_kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_kelas_tahun_ajaran`
--
ALTER TABLE `t_kelas_tahun_ajaran`
  MODIFY `id_kelas_tahun_ajaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_mapel`
--
ALTER TABLE `t_mapel`
  MODIFY `id_mapel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_mapel_detail`
--
ALTER TABLE `t_mapel_detail`
  MODIFY `id_mapel_detail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_siswa_kelas`
--
ALTER TABLE `t_siswa_kelas`
  MODIFY `id_siswa_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_tahun`
--
ALTER TABLE `t_tahun`
  MODIFY `id_tahun` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_tahun_semester`
--
ALTER TABLE `t_tahun_semester`
  MODIFY `id_tahun_semester` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_absensi`
--
ALTER TABLE `t_absensi`
  ADD CONSTRAINT `FK_t_absensi_t_siswa_kelas` FOREIGN KEY (`id_siswa_kelas`) REFERENCES `t_siswa_kelas` (`id_siswa_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_t_absensi_t_tahun_semester` FOREIGN KEY (`id_tahun_semester`) REFERENCES `t_tahun_semester` (`id_tahun_semester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_jadwal_mapel`
--
ALTER TABLE `t_jadwal_mapel`
  ADD CONSTRAINT `FK_t_jadwal_mapel_t_data_kelas_tahun_ajaran` FOREIGN KEY (`id_kelas_tahun_ajaran`) REFERENCES `t_kelas_tahun_ajaran` (`id_kelas_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_t_jadwal_mapel_t_data_mapel_detail` FOREIGN KEY (`id_mapel_detail`) REFERENCES `t_mapel_detail` (`id_mapel_detail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_kelas_tahun_ajaran`
--
ALTER TABLE `t_kelas_tahun_ajaran`
  ADD CONSTRAINT `FK_t_data_kelas_tahun_ajaran_t_data_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `t_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_t_data_kelas_tahun_ajaran_t_data_tahun_ajaran` FOREIGN KEY (`id_tahun`) REFERENCES `t_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_mapel_detail`
--
ALTER TABLE `t_mapel_detail`
  ADD CONSTRAINT `FK_t_data_mapel_detail_t_data_guru` FOREIGN KEY (`id_guru`) REFERENCES `t_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_t_data_mapel_detail_t_data_mapel` FOREIGN KEY (`id_mapel`) REFERENCES `t_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_t_data_mapel_detail_t_data_tahun_ajaran` FOREIGN KEY (`id_tahun`) REFERENCES `t_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_nilai`
--
ALTER TABLE `t_nilai`
  ADD CONSTRAINT `FK_t_nilai_t_mapel_detail` FOREIGN KEY (`id_mapel_detail`) REFERENCES `t_mapel_detail` (`id_mapel_detail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_t_nilai_t_siswa_kelas` FOREIGN KEY (`id_siswa_kelas`) REFERENCES `t_siswa_kelas` (`id_siswa_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_t_nilai_t_tahun_semester` FOREIGN KEY (`id_tahun_semester`) REFERENCES `t_tahun_semester` (`id_tahun_semester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_siswa_kelas`
--
ALTER TABLE `t_siswa_kelas`
  ADD CONSTRAINT `FK_t_data_siswa_kelas_t_data_kelas_tahun_ajaran` FOREIGN KEY (`id_kelas_tahun_ajaran`) REFERENCES `t_kelas_tahun_ajaran` (`id_kelas_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_t_data_siswa_kelas_t_data_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `t_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_tahun_semester`
--
ALTER TABLE `t_tahun_semester`
  ADD CONSTRAINT `FK_t_tahun_semester_t_tahun` FOREIGN KEY (`id_tahun`) REFERENCES `t_tahun` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
