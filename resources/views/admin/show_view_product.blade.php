<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        .center{
            margin: auto;
            width:50%;
            border: 1px solid white;
        }

        .font_size{
            font-size: 40px;
            text-align: center;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .pdc{
            background: skyblue;
        }
        .t_tr_colur{
            padding: 30px;
        }
    </style>

    @include('admin.css')
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

                <h1 class="font_size">Show catagories products</h1>

                <table  class="center">
                    <tr class="pdc">
                        <th class="t_tr_colur">Product title</th>
                        <th class="t_tr_colur">description</th>
                        <th class="t_tr_colur">catagories</th>
                        <th class="t_tr_colur">quantity</th>
                        <th class="t_tr_colur">price</th>
                        <th class="t_tr_colur">discount_price</th>
                        <th class="t_tr_colur">images</th>
                        <th class="t_tr_colur">Deleted</th>
                        <th class="t_tr_colur">Update</th>

                    </tr>

                   @foreach ($product as $product )
                   <tr class="text-center">
                    <td> {{ $product->title }}</td>
                    <td> {{ $product->description }}</td>
                    <td> {{ $product->catagories }}</td>
                    <td> {{ $product->quantity }}</td>
                    <td> {{ $product->price }}</td>
                    <td> {{ $product->discount_price }}</td>
                    <td> <img src="/product/{{ $product->images }}" alt="" height="300" width="300"></td>
                    <td>
                        <a class="btn btn-success" onclick=" return confirm('are you sure this ?do you want deleted data?')" href="{{ url('deleted_produc',$product->id ) }}">Deleted</a>
                    </td>

                    <td>
                        <a class="btn btn-primary" href="{{ url('update_products',$product->id) }}">Edit</a>
                    </td>


                </tr>
                   @endforeach

                </table>
            </div>
        </div>



        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.jss')

</body>

</html>
