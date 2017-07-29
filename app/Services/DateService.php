<?php

namespace App\Services;

/**
 * Class DateService
 * @package App\Services
 * Если нужны шаги по недельно и тд - то нужно явно указать в конфиге. иначе не правильные расчеты
 */

class DateService
{
    public
        $long,
        $step,
        $now,
        $reckoning,
        $start;

    public function __construct()
    {
        $this->start = env('APP_START');
        $this->step = env('APP_STEP');
        $this->long = env('APP_LONG');
        $this->now = time();
        $this->reckoning = env('APP_RECKONING');
    }

    /**
     * @param $type
     * @return mixed
     * вернуть систему счисления из конфига
     */
    public function integrationReckoning($type)
    {
        if ($type === null) {
            return $this->reckoning;
        }
        return $type;
    }

    /**
     * @param null $param
     * @return int
     * текущий шаг в приложении
     */
    public function currentStep($param = null)
    {
        $param = $this->integrationReckoning($param);

        return intval(
            ceil($this->timeDifference($param) / $this->getStep())
        );

    }

    /**
     * @param null $type
     * @return int
     * получить длительность одного шага в определенной системе счисления
     */
    public function getStep($type = null)
    {
        $type = $this->integrationReckoning($type);

        $number = null;

        switch ($type) {
            case 'second':
                $number = $this->step;
                break;
            case 'minute':
                $number = ceil(
                    $this->step / 60
                );
                break;
            case 'hour':
                $number = ceil(
                    $this->step / 3600
                );
                break;
            case 'day':
                $number = ceil(
                    $this->step / 86400
                );
                break;
            case 'week':
                $number = ceil(
                    $this->step / 604800
                );
        }
        return intval($number);
    }

    /**
     * @param null $type
     * @return int
     * получить максимальное время всех шагов
     */
    public function stepByLong($type = null)
    {
        return $this->getStep($type) * $this->long;
    }

    /**
     * @param null $type
     * @return int
     * разница во времени. Старта и текущего
     */
    public function timeDifference($type = null)
    {
        $type = $this->integrationReckoning($type);

        $number = null;

        switch ($type) {
            case 'second':
                $number = $this->now - $this->start;
                break;
            case 'minute':
                $number = ceil(
                    ($this->now - $this->start) / 60
                );
                break;
            case 'hour':
                $number = ceil(
                    ($this->now - $this->start) / 3600
                );
                break;
            case 'day':
                $number = ceil(
                    ($this->now - $this->start) / 86400
                );
                break;
            case 'week':
                $number = ceil(
                    ($this->now - $this->start) / 604800
                );
                break;
        }
        return intval($number);
    }
}