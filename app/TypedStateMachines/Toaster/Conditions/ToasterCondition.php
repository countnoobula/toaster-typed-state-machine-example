<?php

namespace App\TypedStateMachines\Toaster\Conditions;

use App\Models\Toaster;
use TypedStateMachines\Conditions\Condition;

abstract class ToasterCondition extends Condition
{
    /**
     * @var Toaster
     */
    protected $toaster;

    /**
     * @var array $params
     */
    protected $params;

    public function __construct(Toaster $toaster, array $params = [])
    {
        $this->toaster = $toaster;
        $this->params  = $params;
    }
}
