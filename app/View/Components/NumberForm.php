<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NumberForm extends Component
{
    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.form.number');
    }
}
