@extends('master.dashboard')
@section('content')
    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">

                <!-- LEFT INTRO -->
                <div class="col-lg-3">
                    <h2 class="mb-3 section-title">Brand Network Devices</h2>
                    <p class="mb-3">
                        Vendor perangkat jaringan enterprise router, switch,
                        firewall, access point, dan optical devices.
                    </p>
                    <p>
                        <a href="#" class="btn">Explore</a>
                    </p>
                </div>

                <!-- RIGHT GRID -->
                <div class="col-lg-9">
                    <div class="row">

                        <!-- Cisco -->
                        <div class="col-6 col-md-4 mb-4">
                            <a class="product-item text-center" href="#">
                                <img src="{{ asset('assets/images/brand-cisco.png') }}" class="img-fluid product-thumbnail">
                                <h3 class="product-title">Cisco</h3>
                                <span class="icon-cross">
                                    <img src="{{ asset('assets/images/cross.svg') }}">
                                </span>
                            </a>
                        </div>

                        <!-- Aruba -->
                        <div class="col-6 col-md-4 mb-4">
                            <a class="product-item text-center" href="#">
                                <img src="{{ asset('assets/images/brand-aruba.png') }}" class="img-fluid product-thumbnail">
                                <h3 class="product-title">Aruba</h3>
                                <span class="icon-cross">
                                    <img src="{{ asset('assets/images/cross.svg') }}">
                                </span>
                            </a>
                        </div>

                        <!-- Juniper -->
                        <div class="col-6 col-md-4 mb-4">
                            <a class="product-item text-center" href="#">
                                <img src="{{ asset('assets/images/brand-juniper.png') }}"
                                    class="img-fluid product-thumbnail">
                                <h3 class="product-title">Juniper</h3>
                                <span class="icon-cross">
                                    <img src="{{ asset('assets/images/cross.svg') }}">
                                </span>
                            </a>
                        </div>

                        <!-- Huawei -->
                        <div class="col-6 col-md-4 mb-4">
                            <a class="product-item text-center" href="#">
                                <img src="{{ asset('assets/images/brand-huawei.png') }}"
                                    class="img-fluid product-thumbnail">
                                <h3 class="product-title">Huawei</h3>
                                <span class="icon-cross">
                                    <img src="{{ asset('assets/images/cross.svg') }}">
                                </span>
                            </a>
                        </div>

                        <!-- MikroTik -->
                        <div class="col-6 col-md-4 mb-4">
                            <a class="product-item text-center" href="#">
                                <img src="{{ asset('assets/images/brand-mikrotik.png') }}"
                                    class="img-fluid product-thumbnail">
                                <h3 class="product-title">MikroTik</h3>
                                <span class="icon-cross">
                                    <img src="{{ asset('assets/images/cross.svg') }}">
                                </span>
                            </a>
                        </div>

                        <!-- Fortinet -->
                        <div class="col-6 col-md-4 mb-4">
                            <a class="product-item text-center" href="#">
                                <img src="{{ asset('assets/images/brand-fortinet.png') }}"
                                    class="img-fluid product-thumbnail">
                                <h3 class="product-title">Fortinet</h3>
                                <span class="icon-cross">
                                    <img src="{{ asset('assets/images/cross.svg') }}">
                                </span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Product Section -->
@endsection
