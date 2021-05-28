<?php

namespace App\TypedStateMachines\Toaster\States;

use TypedStateMachines\State;
use App\TypedStateMachines\Toaster\HasToaster;
use TypedStateMachines\Contracts\HasOnEntry;
use App\Models\Toaster;

class PoweredOff extends State implements HasOnEntry
{
    use HasToaster;

    public function onEntry() {
    	$this->toaster->status = Toaster::STATE_POWERED_OFF;
    	$this->toaster->save();
    }
}
