<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\QueryContainer as Helpers;
use Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->helper = new Helpers();
    }

    public function index()
    {
        $item = $this->helper->getAllItem();
        return view('home',['item' => $item]);
    }

    public function packages_detail($slug)
    {
        // dd(session('userdata')->id);
        $item = $this->helper->getDetailItem($slug);
        return view('packages',['item' => $item]);

    }
}