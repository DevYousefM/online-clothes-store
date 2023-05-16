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
                <div class="content-wrapper">
                    @if (session('done_del'))
                        <p style="color: rgb(0, 188, 0);text-align:center;font-size:20px">{{ session('done_del') }}</p>
                    @endif
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ $catagory_name }}</h4>
                                </p>
                                @if (count($products) > 0)

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Image </th>
                                                    <th> Title </th>
                                                    <th> Price </th>
                                                    <th> Quantity </th>
                                                    <th> More </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $item)
                                                    <tr>
                                                        <td class="py-1">
                                                            <img src={{ asset('app/' . $item->product_img) }}
                                                                alt="image" />
                                                        </td>
                                                        <td> {{ $item->title }} </td>
                                                        <td>
                                                            ${{ $item->price }}
                                                        </td>
                                                        <td> {{ $item->quantity }} </td>
                                                        <td> <a href="{{ route('product_page', $item->id) }}">More</a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <h3 style="color: red;text-align:center;padding:20px 0">
                                        There is not products in this catagory
                                    </h3>
                                @endif

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
