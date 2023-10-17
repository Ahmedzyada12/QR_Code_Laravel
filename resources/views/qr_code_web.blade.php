@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    {{ __('QR Web') }}
                    <div class="ms-auto">
                        <a href="/">QR Builder</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                     <div class="col-8">
                         <form action="{{ route('qr_web') }}" method="POST">
                             @csrf
                             <div class="form-group">
                                 <label for="web">Url web</label>
                                 <input type="url" name="web" value="{{old('web')}}" class="form-control mt-3 mb-2">
                                 @error('web')
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
