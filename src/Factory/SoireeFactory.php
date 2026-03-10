<?php

namespace App\Factory;

use App\Entity\Artist;
use App\Entity\Soiree;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Soiree>
 */
final class SoireeFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    #[\Override]
    public static function class(): string
    {
        return Soiree::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[\Override]
    protected function defaults(): array|callable
        {
            $artiste = new Artist();
            $artiste->setName(self::faker()->text(10));
            return [
            'dateCreation' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime()),
            'dateSoiree' => self::faker()->dateTime(),
            'titre' => self::faker()->text(50),
            'description' => self::faker()->text(255),
            'Artist' => [
                $artiste,
            ]];
        }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Soiree $soiree): void {})
        ;
    }
}
