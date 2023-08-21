<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')

    <style>
        .div_center {
            text-align: center;
            margin-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            margin-bottom: 40px
        }

        .input_collor {
            color: black;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid white;
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

                <div class="div_center">
                    <div class="h2_font"> Catagory</div>

                    <form action="{{ url('/add_catagory') }}" method="POST">
                        @csrf
                        <input class="input_collor" type="text" name="catagory" placeholder="name">
                        <input type="submit" value="add catagori" class="btn btn-primary">
                    </form>
                </div>

                <table class="center">
                    <tr>
                        <td>catagory name </td>
                        <td>action </td>
                    </tr>

                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->catagori_name }}</td>
                            <td>
                                <a onclick="return confirm('are you sure deleted this? ')" class="btn btn-danger fa fa-trash"
                                    href="{{ url('deleterd_catagory', $data->id) }}"> Deleted
                                {{-- <i class="fa fa-trash" aria-hidden="true"></i> --}}
                            </a>
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
