<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use App\Helpers\Translation;
use Orchid\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skills extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Translation;

    const TYPES = [
        'Front-end' => 'Front-end',
        'Back-end' => 'Back-end',
        'Software' => 'Software'
    ];

    protected $fillable = [
        'type',
        'label',
        'label_uk',
        'is_bold',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'type',
        'label',
        'label_uk',
        'is_bold',
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
        'type',
        'label',
        'label_uk',
        'is_bold',
        'updated_at',
        'created_at'
    ];
}
