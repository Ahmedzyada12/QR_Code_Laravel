<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\HtmlString;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Spatie\Color\Hex;

class QrController extends Controller
{
    public function index()
    {
     $code= QrCode::generate('Make me into a QrCode!');

       return view('Qr_code_bulder' , compact('code'));
    }

    public function phonepage()
    {
       return view('qr_code_phone ');
    }
    public function wifi()
    {
       return view('qr_code_WiFai');
    }
    public function webpage()
    {
       return view('qr_code_web ');
    }

    public function qr_phone(Request  $request)
    {

    $validated = Validator::make ($request->all(),
    [
        'phone' => 'required',//1
    ]);

    if( $validated->fails()){
        return back()->withErrors($validated)->withInput();
    }

    $phone=$request->input('phone');

    $code=QrCode::generate($phone);
    return back()->with([
        'status'=>'QR generated succsfully',
        'code'=>$code
    ]);
    }
    public function qr_web(Request  $request)
    {

    $validated = Validator::make ($request->all(),
    [
        'web' => 'required',//1
    ]);

    if( $validated->fails()){
        return back()->withErrors($validated)->withInput();
    }

    $web=$request->input('web');

    $code=QrCode::generate($web);
    return back()->with([
        'status'=>'QR generated succsfully',
        'code'=>$code
    ]);
    }

    public function qr_builder(Request $request)
    {
        $validated = Validator::make ($request->all(),
        [
            'name' => 'required',//1
            'body' => 'required',//1

        ]);

        if( $validated->fails()){
            return back()->withErrors($validated)->withInput();
        }

        $body=$request->input('body');
        $name=$request->input('name');

        $code=Str::slug($name) . '.png';

        $qr_size=$request->input('qr_size') ?? '300';
        $qr_correction=$request->input('qr_correction') ?? 'H';
        $qr_encoding=$request->input('qr_encoding') ?? 'UTF-8';

        $qr_eye=$request->input('qr_eye') ;
        $qr_margin=$request->input('qr_margin') ;
        $qr_style=$request->input('qr_style') ;

        $qr_color=Hex::fromString($request->input('qr_color'))->toRgb();

        $qr_eye_color_inner0=Hex::fromString($request->input('qr_eye_color_inner0'))->toRgb();
        $qr_eye_color_outter0=Hex::fromString($request->input('qr_eye_color_outter0'))->toRgb();
        $qr_eye_color_inner1=Hex::fromString($request->input('qr_eye_color_inner1'))->toRgb();
        $qr_eye_color_outter1=Hex::fromString($request->input('qr_eye_color_outter1'))->toRgb();
        $qr_eye_color_inner2=Hex::fromString($request->input('qr_eye_color_inner2'))->toRgb();
        $qr_eye_color_outter2=Hex::fromString($request->input('qr_eye_color_outter2'))->toRgb();


        $qr=(string)QrCode::format('png')->size($qr_size)->errorCorrection($qr_correction)->encoding( $qr_encoding)->eye($qr_eye)->style($qr_style)->margin( $qr_margin)->color($qr_color->red(), $qr_color->green(), $qr_color->blue())

        ->eyeColor(0, $qr_eye_color_inner0->red(), $qr_eye_color_inner0->green(), $qr_eye_color_inner0->blue(),  $qr_eye_color_outter0->red(),  $qr_eye_color_outter0->green(), $qr_eye_color_outter0->blue())

        ->eyeColor(1, $qr_eye_color_inner1->red(), $qr_eye_color_inner1->green(), $qr_eye_color_inner1->blue(),  $qr_eye_color_outter1->red(),  $qr_eye_color_outter1->green(), $qr_eye_color_outter1->blue())

        ->eyeColor(2, $qr_eye_color_inner2->red(), $qr_eye_color_inner2->green(), $qr_eye_color_inner2->blue(),  $qr_eye_color_outter2->red(),  $qr_eye_color_outter2->green(), $qr_eye_color_outter2->blue())
        ->generate($body ,'../public/qr_code/'.$code);


        return back()->with([

            'status'=>'QR generated succsfully',
            'code'=>$qr
        ]);
    }

}
