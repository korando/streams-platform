<?php namespace Anomaly\Streams\Platform\Ui\Form\Component\Section\Command;

use Anomaly\Streams\Platform\Ui\Form\Component\Section\SectionBuilder;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

/**
 * Class BuildSections
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class BuildSections
{

    /**
     * The form builder.
     *
     * @var FormBuilder
     */
    protected $builder;

    /**
     * Create a new BuildSections instance.
     *
     * @param FormBuilder $builder
     */
    public function __construct(FormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param SectionBuilder $builder
     */
    public function handle(SectionBuilder $builder)
    {
        $builder->build($this->builder);
    }
}
