<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'id',
        'title',
        'description',
        'id_bidding',
        'id_registers',
        'usuid',
        'enddate',
        'created_at',
        'updated_at',

    ];

    public function bidding()
    {
        return $this->belongsTo(Bidding::class, 'id_bidding');
    }


}
