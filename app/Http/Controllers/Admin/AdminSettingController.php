<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    private array $groupLabels = [
        'general' => 'Informasi Organisasi',
        'bank'    => 'Rekening Bank',
        'beranda' => 'Konten Halaman Utama',
        'zakat'   => 'Parameter Zakat',
        'amil'    => 'Persentase Amil',
    ];

    public function index()
    {
        $settings = Setting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        $groupLabels = $this->groupLabels;
        return view('admin.settings.index', compact('settings', 'groupLabels'));
    }

    public function update(Request $request)
    {
        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value ?? '']);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan berhasil disimpan.');
    }
}
