<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\About;
use App\Blog;
use App\Comment;
use App\Gallery;
use App\Product;
use App\Question;
use App\Service;
use App\Setting;


class SitesController extends Controller
{
    //
    public function index()
    {
        $products = Product::get();
        $articles = Blog::orderBy('id', 'DESC')->take(4)->get();

        $setting = Setting::first();
        return view('sites.index', compact('products', 'articles', 'setting'));
    }

    public function about()
    {
        $about = About::first();

        $setting = Setting::first();
        return view('sites.about',  compact('about', 'setting'));
    }

    public function article()
    {
        $articles = Blog::orderBy('id', 'DESC')->paginate(5);
        $articles->setPath('');

        $setting = Setting::first();
        return view('sites.article', compact('articles', 'setting'));
    }

    public function service()
    {
        $service = Service::first();

        $setting = Setting::first();
        return view('sites.service', compact('service', 'setting'));
    }

    public function gallery()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->paginate(8);
        $galleries->setPath('');

        $setting = Setting::first();
        return view('sites.gallery', compact('galleries', 'setting'));
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('sites.contact', compact('setting'));
    }




    public function showProduct($id)
    {
        $product = Product::whereId($id)->first();
        $setting = Setting::first();
        return view('sites.showProduct', compact('product', 'setting'));
    }

    public function showArticle($id)
    {
        $article = Blog::whereId($id)->first();
        $setting = Setting::first();
        return view('sites.showArticle', compact('article', 'setting'));
    }
}
