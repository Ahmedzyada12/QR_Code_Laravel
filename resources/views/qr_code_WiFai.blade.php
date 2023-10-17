@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    {{ __('QR Wifi') }}
                    <div class="ms-auto">
                        <a href="/">QR Builder</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                     <div class="col-12 text-center">

                         {{

                          QrCode::wiFi([
                            'encryption' => 'WPA2',
                            'ssid' => 'Zy',
                            'password' => 'Zyada22222',
                            'hidden' => true
                        ]);

                        }}
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

@endsection
