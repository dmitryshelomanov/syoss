<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\DateService;

class CheckStep
{
    private $dateService;

    public function __construct()
    {
        $this->dateService = new DateService();
    }

    public function handle($request, Closure $next)
    {
        if ($this->dateService->currentStep() < $request->week) {
            return redirect(
                route('view', ['week' => $this->dateService->currentStep()])
            );
        }
        return $next($request);
    }
}
