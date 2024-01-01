<?php

namespace App\Factory;

use App\Entity\Publication;
use App\Factory\user\Factory;
use App\Repository\PublicationRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Publication>
 *
 * @method        Publication|Proxy create(array|callable $attributes = [])
 * @method static Publication|Proxy createOne(array $attributes = [])
 * @method static Publication|Proxy find(object|array|mixed $criteria)
 * @method static Publication|Proxy findOrCreate(array $attributes)
 * @method static Publication|Proxy first(string $sortedField = 'id')
 * @method static Publication|Proxy last(string $sortedField = 'id')
 * @method static Publication|Proxy random(array $attributes = [])
 * @method static Publication|Proxy randomOrCreate(array $attributes = [])
 * @method static PublicationRepository|RepositoryProxy repository()
 * @method static Publication[]|Proxy[] all()
 * @method static Publication[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Publication[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Publication[]|Proxy[] findBy(array $attributes)
 * @method static Publication[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Publication[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class PublicationFactory extends ModelFactory
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
            'auteur' => self::faker()->realtext(50),
            'motsCles' => self::faker()->realtext(100),
            'projet' => ProjetFactory::randomOrCreate(),
            'titre' => self::faker()->realtext(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Publication $publication): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Publication::class;
    }
}
