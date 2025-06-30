<?php

namespace App\Http\Controllers;

use App\Models\DokumenDownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class DokumenDownloadController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori');
        
        $query = DokumenDownload::where('is_active', true);
        
        if ($kategori) {
            $query->where('kategori', $kategori);
        }
        
        $dokumen = $query->orderBy('created_at', 'desc')->get();
        
        $kategoris = DokumenDownload::where('is_active', true)
            ->distinct()
            ->pluck('kategori')
            ->mapWithKeys(function ($kategori) {
                return [$kategori => ucfirst($kategori)];
            });
        
        return view('pages.download', compact('dokumen', 'kategoris', 'kategori'));
    }
    
    public function download($id)
    {
        try {
            $dokumen = DokumenDownload::findOrFail($id);
            
            if (!$dokumen->is_active) {
                abort(404, 'Dokumen tidak tersedia');
            }
            
            // Check if file exists
            if (!Storage::disk('public')->exists($dokumen->file_path)) {
                abort(404, 'File tidak ditemukan');
            }
            
            // Increment download count
            $dokumen->incrementDownloadCount();
            
            // Get file size if not set
            if (!$dokumen->file_size) {
                $dokumen->update([
                    'file_size' => Storage::disk('public')->size($dokumen->file_path)
                ]);
            }
            
            // Return file download
            $file = Storage::disk('public')->path($dokumen->file_path);
            return response()->download($file, $dokumen->file_name);
            
        } catch (\Exception $e) {
            abort(404, 'Terjadi kesalahan saat mengunduh file');
        }
    }
}
