<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone_number', 'company_id'];

    public function scopeFilter($query, array $filters)
    {
        if($filters['company_id'] ?? false)
        {
            $query->where('company_id', 'like', '%' . request('company_id') . '%');
        }

        if($filters['search'] ?? false)
        {
            $query->where('first_name', 'like', '%' . request('search') . '%')
                ->orWhere('last_name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%')
                ->orWhere('phone_number', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to company.
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
