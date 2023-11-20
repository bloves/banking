<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','debit','credit','transferred','balance','created_at'];

    public function user(){
        return $this->belongsTo(User::class, 'transferred', 'id');
    }
}
