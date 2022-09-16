@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Sesión Iniciada Correctamente') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('Sesión Iniciada Correctamente') }} <br> --}}
                    <center>
                        <img src="imagen/WhatsApp Image 2022-07-13 at 11.43.23 AM.jpeg" style="width:250px ">
                    </center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
