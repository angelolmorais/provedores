<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'user_id', 'type_id', 'bidding_id', 'filename', 'document_type_id', 'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'document_type_id');
    }

    public function bidding()
    {
        return $this->belongsTo(Bidding::class, 'bidding_id');
    }
}
