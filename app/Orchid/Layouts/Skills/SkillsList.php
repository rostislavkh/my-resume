<?php

namespace App\Orchid\Layouts\Skills;

use Orchid\Screen\TD;
use App\Models\Skills;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;

class SkillsList extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'skills';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->defaultHidden()->sort()->filter(),
            TD::make('type', 'Type')->sort()->filter(TD::FILTER_SELECT, Skills::TYPES),
            TD::make('label', 'Label')->sort()->filter(),
            TD::make('label_uk', 'Label [Ukraine lang]')->sort()->filter(),
            TD::make('is_bold', 'Is bold')->render(function (Skills $model) {
                return $model->is_bold ? 'Yes' : 'No';
            })->sort()->filter(),
            TD::make('actions', 'Actions')->render(function (Skills $model) {
                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([
                        ModalToggle::make('Edit')->modal('edit')->method('update')->icon('pencil')->modalTitle('Edit skill ' . $model->name)->asyncParameters(['app' => $model->id]),
                        Button::make('Remove')->icon('trash')->confirm('Are you sure?')->method('remove', [
                            'id' => $model->id
                        ]),
                    ]);
            })
        ];
    }
}
