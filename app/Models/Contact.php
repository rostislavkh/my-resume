<?php

namespace App\Models;

use App\Helpers\Translation;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Translation;

    protected $fillable = [
        'name',
        'name_uk',
        'text_link',
        'text_link_uk',
        'href',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'name',
        'name_uk',
        'text_link',
        'text_link_uk',
        'href',
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
        'name_uk',
        'text_link',
        'text_link_uk',
        'href',
        'updated_at',
        'created_at'
    ];
}
