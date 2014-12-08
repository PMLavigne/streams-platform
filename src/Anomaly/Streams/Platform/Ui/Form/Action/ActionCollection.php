<?php namespace Anomaly\Streams\Platform\Ui\Form\Action;

use Illuminate\Support\Collection;

class ActionCollection extends Collection
{

    public function active()
    {
        foreach ($this->items as $item) {

            if ($item->isActive()) {

                return $item;
            }
        }

        return null;
    }
}
 