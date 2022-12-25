@extends('layouts.app')

@section('title', __('Resume by Rostislav Khorolskiy'))

@section('style')
    <link href="{{ mix('/css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="my-contacts">
                <div class="my-contacts__avatar">
                    <img src="/img/avatar.jpg" alt="avatar">
                </div>
                <span class="my-contacts__title">My contacts</span>
                <ul class="my-contacts__list">
                    <li>Phone: <a href="tel:+380987065558" target="_blank">+ 38(098) 706-55-58</a></li>
                    <li>Telegram: <a href="https://telegram.me/rkhorolkiy" target="_blank">@rkhorolkiy</a></li>
                    <li>Instagram: <a href="https://www.instagram.com/rkhorolskiy" target="_blank">@rkhorolkiy</a></li>
                    <li>Facebook: <a href="facebook.com" target="_blank">Link</a></li>
                    <li>Gmail: <a href="mailto:rkhorolskij@gmail.com" target="_blank">rkhorolskij@gmail.com</a></li>
                </ul>
            </div>
            <div class="my-skills">
                <span class="my-skills__title">My skills</span>
                <div class="my-skills__cards">
                    <div class="my-skills__card">
                    <span class="my-skills__card-title">Back-end</span>
                    <ul class="my-skills__list">
                        <li>PHP (1,5 years exp)</li>
                        <li>MySQL (1,5 years exp)</li>
                        <li class="my-skills__subskill">Frameworks</li>
                        <li>Laravel</li>
                        <li>Orchid (Admin panel)</li>
                    </ul>
                </div>
                <div class="my-skills__card">
                    <span class="my-skills__card-title">Front-end</span>
                    <ul class="my-skills__list">
                        <li>HTML, CSS, JS (2 year exp)</li>
                        <li class="my-skills__subskill">Frameworks</li>
                        <li>Vue.js, JQuery</li>
                        <li>Bootstrap</li>
                        <li>Ajax, Axios</li>
                    </ul>
                </div>
                <div class="my-skills__card">
                    <span class="my-skills__card-title">Software</span>
                    <ul class="my-skills__list">
                        <li>VS Code, PHPStorm</li>
                        <li>Figma, Photoshop</li>
                        <li class="my-skills__subskill">VCS</li>
                        <li>Github, Gitlab</li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
        <div class="about-me">
            <span class="about-me__title">About me</span>
            <div class="about-me__text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            </div>
        </div>
    </div>
@endsection