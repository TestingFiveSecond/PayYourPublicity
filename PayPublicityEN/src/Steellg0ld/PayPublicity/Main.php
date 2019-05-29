<?php

#  _____         __     __              _____       _     _ _      _ _         
# |  __ \        \ \   / /             |  __ \     | |   | (_)    (_) |        
# | |__) |_ _ _   \ \_/ /__  _   _ _ __| |__) |   _| |__ | |_  ___ _| |_ _   _ 
# |  ___/ _` | | | \   / _ \| | | | '__|  ___/ | | | '_ \| | |/ __| | __| | | |
# | |  | (_| | |_| || | (_) | |_| | |  | |   | |_| | |_) | | | (__| | |_| |_| |
# |_|   \__,_|\__, ||_|\___/ \__,_|_|  |_|    \__,_|_.__/|_|_|\___|_|\__|\__, |
#              __/ |                                                      __/ |
#             |___/                                                      |___/ 
# 

namespace Steellg0ld\PayPublicity;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Server;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\math\Vector3;
use pocketmine\level\Position;
use onebone\economyapi\EconomyAPI;

class Main extends PluginBase Implements Listener {
    public $cfg;
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
         @mkdir($this->getDataFolder());
        $this->cfg = $this->getConfig();
        $this->saveDefaultConfig();

    }

    public function onCommand(CommandSender $player, Command $command, String $label, array $args) : bool {
        switch($command->getName()){
        case "pb":
            $rankA = $this->cfg->get("money-rank-guest");
            $errorMoney = $this->cfg->get("money-error");
            $payMoney = $this->cfg->get("money-success");
            if(EconomyAPI::getInstance()->myMoney($player) >= $rankA){
               $message = implode(" ", $args);
                EconomyAPI::getInstance()->reduceMoney($player, $rankA);
                $this->getLogger()->info("$message");
                foreach (Server::getInstance()->getOnlinePlayers() as $news) {
                    $news->addTitle("§f[§ePublicity§f]§r", "$message");
                    $player->sendMessage("§e[PayPublicity] ".$payMoney.".");
                    $news->getLevel()->addSound(new \pocketmine\level\sound\AnvilBreakSound($news));
                }
            }else{
                     $player->sendMessage("§e[PayPublicity] ".$errorMoney.".");
                     $player->getLevel()->addSound(new \pocketmine\level\sound\GhastSound($player));
            }
            return true;
        break;

        case "pbv":
            $rankB = $this->cfg->get("money-rank-vip");
            $errorMoney = $this->cfg->get("money-error");
            $payMoney = $this->cfg->get("money-success");
            if(EconomyAPI::getInstance()->myMoney($player) >= $rankB){
               $message = implode(" ", $args);
                EconomyAPI::getInstance()->reduceMoney($player, $rankB);
                $this->getLogger()->info("$message");
                foreach (Server::getInstance()->getOnlinePlayers() as $news) {
                    $news->addTitle("§f[§ePublicity§f]§r", "$message");
                    $player->sendMessage("§e[PayPublicity] ".$payMoney.".");
                    $news->getLevel()->addSound(new \pocketmine\level\sound\AnvilBreakSound($news));
                }
            }else{
                     $player->sendMessage("§e[PayPublicity] ".$errorMoney.".");
                     $player->getLevel()->addSound(new \pocketmine\level\sound\GhastSound($player));
            }
            return true;
        break;

        case "pbvp":
            $rankC = $this->cfg->get("money-rank-vipp");
            $errorMoney = $this->cfg->get("money-error");
            $payMoney = $this->cfg->get("money-success");
            if(EconomyAPI::getInstance()->myMoney($player) >= $rankC){
               $message = implode(" ", $args);
                EconomyAPI::getInstance()->reduceMoney($player, $rankC);
                $this->getLogger()->info("$message");
                foreach (Server::getInstance()->getOnlinePlayers() as $news) {
                    $news->addTitle("§f[§ePublicity§f]§r", "$message");
                    $player->sendMessage("§e[PayPublicity] ".$payMoney.".");
                    $news->getLevel()->addSound(new \pocketmine\level\sound\AnvilBreakSound($news));
                }
            }else{
                     $player->sendMessage("§e[PayPublicity] ".$errorMoney.".");
                     $player->getLevel()->addSound(new \pocketmine\level\sound\GhastSound($player));
            }
            return true;
        break;
        }
    }
}
