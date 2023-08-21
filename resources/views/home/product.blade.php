<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @foreach ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                        <div class="option_container">
                            <div class="options">
                                <a href="" class="option1">
                                    {{ $products->title }}
                                </a>
                                <a href="" class="option2">
                                    Buy Now
                                </a>
                            </div>
                        </div>
                        <div class="img-box">
                            <img src="/product/{{ $products->images }}" alt="images" height="300" width="300">
                        </div>
                        <div class="detail-box">
                            <h5>
                                {{ $products->title }}
                            </h5>

                            @if ($products->discount_price != null)
                                <div>

                                    <h6 style="color:red">
                                        discount price <br>
                                        <span>$</span>
                                        {{ $products->discount_price }}
                                    </h6>
                                </div>


                                <div>
                                    price <br>
                                    <h6 style="text-decoration-line: line-through; color:blue;">
                                        <span>$</span>
                                        {{ $products->price }}

                                    </h6>
                                </div>
                            @else
                                <div>
                                    <h6 style="color: green">
                                        price <br>
                                        <span>$</span>
                                        {{ $products->price }}

                                    </h6>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            @endforeach

                {{-- <span style="padding-left: 20px"> --}}
                {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}


        </div>
</section>
