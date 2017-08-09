<?php

namespace App\Providers;

use App\OrderPinCode;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Setoran;

class ViewComposerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share([
            'setoran' => $this->countSetoran(),
            'orderPinCodes' => $this->countOrderPinCodes()
        ]);
    }

    public function countOrderPinCodes()
    {
        $orderPinCodes = OrderPinCode::where('status', 0)->count();
        return $orderPinCodes;
    }

    public function countSetoran()
    {
        $setoran = Setoran::where('status', 0)->count();
        return $setoran;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
