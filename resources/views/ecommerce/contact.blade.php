@extends('layouts.ecommerce')
@section('title')
    <title>Arimbi Koffie </title>
@endsection
@section('content')



<!-- content page -->
<section class="contact_area p_120 mt-5">
    <div class="container">
        
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="lnr lnr-home"></i>
                        <h6>Jalan Cagak, Subang</h6>
                        <p>Rest area POM Jalancagak Lt.2</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-phone-handset"></i>
                        <h6>
                            <a href="#">+62 838-2526-9708</a>
                        </h6>
                        <p>Mon to Fri 9am to 6 pm</p>
                    </div>
                    <div class="info_item">
                        <i class="lnr lnr-envelope"></i>
                        <h6>
                            <a href="#">arimbiekoffie@gmail.com</a>
                        </h6>
                        <p>Send us your query anytime!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-12 text-right">
                       
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection