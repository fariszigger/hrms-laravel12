<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarMenu extends Component
{
    public string $title;
    public string $icon;
    public array $routes;
    public string $dropdownId;

    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $icon = '', array $routes = [], string $dropdownId = '')
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->routes = $routes;
        $this->dropdownId = $dropdownId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar-menu');
    }
}
