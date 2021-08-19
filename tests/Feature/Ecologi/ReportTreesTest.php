<?php

use Astrotomic\Ecologi\Facades\Ecologi;

it('retrieves trees for authenticated user')
    ->group('trees')
    ->expect(fn() => Ecologi::reportTrees())
    ->toBeArray()
    ->toHaveKey('total')
    ->total->toBeInt()->toBeGreaterThanOrEqual(0);

it('retrieves trees for given user')
    ->group('trees')
    ->expect(fn() => Ecologi::reportTrees('treeware'))
    ->toBeArray()
    ->toHaveKey('total')
    ->total->toBeInt()->toBeGreaterThanOrEqual(0);
