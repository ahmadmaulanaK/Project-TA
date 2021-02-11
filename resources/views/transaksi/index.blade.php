@extends('layouts.admin')

@section('title')
    <title>List Product</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                List Product
                                <div class="float-right">
                                    {{-- <a href="{{ route('product.bulk') }}" class="btn btn-danger btn-sm">Mass Upload</a>
                                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Tambah</a> --}}
                                </div>
                            </h4>
                        </div>
                        <div class="card-body">
                         
                            <section class="content" id="dw">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8">
                                            @card
                                                @slot('title')
                                                
                                                @endslot
                    ​
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Produk</label>
                                                            <select name="product_id" id="product_id" class="form-control" required width="100%">
                                                                <option value="">Pilih</option>
                                                                @foreach ($products as $product)
                                                                <option value="{{ $product->id }}"> {{ $product->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        
                                                        <div class="form-group">
                                                            <label for="">Qty</label>
                                                            <input type="number" name="qty" id="qty" value="1" min="1" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-primary btn-sm">
                                                                <i class="fa fa-shopping-cart"></i> Ke Keranjang
                                                            </button>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- MENAMPILKAN DETAIL PRODUCT -->
                                                    <div class="col-md-5">
                                                        <h4>Detail Produk</h4>
                                                        <div v-if="product.name">
                                                            <table class="table table-stripped">
                                                                <tr>
                                                                    <th>Kode</th>
                                                                    <td>:</td>
                                                                    <td>@{{ product.code }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th width="3%">Produk</th>
                                                                    <td width="2%">:</td>
                                                                    <td>@{{ product.name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Harga</th>
                                                                    <td>:</td>
                                                                    <td>@{{ product.price | currency }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- MENAMPILKAN IMAGE DARI PRODUCT -->
                                                    <div class="col-md-3" v-if="product.photo" >
                                                        <img :src="'/storage/products/' + product.photo" 
                                                        height="150px" 
                                                        width="150px" 
                                                        :alt="product.name">
                                                    </div>
                                                </div>
                                                @slot('footer')
                    ​
                                                @endslot
                                            @endcard
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/accounting.js/0.4.1/accounting.min.js"></script>
    <script src="{{ asset('js/transaksi.js') }}"></script>
@endsection