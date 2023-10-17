@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    {{ __('QR Phone') }}
                    <div class="ms-auto">
                        <a href="/">QR Builder</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                     <div class="col-8">
                         <form action="{{ route('qr_phone') }}" method="POST">
                             @csrf
                             <div class="form-group">
                                 <label for="phone">Phone</label>
                                 <input type="number" name="phone" value="{{old('phone')}}" class="form-control mt-3 mb-2">
                                 @error('phone')
                                 <span class=" text-danger"></span>
                                 @enderror
                             </div>

                             <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-3">
                                 Generate QR Code
                                </button>
                             </div>

                        </form>
                     </div>

                     <div class="col-4 ">

                        @if (session ('code'))
                         {{(session ('code'))}}
                        @endif

                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div>

@endsection
