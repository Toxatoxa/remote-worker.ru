<?php

namespace App\Http\Controllers;

use App\Category;
use App\Record;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index($mainCategory = null, $category = null)
    {
        if ($mainCategory)
            $mainCategory = Category::byName($mainCategory)->first();

        if ($category)
            $category = Category::byName($category)->first();

        return view('page.home', compact('mainCategory', 'category'));
    }

    public function getRecords(Request $request)
    {
        $categoryId = $request->get('category_id');

        $records = Record::where('category_id', $categoryId)->get();

        return $records;
    }

    public function advertise()
    {
        return view('page.advertise');
    }

    public function terms()
    {
        return view('page.terms');
    }

    public function contact()
    {
        return view('page.contact');
    }


}
