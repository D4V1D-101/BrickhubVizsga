<main>
    <section class="banner bg-tertiary position-relative overflow-hidden">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <div class="block text-center text-lg-start pe-0 pe-xl-5">
                <h1 class="text-capitalize mb-4">BrickHub</h1>
                <p class="mb-4">Play and enjoy your time</p> {{-- <a type="button"
                  class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#applyLoan">See More<span style="font-size: 14px;" class="ms-2 fas fa-arrow-right"></span></a> --}}
              </div>
            </div>
            <div class="col-lg-6">
              <div class="ps-lg-5 text-center">
                <img loading="lazy" decoding="async"
                  src="{{asset('/front/images/jo.png')}}"
                  alt="banner image" class="w-100">
              </div>
            </div>
          </div>
        </div>

      </section>

      <section class="section">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="section-title pt-4">
                <p class="text-primary text-uppercase fw-bold mb-3">Up to date news</p>
                <p>Up to date news about our games</p>
              </div>
            </div>

            @if($services->isNotEmpty())
            @php
            $x=1;
            @endphp

            @foreach ( $services as $service)
            <x-service-card :service="$service" :x="$x"/>
           @php
            $x++;
          @endphp
            @endforeach
            @endif
          </div>
        </div>
      </section>
</main>
