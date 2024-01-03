<?php

namespace App\Models\UserManagement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','price','status'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
