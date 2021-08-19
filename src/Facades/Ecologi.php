<?php

namespace Astrotomic\Ecologi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Astrotomic\Ecologi\Ecologi sandbox(bool $sandbox = true)
 * @method static array purchaseCarbonOffset(float $number, string $unit = \Astrotomic\Ecologi\Ecologi::UNIT_KG)
 * @method static array purchaseTrees(int $number, ?string $name = null)
 * @method static array reportCarbonOffset(?string $username = null)
 * @method static array reportTrees(?string $username = null)
 * @method static array reportImpact(?string $username = null)
 *
 * @see \Astrotomic\Ecologi\Ecologi
 */
class Ecologi extends Facade
{
    public const UNIT_KG = 'KG';
    public const UNIT_T = 'Tonnes';

    protected static function getFacadeAccessor(): string
    {
        return \Astrotomic\Ecologi\Ecologi::class;
    }
}