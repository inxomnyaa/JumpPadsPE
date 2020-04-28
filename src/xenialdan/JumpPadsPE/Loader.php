<?php

namespace xenialdan\JumpPadsPE;

use Exception;
use pocketmine\entity\Effect;
use pocketmine\entity\EffectInstance;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerMoveEvent;
use pocketmine\level\particle\FlameParticle;
use pocketmine\level\particle\RedstoneParticle;
use pocketmine\level\sound\BlazeShootSound;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase implements Listener
{

    public function onEnable(): void
    {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlayerMove(PlayerMoveEvent $event): void
    {
        $player = $event->getPlayer();
        if ($event->getFrom()->floor()->asVector3()->equals($event->getTo()->floor()->asVector3())) {
            return;
        }
        $block = $player->getLevel()->getBlock($player->floor()->subtract(0, 1));
        if ($this->getConfig()->get($block->getId()) !== false) {
            $distance = $this->getConfig()->get($block->getId()) / 20;
            if (!is_numeric($distance)) {
                $distance = 5;
            }
            $mot = $player->getDirectionVector()->normalize()->multiply($distance);
            $mot->y = 0.5;
            $player->setMotion($mot);

            //$player->getLevel()->broadcastLevelEvent($player->add(0, 0.1), LevelEventPacket::EVENT_PARTICLE_EYE_DESPAWN);//TODO this only shows poof particles in a cross shape.. wtf
            try {
                $player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new FlameParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
                $player->getLevel()->addParticle(new RedstoneParticle($player->getPosition()->add(random_int(0, 10) / 10 - 0.5, random_int(0, 4) / 10 - 0.2, random_int(0, 10) / 10 - 0.5)));
            } catch (Exception $e) {
            }
            $player->getLevel()->addSound(new BlazeShootSound($player->getPosition()));
            //To stop fall damage
            $player->addEffect(new EffectInstance(Effect::getEffect(Effect::JUMP), $distance * 2, 255, false, false));
        }
    }
}