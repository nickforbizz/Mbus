@extends('layouts.webfront')

@section('content')

      <div class="container" style="margin-top:30px">
        <div class="row">
          <div class="col-sm-4">
            <div class="card" style="">
                <img class="card-img-top" src="{{ asset('web_assets/images/gallery_1.jpg') }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text.</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
            <hr class="d-sm-none">
          </div>
          <div class="col-sm-8">
            <h2>Get Your Ticket</h2>
            <h5>Dated, {{ \Carbon\Carbon::now()->diffForHumans() }}</h5>
            <div class="card p-4" style="">
                <form>
                    <div class="input-group mb-3 input-group-sm">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Ticket Number</span>
                        </div>
                        <input type="text" value="2" class="form-control" disabled>
                    </div>
                </form>
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text.</p>
                    <a href="#" class="btn btn-primary">See Profile</a>
                </div>
            </div>
            <br>

          </div>
        </div>
        {{-- @foreach ($busroute as $bsroute)
            <li>{{ $bsroute->name }}</li>
        @endforeach --}}
        {{ $busroute }}
        <hr>
        {{ $col_ticket }}
      </div>
@endsection
