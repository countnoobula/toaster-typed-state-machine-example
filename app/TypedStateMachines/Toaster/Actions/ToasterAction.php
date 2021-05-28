<?php

namespace App\TypedStateMachines\Toaster\Actions;

use App\Models\Toaster;
use TypedStateMachines\Actions\Action;

abstract class ToasterAction implements Action
{
    /**
     * @var Toaster
     */
    protected $toaster;

    public function __construct(Toaster $toaster)
    {
        $this->toaster = $toaster;
    }
}
