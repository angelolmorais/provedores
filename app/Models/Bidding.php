<?php
// app/Models/Bidding.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    public function uploadedDocuments()
    {
        return $this->hasMany(UploadedDocument::class, 'id_bidding');
    }


}
