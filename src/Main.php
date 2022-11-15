<?php

declare(strict_types=1);

namespace dktapps\SessionsDemo;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	public function onJoin(PlayerJoinEvent $event) : void{
		$player = $event->getPlayer();
		$session = Session::get($player);

		//no nasty @var needed for your IDE, the code is fully type safe!

		$player->sendMessage("Your random ID is " . $session->getMyRandomId());
	}

	public function onChat(PlayerChatEvent $event) : void{
		$player = $event->getPlayer();
		$session = Session::get($player);

		$event->setMessage($event->getMessage() . " (ID " . $session->getMyRandomId() . ")");
	}
}
