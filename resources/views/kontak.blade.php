@extends('layouts.user.user')

@section('content')
    <div class="container-fluid my-2">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24102698534!2d106.74694491428927!3d-6.229740081348354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1717480961642!5m2!1sid!2sid"
            width="1475" height="350" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <section class="contact_area section_gap_bottom my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact_info">
                        <div class="info_item d-flex align-items-center">
                            <i class="fas fa-home mx-4" style="font-size: 20px;color:#ff084e"></i>
                            <div>
                                <h6>Indonesia, Jakarta</h6>
                                <p>Jl.test, RT.02/RW.04, Desa test, Kec.test, Kab.test, Jakarta, ID 56283</p>
                            </div>
                        </div>
                        <div class="info_item d-flex align-items-center mb-3">
                            <i class="fas fa-phone mx-4" style="font-size: 20px;color:#ff084e"></i>
                            <div>
                                <h6><a href="#">+62 812-2798-9797</a></h6>
                            </div>
                        </div>
                        <div class="info_item d-flex align-items-center">
                            <i class="fas fa-envelope mx-4" style="font-size: 20px;color:#ff084e"></i>
                            <div>
                                <h6><a href="#">younique@gmail.com</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
