<?php namespace Anomaly\Streams\Platform\Ui\Table\Command;

use Anomaly\Streams\Platform\Ui\Table\Event\TableDataLoaded;
use Laracasts\Commander\CommanderTrait;
use Laracasts\Commander\Events\DispatchableTrait;

class MakeTableCommandHandler
{

    use CommanderTrait;
    use DispatchableTrait;

    public function handle(MakeTableCommand $command)
    {
        $builder = $command->getBuilder();
        $table   = $builder->getTable();

        $args = compact('builder');

        $this->execute('Anomaly\Streams\Platform\Ui\Table\Command\SetTableDataCommand', $args);
        $this->execute('Anomaly\Streams\Platform\Ui\Table\Row\Command\SetRowDataCommand', $args);
        $this->execute('Anomaly\Streams\Platform\Ui\Table\View\Command\SetViewDataCommand', $args);
        $this->execute('Anomaly\Streams\Platform\Ui\Table\Header\Command\SetHeaderDataCommand', $args);
        $this->execute('Anomaly\Streams\Platform\Ui\Table\Filter\Command\SetFilterDataCommand', $args);
        $this->execute('Anomaly\Streams\Platform\Ui\Table\Action\Command\SetActionDataCommand', $args);

        $this->execute('Anomaly\Streams\Platform\Ui\Table\Command\SetPaginationDataCommand', $args);

        $table->raise(new TableDataLoaded($table));

        $this->dispatchEventsFor($table);

        $table->setContent(view($table->getView(), $table->getData()));
    }
}
 