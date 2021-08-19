<?php

use Astrotomic\Ecologi\Facades\Ecologi;

it('purchase trees')
    ->group('trees')
    ->expect(fn() => Ecologi::purchaseTrees(746))
    ->toBeArray()
    ->toHaveKeys(['treeUrl', 'amount', 'currency'])
    ->treeUrl->toBeString()
    ->amount->toBeFloat()->toBeGreaterThan(0)
    ->currency->toBeString();

it('purchase trees with name')
    ->group('trees')
    ->expect(fn() => Ecologi::purchaseTrees(1, 'opendor.me registration'))
    ->toBeArray()
    ->toHaveKeys(['treeUrl', 'amount', 'currency', 'name'])
    ->treeUrl->toBeString()
    ->name->toBeString()->toBe('opendor.me registration')
    ->amount->toBeFloat()->toBeGreaterThan(0)
    ->currency->toBeString();

it('throws exception for number less than 1')
    ->group('trees')
    ->throws(InvalidArgumentException::class)
    ->expect(fn() => Ecologi::purchaseCarbonOffset(0));
