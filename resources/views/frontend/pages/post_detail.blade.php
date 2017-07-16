@extends('layouts.app')

@section('title', 'PHP')

@section('content')
    <!-- Main -->
            <div id="main">

                    
                        <div class="container">

                            <header>
                                <h2>{{ $posts['title'] }}</h2>
                            </header>

                            <img src="{{ asset('dist/'.$posts->thumbnail) }}" class="image featured" alt="{{ $posts['title'] }}" />

                            <p class="content-post" style="text-align: left">{!! $posts['content'] !!}</p>

                        </div>
                    

                    <!-- Php -->
                    <section id="php" class="two">
                        <div class="container">

                            <header>
                                <h2>Related Tutorials</h2>
                            </header>

                            <div class="row">
                                @foreach($related as $php)
                                <div class="4u 12u$(mobile)">
                                    <article class="item">
                                        <a href="{{ url($category->category_name, str_replace(' ', '-', strtolower($php->title))) }}" class="image fit"><img src="{{ asset('dist/'.$php->thumbnail) }}" alt="{{ $php->title }}" />
                                        <header>
                                            <h3>{{ $php->title }}</h3>
                                        </header></a>
                                    </article>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </section>
                    
            </div>
@endsection