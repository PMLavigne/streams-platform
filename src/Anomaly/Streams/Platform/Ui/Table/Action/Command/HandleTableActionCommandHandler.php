<?php namespace Anomaly\Streams\Platform\Ui\Table\Action\Command;

class HandleTableActionCommandHandler
{

    public function handle(HandleTableActionCommand $command)
    {
        $builder = $command->getBuilder();
        $table   = $builder->getTable();
        $actions = $table->getActions();

        if ($action = $actions->active()) {

            $ids = app('request')->get($table->getPrefix() . 'id');

            $handler = $action->getHandler();

            if (is_string($handler) or $handler instanceof \Closure) {

                app()->call($handler, compact('table', 'ids'));
            }

            if ($handler === null) {

                $action->handle($table, $ids);
            }

            app('streams.messages')->flash();

            $table->setResponse(redirect(app('request')->fullUrl()));
        }
    }
}
 