<?php namespace Anomaly\Streams\Platform\Ui\Tree\Command;

use Anomaly\Streams\Platform\Ui\Tree\TreeBuilder;
use Illuminate\Routing\ResponseFactory;

/**
 * Class SetTreeResponse
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class SetTreeResponse
{

    /**
     * The tree builder.
     *
     * @var TreeBuilder
     */
    protected $builder;

    /**
     * Create a new SetTreeResponse instance.
     *
     * @param TreeBuilder $builder
     */
    public function __construct(TreeBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param ResponseFactory $response
     */
    public function handle(ResponseFactory $response)
    {
        $tree = $this->builder->getTree();

        $options = $tree->getOptions();
        $data    = $tree->getData();

        $tree->setResponse($response->view($options->get('wrapper_view', 'streams::blank'), $data));
    }
}
