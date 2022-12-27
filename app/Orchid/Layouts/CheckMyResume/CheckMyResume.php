<?php

namespace App\Orchid\Layouts\CheckMyResume;

use Carbon\Carbon;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CheckMyResume extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $title = 'Views of my resume';
    protected $target = 'checks';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->defaultHidden()->sort()->filter(),
            TD::make('ip_address', 'IP')->sort()->filter(),
            TD::make('country', 'Country')->sort()->filter(),
            TD::make('date_time', 'Date time')->sort()->filter(),
            TD::make('updated_at', 'Last check time')->render(function (\App\Models\CheckMyResume $model) {
                return Carbon::parse($model->updated_at);
            })->sort()->filter(),
        ];
    }
}
