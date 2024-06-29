@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- <a href="{{ route('2fa.enable') }}" class="btn btn-primary">
                            Enable 2FA
                        </a>

                        <a href="{{ route('2fa.disable') }}" class="btn btn-danger">
                            Disable 2FA
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
