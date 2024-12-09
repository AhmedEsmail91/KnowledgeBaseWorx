<?php

namespace App\Filament\Widgets;

use App\Models\Account;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TestWidget extends BaseWidget
{
    //
    protected function getStats(): array
    {
        $accounts_over_time=Account::all();
        $accounts_over_time->groupBy('created_at');
        return [
            Stat::make('Users',$accounts_over_time->count())
                ->description('Total number of Accounts')
//                ->chart()
                ->color('info')
                ->icon('heroicon-o-user-group',IconPosition::Before),
        ];
    }
}
