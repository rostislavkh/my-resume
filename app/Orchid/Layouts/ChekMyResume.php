<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Chart;

class ChekMyResume extends Chart
{
    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $colors = [
        '#9c0216',
    ];

    protected $title = 'Charts';

    protected $type = 'line';

    protected $target = 'chart';

    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    protected $export = true;
}
