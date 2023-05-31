<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
 */

declare(strict_types=1);

namespace pmmp\SessionsDemo;

use pocketmine\player\Player;

final class Session{

	/**
	 * WeakMap ensures that the session is destroyed when the player is destroyed, without causing any memory leaks
	 *
	 * @var \WeakMap
	 * @phpstan-var \WeakMap<Player, Session>
	 */
	private static \WeakMap $data;

	public static function get(Player $player) : Session{
		self::$data ??= new \WeakMap();

		return self::$data[$player] ??= self::loadSessionData($player);
	}

	private static function loadSessionData(Player $player) : Session{
		//you could load some data here, e.g. from your mysql database
		//as an example we'll just use a random number

		return new Session(random_int(0, 100));
	}

	public function __construct(
		private int $myRandomId
	){}

	public function getMyRandomId() : int{
		return $this->myRandomId;
	}
}
