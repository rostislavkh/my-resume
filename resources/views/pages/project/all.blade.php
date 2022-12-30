@extends('layouts.app')

@section('title', __('Projects by Rostislav Khorolskiy'))

@section('style')
    <link href="{{ mix('/css/projects.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-3">
        <div class="projects">
            @foreach ($projects as $project)
                <a href="{{ route('project', ['project' => $project->slug]) }}" class="projects__item" data-aos="zoom-in-up">
                    <div class="img">
                        @if($project->attachment->first())
                            <img src="{{ $project->attachment->first()->url() }}" alt="img">
                        @endif
                        <span class="title" style="color: {{ $project->text_color }};">{{ $project->getTranslate('name') }}</span>
                    </div>
                    <div class="text">{{ $project->getTranslate('short_desc') }}...</div>
                    <button type="button" class="more-link">{{ __('More') }}</button>
                </a>
            @endforeach
        </div>
        {{ $projects->links('custom-paginate') }}
    </div>
@endsection