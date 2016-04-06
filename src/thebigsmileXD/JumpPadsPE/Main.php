<?php

namespace thebigsmileXD\JumpPadsPE;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\math\Vector3;
use pocketmine\level\particle\FlameParticle;
use pocketmine\level\sound\BlazeShootSound;
use pocketmine\level\particle\RedstoneParticle;
use pocketmine\entity\Effect;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->makeSaveFiles();
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	private function makeSaveFiles(){
		$this->saveResource("config.yml");
		$this->getConfig()->save();
	}

	public function onPlayerMove(PlayerMoveEvent $event){
		$player = $event->getPlayer();
		$block = $player->getLevel()->getBlock($player->floor()->subtract(0, 1));
		if($this->getConfig()->get($block->getId()) !== false){
			$distance = $this->getConfig()->get($block->getId());
			$from = $event->getFrom();
			$to = $event->getTo();
			if(!is_numeric($distance)) $distance = 5;
			$player->setMotion((new Vector3(($to->x - $from->x) * ($distance / 5), 0.5, ($to->z - $from->z) * ($distance / 5))));
			$player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(mt_rand(0, 10) / 10 - 0.5, mt_rand(0, 4) / 10 - 0.2, mt_rand(0, 10) / 10 - 0.5)));
			$player->getLevel()->addSound(new BlazeShootSound($player->getPosition()));
			if($player->hasEffect(Effect::JUMP)) $player->removeEffect(Effect::JUMP);
			$player->addEffect(Effect::getEffect(8)->setDuration($distance * 2)->setAmplifier(255)->setAmbient(false)->setVisible(false));
		}
	}
}