<?php

namespace App\TypedStateMachines\Toaster\States;

use TypedStateMachines\State;
use App\TypedStateMachines\Toaster\HasToaster;

class NotReady extends State
{
    use HasToaster;
}
