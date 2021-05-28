<?php

namespace App\TypedStateMachines\Toaster\Transitions;

use App\TypedStateMachines\Toaster\ToasterStateMachine;
use App\TypedStateMachines\Toaster\HasToaster;
use TypedStateMachines\Actions\Action;
use TypedStateMachines\Conditions\Condition;
use TypedStateMachines\Actions\SequenceAction;
use TypedStateMachines\Transition;
use App\Models\Toaster;
use TypedStateMachines\Actions\EmptyAction;
use TypedStateMachines\Conditions\TrueCondition;

class TurnOff extends Transition
{
    use HasToaster;

    public function getName(): string
    {
        return ToasterStateMachine::TRANSITION_TURN_OFF;
    }

    public function getCondition(): Condition
    {
        return new TrueCondition();
    }

    public function getAction(): Action
    {
        return new EmptyAction();
    }
}
