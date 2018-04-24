@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ( count(Auth::user()->roles)==0)
                      Debe ser autorizado por un administrador
                    @else
                      Guía de usuario.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
