<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'mobile',
        'email',
        'user_id'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
