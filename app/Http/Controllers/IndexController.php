<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoomsCategory;
use App\MainPage;
use App\Message;
use App\Rooms;
use App\Carousel;
use App\Guest;
use Carbon\Carbon;

class IndexController extends Controller
{
	public function index()
	{
	   return view('index');
	}

	public function message(Request $req)
	{
		Message::create([
			"email"=> $req->email,
			"message"=> $req->message,
		]);
	}

	public function categories()
	{
		$cat = RoomsCategory::all();
		$attr = MainPage::all()->first();
	  return view('categories', compact(["cat", "attr", "images"]));
	}

	public function available(Request $r)
	{
		if(!isset($r->children) || !isset($r->adults))
			return redirect("/");

		session(["children" => $r->children, "adults" => $r->adults]);

		$arrival = Carbon::createFromFormat('d/m/Y', $r->arrival);
		$departure = Carbon::createFromFormat('d/m/Y', $r->departure);

		
		session(
			[
				"arrival" => $arrival->format('d.m.Y'),
				"departure" => $departure->format('d.m.Y'),
				"diff" => $arrival->diffInDays($departure),
			]);

		$all = $r->adults + $r->children;
		$rooms = Rooms::all()->where("booked", "=", "0")->where("places", ">=", $all);

		$temp_rooms = Rooms::all()->where("booked", "=", "1");
		
		for ($i = 0; $i < count($temp_rooms); $i++) 
		{ 
			if($arrival->diffInDays($temp_rooms[$i]->bookedTill) <= 2)
			$rooms[] = $temp_rooms[$i];
		}

		$attr = MainPage::all()->first();

	  return view('available', compact(["attr", "rooms"]));
	}

	public function book(Request $r)
	{
		if($r->isMethod("GET"))
		{
			if(!isset($r->id))
				return redirect("/");

			$attr = MainPage::all()->first();
			$room = Rooms::find($r->id);
			
			$price = (int)(session()->get("diff")) * $room->price;
			session(["price" => $price]);
		  return view('book', compact(["attr", "room", "price"]));
		}
		else if($r->isMethod("POST"))
		{
			Guest::create([
				"firstName"=>$r->firstName,
				"lastName"=>$r->lastName,
				"email"=>$r->email,
				"phone"=>$r->phone,
				"address"=>$r->address,
				"postal"=>$r->postal,
				"city"=>$r->city,
				"country"=>$r->country,
				"eta"=>$r->eta,
				"comment"=>$r->comment,
				"room_id"=>$r->room_id,
				"from"=>session()->get("arrival"),
				"till"=>session()->get("departure"),
				"adults"=>session()->get("adults"),
				"children"=>session()->get("children"),
				"price"=>session()->get("price"),
				"days"=>session()->get("diff"),
			]);

			$room = Rooms::find($r->id);
			$room->booked = 1;
			$room->bookedAt = session()->get("arrival");
			$room->bookedTill = session()->get("departure");
			$room->save();

			return redirect("/");
		}
	}

}
