<?php

namespace App\Orchid\Screens\ContactMe;

use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\TextArea;
use Orchid\Support\Facades\Layout;
use App\Models\ContactMe as ModelsContactMe;
use App\Orchid\Layouts\ContactMe\ContactMeList;

class ContactMe extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'requests' => ModelsContactMe::orderBy('id', 'desc')->paginate(25)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'ContactMe';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
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
                Select::make('status')->options(\App\Models\ContactMe::STATUSES)->title('Status')->required(),
                Input::make('email')->title('Email'),
                Input::make('phone_number')->title('Phone number'),
                TextArea::make('msg')->rows(10)->title('Message'),
            ])),
            Layout::modal('edit', Layout::rows([
                Input::make('model.name')->title('Name')->required(),
                Select::make('model.status')->options(\App\Models\ContactMe::STATUSES)->title('Status')->required(),
                Input::make('model.email')->title('Email'),
                Input::make('model.phone_number')->title('Phone number'),
                TextArea::make('model.msg')->rows(10)->title('Message'),
            ]))->async('asyncGetModel'),
            ContactMeList::class
        ];
    }

    public function asyncGetModel(\App\Models\ContactMe $model): array
    {
        return [
            'model' => $model
        ];
    }

    public function create(Request $request)
    {
        ModelsContactMe::create([
            'name' => $request->name,
            'status' => $request->status,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'msg' => $request->msg
        ]);

        Toast::success('Request was created');
    }
    public function update(\App\Models\ContactMe $model, Request $request)
    {
        $model->update([
            'name' => \Illuminate\Support\Arr::get($request->model, 'name', null),
            'status' => \Illuminate\Support\Arr::get($request->model, 'status', null),
            'email' => \Illuminate\Support\Arr::get($request->model, 'email', null),
            'phone_number' => \Illuminate\Support\Arr::get($request->model, 'phone_number', null),
            'msg' => \Illuminate\Support\Arr::get($request->model, 'msg', null)
        ]);

        Toast::success('Request was updated');
    }

    public function remove(Request $request)
    {
        \App\Models\ContactMe::find($request->id)->delete();

        Toast::success('Request was removed');
    }
}
