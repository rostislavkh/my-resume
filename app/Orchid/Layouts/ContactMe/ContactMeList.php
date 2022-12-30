<?php

namespace App\Orchid\Layouts\ContactMe;

use App\Models\ContactMe;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;

class ContactMeList extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'requests';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->defaultHidden()->sort()->filter(),
            TD::make('name', 'Name')->sort()->filter(),
            TD::make('status', 'Status')->sort()->filter(TD::FILTER_SELECT, ContactMe::STATUSES),
            TD::make('email', 'Email')->sort()->filter(),
            TD::make('phone_number', 'Phone number')->sort()->filter(),
            TD::make('msg', 'Message')->sort()->filter(),
            TD::make('actions', 'Actions')->render(function (ContactMe $model) {
                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([
                        ModalToggle::make('Edit')->modal('edit')->method('update')->icon('pencil')->modalTitle('Edit request ' . $model->name)->asyncParameters(['app' => $model->id]),
                        Button::make('Remove')->icon('trash')->confirm('Are you sure?')->method('remove', [
                            'id' => $model->id
                        ]),
                    ]);
            })
        ];
    }
}
