<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\DateService;

class StartApp
{
    private $dateService;

    public function __construct()
    {
        $this->dateService = new DateService();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * Стартуем приложение по дате, иначе перекидываем на закрытый роут
     */
    public function handle($request, Closure $next)
    {
        if ($this->dateService->timeDifference() >= $this->dateService->stepByLong()) {
            return redirect('/close');
        } else if (time() <=  $this->dateService->start ){
            return redirect('/wait');
        }
        return $next($request);
    }
}
