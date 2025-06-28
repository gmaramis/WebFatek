<?php

require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

try {
    // Baca file Excel
    $inputFileName = 'sumber/SISTER  Daftar_dosen fatek.xlsx';
    $spreadsheet = IOFactory::load($inputFileName);
    
    // Ambil worksheet pertama
    $worksheet = $spreadsheet->getActiveSheet();
    
    // Dapatkan range data
    $highestRow = $worksheet->getHighestRow();
    $highestColumn = $worksheet->getHighestColumn();
    $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
    
    echo "=== ANALISIS FILE EXCEL DATA DOSEN ===\n";
    echo "File: $inputFileName\n";
    echo "Total baris: $highestRow\n";
    echo "Total kolom: $highestColumnIndex\n\n";
    
    // Baca header (baris pertama)
    echo "=== HEADER KOLOM ===\n";
    $headers = [];
    for ($col = 1; $col <= $highestColumnIndex; $col++) {
        $cell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col) . '1';
        $cellValue = $worksheet->getCell($cell)->getValue();
        $headers[$col] = $cellValue;
        echo "Kolom " . \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col) . ": $cellValue\n";
    }
    echo "\n";
    
    // Baca beberapa baris data untuk analisis
    echo "=== SAMPEL DATA (5 BARIS PERTAMA) ===\n";
    for ($row = 2; $row <= min(6, $highestRow); $row++) {
        echo "Baris $row:\n";
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $cell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col) . $row;
            $cellValue = $worksheet->getCell($cell)->getValue();
            $header = $headers[$col];
            echo "  $header: $cellValue\n";
        }
        echo "\n";
    }
    
    // Analisis data per jurusan
    echo "=== ANALISIS DATA PER JURUSAN ===\n";
    $jurusanColumn = null;
    foreach ($headers as $col => $header) {
        if (stripos($header, 'jurusan') !== false || stripos($header, 'prodi') !== false || stripos($header, 'program') !== false) {
            $jurusanColumn = $col;
            break;
        }
    }
    
    if ($jurusanColumn) {
        $jurusanCount = [];
        for ($row = 2; $row <= $highestRow; $row++) {
            $cell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($jurusanColumn) . $row;
            $jurusan = $worksheet->getCell($cell)->getValue();
            if ($jurusan) {
                $jurusanCount[$jurusan] = ($jurusanCount[$jurusan] ?? 0) + 1;
            }
        }
        
        echo "Distribusi dosen per jurusan:\n";
        foreach ($jurusanCount as $jurusan => $count) {
            echo "  $jurusan: $count dosen\n";
        }
    }
    
    // Analisis field yang ada
    echo "\n=== REKOMENDASI MAPPING FIELD ===\n";
    $fieldMapping = [];
    foreach ($headers as $col => $header) {
        $headerLower = strtolower($header);
        
        if (stripos($headerLower, 'nip') !== false) {
            $fieldMapping['nip'] = $header;
        } elseif (stripos($headerLower, 'nama') !== false && stripos($headerLower, 'lengkap') === false) {
            $fieldMapping['nama'] = $header;
        } elseif (stripos($headerLower, 'gelar') !== false) {
            $fieldMapping['gelar'] = $header;
        } elseif (stripos($headerLower, 'pendidikan') !== false) {
            $fieldMapping['pendidikan_terakhir'] = $header;
        } elseif (stripos($headerLower, 'status') !== false) {
            $fieldMapping['status'] = $header;
        } elseif (stripos($headerLower, 'jurusan') !== false || stripos($headerLower, 'prodi') !== false) {
            $fieldMapping['jurusan'] = $header;
        } elseif (stripos($headerLower, 'email') !== false) {
            $fieldMapping['email'] = $header;
        } elseif (stripos($headerLower, 'bidang') !== false || stripos($headerLower, 'keahlian') !== false) {
            $fieldMapping['bidang_keahlian'] = $header;
        }
    }
    
    echo "Mapping field Excel ke database:\n";
    foreach ($fieldMapping as $dbField => $excelHeader) {
        echo "  $dbField -> $excelHeader\n";
    }
    
    // Cek field yang belum ter-mapping
    echo "\nField Excel yang belum ter-mapping:\n";
    foreach ($headers as $col => $header) {
        if (!in_array($header, $fieldMapping)) {
            echo "  $header\n";
        }
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
} 