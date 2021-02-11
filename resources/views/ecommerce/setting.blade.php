@extends('layouts.ecommerce')

@section('title')
    <title>Pengaturan - DW Ecommerce</title>
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
						<div class="col-md-12">
							<div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Informasi Pribadi</h4>
                                </div>
								<div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif

                                    <form action="{{ route('customer.setting') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control" required value="{{ $customer->name }}">
                                            <p class="text-danger">{{ $errors->first('name') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" required value="{{ $customer->email }}" readonly>
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="******">
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                            <p>Biarkan kosong jika tidak ingin mengganti password</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">No Telp</label>
                                            <input type="text" name="phone_number" class="form-control" required value="{{ $customer->phone_number }}">
                                            <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" name="address" class="form-control" required value="{{ $customer->address }}">
                                            <p class="text-danger">{{ $errors->first('address') }}</p>
                                        </div>
                                       
                                        <button class="btn btn-primary btn-sm">Simpan</button>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection


