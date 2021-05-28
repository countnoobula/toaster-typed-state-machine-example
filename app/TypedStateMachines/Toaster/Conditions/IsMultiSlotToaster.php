<?php

namespace App\TypedStateMachines\Toaster\Conditions;

class IsMultiSlotToaster extends ToasterCondition
{

    /**
     * Check if the toaster has bread.
     *
     * @return bool
     */
    public function evaluate(): bool
    {
        return $this->toaster->slots > 1;
    }
}
