# Example usage

```php
$model = \App\Models\Toaster::first()
$params = [];
$state_machine = new App\TypedStateMachines\Toaster\ToasterTypedStateMachine($model, $params)
$state_machine->triggerTransition(new TurnOn($model, $params));
```
