@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    {{ __('QR Builder') }}

                    <div class="ms-auto">
                        <a href="/">QR Builder</a>
                        <a href="{{ route('phone_page')}}">Phone</a>
                        <a href="{{ route('webpage')}}">Web</a>
                        <a href="{{ route('wifipage')}}">Wifi</a>
                    </div>

                </div>

                @if (session ('status'))
                    <div class=" text-center alert alert-danger mt-3">
                        {{session('status')}}
                    </div>
                @endif

                <div class="card-body">
                   <div class="row">

                    <div class="col-8">
                        <form action="{{ route('qr_builder') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control mt-3 mb-2">
                                @error('name')
                                <span class=" text-danger"></span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                             <textarea type="text" name="body" value="{{old('body')}}" class="form-control mt-3" cols="30" rows="7">

                            </textarea>
                                 {{-- <input type="text" name="body" value="{{old('body')}}" class="form-control mt-3"> --}}
                                @error('body')
                                <span class=" text-danger"></span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="qr_size" class="mt-3">QR_Size</label>
                                        <select name="qr_size"  class="form-control mt-3 mb-2">
                                            <option value="">Select Size</option>
                                            <option value="300">300x300</option>
                                            <option value="600">600x600</option>
                                            <option value="900">900x900</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-4">

                                    <div class="form-group">
                                        <label for="qr_correction" class="mt-3">QR_Correction</label>
                                        <select name="qr_correction"  class="form-control mt-3 mb-2">
                                            <option value="">Select QR_Correction</option>
                                            <option value="L">7%</option>
                                            <option value="M">15% </option>
                                            <option value="Q">25%</option>
                                            <option value="H">30%</option>
                                        </select>
                                    </div>


                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="qr_encoding" class="mt-3">QR_Encodin</label>
                                        <select name="qr_encoding"  class="form-control mt-3 mb-2">
                                            <option value="">Select QR_Encodin<</option>
                                            <option value="ISO-8859-1">ISO-8859-1</option>
                                            <option value="ISO-8859-2">ISO-8859-2</option>
                                            <option value="ISO-8859-3">ISO-8859-3</option>
                                            <option value="ISO-8859-4">ISO-8859-4</option>
                                            <option value="ISO-8859-5">ISO-8859-5</option>
                                            <option value="ISO-8859-6">ISO-8859-6</option>
                                            <option value="ISO-8859-7">ISO-8859-7</option>
                                            <option value="ISO-8859-8">ISO-8859-8 </option>
                                            <option value="ISO-8859-9">ISO-8859-9 </option>
                                            <option value="ISO-8859-10">ISO-8859-10 </option>
                                            <option value="ISO-8859-11">ISO-8859-11 </option>
                                            <option value="ISO-8859-12">ISO-8859-12</option>
                                            <option value="ISO-8859-13">ISO-8859-13 </option>
                                            <option value="ISO-8859-14">ISO-8859-14 </option>
                                            <option value="ISO-8859-15">ISO-8859-15</option>
                                            <option value="ISO-8859-16">ISO-8859-16</option>
                                            <option value="SHIFT-JIS">SHIFT-JIS</option>
                                            <option value="WINDOWS-1250">WINDOWS-1250</option>
                                            <option value="WINDOWS-1251">WINDOWS-1251</option>
                                            <option value="WINDOWS-1252">WINDOWS-1252</option>
                                            <option value="WINDOWS-1256">WINDOWS-1256</option>
                                            <option value="UTF-16BE">UTF-16BE</option>
                                            <option value="UTF-8">UTF-8</option>
                                            <option value="ASCII">ASCII</option>
                                            <option value="GBK">GBK</option>
                                            <option value="EUC-KR">EUC-KR</option>

                                        </select>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3">

                                    <div class="form-group">
                                        <label for="qr_eye" class="mt-3">QR_Eye</label>
                                        <select name="qr_eye"  class="form-control mt-3 mb-2">
                                            <option value="">Select Size</option>
                                            <option value="square">Square</option>
                                            <option value="circle">Circle</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="qr_margin" class="mt-3">QR_Margin</label>
                                        <input type="number" name="qr_margin" value="{{old('qr_margin', 0)}}" min="0" max="100" step="1" class="form-control mt-3">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="qr_style" class="mt-3">QR_Style</label>
                                        <select name="qr_style"  class="form-control mt-3 mb-2">
                                            <option value="">Select QR_Style<</option>
                                            <option value="square">Square</option>
                                            <option value="dot">Dot</option>
                                            <option value="round">Round</option>
                                        </select>
                                    </div>


                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="qr_color" class="mt-3">QR_Color</label>
                                       <input type="color" name="qr_color" value="{{old('qr_color', '#000000')}}" class="form-control mt-3">
                                    </div>


                                </div>

                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="qr_eye_color_inner0" class="mt-3">QR_Color_inner 0</label>
                                       <input type="color" name="qr_eye_color_inner0" value="{{old('qr_eye_color_inner0', '#000000')}}" class="form-control mt-3">
                                    </div>

                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="qr_eye_color_outter0" class="mt-3">QR_Color_outter 0</label>
                                       <input type="color" name="qr_eye_color_outter0" value="{{old('qr_eye_color_outter0', '#000000')}}" class="form-control mt-3">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="qr_eye_color_inner1" class="mt-3">QR_Color_inner 1</label>
                                       <input type="color" name="qr_eye_color_inner1" value="{{old('qr_eye_color_inner1', '#000000')}}" class="form-control mt-3">
                                    </div>

                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="qr_eye_color_outter1" class="mt-3">QR_Color_outter 1</label>
                                       <input type="color" name="qr_eye_color_outter1" value="{{old('qr_eye_color_outter1', '#000000')}}" class="form-control mt-3">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="qr_eye_color_inner2" class="mt-3">QR_Color_inner 2</label>
                                       <input type="color" name="qr_eye_color_inner2" value="{{old('qr_eye_color_inner2', '#000000')}}" class="form-control mt-3">
                                    </div>

                                </div>
                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="qr_eye_color_outter2" class="mt-3">QR_Color_outter 2</label>
                                       <input type="color" name="qr_eye_color_outter2" value="{{old('qr_eye_color_outter2', '#000000')}}" class="form-control mt-3">
                                    </div>

                                </div>
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
                         <img src="{{ asset('qr_code/'.session('code') ) }}" alt="{{ session('code') }}" class="img-fluid">
                         {{-- {{  session ('code')  }} --}}
                        @endif

                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
