<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper ">
                    @if (session('done_add'))
                        <p style="color: rgb(0, 188, 0);text-align:center;font-size:20px">{{ session('done_add') }}</p>
                    @endif
                    <div class="d-flex flex-wrap">
                        <div class="col-md-6 border grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Product Media</h4>
                                    <div class="d-flex flex-column ">
                                        @foreach ($product as $item)
                                            <img class="border" src="{{ asset('app/' . $item->product_img) }}"
                                                alt="">
                                            @if ($item->product_vid !== '')
                                                <video class="w-100 border mt-1"
                                                    src="{{ asset('app/' . $item->product_vid) }}" controls></video>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin border stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Product Details</h4>
                                    @foreach ($product as $item)
                                        <div>
                                            Product Title : <span style="color: rgb(0, 255, 0)">
                                                {{ $item->title }}</span>
                                        </div>
                                        <div class="mt-2">
                                            Product Description : <p style="color: rgb(0, 255, 0)">
                                                {{ $item->description }}
                                            </p>
                                        </div>
                                        <div class="mt-2 d-flex w-100 justify-content-evenly">
                                            <div class="text-center">
                                                Price : <br> <span style="color: rgb(0, 255, 0);font-size:20px">
                                                    ${{ $item->price }}
                                                </span>
                                            </div>
                                            <div class="text-center">
                                                Percent : <br> <span style="color: rgb(0, 255, 0);font-size:20px">
                                                    %{{ $item->percent }}
                                                </span>
                                            </div>
                                            <div class="text-center">
                                                Quantity : <br> <span style="color: rgb(0, 255, 0);font-size:20px">
                                                    {{ $item->quantity }}
                                                </span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="mt-2 d-flex justify-content-evenly">
                                            <a style="min-width: 110px" href="{{ route('edit_product', $item->id) }}"
                                                class="btn btn-success btn-fw">Edit</a>
                                            <a style="min-width: 110px" href="{{ route('del_product', $item->id) }}"
                                                class="btn btn-danger btn-fw">Delete</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')

</body>

</html>
