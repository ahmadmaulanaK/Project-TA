@extends('layouts.admin')

@section('title')
    <title>Detail pesanannn</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">View Order</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Detail pesanan

                                
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Detail Pelanggan</h4>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th width="30%">Nama Pelanggan</th>
                                            <td>{{ $order->customer_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telp</th>
                                            <td>{{ $order->customer_phone }}</td>
                                        </tr>
                                     
                                        <tr>
                                            <th>Order Status</th>

                                            <td>
                                                
                                                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                                                    @csrf
                                                    
                                                    <div class="input-group mb-3 c float-right">
                                                        <select name="status" class="form-control mr-3">
                                                        <option value="">{!! $order->status_label !!}</option>
                                                            <option value="0">Baru</option>
                                                            <option value="1">Confirm</option>
                                                            <option value="2">Proses</option>        
                                                            <option value="4">Selesai</option>
                                                        </select>
                                                        
                                                        <div class="input-group-append">
                                                            <button class="btn btn-success" type="submit">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>


                                        </tr>
                                      
                                    </table>
                                </div>
                                
                                <div class="col-md-12">
                                    <h4>Detail Produk</h4>
                                    <table class="table table-borderd table-hover">
                                        <tr>
                                            <th>Produk</th>
                                            <th>Quantity</th>
                                            <th>Harga</th>
                                            <th>Berat</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        @foreach ($order->details as $row)
                                        <tr>
                                            <td>{{ $row->product->name }}</td>
                                            <td>{{ $row->qty }}</td>
                                            <td>Rp {{ number_format($row->price) }}</td>
                                            <td>{{ $row->weight }} gr</td>
                                            <td>Rp {{ $row->qty * $row->price }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
