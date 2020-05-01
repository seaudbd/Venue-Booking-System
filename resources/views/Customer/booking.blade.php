@extends('Layouts.customer_public')
@section('content')
    <div style="height: 10px;"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto">
                <div class="row">
                    @foreach($venues as $key => $venue)
                        <div class="col-12 col-sm-12 col-md-6 mb-3">
                            <div class="card" style="width:100%">
                                <img class="card-img-top" width="100%" height="350px" src="{{ asset('storage/' . explode(',', $venue->image)[0]) }}" alt="{{ $venue->venue }}">
                                <div class="card-img-overlay">
                                    <h4 class="card-title">{{ $venue->venue }}</h4>
                                    <p class="card-text">$<span style="font-size: 150%;">{{ $venue->price_per_hour }}</span>/Hour</p>
                                    @if($venue->type === 'Assembly')
                                        <a href="{{ url('customer/contact/Assembly%20Booking') }}" class="btn btn-primary">Book Now</a>
                                    @else
                                        <a href="{{ url('customer/booking/' . $venue->id) }}" class="btn btn-primary">Book Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection