<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'icon'];

    public function incomes(){
        return $this->hasMany(Income::class);
    }

    public function egresses(){
        return $this->hasMany(Egress::class);
    }
}
