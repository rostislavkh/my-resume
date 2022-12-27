<?php

namespace App\Orchid\Screens\AboutMe;

use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\TextArea;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\SimpleMDE;
use App\Models\AboutMe as ModelsAboutMe;

class AboutMe extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $info = ModelsAboutMe::first();

        if($info == null) {
            $info = \App\Models\AboutMe::create([
                'text' => 'Example text'
            ]);
        }

        $info->load('attachment');

        return [
            'info' => $info
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'About me';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save')->type(Color::DEFAULT())->icon('check')->method('update')
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
            Layout::columns([
                Layout::rows([
                    Input::make('info.id')->hidden(),
                    Upload::make('info.attachment')->maxFiles(1),
                    Group::make([
                        Quill::make('info.text')->rows(10)->title('Text'),
                        Quill::make('info.text_uk')->rows(10)->title('Text [Urkaine lang]')
                    ])
                ])
            ])
        ];
    }

    public function update(Request $request) {
        $info = \App\Models\AboutMe::find(Arr::get($request->info, 'id', null));

        $info->load('attachment');

        $info->update([
            'text' => Arr::get($request->info, 'text', null),
            'text_uk' => Arr::get($request->info, 'text_uk', null),
        ]);

        $info->attachment()->syncWithoutDetaching(
            $request->input('info.attachment', [])
        );

        Toast::success('Text is updated');
    }
}
