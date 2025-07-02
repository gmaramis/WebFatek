#!/bin/bash

# Script Upload Perbaikan Struktur Pimpinan ke Server
# Pastikan file ini executable: chmod +x upload_to_server.sh

echo "🚀 UPLOAD PERBAIKAN STRUKTUR PIMPINAN KE SERVER"
echo "================================================"

# Konfigurasi server (ganti sesuai kebutuhan)
SERVER_HOST="your-server.com"
SERVER_USER="your-username"
SERVER_PATH="/path/to/website"

echo "📋 KONFIGURASI SERVER:"
echo "   Host: $SERVER_HOST"
echo "   User: $SERVER_USER"
echo "   Path: $SERVER_PATH"
echo ""

# Cek apakah file yang diperlukan ada
echo "🔍 CEK FILE YANG DIPERLUKAN..."

FILES_TO_CHECK=(
    "app/Http/Controllers/StrukturPimpinanController.php"
    "database/seeders/StrukturPimpinanSeeder.php"
    "routes/web.php"
    "resources/views/pages/struktur.blade.php"
)

for file in "${FILES_TO_CHECK[@]}"; do
    if [ -f "$file" ]; then
        echo "✅ $file"
    else
        echo "❌ $file - TIDAK DITEMUKAN!"
        exit 1
    fi
done

echo ""
echo "⚠️  PERINGATAN:"
echo "   - Pastikan sudah backup database server"
echo "   - Pastikan sudah backup file website"
echo "   - Pastikan koneksi internet stabil"
echo ""

read -p "🚀 Lanjutkan upload? (y/N): " -n 1 -r
echo
if [[ ! $REPLY =~ ^[Yy]$ ]]; then
    echo "❌ Upload dibatalkan"
    exit 1
fi

echo ""
echo "📤 UPLOAD FILE KE SERVER..."

# Upload file satu per satu
echo "   Uploading StrukturPimpinanController.php..."
scp "app/Http/Controllers/StrukturPimpinanController.php" "$SERVER_USER@$SERVER_HOST:$SERVER_PATH/app/Http/Controllers/"

echo "   Uploading StrukturPimpinanSeeder.php..."
scp "database/seeders/StrukturPimpinanSeeder.php" "$SERVER_USER@$SERVER_HOST:$SERVER_PATH/database/seeders/"

echo "   Uploading web.php..."
scp "routes/web.php" "$SERVER_USER@$SERVER_HOST:$SERVER_PATH/routes/"

echo "   Uploading struktur.blade.php..."
scp "resources/views/pages/struktur.blade.php" "$SERVER_USER@$SERVER_HOST:$SERVER_PATH/resources/views/pages/"

echo ""
echo "🔧 MENJALANKAN PERINTAH DI SERVER..."

# Jalankan perintah di server
ssh "$SERVER_USER@$SERVER_HOST" << 'EOF'
cd /path/to/website

echo "   Running migration..."
php artisan migrate

echo "   Running seeder..."
php artisan db:seed --class=StrukturPimpinanSeeder

echo "   Clearing cache..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo "   Setting permissions..."
chmod -R 755 storage/
chmod -R 755 bootstrap/cache/

echo "✅ SELESAI!"
EOF

echo ""
echo "🎉 UPLOAD SELESAI!"
echo ""
echo "🔍 LANGKAH SELANJUTNYA:"
echo "1. Test halaman: https://your-server.com/struktur"
echo "2. Test admin panel: https://your-server.com/admin"
echo "3. Update data sesuai kebutuhan"
echo "4. Upload foto pimpinan (jika ada)"
echo ""
echo "📖 Lihat panduan lengkap di: PANDUAN_UPLOAD_STRUKTUR_PIMPINAN.md"
echo "📋 Lihat checklist di: CHECKLIST_STRUKTUR_PIMPINAN.md" 