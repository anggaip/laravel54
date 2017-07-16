@extends('layouts.app')

@section('title', 'PHP')

@section('content')
    <!-- Main -->
            <div id="main">

                <!-- Php -->
                    <section id="php" class="two">
                        <div class="container">

                            <header>
                                <h2>{{ $category->category_name }}</h2>
                            </header>

                            <div class="row">
                                @foreach($posts as $post)
                                <div class="4u 12u$(mobile)">
                                    <article class="item">
                                        <a href="{{ url(strtolower($category->category_name).'/'.str_replace(' ', '-', strtolower($post->title))) }}" class="image fit"><img src="{{ asset('dist/'.$post->thumbnail) }}" alt="{{ $post->title }}" />
                                        <header>
                                            <h3>{{ $post->title }}</h3>
                                        </header></a>
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

                            <div class="video_frame"><iframe src="https://www.youtube.com/embed/RtATzEACICk?autoplay=0&modestbranding=1&rel=0&iv_load_policy=3&enablejsapi=1" frameborder="0" allowfullscreen></iframe></div>

                            <iframe src="//www.dailymotion.com/embed/video/x5dxlkf?api=postMessage&id=player&syndication=lr:175160&autoplay=0&info=0&logo=0&related=0&social=0" width="480" height="270" frameborder="0" allowfullscreen></iframe>

                        </div>
                    </section>
                    
            </div>
@endsection