<?php

namespace App\TypedStateMachines\Toaster\Transitions;

use App\TypedStateMachines\Toaster\ToasterStateMachine;
use App\TypedStateMachines\Toaster\HasToaster;
use App\TypedStateMachines\Toaster\Actions\AddBreadToToaster;
use App\TypedStateMachines\Toaster\Conditions\HasBread;
use App\TypedStateMachines\Toaster\Conditions\IsMultiSlotToaster;
use TypedStateMachines\Actions\Action;
use TypedStateMachines\Conditions\Condition;
use TypedStateMachines\Actions\SequenceAction;
use TypedStateMachines\Transition;
use App\Models\Toaster;
use TypedStateMachines\Actions\EmptyAction;
use TypedStateMachines\Conditions\OrCondition;
use TypedStateMachines\Conditions\NotCondition;

class AddBread extends Transition
{
    use HasToaster;

    public function getName(): string
    {
        return ToasterStateMachine::TRANSITION_ADD_BREAD;
    }

    public function getCondition(): Condition
    {
        return new OrCondition(
            new NotCondition(new HasBread($this->toaster)),
            new IsMultiSlotToaster($this->toaster)
        );
    }

    public function getAction(): Action
    {
        return new AddBreadToToaster($this->toaster);
    }
}
