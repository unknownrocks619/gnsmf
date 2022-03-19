@extends("layouts.app")

@section("content")
<!-- Start Welcome -->
  <section class='welcome section-content section background-parallax bg-image-1'>
    <div class='overlay'></div>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-8'>
          <h1 class='section-title'>
            We are <span class="highlight f-bold">coming</span> here soon
          </h1>
          <div class='mg-t'>
            <a href="{{ asset('images/vacancy.png') }}" target="_blank">
              <img src="{{ asset('images/vacancy.png') }}" class="img-fluid" style="height: 150px;width:150px;" />
            </a>
            <br /><br />
            <a class='btn btn-color btn-lg js-to-slide animated onstart' data-animation-delay='300' data-animation='fadeInUp' href='{{ route('index',['download'=>true]) }}'>
              Vacancy: Download Application Form
            </a>
            <a class='btn btn-outline btn-lg js-to-slide animated onstart' href="{{ route('upload_application') }}">
                Vacancy: Upload Application
                <!-- <i class='fa fa-angle-down'></i> -->
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- End Welcome -->
@endsection