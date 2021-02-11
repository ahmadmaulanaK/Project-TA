@extends('layouts.ecommerce')

@section('title')
    <title>Dashboard - Arimbi Koffie</title>
@endsection

@section('content')


	<!--================Login Box Area =================-->
	<section class="login_box_area p_120 mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					@include('layouts.ecommerce.module.sidebar')
				</div>
				<div class="col-md-9">
                    <div class="row">
						<div class="col-md-4">
							<div class="card text-center">
								<div class="card-body">
									<h3>Belum Dibayar</h3>
									<hr>
									<p>Rp {{ number_format($orders[0]->pending) }}</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card text-center">
								<div class="card-body">
									<h3>Proses</h3>
									<hr>
									<p>{{ $orders[0]->shipping }} Pesanan</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card text-center">
								<div class="card-body">
									<h3>Selesai</h3>
									<hr>
									<p>{{ $orders[0]->completeOrder }} Pesanan</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection