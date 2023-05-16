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
                    @if (session('done_add'))
                        <p style="color: rgb(0, 188, 0);text-align:center;font-size:20px">{{ session('done_add') }}</p>
                    @endif
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Product</h4>
                                <form class="forms-sample" action="{{ route('store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @error('title')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <div class="form-group color">
                                        <label for="exampleInputName1">Name</label>
                                        <input value="{{ old('title') }}" type="text" name="title"
                                        style="color: white !important"
                                            class="form-control" id="exampleInputName1" placeholder="Product name">
                                    </div>
                                    @error('description')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <div class="form-group color">
                                        <label for="exampleTextarea1">Description</label>
                                        <textarea style="color: white !important" value="{{ old('description') }}" class="form-control" name="description" placeholder="Product description"
                                            id="exampleTextarea1" rows="4"></textarea>
                                    </div>
                                    @error('price')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <div class="form-group color">
                                        <label for="exampleInputName1">Price</label>
                                        <input style="color: white !important" value="{{ old('price') }}" type="number" class="form-control"
                                            id="exampleInputName1" placeholder="Price" name="price">
                                    </div>
                                    @error('percent')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <div class="form-group color">
                                        <label for="exampleInputName1">Percent</label>
                                        <input style="color: white !important" value="{{ old('percent') }}" type="number" class="form-control"
                                            id="exampleInputName1" placeholder="Percent" name="percent">
                                    </div>
                                    @error('quantity')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <div class="form-group color">
                                        <label for="exampleInputName1">Quantity</label>
                                        <input style="color: white !important" value="{{ old('quantity') }}" type="number" class="form-control"
                                            id="exampleInputName1" placeholder="Quantity" name="quantity">
                                    </div>
                                    @if (session('cata'))
                                        <label style="color: red">{{ session('cata') }}</label>
                                    @endif
                                    <div class="form-group color">
                                        <label for="exampleSelectGender">Catagory</label>
                                        <select style="color: white !important" name="catagory" style="color: rgba(255, 255, 255, 0.472)"
                                            class="form-control" id="exampleSelectGender">
                                            <option style="color: white" selected>Select...</option>
                                            @foreach ($catagories as $item)
                                                <option style="color: white">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('product_image')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <div class="form-group color">
                                        <label>Uplaod Image</label>
                                        <div class="input-group col-xs-12">
                                            <input style="color: white !important" type="file" name="product_image"
                                                class="form-control file-upload-info">
                                        </div>
                                    </div>
                                    @error('product_video')
                                        <label style="color: red">{{ $message }}</label>
                                    @enderror
                                    <div class="form-group color">
                                        <label>Upload Video</label>
                                        <div class="input-group col-xs-12">
                                            <input style="color: white !important" type="file" name="product_video"
                                                class="form-control file-upload-info">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </form>
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
