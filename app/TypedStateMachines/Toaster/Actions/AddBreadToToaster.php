<?php

namespace App\TypedStateMachines\Toaster\Actions;

use TypedStateMachines\ActionResult;

class AddBreadToToaster extends ToasterAction {

	public function evaluate(): ?ActionResult {
		$this->toaster->has_bread = true;
		$this->toaster->save();

		return null;
	}
}