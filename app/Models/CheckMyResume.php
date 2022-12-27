<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Orchid\Metrics\Chartable;
use Orchid\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CheckMyResume extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Chartable;

    protected $fillable = [
        'ip_address',
        'country',
        'date_time',
        'chart_date'
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'ip_address',
        'country',
        'date_time',
        'chart_date',
        'updated_at',
        'created_at'
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'ip_address',
        'country',
        'date_time',
        'chart_date',
        'updated_at',
        'created_at'
    ];
}
