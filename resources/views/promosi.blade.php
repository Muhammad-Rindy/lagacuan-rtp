@extends('layouts.master')

@section('content')
    <main class="container mb-2">
        <h6 style="text-align: center; background-color:#101010eb; padding:5px 0px">⚜️ JEDERWD - PROMOSI ⚜️
        </h6>
    </main>
    <main class="container mb-5" style="background-color:#181818; padding:20px 0px; border-radius:10px">
        <section class="container-soon">
            <header>- We're Coming Soon -</header>
            <p>
                We are excited to announce that we will be launching soon and can't wait to share our new platform with you.
            </p>
            <div class="time-content">
                <div class="time days">
                    <span class="number"></span>
                    <span class="text">days</span>
                </div>
                <div class="time hours">
                    <span class="number"></span>
                    <span class="text">hours</span>
                </div>
                <div class="time minutes">
                    <span class="number"></span>
                    <span class="text">minutes</span>
                </div>
                <div class="time seconds">
                    <span class="number"></span>
                    <span class="text">seconds</span>
                </div>
            </div>
            <div class="email-content">
                <p>Subscribe now to get the latest updates!</p>
                <div class="input-box">
                    <input type="email" placeholder="Enter your email ..." />
                    <button>Notify Me</button>
                </div>
            </div>
        </section>
    </main>
@endsection
