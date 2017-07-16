@extends('layouts.app')

@section('title', '')

@section('content')
    <!-- Main -->
            <div id="main">

                <!-- Intro -->
                    <section id="top" class="one dark cover">
                        <div class="container">

                            <header>
                                <h2 class="alt cover-text">Programming Tutorials from Beginner to Intermediate</h2>
                            </header>
<!--
                            <footer>
                                <a href="#" class="button scrolly">Magna Aliquam</a>
                            </footer>
-->
                        </div>
                    </section>

                <!-- Php -->
                @foreach($categories as $category)
                    @if($category->posts()->where('category_id', $category->id)->count() !== 0)
                        <section id="{{ strtolower($category->category_name) }}" class="wrapper-{{ strtolower($category->category_name) }}">
                            <div class="container">

                                <header>
                                    <h3><a href="{{ route('category.show', strtolower($category->category_name)) }}" class="header-tutorial">{{ $category->category_name }}</a></h3>
                                </header>

                                <div class="row">
                                    @foreach($category->posts()->where('category_id', $category->id)->get() as $p)
                                    <div class="4u 12u$(mobile)">
                                        <article class="item">
                                            <a href="{{ url(strtolower($category->category_name).'/'.str_replace(' ', '-', strtolower($p->title))) }}" class="image fit"><img src="{{ asset('dist/'.$p->thumbnail) }}" alt="{{ $p->title }}" />
                                            <header>
                                                <h3>{{ substr($p->title, 0, 30) }}</h3>
                                            </header></a>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </section>
                    @endif
                @endforeach

                <!-- About Me -->
                    <section id="about" class="six">
                        <div class="container">

                            <header>
                                <h2>Free Ebook</h2>
                            </header>


                        </div>
                    </section>

                <!-- Contact -->
                    <section id="co-footer" class="seven">
                        <div class="container">

                            <header>
                                <h2>Contact</h2>
                            </header>


                        </div>
                    </section>

            </div>
@endsection