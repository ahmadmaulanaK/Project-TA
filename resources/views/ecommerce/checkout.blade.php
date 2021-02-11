@extends('layouts.ecommerce')

@section('title')
    <title>Checkout - Arimbi Koffie</title>
@endsection

@section('content')
  

	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap mt-5">
		<div class="container">
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
                        <h3>Informasi Pengiriman</h3>
                        
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        
                        <form class="row contact_form" action="{{ route('front.store_checkout') }}" method="post" novalidate="novalidate">
                            @csrf
                        <div class="col-md-12 form-group p_star">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" id="first" name="customer_name" required>
                            <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">No Telp</label>
                            <input type="text" class="form-control" id="number" name="customer_phone" required>
                            <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                   
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label for="">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="add1" name="customer_address" required>
                            <p class="text-danger">{{ $errors->first('customer_address') }}</p>
                        </div>
                        
                       
                     
                     
                    
					</div>
					<div class="col-lg-4">
						<div class="order_box">
							<h2>Ringkasan Pesanan</h2>
							<ul class="list">
								<li>
									<a href="#">Product
										<span>Total</span>
									</a>
                                </li>
                                @foreach ($carts as $cart)
								<li>
									<a href="#">{{ \Str::limit($cart['product_name'], 10) }}
                                        <span class="middle">x {{ $cart['qty'] }}</span>
                                        <span class="last">Rp {{ number_format($cart['product_price']) }}</span>
									</a>
                                </li>
                                @endforeach
							</ul>
							<ul class="list list_2">
								<li>
									<a href="#">Subtotal
                                        <span>Rp {{ number_format($subtotal) }}</span>
									</a>
								</li>
							
								<li>
									<a href="#">Total
										<span id="total">Rp {{ number_format($subtotal) }}</span>
									</a>
								</li>
							</ul>
                            <button class="main_btn">Bayar Pesanan</button>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->
@endsection

@section('js')
    <script>
        $('#province_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){
                    
                    $('#city_id').empty()
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })

        $('#city_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/district') }}",
                type: "GET",
                data: { city_id: $(this).val() },
                success: function(html){
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                    $.each(html.data, function(key, item) {
                        $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })

        $('#district_id').on('change', function() {
            $('#courier').empty()
            $('#courier').append('<option value="">Loading...</option>')
            $.ajax({
                url: "{{ url('/api/cost') }}",
                type: "POST",
                data: { destination: $(this).val(), weight: $('#weight').val() },
                success: function(html){
                    $('#courier').empty()
                    $('#courier').append('<option value="">Pilih Kurir</option>')
                    $.each(html.data.results, function(key, item) {
                        let courier = item.courier + ' - ' + item.service + ' (Rp '+ item.cost +')'
                        let value = item.courier + '-' + item.service + '-'+ item.cost
                        $('#courier').append('<option value="'+value+'">' + courier + '</option>')
                    })
                }
            });
        })

        $('#courier').on('change', function() {
            let split = $(this).val().split('-')
            $('#ongkir').text('Rp ' + split[2])

            let subtotal = "{{ $subtotal }}"
            let total = parseInt(subtotal) + parseInt(split['2'])
            $('#total').text('Rp' + total)
        })
    </script>
@endsection