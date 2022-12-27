@extends('layouts.app')

@section('title', __('Projects by Rostislav Khorolskiy'))

@section('style')
    <link href="{{ mix('/css/projects.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-3">
        <div class="projects">
            <div class="projects__item" data-aos="zoom-in-up" data-aos-delay="300">
                <div class="img">
                    <img src="/img/avatar.jpg" alt="img">
                    <span class="title">Anti-waste</span>
                </div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
                <a href="{{ route('project') }}" class="more-link">More</a>
            </div>
            <div class="projects__item" data-aos="zoom-in-up" data-aos-delay="300">
                <div class="img">
                    <img src="/img/avatar.jpg" alt="img">
                    <span class="title">Anti-waste</span>
                </div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
                <a href="#" class="more-link">More</a>
            </div>
            <div class="projects__item" data-aos="zoom-in-up" data-aos-delay="300">
                <div class="img">
                    <img src="/img/avatar.jpg" alt="img">
                    <span class="title">Anti-waste</span>
                </div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
                <a href="#" class="more-link">More</a>
            </div>
            <div class="projects__item" data-aos="zoom-in-up" data-aos-delay="300">
                <div class="img">
                    <img src="/img/avatar.jpg" alt="img">
                    <span class="title">Anti-waste</span>
                </div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
                <a href="{{ route('project') }}" class="more-link">More</a>
            </div>
            <div class="projects__item" data-aos="zoom-in-up" data-aos-delay="300">
                <div class="img">
                    <img src="/img/avatar.jpg" alt="img">
                    <span class="title">Anti-waste</span>
                </div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
                <a href="#" class="more-link">More</a>
            </div>
            <div class="projects__item" data-aos="zoom-in-up" data-aos-delay="300">
                <div class="img">
                    <img src="/img/avatar.jpg" alt="img">
                    <span class="title">Anti-waste</span>
                </div>
                <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </div>
                <a href="#" class="more-link">More</a>
            </div>
        </div>
        <nav class="pagination">
            <ul class="pagination-list">
                <li class="pagination-item disable" aria-disabled="true" aria-label="« Previous">
                    <span class="pagination-link" aria-hidden="true">
                        <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1.4" y1="6.8" x2="7.8" y2="11.6" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="1" y1="-1" x2="9" y2="-1" transform="matrix(-0.8 0.6 0.6 0.8 9 2)" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </span>
                </li>
                <li class="pagination-item active" aria-current="page">
                    <span class="pagination-link">1</span>
                </li>
                <li class="pagination-item">
                    <a class="pagination-link" href="#">2</a>
                </li>
                <li class="pagination-item">
                    <a class="pagination-link" href="#" rel="next" aria-label="Next »">
                        <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="1" y1="-1" x2="9" y2="-1" transform="matrix(-0.8 0.6 0.6 0.8 9 7)" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                            <line x1="1.4" y1="1.8" x2="7.8" y2="6.6" stroke="#7B7B7B" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection