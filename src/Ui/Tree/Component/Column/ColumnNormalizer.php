<?php namespace Anomaly\Streams\Platform\Ui\Tree\Component\Column;

use Anomaly\Streams\Platform\Ui\Tree\TreeBuilder;

/**
 * Class ColumnNormalizer
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Platform\Ui\Tree\Component\Column
 */
class ColumnNormalizer
{

    /**
     * Normalize the column input.
     *
     * @param TreeBuilder $builder
     */
    public function normalize(TreeBuilder $builder)
    {
        $columns = $builder->getColumns();

        foreach ($columns as $key => &$column) {

            /**
             * If the key is non-numerical then
             * use it as the header and use the
             * column as the column if it's a class.
             */
            if (!is_numeric($key) && !is_array($column) && class_exists($column)) {
                $column = [
                    'heading' => $key,
                    'column'  => $column
                ];
            }

            /**
             * If the key is non-numerical then
             * use it as the header and use the
             * column as the value.
             */
            if (!is_numeric($key) && !is_array($column) && !class_exists($column)) {
                $column = [
                    'heading' => $key,
                    'value'   => $column
                ];
            }

            /**
             * If the column is not already an
             * array then treat it as the value.
             */
            if (!is_array($column)) {
                $column = [
                    'value' => $column
                ];
            }

            /**
             * If no value wrap is set
             * then use a default.
             */
            array_set($column, 'wrapper', array_get($column, 'wrapper', '{value}'));

            /**
             * If there is no value then use NULL
             */
            array_set($column, 'value', array_get($column, 'value', null));
        }

        $builder->setColumns($columns);
    }
}
