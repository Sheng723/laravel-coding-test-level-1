<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'name' => 'string',
        'slug' => 'string',
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public static $rules = [
        'name' => 'required|string',
        'slug' => 'required|string|unique:events,slug',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ];

    public static $patch_rules = [
        'name' => 'string',
        'slug' => 'string|unique:events,slug',
        'start_date' => 'date',
        'end_date' => 'date|after:start_date',
    ];
}
