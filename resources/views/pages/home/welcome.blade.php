@extends('layouts.app')

@section('title', __('Resume by Rostislav Khorolskiy'))

@section('style')
    <link href="{{ mix('/css/home.css') }}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{ mix('js/slick.js') }}"></script>
    <script src="{{ mix('js/home.js') }}"></script>
@endsection



@section('content')
    <div class="container">
        <div class="row">
            <div class="my-contacts">
                <div class="my-contacts__avatar" data-aos="fade-right">
                    @if($avatar)
                        <img src="{{ $avatar }}" alt="avatar">
                    @endif
                </div>
                <span class="my-contacts__title" data-aos="fade-right" data-aos-delay="200">{{ __('My contacts') }}</span>
                <ul class="my-contacts__list" data-aos="fade-left" data-aos-delay="200">
                    @foreach ($contacts as $contact)
                        <li>{{ $contact->getTranslate('name') }}: <a class="link" href="{{ $contact->href }}" target="_blank">{{ $contact->getTranslate('text_link') }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="my-skills">
                <span class="my-skills__title" data-aos="fade-left" data-aos-delay="200">{{ __('My skills') }}</span>
                <div class="my-skills__cards" data-aos="fade-up" data-aos-delay="100">
                    @foreach (\App\Models\Skills::TYPES as $type)
                        <div class="my-skills__card">
                            <span class="my-skills__card-title">{{ __($type) }}</span>
                            <ul class="my-skills__list">
                                @foreach ($skills as $skill)
                                    @if($skill->type == $type)
                                        <li class="{{ $skill->is_bold ? 'my-skills__subskill' : '' }}">{{ $skill->getTranslate('label') }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="about-me" data-aos="fade-up">
            <span class="about-me__title" data-aos="fade-left" data-aos-delay="200">{{ __('About me') }}</span>
            <div class="about-me__text" data-aos="fade-right" data-aos-delay="200">
                {!! $about_me->getTranslate('text') !!}
            </div>
        </div>
    </div>
    <div class="container-2">
        <div class="last-projects" data-aos="fade-up" data-aos-delay="100">
            <span class="last-projects__title" data-aos="fade-right" data-aos-delay="300">Last projects</span>
            <div class="last-projects__slider-wrapper" data-aos="fade-left" data-aos-delay="300">
                <svg class="custom-arrow prev-slide" width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M62.3021 29.4793H68.847C69.2711 29.4793 69.6154 29.1351 69.6154 28.711C69.6154 28.2869 69.2711 27.9426 68.847 27.9426H62.3021C61.878 27.9426 61.5338 28.2869 61.5338 28.711C61.5338 29.1351 61.878 29.4793 62.3021 29.4793Z" fill="#4B4B4B"/>
                    <path d="M25.1489 59.6928C25.6122 59.6928 26.0755 59.5168 26.4282 59.1641L33.7945 51.7979C34.4998 51.091 34.4998 49.9431 33.7945 49.2377L26.5358 41.979H47.1939C47.618 41.979 47.9622 41.6355 47.9622 41.2106C47.9622 40.7857 47.618 40.4423 47.1939 40.4423H24.6802C24.3698 40.4423 24.0886 40.629 23.9702 40.9164C23.8511 41.2037 23.9172 41.5341 24.137 41.7539L32.708 50.3242C32.8148 50.431 32.8148 50.6046 32.7072 50.7122L25.3425 58.0769C25.2357 58.1845 25.0621 58.1837 24.9553 58.0769L2.07351 35.1944C2.00897 35.1299 1.99745 35.0476 1.99975 34.99C1.99745 34.8748 2.00897 34.7925 2.07351 34.728L24.9553 11.8455C25.0943 11.7072 25.2019 11.7041 25.3425 11.8455L32.708 19.2102C32.8148 19.317 32.8148 19.4907 32.708 19.5975L24.1377 28.167C23.918 28.3867 23.8519 28.7171 23.971 29.0045C24.0893 29.2919 24.3705 29.4786 24.681 29.4786H55.5229C55.947 29.4786 56.2913 29.1343 56.2913 28.7102C56.2913 28.2861 55.947 27.9419 55.5229 27.9419H26.535L33.7937 20.6832C34.4991 19.977 34.4991 18.8283 33.7937 18.123L26.4282 10.7575C25.7428 10.0729 24.5503 10.0737 23.868 10.7575L0.986286 33.6392C0.629768 33.995 0.444588 34.4744 0.463799 34.9877C0.444588 35.4433 0.629768 35.922 0.986286 36.2785L23.868 59.1611C24.2215 59.516 24.6848 59.6928 25.1489 59.6928Z" fill="#4B4B4B"/>
                    <path d="M53.5859 41.979H59.9594C60.3836 41.979 60.7278 41.6355 60.7278 41.2106C60.7278 40.7857 60.3836 40.4423 59.9594 40.4423H53.5859C53.1617 40.4423 52.8175 40.7857 52.8175 41.2106C52.8175 41.6355 53.1617 41.979 53.5859 41.979Z" fill="#4B4B4B"/>
                    <path d="M37.7031 35.7292H64.0009C64.4251 35.7292 64.7693 35.3849 64.7693 34.9608C64.7693 34.5367 64.4251 34.1924 64.0009 34.1924H37.7031C37.2789 34.1924 36.9347 34.5367 36.9347 34.9608C36.9347 35.3849 37.2789 35.7292 37.7031 35.7292Z" fill="#4B4B4B"/>
                </svg>
                <div class="last-projects__slider">
                    <div class="frame">
                        <a href="#" class="slider__item card">
                            <img src="/img/avatar.jpg" alt="img" class="item__img">
                            <span class="item__title">Anti-watse</span>
                            <div class="item__text">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a...
                            </div>
                        </a>
                    </div>
                    <div class="frame">
                        <a href="#" class="slider__item card">
                            <img src="/img/avatar.jpg" alt="img" class="item__img">
                            <span class="item__title">Anti-watse</span>
                            <div class="item__text">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a...
                            </div>
                        </a>
                    </div>
                    <div class="frame">
                        <a href="#" class="slider__item card">
                            <img src="/img/avatar.jpg" alt="img" class="item__img">
                            <span class="item__title">Anti-watse</span>
                            <div class="item__text">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a...
                            </div>
                        </a>
                    </div>
                    <div class="frame">
                        <a href="#" class="slider__item card">
                            <img src="/img/avatar.jpg" alt="img" class="item__img">
                            <span class="item__title">Anti-watse</span>
                            <div class="item__text">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a...
                            </div>
                        </a>
                    </div>
                    <div class="frame">
                        <a href="#" class="slider__item card">
                            <img src="/img/avatar.jpg" alt="img" class="item__img">
                            <span class="item__title">Anti-watse</span>
                            <div class="item__text">
                                "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a...
                            </div>
                        </a>
                    </div>
                </div>
                <svg class="custom-arrow next-slide" width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.69776 29.4793H1.15288C0.728746 29.4793 0.384521 29.1351 0.384521 28.711C0.384521 28.2869 0.728746 27.9426 1.15288 27.9426H7.69776C8.1219 27.9426 8.46612 28.2869 8.46612 28.711C8.46612 29.1351 8.1219 29.4793 7.69776 29.4793Z" fill="#4B4B4B"/>
                    <path d="M44.8511 59.6928C44.3878 59.6928 43.9245 59.5168 43.5718 59.1641L36.2055 51.7979C35.5002 51.091 35.5002 49.9431 36.2055 49.2377L43.4642 41.979H22.8061C22.382 41.979 22.0378 41.6355 22.0378 41.2106C22.0378 40.7857 22.382 40.4423 22.8061 40.4423H45.3198C45.6302 40.4423 45.9114 40.629 46.0298 40.9164C46.1489 41.2037 46.0828 41.5341 45.863 41.7539L37.292 50.3242C37.1852 50.431 37.1852 50.6046 37.2928 50.7122L44.6575 58.0769C44.7643 58.1845 44.9379 58.1837 45.0447 58.0769L67.9265 35.1944C67.991 35.1299 68.0026 35.0476 68.0002 34.99C68.0026 34.8748 67.991 34.7925 67.9265 34.728L45.0447 11.8455C44.9057 11.7072 44.7981 11.7041 44.6575 11.8455L37.292 19.2102C37.1852 19.317 37.1852 19.4907 37.292 19.5975L45.8623 28.167C46.082 28.3867 46.1481 28.7171 46.029 29.0045C45.9107 29.2919 45.6295 29.4786 45.319 29.4786H14.4771C14.053 29.4786 13.7087 29.1343 13.7087 28.7102C13.7087 28.2861 14.053 27.9419 14.4771 27.9419H43.465L36.2063 20.6832C35.5009 19.977 35.5009 18.8283 36.2063 18.123L43.5718 10.7575C44.2572 10.0729 45.4497 10.0737 46.132 10.7575L69.0137 33.6392C69.3702 33.995 69.5554 34.4744 69.5362 34.9877C69.5554 35.4433 69.3702 35.922 69.0137 36.2785L46.132 59.1611C45.7785 59.516 45.3152 59.6928 44.8511 59.6928Z" fill="#4B4B4B"/>
                    <path d="M16.4141 41.979H10.0406C9.61644 41.979 9.27222 41.6355 9.27222 41.2106C9.27222 40.7857 9.61644 40.4423 10.0406 40.4423H16.4141C16.8383 40.4423 17.1825 40.7857 17.1825 41.2106C17.1825 41.6355 16.8383 41.979 16.4141 41.979Z" fill="#4B4B4B"/>
                    <path d="M32.2967 35.7292H5.99883C5.57469 35.7292 5.23047 35.3849 5.23047 34.9608C5.23047 34.5367 5.57469 34.1924 5.99883 34.1924H32.2967C32.7208 34.1924 33.0651 34.5367 33.0651 34.9608C33.0651 35.3849 32.7208 35.7292 32.2967 35.7292Z" fill="#4B4B4B"/>
                </svg>
            </div>
            <a href="{{ route('projects') }}" class="link">View all projects</a>
        </div>
    </div>
@endsection