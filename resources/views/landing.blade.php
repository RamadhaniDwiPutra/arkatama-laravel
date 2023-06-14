<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Warpass.id</title>
        <!-- Link Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico')}}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

        <style>

    h1 {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .filter-container {
        background-color: #d7ecdf;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .filter-container input[type="text"] {
        border: 1px solid #030303;
        border-radius: 3px;
        padding: 8px 12px;
        font-size: 16px;
    }

    .filter-container button[type="submit"] {
        background-color: #007bff;
        border: none;
        color: #fff;
        border-radius: 3px;
        padding: 8px 12px;
        font-size: 16px;
        cursor: pointer;
    }
</style>
</head>

    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Warpass.id</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item" href="{{ route('landing', ['category' => $category->name]) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-light ms-1">
                                <i class="bi-person-fill me-1"></i>
                                Dashboard
                            </a>
                        @endauth
    
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-outline-light ms-1">
                                <i class="bi-person-fill me-1"></i>
                                Login
                            </a>
                        @endguest
                    </form>
                </div>
            </div>
        </nav>
        <!-- Carousel-->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $slider)
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
                        aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                        {{-- cek apakah slider memiliki image --}}
                        @if ($slider->image)
                            <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100" style="height: 500px" alt="{{ $slider->image }}">
                        @else
                            <img src="{{ asset('images/default-slider.png') }}" class="d-block w-100" alt="default-image">
                        @endif
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->title }}</h5>
                            <p>{{ $slider->caption }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <form action="{{ route('landing') }}" method="GET">
                    @csrf
                    <h1>Filter Harga</h1>
                    <div class="row g-3 my-4 filter-container">
                        <div class="col-sm-3 d-flex justify-content-center">
                            <input type="text" class="form-control" placeholder=" Harga Min" name="min" value="{{ old('min') }}">
                        </div>
                        <div class="col-sm-3 d-flex justify-content-center">
                            <input type="text" class="form-control" placeholder="Harga Max" name="max" value={{ old('max') }}>
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Terapkan</button>
                        </div>
                    </div>
                </form>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
    
                    @forelse ($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            @if ($product['sale_price'] != 0)
                                <!-- Sale badge-->
                                <div class="badge bg-success text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            @endif

                            <!-- Product image-->
                            {{-- Cek apakah product memiliki image --}}
                            @if ($product->image)
                                <img class="card-img-top" src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}" />
                            @else
                                <img class="card-img-top" src="{{ asset('images/default-product.png') }}" alt="default-image" />
                            @endif

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a href="{{ route('product.show', ['id' => $product->id]) }}" style="text-decoration: none" class="text-dark">
                                        <small class="text-strong">{{ $product->category->name }}</small>
                                        <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    </a>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for ($i = 0; $i < $product->rating; $i++)
                                            <div class="bi-star-fill"></div>
                                        @endfor
                                    </div>
                                    <!-- Product price-->
                                    @if ($product['sale_price'] != 0)
                                        <span class="text-muted text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                                        Rp.{{ number_format($product->sale_price, 0) }}
                                    @else
                                        Rp.{{ number_format($product->price, 0) }}
                                    @endif
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('login') }}"><i class="bi bi-whatsapp"> </i>Pesan Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-secondary w-100 text-center" role="alert">
                        <h4>Produk belum tersedia</h4>
                    </div>
                @endforelse
                </div>
            </div>
        </section>
        <!--footer-->
        <footer class="bg-dark text-white pt-5 pb-4">
            <div class="container text-md-left">
                <div class="row text-md-left">
                    
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Warpass.id</h5>
                        <p>Warpass.id merupakan sebuah website penjualan sepatu yang mengkhususkan diri pada produk-produk lokal.</p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Sepatu</a>
                    </p>
                    <p>
                        <a href="#" class="text-white" style="text-decoration: none">Tote Bag</a>
                    </p>
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful Links</h5>
                        <p>
                            <a href="#" class="text-white" style="text-decoration: none">Home</a>
                        </p>
                        <p>
                            <a href="#" class="text-white" style="text-decoration: none">About</a>
                        </p>
                        <p>
                            <a href="#" class="text-white" style="text-decoration: none">Products</a>
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                        <p>
                            <i class="fas fa-home mr-3"></i > Depok
                        </p>
                        <p>
                        <i class="fas fa-envelope mr-3"></i > Warpass.id@gmail.com
                        </p>
                        <p>
                            <i class="fas fa-phone mr-3"></i > 012345678908
                        </p>
                        <p>
                            <i class="fa fa-print mr-3"></i > +16 4759 3245 17
                        </p>
                    </div>
                </div>

                <hr class="mb-4">
                <div class="row align-items-center"></div>
                <div class="col-md-7 col-lg-8">
                    <p> Copyright &copy; 2020 All rights reserved by:
                            <a href="#" style="text-decoration: none">
                                <strong class="text-warning">Warpass.id</strong>
                        </a></p>
                </div>

                <div class="col-md-5 col-lg-4">
                    <div class="text-md-right">

                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab
                            fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab
                            fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab
                            fa-google-plus"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab
                            fa-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab
                            fa-youtube"></i></a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>