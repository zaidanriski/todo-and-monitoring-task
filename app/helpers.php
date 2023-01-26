<?php
if (! function_exists('tgl_indo')) {
    function tgl_indo($tanggal,$day = false) {
        $pisah = explode('-', $tanggal);
        $namaBulan = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		$daftar_hari = array(
			 'Sunday' => 'Minggu',
			 'Monday' => 'Senin',
			 'Tuesday' => 'Selasa',
			 'Wednesday' => 'Rabu',
			 'Thursday' => 'Kamis',
			 'Friday' => 'Jumat',
			 'Saturday' => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));
        if (isset($pisah[0]) && isset($pisah[1]) && isset($pisah[2])) {
        	$tgl = $pisah[2];
        	$bulan = number_format($pisah[1]);
        	$tahun = $pisah[0];
        	if ($day) {
        		$output = $daftar_hari[$namahari].','.$tgl.' '.$namaBulan[$bulan].' '.$tahun;
        	}else{
        		$output = $tgl.' '.$namaBulan[$bulan].' '.$tahun;
        	}

        	return $output;
        }else{
        	return '-';
        }
    }
}
if (! function_exists('tgl_format')) {
    function tgl_format($tanggal) {
        $pisah = explode('-', $tanggal);
        if (isset($pisah[0]) && isset($pisah[1]) && isset($pisah[2])) {
            $tgl = $pisah[2];
            $bulan = number_format($pisah[1]);
            $tahun = $pisah[0];

            return $tgl.'-'.$bulan.'-'.$tahun;
        }else{
            return '-';
        }
    }
}

if (! function_exists('tgl_format_db')) {
    function tgl_format_db($tanggal) {
        $pisah = explode('-', $tanggal);
        if (isset($pisah[0]) && isset($pisah[1]) && isset($pisah[2])) {
            $tgl = $pisah[0];
            $bulan = number_format($pisah[1]);
            $tahun = $pisah[2];

            return $tahun.'-'.$bulan.'-'.$tgl;
        }else{
            return '-';
        }
    }
}

if (! function_exists('tgl_indo_timestamp')) {
    function tgl_indo_timestamp($tanggal,$day = false) {
        $pisah_spasi = explode(' ', $tanggal);
        $pisah = explode('-', $pisah_spasi[0]);
        $namaBulan = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		$daftar_hari = array(
			 'Sunday' => 'Minggu',
			 'Monday' => 'Senin',
			 'Tuesday' => 'Selasa',
			 'Wednesday' => 'Rabu',
			 'Thursday' => 'Kamis',
			 'Friday' => 'Jumat',
			 'Saturday' => 'Sabtu'
		);
		$namahari = date('l', strtotime($tanggal));
        if (isset($pisah[0]) && isset($pisah[1]) && isset($pisah[2])) {
        	$tgl = $pisah[2];
        	$bulan = number_format($pisah[1]);
        	$tahun = $pisah[0];
        	if ($day) {
        		$output = $daftar_hari[$namahari].','.$tgl.' '.$namaBulan[$bulan].' '.$tahun;
        	}else{
        		$output = $tgl.' '.$namaBulan[$bulan].' '.$tahun;
        	}

        	return $output.' '.$pisah_spasi[1];
        }else{
        	return '-';
        }
    }
}