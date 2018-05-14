<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Carousel;
use App\MainPage;
use App\Rooms;
use App\RoomsCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

		public function index()
		{
		    return view('admin.index');
		}

		public function mainPage(Request $req)
		{
			if($req->isMethod("POST"))
			{
				if(MainPage::all()->count() == 0)
				{

					MainPage::create([
	            'title' => $req->title,
	            'about' => $req->about,
	            'description' => $req->description,
	            'titleDown' => $req->titleDown,
	            'studio' => $req->studio,
	            'roomsDesc' => $req->roomsDesc,
	            'glassDesc' => $req->glassDesc,
	            'restDesc' => $req->restDesc,
	            'tel1' => $req->tel1,
	            'tel2' => $req->tel2,
	            'email' => $req->email,
	            'tgLink' => $req->tgLink,
	            'fbLink' => $req->fbLink,
	            'twlink' => $req->twLink,
	            'instaLink' => $req->instaLink,
	            'address' => $req->address,
	        ]);
				}
	      else
	      {
	      	$p = MainPage::all()->first();
	      	$p->title = $req->title;
	      	$p->about = $req->about;
					$p->description = $req->description;
	        $p->titleDown = $req->titleDown;
	        $p->studio = $req->studio;
	        $p->roomsDesc = $req->roomsDesc;
	        $p->glassDesc = $req->glassDesc;
	        $p->restDesc = $req->restDesc;
	        $p->tel1 = $req->tel1;
	        $p->tel2 = $req->tel2;
	        $p->email = $req->email;
	        $p->tgLink = $req->tgLink;
	        $p->fbLink = $req->fbLink;
	        $p->twLink = $req->twLink;
	        $p->instaLink = $req->instaLink;
	        $p->address = $req->address;
	        $p->save();
	      }
		    return redirect()->route('admin-index');
			}
			else if($req->isMethod("GET"))
			{
				$obj = MainPage::all()->first();
				return view('admin.mainpage', compact('obj'));
			}
			else
				abort(404);
		}

		public function roomsCategory(Request $req)
		{
			$row = RoomsCategory::all();
		  return view('admin.category.main', compact("row"));
		}

		public function roomsCategoryAdd(Request $req)
		{
			if($req->isMethod("GET"))
		  {
		    return view('admin.category.form');
		  }

		  else if($req->isMethod("POST"))
		  {
		  	RoomsCategory::create([
		  		"type" => $req->type,
		  		"short_description" => $req->short_description,
		  		"full_description" => $req->full_description,
		  	]);

		  	return redirect()->route('admin-roomsCategory');
		  }
		}

		public function roomsCategoryEdit(Request $req, $id)
		{
			if($req->isMethod("GET"))
		  {
		  	$obj = RoomsCategory::find($id);
		    return view('admin.category.form', compact('obj'));
		  }
		  else if($req->isMethod("POST"))
		  {
		  	$obj = RoomsCategory::find($id);
		  	$obj->type = $req->type;
		  	$obj->short_description = $req->short_description;
		  	$obj->full_description = $req->full_description;
		  	$obj->save();
		    return redirect()->route('admin-roomsCategory');
		  }
		}

		public function roomsCategoryDelete(Request $req, $id)
		{
			RoomsCategory::find($id)->delete();
		  return redirect()->route('admin-roomsCategory');
		}

		public function rooms(Request $req)
		{
		  $row = Rooms::all();
		  return view('admin.rooms.main', compact("row"));
		}

		public function roomsAdd(Request $req)
		{
		  if($req->isMethod("GET"))
		  {
		  	$categories = RoomsCategory::all();
		    return view('admin.rooms.form', compact("categories"));
		  }

		  else if($req->isMethod("POST"))
		  {
		  	Rooms::create([
		  		"num" => $req->num,
		  		"type" => $req->type,
		  		"price" => floatval($req->price),
		  		"places" => $req->places,
		  	]);

		  	return redirect()->route('admin-rooms');
		  }
		}

		public function roomsEdit(Request $req, $id)
		{
			if($req->isMethod("GET"))
		  {
		  	$obj = Rooms::find($id);
		    $categories = RoomsCategory::all();
		    return view('admin.rooms.form', compact(["obj", "categories"]));
		  }
		  else if($req->isMethod("POST"))
		  {
		  	$obj = Rooms::find($id);
		  	$obj->num = $req->num;
		  	$obj->type = $req->type;
		  	$obj->price = $req->price;
		  	$obj->places = $req->places;
		  	$obj->save();
		    return redirect()->route('admin-rooms');
		  }
		}

		public function roomsDelete(Request $req, $id)
		{
		  Rooms::find($id)->delete();
		  return redirect()->route('admin-rooms');
		}

		public function images(Request $req)
		{
			if($req->isMethod("GET"))
		  {
		  	$categories = RoomsCategory::all();
		    return view('admin.gallery.main', compact("categories"));
		  }

		  else if($req->isMethod("POST"))
		  {
		  	if($req->hasFile('img'))
		  	{
		  		$file = $req->file('img');
					$img = $file->getClientOriginalName();
					$file->storeAs(
    				'public/uploaded_images/gallery/', $img
					);
		  		Gallery::create([
		  			"room_id" => $req->room_id,
		  			"image" => $img,
		  		]);
		  		return redirect()->route('admin-images');
		  	}
		  }
		}
		public function imageDelete(Request $req, $id)
		{
		  $p = Gallery::find($id);
			if(file_exists(storage_path('app/public/uploaded_images/gallery/'.$p->image)))
	    	unlink(storage_path('app/public/uploaded_images/gallery/'.$p->image));
		  $p->delete();
		  return redirect()->route('admin-images');
		}

		public function profile(Request $req)
		{
			if($req->isMethod("GET"))
			{
				$obj = Auth::user();
			  return view('admin.profile.profile', compact("obj"));
			}
			else if($req->isMethod("POST"))
			{
				if($req->password != $req->password2)
					return redirect()->route("admin-index");
				$obj = Auth::user();
				$obj->name = $req->name;
				$obj->username = $req->username;
				$obj->password = Hash::make($req->password);
				$obj->save();
				return redirect()->route("admin-index");
			}
		}

		public function carousel(Request $req)
		{
			if($req->isMethod("GET"))
		  {
		  	$rooms = Carousel::all()->where('part', '=', "rooms");
		  	$rests = Carousel::all()->where('part', '=', "rests");
		  	$igloos = Carousel::all()->where('part', '=', "igloos");
		    return view('admin.carousel.main', compact("rooms", "rests", "igloos"));
		  }

		  else if($req->isMethod("POST"))
		  {
		  	if($req->hasFile('img'))
		  	{
		  		$file = $req->file('img');
					$img = $file->getClientOriginalName();
					$file->storeAs(
    				'public/uploaded_images/carousel/', $img
					);
		  		Carousel::create([
		  			"part" => $req->part,
		  			"image" => $img,
		  		]);
		  		return redirect()->route('admin-carousel');
		  	}
		  }
		}
		public function carouselDelete(Request $req, $id)
		{
		  $p = Carousel::find($id);
			if(file_exists(storage_path('app/public/uploaded_images/carousel/'.$p->image)))
	    	unlink(storage_path('app/public/uploaded_images/carousel/'.$p->image));
		  $p->delete();
		  return redirect()->route('admin-carousel');
		}

		public function books(Request $req)
		{
		    return view('admin.index');
		}
}
