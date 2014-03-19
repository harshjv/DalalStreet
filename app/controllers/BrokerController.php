<?php

class BrokerController extends BaseController {

	public function index() {
    $broker = Auth::user();
		$title = "Broker #".$broker->id." - Dalal Street";
		$players = Player::with('companies')->whereIn('id', array(($broker->id*2)-1, $broker->id*2))->take(2)->get();
    $player_count = 0;
		return View::make("broker.index", compact('broker','title', 'players', 'player_count'));
	}

  public function part() {
    $broker = Auth::user();
    $players = Player::with('companies')->whereIn('id', array(($broker->id*2)-1, $broker->id*2))->take(2)->get();
    $player_count = 0;
    return View::make("broker.part", compact('broker', 'players', 'player_count'));
  }

}