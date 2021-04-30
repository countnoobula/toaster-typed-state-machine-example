<?php

namespace App\TypedStateMachines\Toaster;

use App\Models\Toaster;
use TypedStateMachines\Actions\EdgesBuilder;
use TypedStateMachines\Edge;
use TypedStateMachines\InvalidState;
use TypedStateMachines\IStateMachine;
use TypedStateMachines\State;
use TypedStateMachines\StateMachine;
use Illuminate\Database\Eloquent\Model;

class ToasterStateMachine extends StateMachine
{
    /**
     * @var Toaster
     */
    public $toaster;

    /**
     * @var array $params
     */
    public $params;

    /**
     * List of available transitions that we use
     */
    public const TRANSITION_TURN_ON = 'turn_on';
    public const TRANSITION_TURN_OFF  = 'turn_off';

    public function __construct(Toaster $toaster, $params = [])
    {
        $this->toaster = $toaster;
        $this->params  = $params;
    }

    /**
     * @return State
     */
    public function getCurrentState(): State
    {
        // if (is_null($this->toaster->id)) {
        //     return new States\NotReady();
        // }

        return $this->guessStateClass($this->toaster->status);
    }

    /**
     * @return Edge[]
     */
    public function getEdges(): array
    {
        // $allStates = [
        //     new States\PowerOn(),
        //     new States\PowerOff(),
        // ];

        return (new EdgesBuilder())
            // ->transition(new Transitions\TurnOn())
            //    ->sources(new States\PowerOff())
            //    ->target(new States\PowerOn())
            ->build();
    }

    /**
     * Creates a new instance of the state machine.
     *
     * @return IStateMachine
     */
    public static function create(): IStateMachine
    {
        return new ToasterStateMachine(new Toaster());
    }

    /**
     * Fetch the domain of the Toaster State Machine.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getDomain(): Model
    {
        return $this->toaster;
    }
}
