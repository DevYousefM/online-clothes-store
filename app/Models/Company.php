<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'fiscal_id',
        'vat_code',
        'tax_code',
        'company_name',
        'user_type',
        'region',
        'district',
        'postal_code',
        'ben_code',
        'pec_code'
    ];
}
