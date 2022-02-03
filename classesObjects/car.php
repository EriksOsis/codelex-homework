<?php

class Car
{
    private string $name;
    private FuelGauge $fuelGauge;
    private Odometer $odometer;

    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km
    private const TIRE_QUALITY_LOSS_PER_KM = [1, 2];
    private const LIGHT_POWER_PER_KM = [0.1, 0.9];

    private array $tires = [];

    private array $lights = [];

    public function __construct(string $name, int $fuelGaugeAmount)
    {
        $this->name = $name;
        $this->fuelGauge = new FuelGauge($fuelGaugeAmount);
        $this->odometer = new Odometer();
        $this->tires = [
            new Tire("Front Left"),
            new Tire("Front Right"),
            new Tire("Back Left"),
            new Tire("Back Right")
        ];
        $this->lights = [
            new Lights("Front Left Light"),
            new Lights("Front Right Light")
        ];

    }

    public function drive(int $distance = 10): void
    {
        if ($this->fuelGauge->getFuel() <= 0) return;

        $this->fuelGauge->change($distance * -self::CONSUMPTION_PER_KM);
        $this->odometer->addMileage($distance);

        [$minQualityLoss, $maXQualityLoss] = self::TIRE_QUALITY_LOSS_PER_KM;
        foreach ($this->tires as $tire) {
            $tire->changeCondition(rand($minQualityLoss, $maXQualityLoss));

        }

        [$minPowerLoss, $maxPowerLoss] = self::LIGHT_POWER_PER_KM;
        foreach ($this->lights as $light) {
            $light->lowerPower(rand($minPowerLoss, $maxPowerLoss));
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelGauge->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }

    public function hasValidTires(): bool
    {
        foreach ($this->tires as $tire) {
            if ($tire->getCondition() <= 0) {
                $brokenTires[] = $tire;
            }
        }

        return count($brokenTires) < 2;
    }

    public function getTires()
    {
        return $this->tires;
    }

    public function hasValidLights(): bool
    {
        foreach ($this->lights as $light) {
            if ($light->getPower() <= 50) {
                $weakLights[] = $light;
            }
        }

        return count($weakLights) < 1;
    }

    public function getLights()
    {
        return $this->lights;
    }

}