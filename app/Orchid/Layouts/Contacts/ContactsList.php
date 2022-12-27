<?php

namespace App\Orchid\Layouts\Contacts;

use App\Models\Contact;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;

class ContactsList extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'contacts';

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
            TD::make('name_uk', 'Name [Ukraine lang]')->sort()->filter(),
            TD::make('text_link', 'Text link')->sort()->filter(),
            TD::make('text_link_uk', 'Text link [Ukraine lang]')->sort()->filter(),
            TD::make('href', 'Link')->sort()->filter(),
            TD::make('actions', 'Actions')->render(function (Contact $model) {
                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([
                        ModalToggle::make('Edit')->modal('edit')->method('update')->icon('pencil')->modalTitle('Edit contact ' . $model->name)->asyncParameters(['app' => $model->id]),
                        Button::make('Remove')->icon('trash')->confirm('Are you sure?')->method('remove', [
                            'id' => $model->id
                        ]),
                    ]);
            })
        ];
    }
}
