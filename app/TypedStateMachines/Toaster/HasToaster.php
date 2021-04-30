<?php

namespace App\TypedStateMachines\Toaster;

use App\Models\Toaster;
use TypedStateMachines\IStateMachine;
use TypedStateMachines\StateMachine;

trait HasToaster
{

    /**
     * @var Toaster
     */
    protected $toaster;

    protected $params;

    public function setStateMachine(IStateMachine $stateMachine)
    {
        //We all love PHP "type system"
        if (! $stateMachine instanceof StateMachine) {
            throw new \LogicException("unexpected state machine type");
        }

        $this->toaster = $stateMachine->toaster;
        $this->params     = $stateMachine->params;
    }
}
