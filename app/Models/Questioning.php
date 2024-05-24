<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questioning extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_bidding', 'question'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function bidding()
    {
        return $this->belongsTo(Bidding::class, 'id_bidding');
    }
}
