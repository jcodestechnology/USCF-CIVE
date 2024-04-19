<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectIncome extends Model
{
    use HasFactory;
   protected $table='project_incomes';
    protected $fillable = [
        'date',
        'project_name',
        'cost_per_item',
        'quantity',
        'total_cost',
        'receipt_path',
    ];
}
