<?php

namespace App\Orchid\Screens\Projects;

use App\Models\Project;
use App\Orchid\Layouts\Projects\ProjectsList;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Switcher;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\SimpleMDE;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Picture;

class Projects extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'projects' => Project::orderBy('position')->get()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Projects';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Create')->icon('plus')->modal('create')->modalTitle('Create project')->method('create')
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
            Layout::modal('create', [
                Layout::tabs([
                    'Projects info' => [
                        Layout::rows([
                            Upload::make('attachment')->groups('photo')->title('Images')->required(),
                            Input::make('name')->maxlength(100)->title('Name')->required(),
                            Input::make('name_uk')->maxlength(100)->title('Name [Ukraine lang]'),
                            Input::make('short_desc')->maxlength(100)->title('Short description'),
                            Input::make('short_desc_uk')->maxlength(100)->title('Short description [Ukraine lang]'),
                            Quill::make('description')->title('Description')->required(),
                            Quill::make('description_uk')->title('Description [Ukraine lang]'),
                            Group::make([
                                Switcher::make('is_view_all')->checked()->sendTrueOrFalse()->placeholder('Is view project?'),
                                Switcher::make('is_view_top')->sendTrueOrFalse()->placeholder('Is view to top project?'),
                            ]),
                            Input::make('position')->type('number')->value(0)->title('Position')->required(),
                        ]),
                    ],
                    'Card style' => [
                        Layout::rows([
                            // Input::make('background_color')->value('#FBFBFB')->type('color')->title('Background color card'),
                            // Input::make('shadow_color')->type('color')->title('Shadow color card'),
                            Input::make('text_color')->value('#4B4B4B')->type('color')->title('Text color card'),
                        ])
                    ]
                ])
            ]),
            Layout::modal('edit', [
                Layout::accordion([
                    'Projects info' => [
                        Layout::rows([
                            Upload::make('model.attachment')->groups('photo')->title('Images')->required(),
                            Input::make('model.name')->maxlength(100)->title('Name')->required(),
                            Input::make('model.name_uk')->maxlength(100)->title('Name [Ukraine lang]'),
                            Input::make('model.short_desc')->maxlength(100)->title('Short description'),
                            Input::make('model.short_desc_uk')->maxlength(100)->title('Short description [Ukraine lang]'),
                            Quill::make('model.description')->title('Description'),
                            Quill::make('model.description_uk')->title('Description [Ukraine lang]'),
                            Group::make([
                                Switcher::make('model.is_view_all')->sendTrueOrFalse()->placeholder('Is view project?'),
                                Switcher::make('model.is_view_top')->sendTrueOrFalse()->placeholder('Is view to top project?'),
                            ]),
                            Input::make('model.position')->type('number')->title('Position')->required(),
                        ]),
                    ],
                    'Card style' => [
                        Layout::rows([
                            // Input::make('model.background_color')->type('color')->title('Background color card'),
                            // Input::make('model.shadow_color')->type('color')->title('Shadow color card'),
                            Input::make('model.text_color')->type('color')->title('Text color card'),
                        ])
                    ]
                ])
            ])->async('asyncGetModel'),
            ProjectsList::class
        ];
    }

    public function asyncGetModel(\App\Models\Project $model): array
    {
        $model->load('attachment');

        return [
            'model' => $model
        ];
    }

    public function create(Request $request)
    {
        $model = Project::create([
            'position' => $request->position,
            'name' => $request->name,
            'name_uk' => $request->name_uk,
            'short_desc' => $request->short_desc,
            'short_desc_uk' => $request->short_desc_uk,
            'description' => $request->description,
            'description_uk' => $request->description_uk,
            'is_view_all' => $request->is_view_all,
            'is_view_top' => $request->is_view_top,
            // 'background_color' => $request->background_color,
            // 'shadow_color' => $request->shadow_color,
            'text_color' => $request->text_color
        ]);

        $model->attachment()->syncWithoutDetaching(
            $request->input('attachment', [])
        );

        Toast::success('Project was created');
    }
    public function update(\App\Models\Project $model, Request $request)
    {
        $model->update([
            'position' => \Illuminate\Support\Arr::get($request->model, 'position', null),
            'name' => \Illuminate\Support\Arr::get($request->model, 'name', null),
            'name_uk' => \Illuminate\Support\Arr::get($request->model, 'name_uk', null),
            'short_desc' => \Illuminate\Support\Arr::get($request->model, 'short_desc', null),
            'short_desc_uk' => \Illuminate\Support\Arr::get($request->model, 'short_desc_uk', null),
            'description' => \Illuminate\Support\Arr::get($request->model, 'description', null),
            'description_uk' => \Illuminate\Support\Arr::get($request->model, 'description_uk', null),
            'is_view_all' => \Illuminate\Support\Arr::get($request->model, 'is_view_all', null),
            'is_view_top' => \Illuminate\Support\Arr::get($request->model, 'is_view_top', null),
            // 'background_color' => \Illuminate\Support\Arr::get($request->model, 'background_color', null),
            // 'shadow_color' => \Illuminate\Support\Arr::get($request->model, 'shadow_color', null),
            'text_color' => \Illuminate\Support\Arr::get($request->model, 'text_color', null)
        ]);

        $model->attachment()->syncWithoutDetaching(
            $request->input('model.attachment', [])
        );

        Toast::success('Project was updated');
    }

    public function remove(Request $request)
    {
        \App\Models\Project::find($request->id)->delete();

        Toast::success('Project was removed');
    }
}
