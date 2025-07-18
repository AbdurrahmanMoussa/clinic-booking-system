<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class DashboardLink extends Component
{
    public string $url;

    public function __construct()
    {
        $role = Auth::check() ? Auth::user()->role : 'patient';

        $this->url = route($role . '.dashboard');
    }

    public function render()
    {
        return view('components.dashboard-link');
    }
}
