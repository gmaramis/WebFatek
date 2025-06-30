<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Index untuk mitra_kerjasamas
        if (Schema::hasTable('mitra_kerjasamas')) {
            Schema::table('mitra_kerjasamas', function (Blueprint $table) {
                if (!$this->indexExists('mitra_kerjasamas', 'idx_mitra_active_status')) {
                    $table->index(['is_active', 'status'], 'idx_mitra_active_status');
                }
                if (!$this->indexExists('mitra_kerjasamas', 'idx_mitra_kategori_active')) {
                    $table->index(['kategori', 'is_active'], 'idx_mitra_kategori_active');
                }
                if (!$this->indexExists('mitra_kerjasamas', 'idx_mitra_jurusan_active')) {
                    $table->index(['jurusan', 'is_active'], 'idx_mitra_jurusan_active');
                }
                if (!$this->indexExists('mitra_kerjasamas', 'idx_mitra_urutan_active')) {
                    $table->index(['urutan', 'is_active'], 'idx_mitra_urutan_active');
                }
            });
        }

        // Index untuk alumnis
        if (Schema::hasTable('alumnis')) {
            Schema::table('alumnis', function (Blueprint $table) {
                if (!$this->indexExists('alumnis', 'idx_alumni_active_status')) {
                    $table->index(['is_active', 'status_kerja'], 'idx_alumni_active_status');
                }
                if (!$this->indexExists('alumnis', 'idx_alumni_program_active')) {
                    $table->index(['program_studi', 'is_active'], 'idx_alumni_program_active');
                }
                if (!$this->indexExists('alumnis', 'idx_alumni_industri_active')) {
                    $table->index(['bidang_industri', 'is_active'], 'idx_alumni_industri_active');
                }
                if (!$this->indexExists('alumnis', 'idx_alumni_tahun_active')) {
                    $table->index(['tahun_lulus', 'is_active'], 'idx_alumni_tahun_active');
                }
            });
        }

        // Index untuk dosens
        if (Schema::hasTable('dosens')) {
            Schema::table('dosens', function (Blueprint $table) {
                if (!$this->indexExists('dosens', 'idx_dosen_active_jurusan')) {
                    $table->index(['is_active', 'jurusan'], 'idx_dosen_active_jurusan');
                }
                if (!$this->indexExists('dosens', 'idx_dosen_status_active')) {
                    $table->index(['status', 'is_active'], 'idx_dosen_status_active');
                }
                if (!$this->indexExists('dosens', 'idx_dosen_pendidikan_active')) {
                    $table->index(['pendidikan_terakhir', 'is_active'], 'idx_dosen_pendidikan_active');
                }
            });
        }

        // Index untuk jadwal_akademiks
        if (Schema::hasTable('jadwal_akademiks')) {
            Schema::table('jadwal_akademiks', function (Blueprint $table) {
                if (!$this->indexExists('jadwal_akademiks', 'idx_jadwal_status_urutan')) {
                    $table->index(['status', 'urutan'], 'idx_jadwal_status_urutan');
                }
                if (!$this->indexExists('jadwal_akademiks', 'idx_jadwal_jenis_status')) {
                    $table->index(['jenis_jadwal', 'status'], 'idx_jadwal_jenis_status');
                }
            });
        }

        // Index untuk ormawas
        if (Schema::hasTable('ormawas')) {
            Schema::table('ormawas', function (Blueprint $table) {
                if (!$this->indexExists('ormawas', 'idx_ormawa_active_urutan')) {
                    $table->index(['is_active', 'urutan'], 'idx_ormawa_active_urutan');
                }
                if (!$this->indexExists('ormawas', 'idx_ormawa_jenis_active')) {
                    $table->index(['jenis', 'is_active'], 'idx_ormawa_jenis_active');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop indexes untuk mitra_kerjasamas
        if (Schema::hasTable('mitra_kerjasamas')) {
            Schema::table('mitra_kerjasamas', function (Blueprint $table) {
                $table->dropIndexIfExists('idx_mitra_active_status');
                $table->dropIndexIfExists('idx_mitra_kategori_active');
                $table->dropIndexIfExists('idx_mitra_jurusan_active');
                $table->dropIndexIfExists('idx_mitra_urutan_active');
            });
        }

        // Drop indexes untuk alumnis
        if (Schema::hasTable('alumnis')) {
            Schema::table('alumnis', function (Blueprint $table) {
                $table->dropIndexIfExists('idx_alumni_active_status');
                $table->dropIndexIfExists('idx_alumni_program_active');
                $table->dropIndexIfExists('idx_alumni_industri_active');
                $table->dropIndexIfExists('idx_alumni_tahun_active');
            });
        }

        // Drop indexes untuk dosens
        if (Schema::hasTable('dosens')) {
            Schema::table('dosens', function (Blueprint $table) {
                $table->dropIndexIfExists('idx_dosen_active_jurusan');
                $table->dropIndexIfExists('idx_dosen_status_active');
                $table->dropIndexIfExists('idx_dosen_pendidikan_active');
            });
        }

        // Drop indexes untuk jadwal_akademiks
        if (Schema::hasTable('jadwal_akademiks')) {
            Schema::table('jadwal_akademiks', function (Blueprint $table) {
                $table->dropIndexIfExists('idx_jadwal_status_urutan');
                $table->dropIndexIfExists('idx_jadwal_jenis_status');
            });
        }

        // Drop indexes untuk ormawas
        if (Schema::hasTable('ormawas')) {
            Schema::table('ormawas', function (Blueprint $table) {
                $table->dropIndexIfExists('idx_ormawa_active_urutan');
                $table->dropIndexIfExists('idx_ormawa_jenis_active');
            });
        }
    }

    /**
     * Check if index exists
     */
    private function indexExists($table, $index): bool
    {
        try {
            $indexes = DB::select("SHOW INDEX FROM {$table} WHERE Key_name = '{$index}'");
            return count($indexes) > 0;
        } catch (\Exception $e) {
            return false;
        }
    }
};
