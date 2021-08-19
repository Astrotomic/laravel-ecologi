<?php

use Astrotomic\Ecologi\Facades\Ecologi;

it('purchase carbon offset in kilogram')
    ->group('carbon')
    ->expect(fn() => Ecologi::purchaseCarbonOffset(746, Ecologi::UNIT_KG))
    ->toBeArray()
    ->toHaveKeys(['number', 'units', 'numberInTonnes', 'amount', 'currency', 'projectDetails'])
    ->number->toBeInt()->toBe(746)
    ->units->toBeString()->toBe(Ecologi::UNIT_KG)
    ->numberInTonnes->toBeFloat()->toBe(0.746)
    ->amount->toBeFloat()->toBeGreaterThan(0)
    ->currency->toBeString()
    ->projectDetails->toBeArray();

it('purchase carbon offset in tonnes')
    ->group('carbon')
    ->expect(fn() => Ecologi::purchaseCarbonOffset(2.815, Ecologi::UNIT_T))
    ->toBeArray()
    ->toHaveKeys(['number', 'units', 'numberInTonnes', 'amount', 'currency', 'projectDetails'])
    ->number->toBeFloat()->toBe(2.815)
    ->units->toBeString()->toBe(Ecologi::UNIT_T)
    ->numberInTonnes->toBeFloat()->toBe(2.815)
    ->amount->toBeFloat()->toBeGreaterThan(0)
    ->currency->toBeString()
    ->projectDetails->toBeArray();

it('throws exception for number less than 1kg')
    ->group('carbon')
    ->throws(InvalidArgumentException::class)
    ->expect(fn() => Ecologi::purchaseCarbonOffset(0.5, Ecologi::UNIT_KG));

it('throws exception for number less than 0.001t')
    ->group('carbon')
    ->throws(InvalidArgumentException::class)
    ->expect(fn() => Ecologi::purchaseCarbonOffset(0.0005, Ecologi::UNIT_T));