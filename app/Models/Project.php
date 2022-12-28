<?php

namespace App\Models;

use Illuminate\Support\Str;
use Orchid\Screen\AsSource;
use App\Helpers\Translation;
use Orchid\Filters\Filterable;
use Orchid\Attachment\Attachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;
    use AsSource;
    use Filterable;
    use Translation;
    use Attachable;

    protected $fillable = [
        'position',
        'slug',
        'name',
        'name_uk',
        'description',
        'description_uk',
        'is_view_all',

        'is_view_top',
        'background_color',
        'shadow_color',
        'text_color',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'position',
        'slug',
        'name',
        'name_uk',
        'description',
        'description_uk',
        'is_view_all',

        'is_view_top',
        'background_color',
        'shadow_color',
        'text_color',
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
        'position',
        'slug',
        'name',
        'name_uk',
        'description',
        'description_uk',
        'is_view_all',

        'is_view_top',
        'background_color',
        'shadow_color',
        'text_color',
        'updated_at',
        'created_at'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;

        $slug = Str::slug($value);

        $this->attributes['slug'] = $slug;
    }
}
