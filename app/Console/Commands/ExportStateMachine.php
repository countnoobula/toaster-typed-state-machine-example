<?php

namespace App\Console\Commands;

use TypedStateMachines\Edge;
use TypedStateMachines\IStateMachine;
use TypedStateMachines\State;
use TypedStateMachines\Transition;
use Illuminate\Console\Command;

class ExportStateMachine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'state_machine:export {class_name} {--exclude-transition=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export a given state machine (by class name) as a DOT graph';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $excluded_transitions = $this->getExcludedTransitions();

        /** @var IStateMachine $state_machine_class */
        $state_machine_class = $this->getStateMachineClass($this->argument('class_name'));

        /** @var IStateMachine $sm */
        $sm = $state_machine_class::create();

        printf("digraph %s {\n", $this->relativeName(get_class($sm)));
        printf("    node [margin=0.5]\n");
        /** @var Edge $edge */
        foreach ($sm->getEdges() as $edge) {
            if ($this->shouldDraw($edge, $excluded_transitions)) {
                printf("    %s\n", $this->toDot($edge));
            }
        }

        printf("}\n");
    }

    private function getStateMachineClass($class_name): string
    {
        if (!class_exists($class_name)) {
            throw new \Exception("Class $class_name not found");
        }

        if (!in_array(IStateMachine::class, class_implements($class_name))) {
            throw new \Exception("Class $class_name does not implement IStateMachine");
        }

        return $class_name;
    }

    private function relativeName($parts)
    {
        return array_reverse(explode("\\", $parts))[0];
    }

    private function toDot($obj): string
    {
        if ($obj instanceof Edge) {
            return sprintf(
                "%s -> %s [label=\"%s\"]",
                $this->toDot($obj->getSourceState()),
                $this->toDot($obj->getTargetState()),
                $this->toDot($obj->getTransition())
            );
        } elseif ($obj instanceof State) {
            return sprintf($this->relativeName($obj->getName()));
        } elseif ($obj instanceof Transition) {
            return sprintf($this->relativeName($obj->getName()));
        }

        throw new \InvalidArgumentException(
            "missing toDot implementation for: " . get_class($obj)
        );
    }

    private function getExcludedTransitions(): array
    {
        return array_fill_keys($this->option('exclude-transition'), true);
    }

    private function shouldDraw(Edge $edge, array $excluded_transitions)
    {
        $name = $edge->getTransition()->getName();

        $excluded = array_key_exists($name, $excluded_transitions)
            && $excluded_transitions[$name];

        return !$excluded;
    }
}
