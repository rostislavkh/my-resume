<?php

namespace App\Orchid\Screens\Contacts;

use App\Models\Contact;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\ModalToggle;
use App\Orchid\Layouts\Contacts\ContactsList;

class Contacts extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'contacts' => Contact::orderBy('id', 'desc')->paginate(25)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'My contacts';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make(__('Create'))->icon('plus')->modal('create')->modalTitle(__('Create contact'))->method('create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::modal('create', Layout::rows([
                Input::make('name')->title('Name')->required(),
                Input::make('name_uk')->title('Name [Ukraine lang]'),
                Group::make([
                    Input::make('text_link')->title('Text link')->required(),
                    Input::make('text_link_uk')->title('Text link [Ukraine lang]'),
                    Input::make('href')->title('Link'),
                ]),
            ])),
            Layout::modal('edit', Layout::rows([
                Input::make('model.name')->title('Name')->required(),
                Input::make('model.name_uk')->title('Name [Ukraine lang]'),
                Group::make([
                    Input::make('model.text_link')->title('Text link')->required(),
                    Input::make('model.text_link_uk')->title('Text link [Ukraine lang]'),
                    Input::make('model.href')->title('Link'),
                ])
            ]))->async('asyncGetModel'),
            ContactsList::class
        ];
    }

    public function asyncGetModel(\App\Models\Contact $model): array
    {
        return [
            'model' => $model
        ];
    }

    public function create(Request $request) {
        Contact::create([
            'name' => $request->name,
            'name_uk' => $request->name_uk,
            'text_link' => $request->text_link,
            'text_link_uk' => $request->text_link_uk,
            'href' => $request->href
        ]);

        Toast::success('Contact was created');
    }
    public function update(\App\Models\Contact $model, Request $request) {
        $model->update([
            'name' => \Illuminate\Support\Arr::get($request->model, 'name', null),
            'name_uk' => \Illuminate\Support\Arr::get($request->model, 'name_uk', null),
            'text_link' => \Illuminate\Support\Arr::get($request->model, 'text_link', null),
            'text_link_uk' => \Illuminate\Support\Arr::get($request->model, 'text_link_uk', null),
            'href' => \Illuminate\Support\Arr::get($request->model, 'href', null)
        ]);

        Toast::success('Contact was created');
    }

    public function remove(Request $request)
    {
        \App\Models\Contact::find($request->id)->delete();

        Toast::success('Contact was removed');
    }
}
