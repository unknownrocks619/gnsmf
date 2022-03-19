@extends("layouts.app")

@section("content")
<!-- Start Welcome -->
  <section class='welcome section-content section background-parallax bg-image-1'>
    <div class='overlay'></div>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-12'>
          <h1 class='section-title'>
            We are <span class="highlight f-bold">coming</span> here soon
          </h1>
          <div id='clock'></div>
          <div class='mg-t'>
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

<!-- Personal Detail -->
<!-- Start About -->
<section class='about section background-parallax bg-image-2'>
        <div class='overlay'></div>
        <div class='container'>
          <div class='row'>
            <div class='col-sm-12'>
              <div class='hero-content'>
                <h1 class='section-title text-left animated' data-animation-delay='0' data-animation='fadeInUp'>
                  Upload Application Form
                </h1>
              </div>
              <div class='row'>
                <div class='col-sm-6'>
                  <div class='mg-b'>
                    <p class='animated' data-animation-delay='100' data-animation='fadeInUp'>
                      Before Starting your online application form submission please watch video on how to 
                      upload online application form from below button.
                    </p>
                  </div>
                  <a class='btn btn-outline btn-lg js-link-video animated' data-animation-delay='200' data-animation='fadeInUp' data-slide='4' href='http://www.youtube.com/watch?v=Zs8T-FCEvXg'>
                    Watch Video
                    <i class="fa fa-eye" aria-hidden="true"></i>
                  </a>
                  <a href="{{ route('personal_info') }}" class='btn btn-primary btn-lg js-link-video animated'>
                    Start Application Form
                    <i class="fa fa-play" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End About -->
<!-- End Personal Detail -->
@endsection