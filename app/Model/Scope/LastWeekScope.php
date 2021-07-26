<?php

declare(strict_types=1);

namespace App\Model\Scope;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Carbon;

class LastWeekScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $currentDate = Carbon::now();
        $passDate = $currentDate
            ->subDays($currentDate->dayOfWeek)
            ->subWeek();
        $passDate='2022-01-01';
        $builder->where('created_at', '>', $passDate);
        //wow. to zmienia, że wszystkie zapytania dotyczące modelu (implementacja w modelu Game)
        //są wcześniej obsługiwane przez tego scope'a...
    }
}
