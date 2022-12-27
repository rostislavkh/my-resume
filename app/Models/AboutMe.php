<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use App\Helpers\Translation;
use Orchid\Filters\Filterable;
use Orchid\Attachment\Attachable;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutMe extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Translation;
    use Attachable;

    protected $fillable = [
        'text',
        'text_uk'
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'text',
        'text_uk',
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
        'text',
        'text_uk',
        'updated_at',
        'created_at'
    ];
}
