<?php namespace Anomaly\Streams\Platform\Field\Command;

use Anomaly\Streams\Platform\Field\Contract\FieldInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Class UnassignField
 *
 * @link    http://anomaly.is/streams-platform
 * @author  AnomalyLabs, Inc. <hello@anomaly.is>
 * @author  Ryan Thompson <ryan@anomaly.is>
 */
class UnassignField
{

    /**
     * The field to unassign.
     *
     * @var FieldInterface
     */
    protected $field;

    /**
     * The stream to unassign
     * the field from.
     *
     * @var StreamInterface
     */
    protected $stream;

    /**
     * Create a new UnassignField instance.
     *
     * @param FieldInterface  $field
     * @param StreamInterface $stream
     */
    public function __construct(FieldInterface $field, StreamInterface $stream)
    {
        $this->field  = $field;
        $this->stream = $stream;
    }

    /**
     * Handle the command.
     *
     * @param AssignmentRepositoryInterface $assignments
     */
    public function handle(AssignmentRepositoryInterface $assignments)
    {
        if ($assignment = $assignments->findByStreamAndField($this->stream, $this->field)) {
            $assignments->delete($assignment);
        }
    }
}
