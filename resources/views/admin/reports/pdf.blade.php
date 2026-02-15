<!DOCTYPE html>
<html><head><meta charset="UTF-8"><title>Laporan Lazismu Lengkong</title>
<style>body{font-family:sans-serif;font-size:12px;color:#333}h1{font-size:18px;text-align:center}h2{font-size:14px;margin-top:20px}table{width:100%;border-collapse:collapse;margin-top:10px}th,td{border:1px solid #ddd;padding:6px 8px;text-align:left}th{background:#f5f5f5;font-weight:bold}.text-right{text-align:right}.header{text-align:center;margin-bottom:20px}.footer{margin-top:30px;text-align:center;font-size:10px;color:#999}</style>
</head><body>
<div class="header">
    <h1>LAPORAN KEUANGAN LAZISMU LENGKONG</h1>
    <p>Periode: {{ $startDate }} s/d {{ $endDate }}</p>
    <p>Lembaga Amil Zakat Nasional Muhammadiyah - KL Lengkong</p>
</div>
<h2>A. PENGHIMPUNAN</h2>
<table><thead><tr><th>Jenis Dana (PSAK 109)</th><th class="text-right">Total Penghimpunan</th><th class="text-right">Bagian Amil</th><th class="text-right">Dana Bersih</th></tr></thead><tbody>
@foreach($penghimpunan as $p)<tr><td>{{ $p->psak_fund_type }}</td><td class="text-right">Rp {{ number_format($p->total, 0, ',', '.') }}</td><td class="text-right">Rp {{ number_format($p->amil, 0, ',', '.') }}</td><td class="text-right">Rp {{ number_format($p->net, 0, ',', '.') }}</td></tr>@endforeach
</tbody></table>
<h2>B. PENYALURAN</h2>
<table><thead><tr><th>Asnaf</th><th class="text-right">Total Penyaluran</th></tr></thead><tbody>
@foreach($penyaluran as $p)<tr><td>{{ $p->asnaf_category }}</td><td class="text-right">Rp {{ number_format($p->total, 0, ',', '.') }}</td></tr>@endforeach
</tbody></table>
<div class="footer"><p>Dicetak pada {{ now()->translatedFormat('d F Y H:i') }} WIB | Lazismu Lengkong &copy; {{ date('Y') }}</p></div>
</body></html>
