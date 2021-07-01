<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    const SUKSES = 1;
    const GAGAL = 0;
    const MESSAGE_SUKSES = 'Berhasil Menyimpan Data';
    const MESSAGE_GAGAL = 'Gagal Menyimpan Data';
    protected $table = 'data';
}
