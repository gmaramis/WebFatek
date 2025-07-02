#!/bin/bash

# Script Backup Sebelum Upload Struktur Pimpinan
# Pastikan file ini executable: chmod +x backup_before_upload.sh

echo "🚨 BACKUP SEBELUM UPLOAD STRUKTUR PIMPINAN"
echo "=========================================="

# Buat timestamp
TIMESTAMP=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="backup_$TIMESTAMP"

echo "📅 Timestamp: $TIMESTAMP"
echo "📁 Backup Directory: $BACKUP_DIR"

# Buat direktori backup
mkdir -p "$BACKUP_DIR"

echo ""
echo "📋 BACKUP DATABASE..."
# Backup database (ganti dengan kredensial yang sesuai)
# mysqldump -u username -p database_name > "$BACKUP_DIR/database_backup.sql"
echo "⚠️  Silakan jalankan backup database manual:"
echo "   mysqldump -u username -p database_name > $BACKUP_DIR/database_backup.sql"

echo ""
echo "📁 BACKUP FILE WEBSITE..."

# Backup file yang akan diupdate
cp -r app/Http/Controllers "$BACKUP_DIR/" 2>/dev/null || echo "⚠️  Controllers tidak ditemukan"
cp -r database/seeders "$BACKUP_DIR/" 2>/dev/null || echo "⚠️  Seeders tidak ditemukan"
cp routes/web.php "$BACKUP_DIR/" 2>/dev/null || echo "⚠️  web.php tidak ditemukan"
cp -r resources/views/pages "$BACKUP_DIR/" 2>/dev/null || echo "⚠️  Views tidak ditemukan"

echo ""
echo "✅ BACKUP SELESAI!"
echo "📁 Backup tersimpan di: $BACKUP_DIR"
echo ""
echo "🔧 LANGKAH SELANJUTNYA:"
echo "1. Upload file baru ke server"
echo "2. Jalankan: php artisan migrate"
echo "3. Jalankan: php artisan db:seed --class=StrukturPimpinanSeeder"
echo "4. Clear cache: php artisan cache:clear"
echo "5. Test website"
echo ""
echo "📖 Lihat panduan lengkap di: PANDUAN_UPLOAD_STRUKTUR_PIMPINAN.md" 