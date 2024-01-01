<?php

namespace App\Factory;

use App\Entity\Chercheur;
use App\Repository\ChercheurRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Chercheur>
 *
 * @method        Chercheur|Proxy create(array|callable $attributes = [])
 * @method static Chercheur|Proxy createOne(array $attributes = [])
 * @method static Chercheur|Proxy find(object|array|mixed $criteria)
 * @method static Chercheur|Proxy findOrCreate(array $attributes)
 * @method static Chercheur|Proxy first(string $sortedField = 'id')
 * @method static Chercheur|Proxy last(string $sortedField = 'id')
 * @method static Chercheur|Proxy random(array $attributes = [])
 * @method static Chercheur|Proxy randomOrCreate(array $attributes = [])
 * @method static ChercheurRepository|RepositoryProxy repository()
 * @method static Chercheur[]|Proxy[] all()
 * @method static Chercheur[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Chercheur[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Chercheur[]|Proxy[] findBy(array $attributes)
 * @method static Chercheur[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Chercheur[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ChercheurFactory extends ModelFactory
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
            'email' => self::faker()->realtext(255),
            'equipement' => EquipementFactory::randomOrCreate(),
            'motDePasse' => self::faker()->realtext(50),
            'nom' => self::faker()->lastname(20),
            'prenom' => self::faker()->firstname(25),
            'projet' => ProjetFactory::randomOrCreate(),
            'role' => self::faker()->realtext(50),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Chercheur $chercheur): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Chercheur::class;
    }
}
