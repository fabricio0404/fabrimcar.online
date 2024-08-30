<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egress extends Model
{
    use HasFactory;

    protected $fillable = [
        'egress', 'description', 'category_id', 'account_id',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function account(){
        return $this->belongsTo(Account::class);
    }
}
