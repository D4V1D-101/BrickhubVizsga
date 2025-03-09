<main>
    <section class="banner bg-tertiary position-relative overflow-hidden">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
              <div class="block text-center text-lg-start pe-0 pe-xl-5">
                <h1 class="text-capitalize mb-4">BrickHub</h1>
                <p class="mb-4">Play and enjoy your time</p>
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




      <!-- sdasdasdasd -->
      <section class="banner bg-tertiaryHome position-relative overflow-hidden">
    <div class="container">
        <div class="row align-items-center justify-content-center"> <!-- 100vh magasság a középre igazításhoz -->
            <div class="col-lg-6 text-center"> <!-- text-center osztály a középre igazításhoz -->
                <div class="block">
                    <h1 class="text-capitalize mb-4 no-wrap">Download Our Launcher</h1> <!-- no-wrap osztály hozzáadása -->
                    <p class="mb-4">Play and enjoy your time</p>
                    <a href="{{ route('download.route') }}" class="btn btn-outline-primary authbutton">Download</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- asdsadasdasdasdd -->

      <section class="section">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="section-title pt-4">
                <h2 class="text-primary text-uppercase fw-bold mb-3">Our Games</h2>
                <p>Play Our Games as much as you like</p>
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
