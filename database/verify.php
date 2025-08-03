<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

echo "=== Verifikasi Struktur Database ===\n";

// 1. Verifikasi tabel users
$userColumns = Schema::getColumnListing('users');
echo "Kolom tabel users: " . implode(', ', $userColumns) . "\n";

// 2. Verifikasi foreign keys
echo "\n=== Foreign Keys ===\n";
$foreignKeys = DB::select("
    SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, 
    REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME
    FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
    WHERE TABLE_SCHEMA = 'sotnbus'
    AND REFERENCED_TABLE_NAME IS NOT NULL
");

foreach ($foreignKeys as $fk) {
    echo sprintf(
        "Tabel: %s, Kolom: %s → %s.%s\n",
        $fk->TABLE_NAME,
        $fk->COLUMN_NAME,
        $fk->REFERENCED_TABLE_NAME,
        $fk->REFERENCED_COLUMN_NAME
    );
}

// 3. Verifikasi data contoh
echo "\n=== Data Contoh ===\n";
try {
    $userCount = DB::table('users')->count();
    echo "Jumlah user: $userCount\n";
    
    $busRouteCount = DB::table('bus_routes')->count();
    echo "Jumlah rute bus: $busRouteCount\n";
} catch (Exception $e) {
    echo "Error membaca data: " . $e->getMessage() . "\n";
}

echo "\nVerifikasi selesai.\n";