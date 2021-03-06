<?php namespace Anomaly\Streams\Platform\Ui\Table\Component\Row\Contract;

use Illuminate\Support\Collection;

/**
 * Interface RowInterface
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
interface RowInterface
{

    /**
     * Set the row buttons.
     *
     * @param $buttons
     * @return $this
     */
    public function setButtons($buttons);

    /**
     * Get the row buttons.
     *
     * @return mixed
     */
    public function getButtons();

    /**
     * Set the row columns.
     *
     * @param $columns
     * @return $this
     */
    public function setColumns(Collection $columns);

    /**
     * Get the row columns.
     *
     * @return mixed
     */
    public function getColumns();

    /**
     * Set the row entry.
     *
     * @param $entry
     * @return $this
     */
    public function setEntry($entry);

    /**
     * Get the row entry.
     *
     * @return mixed
     */
    public function getEntry();
}
