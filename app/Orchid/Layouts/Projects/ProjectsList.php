<?php

namespace App\Orchid\Layouts\Projects;

use App\Models\Project;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;

class ProjectsList extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'projects';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'ID')->defaultHidden()->sort()->filter(),
            TD::make('position', 'Position')->sort()->filter(),
            TD::make('img', 'Image')->render(function (Project $model) {
                return $model->attachment()->first() ? '<img src="' . $model->attachment()->first()->url() .'" alt="img" style="max-height: 100px;" class="mw-100 d-block img-fluid">' : '';
            })->sort()->filter(),
            TD::make('name', 'Name')->sort()->filter(),
            TD::make('name_uk', 'Name [Ukraine lang]')->sort()->filter(),
            TD::make('short_desc', 'Short description')->sort()->filter(),
            TD::make('short_desc_uk', 'Short description [Ukraine lang]')->sort()->filter(),
            TD::make('description', 'Description')->sort()->filter(),
            TD::make('description_uk', 'Description [Ukraine lang]')->sort()->filter(),
            TD::make('is_view_all', 'Is view all')->render(function (Project $model) {
                return Switcher::make()->checked($model->is_view_all ? true : false)->disabled();
            })->sort()->filter(),
            TD::make('is_view_top', 'Is view top')->render(function (Project $model) {
                return Switcher::make()->checked($model->is_view_top ? true : false)->disabled();
            })->sort()->filter(),
            // TD::make('background_color', 'Background color')->render(function (Project $model) {
            //     return Input::make()->type('color')->value($model->background_color)->disabled();
            // })->sort()->filter(),
            // TD::make('shadow_color', 'Shadow color')->render(function (Project $model) {
            //     return Input::make()->type('color')->value($model->shadow_color)->disabled();
            // })->sort()->filter(),
            TD::make('text_color', 'Text color')->render(function (Project $model) {
                return Input::make()->type('color')->value($model->text_color)->disabled();
            })->sort()->filter(),
            TD::make('actions', 'Actions')->render(function (Project $model) {
                return DropDown::make()
                    ->icon('options-vertical')
                    ->list([
                        ModalToggle::make('Edit')->modal('edit')->method('update')->icon('pencil')->modalTitle('Edit project ' . $model->name)->asyncParameters(['model' => $model->id]),
                        Button::make('Remove')->icon('trash')->confirm('Are you sure?')->method('remove', [
                            'id' => $model->id
                        ]),
                    ]);
            })
        ];
    }
}
