<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Role;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class RoleEditLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            Input::make('role.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Name')
                ->placeholder('Name')
                ->help('Role display name'),

            Input::make('role.slug')
                ->type('text')
                ->max(255)
                ->required()
                ->title('Slug')
                ->placeholder('Slug')
                ->help('Actual name in the system'),
        ];
    }
}
