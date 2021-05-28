<?php

namespace App\TypedStateMachines\Toaster\States;

use TypedStateMachines\State;
use App\TypedStateMachines\Toaster\HasToaster;
use TypedStateMachines\Contracts\HasOnEntry;
use TypedStateMachines\Contracts\HasOnExit;
use App\Models\Toaster;

class PoweredOn extends State implements HasOnEntry, HasOnExit
{
    use HasToaster;

    public function onEntry() {
    	$this->toaster->status = Toaster::STATE_POWERED_ON;
    	$this->toaster->save();
    }

    public function onExit() {
    	$this->toaster->has_bread = false;
    	$this->toaster->save();
    }
}
