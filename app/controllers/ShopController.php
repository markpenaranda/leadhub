<?php

class ShopController extends \BaseController {

	public function getIndex(){
		$shop = new Shop;
		$shop->name = "Mark";
		$shop->address = "#8 Robina road";

		$shop->save();

		return 'OK';
	}

	public function getList(){
		$shop = Foursquare::getEvents();
		dd($shop);
	}


}