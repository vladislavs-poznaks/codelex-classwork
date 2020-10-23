<?php

interface ExplosiveInterface
{
    public function explode(): string;
}

interface GunInterface
{
    public function fire(): string;
}

interface WeaponInterface
{
    public function getName(): string;
}

class Pistol implements WeaponInterface, GunInterface
{

    public function fire(): string
    {
        return 'Spare the bullets...';
    }

    public function getName(): string
    {
        return get_class($this);
    }
}

class MachineGun implements WeaponInterface, GunInterface
{

    public function fire(): string
    {
        return 'Spray and pray.';
    }

    public function getName(): string
    {
        return get_class($this);
    }
}

class Grenade implements WeaponInterface, ExplosiveInterface
{

    public function explode(): string
    {
        return 'Shrapnels everywhere!';
    }

    public function getName(): string
    {
        return get_class($this);
    }
}

class Dynamite implements WeaponInterface, ExplosiveInterface
{

    public function explode(): string
    {
        return 'More for mining, don\'t you think?';
    }

    public function getName(): string
    {
        return get_class($this);
    }
}

class WeaponCollection
{
    private $collection = [];

    public function add(WeaponInterface $weapon): void
    {
        $this->collection[] = $weapon;
    }

    /**
     * @return WeaponInterface[]
     */
    public function all(): array
    {
        return $this->collection;
    }
}

$weapons = new WeaponCollection();

$weapons->add(new Pistol());
$weapons->add(new MachineGun());
$weapons->add(new Grenade());
$weapons->add(new Dynamite());

foreach ($weapons->all() as $weapon) {

    echo 'Weapon of choice - ' . $weapon->getName() . ' goes - ';

    if ($weapon instanceof ExplosiveInterface) {
        echo $weapon->explode();
    } elseif ($weapon instanceof GunInterface) {
        echo $weapon->fire();
    }

    echo PHP_EOL;
}

