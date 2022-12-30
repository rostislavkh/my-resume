<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ContactMe extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;

    const STATUSES = [
        'Not processed' => 'Not processed',
        'Processed' => 'Processed'
    ];

    protected $fillable = [
        'name',
        'status',
        'email',
        'phone_number',
        'msg',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'name',
        'status',
        'email',
        'phone_number',
        'msg',
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
        'name',
        'status',
        'email',
        'phone_number',
        'msg',
        'updated_at',
        'created_at'
    ];
}
