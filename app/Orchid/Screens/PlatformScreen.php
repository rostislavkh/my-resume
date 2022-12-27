<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\CheckMyResume;
use App\Orchid\Layouts\ChekMyResume;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'chart' => [
                CheckMyResume::countByDays(null, null, 'chart_date')->toChart('Checks')
                ]
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Get Started';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Welcome to your admin panel.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Website')
                ->href(env('APP_URL', '/'))
                ->icon('globe-alt')
                ->target('_blank'),

            Link::make('GitHub')
                ->href('https://github.com/rostislavkh/my-resume')
                ->icon('social-github')
                ->target('_blank'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            ChekMyResume::class
        ];
    }
}
