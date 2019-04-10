<?php

declare(strict_types=1);

namespace Steellg0ld\PayPublicity;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use onebone\economyapi\EconomyAPI;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener{
// COMMING SOON CONFIG
	public function onEnable() : void{
		$this->getLogger()->info("§ePayPublicity est activé !");
        @mkdir($this->getDataFolder(), 0744, true);
        $this->saveResource('config.yml', false);
        $this->config = new Config($this->getDataFolder().'config.yml', Config::YAML);
	}

      public function onCommand(CommandSender $player, Command $command, String $label, array $args) : bool {
		switch($command->getName()){

       // ==================================================================================================== //

        case "pb": // PLAYER
        	if(EconomyAPI::getInstance()->myMoney($player) >= 100000){
               $message = implode(" ", $args);
                EconomyAPI::getInstance()->reduceMoney($player, 100000);
				$this->getLogger()->info("$message");


                foreach (Server::getInstance()->getOnlinePlayers() as $news) {
                    $news->addTitle("§f[§ePublicity§f]§r", "$message");
                    $news->getLevel()->addSound(new \pocketmine\level\sound\AnvilBreakSound($news));
                }
            }else{
                     $player->sendMessage("§e[PayPublicity] §4[ERREUR]§r Vous n'avez pas assez d'argent");
                     $player->getLevel()->addSound(new \pocketmine\level\sound\GhastSound($player));
            }
            return true;
        break;

       // ==================================================================================================== //

        case "pbv": // VIP
        	if(EconomyAPI::getInstance()->myMoney($player) >= 10000){
               $message = implode(" ", $args);
                EconomyAPI::getInstance()->reduceMoney($player, 10000);
				$this->getLogger()->info("$message");


                foreach (Server::getInstance()->getOnlinePlayers() as $news) {
                    $news->addTitle("§f[§ePublicity§f]§r", "$message");
                    $news->getLevel()->addSound(new \pocketmine\level\sound\AnvilBreakSound($news));
                }
            }else{
                     $player->sendMessage("§e[PayPublicity] §4[ERREUR]§r Vous n'avez pas assez d'argent");
                     $player->getLevel()->addSound(new \pocketmine\level\sound\GhastSound($player));
            }
            return true;
        break;

       // ==================================================================================================== //

        case "pbvp": // VIP+
        	if(EconomyAPI::getInstance()->myMoney($player) >= 65000){
               $message = implode(" ", $args);
                EconomyAPI::getInstance()->reduceMoney($player, 65000);
				$this->getLogger()->info("$message");


                foreach (Server::getInstance()->getOnlinePlayers() as $news) {
                    $news->addTitle("§f[§ePublicity§f]§r", "$message");
                    $news->getLevel()->addSound(new \pocketmine\level\sound\AnvilBreakSound($news));
                }
            }else{
                     $player->sendMessage("§e[PayPublicity] §4[ERREUR]§r Vous n'avez pas assez d'argent");
                     $player->getLevel()->addSound(new \pocketmine\level\sound\GhastSound($player));
            }
            return true;
        break;

       // ==================================================================================================== //

		}
	}

	public function onDisable() : void{
		$this->getLogger()->info("§cPayPublicity est désactiver !");
	}
}