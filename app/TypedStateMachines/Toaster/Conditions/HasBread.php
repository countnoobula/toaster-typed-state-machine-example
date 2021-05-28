<?php

namespace App\TypedStateMachines\Toaster\Conditions;

class HasBread extends ToasterCondition
{

    /**
     * Check if the toaster has bread.
     *
     * @return bool
     */
    public function evaluate(): bool
    {
        return $this->toaster->has_bread;
    }
}
