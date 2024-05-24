<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $fillable = [
        'id_user',
        'id_bidding',
        'id_category',
        'id_subcategory',
        'id_information',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'file_description',
    ];

    public function bidding()
    {
        return $this->belongsTo(Bidding::class, 'id_bidding');
    }

}
