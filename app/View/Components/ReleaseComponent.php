<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ReleaseComponent extends Component
{
    public $code;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $releaseStatuses=\App\Models\ReleaseStatus::all();
        return view('components.release-component', compact('releaseStatuses'));
    }
}
