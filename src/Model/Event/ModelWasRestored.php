<?php namespace Anomaly\Streams\Platform\Model\Event;

use Anomaly\Streams\Platform\Model\EloquentModel;

/**
 * Class ModelWasRestored
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class ModelWasRestored
{

    /**
     * The model object.
     *
     * @var EloquentModel
     */
    protected $model;

    /**
     * Create a new ModelWasRestored instance.
     *
     * @param EloquentModel $model
     */
    public function __construct(EloquentModel $model)
    {
        $this->model = $model;
    }

    /**
     * Get the model object.
     *
     * @return EloquentModel
     */
    public function getModel()
    {
        return $this->model;
    }
}
