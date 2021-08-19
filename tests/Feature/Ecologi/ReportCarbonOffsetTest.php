<?php

use Astrotomic\Ecologi\Facades\Ecologi;

it('retrieves carbon offset for authenticated user')
    ->group('carbon')
    ->expect(fn() => Ecologi::reportCarbonOffset())
    ->toBeArray()
    ->toHaveKey('total')
    ->total->toBeFloat()->toBeGreaterThanOrEqual(0);

it('retrieves carbon offset for given user')
    ->group('carbon')
    ->expect(fn() => Ecologi::reportCarbonOffset('treeware'))
    ->toBeArray()
    ->toHaveKey('total')
    ->total->toBeFloat()->toBeGreaterThanOrEqual(0);
