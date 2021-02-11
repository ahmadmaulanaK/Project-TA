@extends('layouts.ecommerce')

@section('title')
    <title>Arimbi Koffie </title>
@endsection

@section('content')
 

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap mt-4">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                          
                        </div>
                        <div class="right_page ml-auto">
                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="latest_product_inner row">
                        @forelse ($products as $row)
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="f_p_item">
                                <div class="f_p_img ">
                                    <img class="img-fluid" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
                                    <div class="p_icon">
                                        <form action="{{ route('front.cart') }}" method="POST">
                                            @csrf
                                            
                                            <input type="hidden" value="1" id="quantity" name="qty">
                                            <input type="hidden" name="product_id" value="{{ $row->id }}" >
                                                
                                                    <button class="main_btn btn-success btn-sm"> <i class="lnr lnr-cart"></i></button>
                                                
                                        </form>
                                       
                                    </div>
                                </div>
                               
                               
                                <a href="{{ url('/product/' . $row->slug) }}">
                                    <h4>{{ $row->name }}</h4>
                                </a>
                                <h5>Rp {{ number_format($row->price) }}</h5>
                            </div>
                        </div>
                        @empty
                        <div class="col-md-12">
                            <h3 class="text-center">Tidak ada produk</h3>
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title">
                                <h3>Kategori Produk</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list" >
                                    @foreach ($categories as $category)
                                    <li>
                                        <strong><a href="{{ url('/category/' . $category->slug) }}">{{ $category->name }}</a></strong>
                                        
                                        @foreach ($category->child as $child)
                                        <ul class="list" style="display: block">
                                            <li>
                                                <a href="{{ url('/category/' . $child->slug) }}">{{ $child->name }}</a>
                                            </li>
                                        </ul>
                                        @endforeach
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

            <div class="row">
                {{ $products->links() }}
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->
@endsection