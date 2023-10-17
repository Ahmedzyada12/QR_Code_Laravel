<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MealRequest;
use App\Models\Meal;
use App\Models\Category;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $meals=Meal::paginate(20);
        $categories=Category::all();
        return view('admin\meals\index', compact('meals','categories'));
    }
    public function indexhome()
    {
        $meals=Meal::paginate(20);
        // $category=Category::all();
        return view('homepage.homepage', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.meals.create', compact('categories') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MealRequest $request)
    {
        $path=$request->image->store('public/meals');

        Meal::create([

            'name' =>$request->name  ,
            'description' => $request->description  ,
            'small_meal_price' => $request->small_meal_price  ,
            'medium_meal_price' => $request->medium_meal_price  ,
            'large_meal_price' => $request->large_meal_price  ,
            'category_id' => $request->category_id  ,
            'image' => $path ,

        ]);
        return redirect()->route('adminmeal.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meal $meal)
    {
         $categories=Category::all();
         return view('admin\meals\edit' , compact('meal','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MealRequest $request, Meal $meal)
    {
        if ($request->has('image')) {
            $path=$request->image->store('public/meals');
        } else {
            $path=$meal->image;
        }

        $meal->name= $request->name;
        $meal->description= $request->description;
        $meal->small_meal_price= $request->small_meal_price;
        $meal->medium_meal_price= $request->medium_meal_price;
        $meal->large_meal_price= $request->large_meal_price;
        $meal->category_id= $request->category_id;
        $meal->image= $path;
        $meal->save();

        return redirect()->route('adminmeal.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meal $meal)
    {
            $meal->delete();
        return redirect()->route('adminmeal.index');
    }
    public function trashed()
    {
        $meals=Meal::onlyTrashed()->get();
        return view('admin.meals.trashed', compact('meals'));
    }
    public function backdel($id)
    {
        $Meal=Meal::onlyTrashed()->where('id',$id)->restore();

        return redirect()->route('adminmeal.index')->with('success','meal back');
    }

    public function hdelete($id)
    {
        $meal=Meal::onlyTrashed()->where('id',$id)->forceDelete();

        return redirect()->route('adminmeal.index')->with('success','meal is deleted');
    }
}
