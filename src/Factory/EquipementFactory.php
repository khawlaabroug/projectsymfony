<?php

namespace App\Factory;

use App\Entity\Equipement;
use App\Repository\EquipementRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Equipement>
 *
 * @method        Equipement|Proxy create(array|callable $attributes = [])
 * @method static Equipement|Proxy createOne(array $attributes = [])
 * @method static Equipement|Proxy find(object|array|mixed $criteria)
 * @method static Equipement|Proxy findOrCreate(array $attributes)
 * @method static Equipement|Proxy first(string $sortedField = 'id')
 * @method static Equipement|Proxy last(string $sortedField = 'id')
 * @method static Equipement|Proxy random(array $attributes = [])
 * @method static Equipement|Proxy randomOrCreate(array $attributes = [])
 * @method static EquipementRepository|RepositoryProxy repository()
 * @method static Equipement[]|Proxy[] all()
 * @method static Equipement[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Equipement[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Equipement[]|Proxy[] findBy(array $attributes)
 * @method static Equipement[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Equipement[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class EquipementFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'disponibilite' => self::faker()->realtext(255),
            'etat' => self::faker()->realtext(255),
            'nom' => self::faker()->realtext(30),
            'projet' => ProjetFactory::randomOrCreate(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Equipement $equipement): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Equipement::class;
    }
}
