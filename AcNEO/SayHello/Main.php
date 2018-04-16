<?php
namespace AcNEO\SayHello;

use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {

public function onLoad() {
  $this->getServer()->getLogger()->notice("This Is A Very Nano-Plugin That Do A Simple Hello Player");
  $this->getServer()->getPluginManager()->registerEvents($this, $this);
  if(!$this->getDataFolder()) {
    @mkdir $this->getDataFolder();
  }
  $this->regConfig();
}

public function onJoin(PlayerJoinEvent $event) {
  $player = $event->getPlayer();
  $playerName = $player->getName();
  if(!$this->getConf()->get("enable_override_default_hello")) {
    $player->sendMessage("Hello ". $playerName);
  }else{
    $player->sendMessage($this->getConf()->get("hello_text") . $playerName);
  }
}
  
public function regConfig() {
  $confName = "config"; // default
  $extension = ".yml"; // maybe future feature?
  new Config($this->getDataFolder() . $confName . $extension , CONFIG::YAML, array[
    "enable_override_default_hello" => false,
    "hello_text" => "Hello "
  ]);
  return true;
}
    
public function getConf() {
  $confName = "config";
  $extension = ".yml";
  $cfg = new Config($this->getDataFolder() . $confName . $extension , CONFIG::YAML, array[]);
  return $cfg;
}

}
?>
