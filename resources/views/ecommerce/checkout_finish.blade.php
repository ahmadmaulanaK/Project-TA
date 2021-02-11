@extends('layouts.ecommerce')

@section('title')
    <title>Keranjang Belanja - Arimbi Koffie</title>
@endsection

@section('content')


	<!--================Order Details Area =================-->
	<section class="order_details p_120 mt-5">
		<div class="container">
			<h3 class="title_confirmation">Terima kasih, pesanan kamu telah kami terima.<br class="text-dark">Silahkan konfirmasi pesanan ke kasir <br>jika ingin mengecek status pesanan kamu bisa login dan verfikasi email kamu terlebih dahulu </h3>
			
			<div class="row order_d_inner">
			

				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Pesanan</h4>
						<ul class="list">
							<li>
								<a href="#">
                                    <span>Invoice</span> : {{ $order->invoice }}</a>
							</li>
							<li>
								<a href="#">
                                    <span>Tanggal</span> : {{ $order->created_at }}</a>
							</li>
							<li>
								<a href="#">
									<span>total</span> : Rp {{ number_format($order->subtotal) }}
								</a>
							</li>
							
						
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="details_item">
						<h4>Informasi Pemesan</h4>
						<ul class="list">
							<li>
								<a href="#">
                                    <span>Alamat</span> : {{ $order->customer_address }}</a>
							</li>
							
							<li>
								<a href="#">
									<span>Country</span> : Indonesia</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		
	</section>
    <!--================End Order Details Area =================-->
    
@endsection