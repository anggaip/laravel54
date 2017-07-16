@extends('layouts.app')

@section('title', 'account pending')

@section('content')
    <!-- Main -->
            <div id="main">

                <!-- Intro -->
                    <section id="top" class="one dark cover">
                        <div class="container">

                            <header>
                                <h2 class="alt">Hi <strong>{{ $username }}</strong>, Thanks for registered.<br />
                                Please check your email address and verificate your account immediately</h2>
                            </header>

                            <footer>
                                <a href="#portfolio" class="button scrolly">Resend Email Verification</a>
                            </footer>

                        </div>
                    </section>

            </div>
@endsection