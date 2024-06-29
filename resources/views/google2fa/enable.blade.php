@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="card card-default">
                    <h4 class="card-heading text-center mt-4">Set up Google Authenticator</h4>

                    <div class="card-body" style="text-align: center;">
                        <p>Set up your two factor authentication by scanning the barcode below. Alternatively, you can use
                            the code <strong>{{ $secret }}</strong></p>
                        <div>
                            {!! $QR_Image !!}
                        </div>
                        <p>You must set up your Google Authenticator app before continuing. You will be unable to login
                            otherwise.</p>
                        <form method="POST" action="{{ route('2fa.store') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="secret" value="{{ $secret }}">
                            <div class="form-group">
                                <label for="one_time_password" class="col-md-4 control-label">One Time Password</label>
                                <div class="col-md-6">
                                    <input id="one_time_password" type="number" class="form-control"
                                        name="one_time_password" required autofocus>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Enable 2FA</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
