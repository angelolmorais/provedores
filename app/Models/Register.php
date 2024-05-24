<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
        'id_user',
        'id_bidding',
        'status',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function bidding()
    {
        return $this->belongsTo(Bidding::class, 'id_bidding');
    }
    // No modelo Register.php
    public function uploads()
    {
        return $this->hasMany(Upload::class, 'id_bidding', 'id_user');
    }
    public function delete()
    {
        // Exclua uploads relacionados antes de excluir o registro
        $this->uploads()->delete();

        parent::delete();
    }


}
