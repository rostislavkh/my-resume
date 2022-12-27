<?php

namespace App\Orchid\Screens\Skills;

use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Support\Facades\Layout;
use App\Models\Skills as ModelsSkills;
use App\Orchid\Layouts\Skills\SkillsList;
use Orchid\Screen\Actions\ModalToggle;

class Skills extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'skills' => ModelsSkills::paginate(25)
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Skills';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Add')->icon('plus')->modal('create')->modalTitle('Added new skill')->method('create')
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
                Select::make('type')->options(ModelsSkills::TYPES)->title('Type')->required(),
                Input::make('label')->title('Label')->required(),
                Input::make('label_uk')->title('Label [Ukraine lang]'),
                CheckBox::make('is_bold')->title('Is bold')->sendTrueOrFalse()
            ])),
            Layout::modal('edit', Layout::rows([
                Select::make('model.type')->options(ModelsSkills::TYPES)->title('Type')->required(),
                Input::make('model.label')->title('Label')->required(),
                Input::make('model.label_uk')->title('Label [Ukraine lang]'),
                CheckBox::make('model.is_bold')->title('Is bold')->sendTrueOrFalse()
            ]))->async('asyncGetModel'),
            SkillsList::class
        ];
    }

    public function asyncGetModel(ModelsSkills $model): array
    {
        return [
            'model' => $model
        ];
    }

    public function create(Request $request)
    {
        ModelsSkills::create([
            'type' => $request->type,
            'label' => $request->label,
            'label_uk' => $request->label_uk,
            'is_bold' => $request->is_bold
        ]);

        Toast::success('Skill was created');
    }
    public function update(ModelsSkills $model, Request $request)
    {
        $model->update([
            'type' => \Illuminate\Support\Arr::get($request->model, 'type', null),
            'label' => \Illuminate\Support\Arr::get($request->model, 'label', null),
            'label_uk' => \Illuminate\Support\Arr::get($request->model, 'label_uk', null),
            'is_bold' => \Illuminate\Support\Arr::get($request->model, 'is_bold', null)
        ]);

        Toast::success('Skill was created');
    }

    public function remove(Request $request)
    {
        ModelsSkills::find($request->id)->delete();

        Toast::success('Skill was removed');
    }
}
