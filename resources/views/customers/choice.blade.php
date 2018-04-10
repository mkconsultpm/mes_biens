@extends('layouts.main')

@section('content')

    <section class="dashboard-counts no-padding-bottom">
        <div class="container-fluid">

            <div class="row">

                <div class="col-md-5 bg-white has-shadow" style="padding: 10px">

                    <div class="col-md-12">
                        <h1><span class="icon bg-danger"><i class="icon-user"></i></span> Demande</h1>
                        <a href="{{ route('demands.create', ['id' => $customer->id, 'type' => 'Buy']) }}"><img class="img-fluid" src="{{ asset('images/offer.png') }}" alt=""></a>
                        <a href="{{ route('demands.create', ['id' => $customer->id, 'type' => 'Rent']) }}"><img class="img-fluid" src="{{ asset('images/offer.png') }}" alt=""></a>
                    </div>

                </div>

                <div class="col-md-2"></div>

                <div class="col-md-5 bg-white has-shadow" style="padding: 10px">

                    <div class="col-md-12">
                        <h1><span class="icon bg-success"><i class="icon-user"></i></span> Offre</h1>
                        <a href="{{ route('offers.create', ['id' => $customer->id, 'type' => 'Sell']) }}"><img class="img-fluid" src="{{ asset('images/offer.png') }}" alt=""></a>
                        <a href="{{ route('offers.create', ['id' => $customer->id, 'type' => 'Rent']) }}"><img class="img-fluid" src="{{ asset('images/offer.png') }}" alt=""></a>
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection