@extends('layouts.main')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-11 mx-auto">
                <section class="edica-404">
                    <h1 class="page-title aos-init aos-animate" data-aos="fade-up">404</h1>
                    <h5 class="edica-404-subtitle aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">Page not found!</h5>
                    <p class="edics-404-text aos-init" data-aos="fade-up" data-aos-delay="200">Oops! The page you are looking for does not exist.It might have been moved or deleted.</p>
                    <a href="{{ route('home') }}" class="edica-404-link btn btn-warning aos-init" data-aos="fade-up" data-aos-delay="300">Go BAck</a>
                </section>
            </div>
        </div>
    </div>
</main>
@endsection
