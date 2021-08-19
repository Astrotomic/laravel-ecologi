<?php

namespace Astrotomic\Ecologi;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Ecologi
{
    public const UNIT_KG = 'KG';
    public const UNIT_T = 'Tonnes';

    protected string $token;
    protected bool $sandbox;
    protected string $username;

    public function __construct(
        string $token,
        string $username,
        bool $sandbox = false
    ) {
        $this->token = $token;
        $this->username = $username;
        $this->sandbox = $sandbox;
    }

    public function sandbox(bool $sandbox = true): self
    {
        $this->sandbox = $sandbox;

        return $this;
    }

    public function purchaseCarbonOffset(float $number, string $unit = self::UNIT_KG): array
    {
        if($number < 1 && $unit === self::UNIT_T) {
            $number *= 1000;
            $unit = self::UNIT_KG;
        }

        if($number < 1 && $unit === self::UNIT_KG) {
            throw new \InvalidArgumentException('The minimum value for "number" must be 1kg');
        }

        return $this->http()
            ->post('impact/carbon', [
                'test' => $this->sandbox,
                'units' => $unit,
                'number' => $number,
            ])
            ->json();
    }

    public function purchaseTrees(int $number, ?string $name = null): array
    {
        if($number < 1) {
            throw new \InvalidArgumentException('The minimum value for "number" must be 1 tree');
        }

        return $this->http()
            ->post('impact/trees', [
                'test' => $this->sandbox,
                'number' => $number,
                'name' => $name,
            ])
            ->json();
    }

    public function reportCarbonOffset(?string $username = null): array
    {
        $username ??= $this->username;

        return $this->http()
            ->get("users/{$username}/carbon-offset")
            ->json();
    }

    public function reportTrees(?string $username = null): array
    {
        $username ??= $this->username;

        return $this->http()
            ->get("users/{$username}/trees")
            ->json();
    }

    public function reportImpact(?string $username = null): array
    {
        $username ??= $this->username;

        return $this->http()
            ->get("users/{$username}/impact")
            ->json();
    }

    protected function http(): PendingRequest
    {
        return Http::baseUrl('https://public.ecologi.com')
            ->withToken($this->token)
            ->acceptJson()
            ->asJson();
    }
}