<?php

namespace App\TypedStateMachines\Toaster\Transitions;

use App\TypedStateMachines\Toaster\ToasterStateMachine;
use App\TypedStateMachines\Toaster\HasToaster;
use App\TypedStateMachines\Toaster\Conditions\HasBread;
use TypedStateMachines\Actions\Action;
use TypedStateMachines\Conditions\Condition;
use TypedStateMachines\Actions\SequenceAction;
use TypedStateMachines\Transition;
use App\Models\Toaster;
use TypedStateMachines\Actions\EmptyAction;
use TypedStateMachines\Conditions\TrueCondition;

class TurnOn extends Transition
{
    use HasToaster;

    public function getName(): string
    {
        return ToasterStateMachine::TRANSITION_TURN_ON;
    }

    public function getCondition(): Condition
    {
        return new HasBread($this->toaster);
    }

    public function getAction(): Action
    {
        return new EmptyAction();
    }
}
