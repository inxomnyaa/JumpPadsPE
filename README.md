# JumpPadsPE
A simple jump / launch pad plugin for PMMP
## How does it work?
When the player moves, the plugin will check for the block below the player.

If he is moving onto a configured block, he will be launched into the direction he is looking (and a little upwards).

When the player gets launched, some particle and sound effects will play.
## Configuration
Setup is really easy. You just put the blockid and knockback value
```yaml
BlockID: Distance
```
Example for Redstone Block with 15 blocks distance:
```yaml
152: 15
```
Redstone blocks will be enabled as launch pads by default.
## Warning
Keep in mind that a too high value for the Distance will cause the movement to be reverted by PocketMine. In PMMP this is done to prevent bugged clients (or hack clients) to load (and probably also generate) massive amounts of chunks.

A value of 15 will result in `15 * 20` blocks per second (`= 300` blocks per second). "Air resistance" aka drag will reduce this value over time whilst you are in air.