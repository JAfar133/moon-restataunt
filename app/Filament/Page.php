<?php

namespace App\Filament;

use Filament\Pages\Page as FPage;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class Page extends FPage
{

    protected static bool $shouldRegisterNavigation = true;

    public function mountData()
    {
        return [];
    }

    public function render(): View
    {
        $pdf = Storage::path('menu-pdf/menu.pdf');

        return view(static::$view, $this->mountData())
            ->layout(static::$layout, $this->getLayoutData());
    }
}
