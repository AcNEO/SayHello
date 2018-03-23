<?php
namespace AcNEO\SayHello;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener {

public function onLoad() {
$this->getServer()->getLogger()->notice("This Is A Very Nano-Plugin That Do A Simple Hello Player");
$this->getServer()->getPluginManager()->registerEvents($this,$this);
}

public function onJoin(PlayerJoinEvent $ev) {
$p = $ev->getPlayer();
$p_name = $p->getName();
$p->sendMessage("Hello ". $p_name);
}

}
?>
