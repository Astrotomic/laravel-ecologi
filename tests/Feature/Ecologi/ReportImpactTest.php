<?php

use Astrotomic\Ecologi\Facades\Ecologi;

it('retrieves impact for authenticated user')
    ->group('trees', 'carbon')
    ->expect(fn() => Ecologi::reportImpact())
    ->toBeArray()
    ->toHaveKeys(['trees', 'carbonOffset'])
    ->trees->toBeInt()->toBeGreaterThanOrEqual(0)
    ->carbonOffset->toBeFloat()->toBeGreaterThanOrEqual(0);

it('retrieves impact for given user')
    ->group('trees', 'carbon')
    ->expect(fn() => Ecologi::reportImpact('treeware'))
    ->toBeArray()
    ->toHaveKeys(['trees', 'carbonOffset'])
    ->trees->toBeInt()->toBeGreaterThanOrEqual(0)
    ->carbonOffset->toBeFloat()->toBeGreaterThanOrEqual(0);
