<!DOCTYPE html>
<html lang="en">

<head>

    <base href="/public">
    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            padding-bottom: 30px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
        }

        label {
            display: inline-block;
            width: 300px;

        }

        .div_colors {
            padding-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">


                @if (session()->has('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                        {{ session()->get('message') }}
                    </div>
                @endif


                <form action="{{ url('update_product_edit', $product->id) }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="div_center">
                        <h1 class="font_size">add product</h1>

                        <div class="div_colors">
                            <label> Product : </label>
                            <input class="text_color" type="text" name="title" id=""
                                placeholder="write a product name" required value="{{ $product->title }}">
                        </div>


                        <div class="div_colors">
                            <label> Product Description: </label>
                            <input class="text_color" type="text" name="description" id="" required
                                value="{{ $product->description }}" placeholder="write a Product Description">
                        </div>
                        <div class="div_colors">
                            <label> Product Price : </label>
                            <input class=" text_color" type="number" min="0" name="product_price"
                                value="{{ $product->product_price }}" required placeholder="product Price">
                        </div>
                        <div class="div_colors">
                            <label> discounnt price : </label>
                            <input class="text_color " type="number" name="discount_price" id="" required
                                value="{{ $product->discount_price }}" placeholder="discounnt price">
                        </div>
                        <div class="div_colors">
                            <label> Product quantity: </label>
                            <input class="text_color " type="number" name="quantity" id="" required
                                value="{{ $product->quantity }}" placeholder=" quantity">
                        </div>
                        <div class="div_colors">
                            <label> Product Catagory : </label>
                            <select class="text_color" name="catagories" required>
                                <option value="{{ $product->catagories }}" selected>{{ $product->catagories }}</option>

                                @foreach ($catagori as $catagori)
                                    <option value="{{ $catagori->catagori_name }}">{{ $catagori->catagori_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>






                        <div class="div_colors" required>
                            <label> Current Product image : </label>
                            <img src="/product/{{ $product->images }}" height="300" width="300"
                                style="margin: auto" alt="">
                        </div>

                        <div class="div_colors" required>
                            <label> changes Product image : </label>
                            <input type="file" name="image">
                        </div>




                        <div class="div_colors">
                            <input type="submit" value="update products" class="btn btn-primary">
                        </div>

                    </div>
                </form>


            </div>
        </div>

        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.jss')

</body>

</html>
