<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'logo', 'website'];

    // Relationship with employees.
    public function user()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
