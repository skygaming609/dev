@extends('layouts.mainPublic')
{{-- azmi --}}
@section('title', 'Welcome')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url({{ asset('images/' . $slider1) }})">
                <div class="carousel-container">
                    <div class="container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__zoomIn">Selamat Datang<span> di Website Desa Padamukti</span></h2>
                            <p class="animate__animated animate__fadeInUp">Selamat datang di portal informasi Desa Padamukti.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url({{ asset('images/' . $slider2) }})">
                <div class="carousel-container">
                    <div class="container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__zoomIn">Tentang Desa</h2>
                            <p class="animate__animated animate__fadeInUp">Beberapa informasi tentang Desa Padamukti.</p>
                            <a href="#about" class="btn-get-started animate__animated animate__jackInTheBox scrollto">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url({{ asset('images/' . $slider2) }})">
                <div class="carousel-container">
                    <div class="container">
                        <div class="carousel-content">
                            <h2 class="animate__animated animate__zoomIn">Berita Desa</h2>
                            <p class="animate__animated animate__fadeInUp">Tinjau berita terbaru dari Desa Padamukti.</p>
                            <a href="#berita" class="btn-get-started animate__animated animate__jackInTheBox scrollto">Lihat Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
  </section>
  


  <section id="featured-services" class="featured-services section-bg">
    <div class="container">

        <div class="row no-gutters">
          @foreach ($demografi as $item)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="icon-box text-center">
                <div class="icon mb-3"><img src="/image/baby.png" style="max-width: 65px;" alt="Kelahiran"></div>
                <h2 class="title"><a href="">{{ $item->angka_kelahiran }}</a></h2>
                <p class="description">Kelahiran</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
              <div class="icon-box text-center">
                <div class="icon mb-3"><img src="/image/kematian.png" style="max-width: 65px;" alt="Kelahiran"></div>
                  <h2 class="title"><a href="">{{$item->angka_kematian}}</a></h2>
                  <p class="description">Kematian</p>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
              <div class="icon-box text-center">
                <div class="icon mb-3"><img src="/image/penduduk.png" style="max-width: 65px;" alt="Kelahiran"></div>
                  <h2 class="title"><a href="">{{ $item->jumlah_penduduk }}</a></h2>
                  <p class="description">Jumlah Penduduk</p>
              </div>
          </div>
          @endforeach
            
        </div>

    </div>
  </section>

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about">
    <div class="container">
      <div class="section-title">
        <h2 class="text-dark">Tentang Desa</h2>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="content text-start">
            <p>
              {!! $tentang_desa !!}
            </p>
            <a href="{{ route('tentang-desa') }}" class="btn btn-success d-inline-flex align-items-center mt-3">
              Lanjutkan Membaca <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6 text-center mb-5">
          <img src="green/assets/img/slider 3.jpg" alt="Tentang Desa" class="img-fluid w-80" style="margin-top: 20px;">
        </div>
      </div>
      <hr>
        <div id="berita" class="berita">
        <div class="section-title mt-5">
          <h2 class="text-dark">Berita Desa</h2>
        </div>

        <div class="row">
      @foreach($berita as $key => $item)
          <div class="col-md-6 mb-4">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  @if($key % 2 == 0)
                      <div class="col p-4 d-flex flex-column position-static text-start">
                          <h3 class="mb-0" style="font-size: 1.5em; font-weight: bold; color: #000;">{{ $item->judul }}</h3>
                          <div class="mb-1 text-body-secondary">
                              {{ optional($item->created_at)->format('M Y') }}
                          </div>
                          <p class="card-text mb-auto">{{ $item->deskripsi }}</p>
                          <a href="{{ route('berita.detailBerita', $item->id) }}" class="icon-link gap-1 icon-link-hover stretched-link">Lanjutkan Membaca</a>
                      </div>
                      <div class="col-auto d-none d-lg-block">
                          <img src="{{ asset('images/' . $item->image) }}" alt="Berita" width="250" height="250" class="img-fluid rounded-start">
                      </div>
                  @else
                      <div class="col-auto d-none d-lg-block">
                          <img src="{{ asset('images/' . $item->image) }}" alt="Berita" width="250" height="250" class="img-fluid rounded-start">
                      </div>
                      <div class="col p-4 d-flex flex-column position-static text-start">
                          <h3 class="mb-0" style="font-size: 1.5em; font-weight: bold; color: #000;">{{ $item->judul }}</h3>
                          <div class="mb-1 text-body-secondary">
                              {{ optional($item->created_at)->format('M Y') }}
                          </div>
                          <p class="card-text mb-auto">{{ $item->deskripsi }}</p>
                          <a href="{{ route('berita.detailBerita', $item->id) }}" class="icon-link gap-1 icon-link-hover stretched-link">Lanjutkan Membaca</a>
                      </div>
                  @endif
              </div>
          </div>
      @endforeach
</div>



        {{-- <div class="text-end">
          <a href="{{ route('berita-desa') }}" class="btn btn-success">
            Lihat Semua Berita 
            <i class="bi bi-arrow-right"></i>
          </a>
        </div>
      </div> --}}
      <hr class="mt-5">

      <div class="section-title mt-5">
        <h2>Pengumuman Desa</h2>
      </div>

      @foreach($pengumuman as $item)
      <div class="card text-start mb-3">
        <div class="card-body">
          <h5 class="card-title" style="font-size: 1.5em; font-weight: bold; color: #000;">
            <a href="{{ route('pengumuman.detailPengumuman', $item->id) }}" class="mb-0">{{ $item->judul }}</a>
          </h5>
                    <img src="{{ asset('images/' . $item->image) }}" alt="Gambar Pengumuman" width="250" height="200">

            <p class="card-text mb-auto">{!! (strlen($item->deskripsi) > 200) ? substr($item->deskripsi, 0, 200) . '...' : $item->deskripsi !!}</p>
          {{-- <p class="card-text">{{ $item->deskripsi }}</p> --}}
        </div>
      </div>
      @endforeach
      <hr class="mt-5">

      <div class="section-title mt-5">
        <h2>Lokasi Desa</h2>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15832.109101662118!2d107.80800175113826!3d-7.237728148650926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68bad158ba1a2d%3A0xe5259a25a206e508!2sPadamukti%2C%20Sukaresmi%2C%20Garut%20Regency%2C%20West%20Java!5e0!3m2!1sen!2sid!4v1719412487022!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Section -->

  <!-- Modal Login -->
  {{-- <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLoginLabel">Masuk ke Akun Anda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form login bisa Anda tambahkan di sini -->
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- End Modal Login -->
  <!-- Tombol Login -->
  <!-- End Tombol Login -->

@endsection
