<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPernyataanKegiatan extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'fungsional_id',
        'periode_id',
        'is_send',
        'link',
        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'fungsional_id');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}