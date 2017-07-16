@extends('layouts.app')

@section('title', 'PHP')

@section('content')
    <!-- Main -->
            <div id="main">

                <!-- Php -->
                    <section id="php" class="two">
                        <div class="container">

                            <header>
                                <h2>Laravel</h2>
                            </header>

                            <div class="row">
                                @foreach($laravel as $l)
                                <div class="4u 12u$(mobile)">
                                    <article class="item">
                                        <a href="{{ route('laravel.show', str_replace(' ', '-', strtolower($l->title))) }}" class="image fit"><img src="{{ asset('dist/'.$l->thumbnail) }}" alt="{{ $l->title }}" /></a>
                                        <header>
                                            <h3>{{ $l->title }}</h3>
                                        </header>
                                    </article>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </section>
    
                    <!-- video -->
                    <section id="video" class="six">
                        <div class="container">

                            <header>
                                <h2>Video</h2>
                            </header>

                            <div class="video_frame"><iframe src="https://www.youtube.com/embed/RtATzEACICk?autoplay=1&modestbranding=1&rel=0&iv_load_policy=3&enablejsapi=1" frameborder="0" allowfullscreen></iframe></div>

                        </div>
                    </section>
                    
            </div>
@endsection