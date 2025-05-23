<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
    use HasFactory;

    protected $table = 'pelatih';

    protected $fillable = ['Nama', 'Alamat', 'NomorHandphone'];

    public function jadwalPelatih()
    {
        return $this->hasMany(JadwalPelatih::class, 'pelatih_id');
    }
}
