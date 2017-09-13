<?php

namespace App\Services;

/**
 * Class DateService
 * @package App\Services
 * Если нужны шаги по недельно и тд - то нужно явно указать в конфиге. иначе не правильные расчеты
 */

class DateService
{
    /**
     * Длительность приложения
     * @var mixed
     */
    private $long;
    /**
     * Кол-во шагов
     * @var mixed
     */
    private $step;
    /**
     * Текущий шаг
     * @var int
     */
    private $now;
    /**
     * Тип по умолчанию
     * @var mixed
     */
    private $reckoning;
    /**
     * Дата старта
     * @var mixed
     */
    public $start;
    /**
     * Массив измерения времени
     * @var array
     */
    private $dateCalculate = [
        "second" => 1,
        "minute" => 60,
        "hour" => 3600,
        "day" => 86400,
        "week" => 604800,
        "month" => 2419200
    ];

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
        return intval(
            ceil($this->step / $this->dateCalculate[$type])
        );
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
        return intval(
            ceil(($this->now - $this->start) / $this->dateCalculate[$type])
        );
    }
}