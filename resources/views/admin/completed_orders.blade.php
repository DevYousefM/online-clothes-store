<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')
    <style>
        .accordion-body {
            display: flex;
            flex-wrap: wrap
        }

        .accordion-body>div {
            padding: 5px;
            border: 1px solid white
        }
    </style>
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
                    @if (count($orders) > 0)
                        @foreach ($orders as $item)
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item bg-dark">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed bg-secondary text-dark" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#{{ 'flush-collapseOne' . $item->id }}"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            {{ $item->product_title }} to {{ $item->name }}
                                        </button>
                                    </h2>
                                    <div id="{{ 'flush-collapseOne' . $item->id }}" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body justify-content-center">
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    Product: {{ $item->product_title }}
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    Quantity: {{ $item->qtn }}
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    User Email: {{ $item->email }}
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    User Phone: {{ $item->phone_number }}
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    Cost: ${{ $item->total_price }}
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    Orderd At: {{ $item->created_at }}
                                                    <br>
                                                    Completed At: {{ $item->updated_at }}
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    Delivery Address: {{ $item->address }}
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    Payment Status: {{ $item->payment_status }}
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    Shipment Code: {{ $item->shipment_code }}</p>
                                                </span>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <span>
                                                    Order status: {{ $item->order_status }}</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

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
