@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row mt-5">
                <div class="col-lg-4">
                    <div class="card-data product">
                        <div class="row">
                            <div class="col-6"><i class="bi bi-box-seam"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Product</div>
                                <div class="card-count">{{$product_count}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-data category">
                        <div class="row">
                            <div class="col-6"><i class="bi bi-list-task"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-center align-items-end">
                                <div class="card-desc">Category</div>
                                <div class="card-count">{{ $category_count }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-data user">
                        <div class="row">
                            <div class="col-6"><i class="bi bi-people"></i></div>
                            <div class="col-6 d-flex flex-column justify-content-ce nter align-items-end">
                                <div class="card-desc">Users</div>
                                <div class="card-count">{{ $user_count }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection