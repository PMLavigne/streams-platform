<?php namespace Anomaly\Streams\Platform\Ui\Table\View\Contract;

use Anomaly\Streams\Platform\Ui\Table\Table;

interface ViewInterface
{

    public function handle(Table $table);

    public function viewData();

    public function setAttributes(array $attributes);

    public function getAttributes();

    public function setActive($active);

    public function isActive();

    public function setHandler($handler);

    public function getHandler();

    public function setPrefix($prefix);

    public function getPrefix();

    public function setText($text);

    public function getText();

    public function setSlug($slug);

    public function getSlug();
}
 