<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkorPertandingan extends Model
{
    use HasFactory;

    protected $fillable = [
        'skor_klub_1',
        'skor_klub_2',
        'klub_id_1',
        'klub_id_2',
    ];

    public function klub1()
    {
        return $this->belongsTo(Klub::class, 'klub_id_1', 'id');
    }

    public function klub2()
    {
        return $this->belongsTo(Klub::class, 'klub_id_2', 'id');
    }
}
