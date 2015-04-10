<?php namespace Anomaly\Streams\Platform\Ui\Form\Component\Field;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeBuilder;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Support\Hydrator;
use Illuminate\Http\Request;

/**
 * Class FieldFactory
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Platform\Ui\Form\Component\Field
 */
class FieldFactory
{

    /**
     * The field type builder utility.
     *
     * @var FieldTypeBuilder
     */
    protected $builder;

    /**
     * The request object.
     *
     * @var Request
     */
    protected $request;

    /**
     * The hydrator utility.
     *
     * @var Hydrator
     */
    protected $hydrator;

    /**
     * Create a new FieldFactory instance.
     *
     * @param FieldTypeBuilder $builder
     * @param Request          $request
     * @param Hydrator         $hydrator
     */
    public function __construct(FieldTypeBuilder $builder, Request $request, Hydrator $hydrator)
    {
        $this->builder  = $builder;
        $this->request  = $request;
        $this->hydrator = $hydrator;
    }

    /**
     * Make a field type.
     *
     * @param array           $parameters
     * @param StreamInterface $stream
     * @param null            $entry
     * @return FieldType
     */
    public function make(array $parameters, StreamInterface $stream = null, $entry = null)
    {
        if ($stream && $assignment = $stream->getAssignment(array_get($parameters, 'field'))) {

            $field = $assignment->getFieldType();

            /* @var EntryInterface $entry */
            $field->setValue(array_pull($parameters, 'value', $entry->getFieldValue($field->getField())));
        } elseif (is_object($entry)) {

            $field = $this->builder->build($parameters);

            $field->setValue(array_pull($parameters, 'value', $entry->{$field->getField()}));
        } else {

            $field = $this->builder->build($parameters);

            $field->setValue(array_pull($parameters, 'value'));
        }

        // Set the entry.
        $field->setEntry($entry);

        // Merge in rules and validators.
        $field->mergeRules(array_pull($parameters, 'rules', []));
        $field->mergeConfig(array_pull($parameters, 'config', []));
        $field->mergeValidators(array_pull($parameters, 'validators', []));

        // Hydrate the field with parameters.
        $this->hydrator->hydrate($field, $parameters);

        return $field;
    }
}
