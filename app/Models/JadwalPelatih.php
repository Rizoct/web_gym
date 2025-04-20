<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelatih extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelatih';

    protected $fillable = ['pelatih_id', 'Tanggal', 'JamMulai', 'JamSelesai'];

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class, 'pelatih_id');
    }
}
