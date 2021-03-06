<?php namespace Anomaly\Streams\Platform\Ui\Grid\Component\Button;

use Anomaly\Streams\Platform\Ui\Grid\GridBuilder;

/**
 * Class ButtonInput
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 */
class ButtonInput
{

    /**
     * The button guesser.
     *
     * @var ButtonGuesser
     */
    protected $guesser;

    /**
     * The resolver utility.
     *
     * @var ButtonResolver
     */
    protected $resolver;

    /**
     * The button normalizer.
     *
     * @var ButtonNormalizer
     */
    protected $normalizer;

    /**
     * Create a new ButtonInput instance.
     *
     * @param ButtonResolver   $resolver
     * @param ButtonGuesser    $guesser
     * @param ButtonNormalizer $normalizer
     */
    public function __construct(ButtonResolver $resolver, ButtonGuesser $guesser, ButtonNormalizer $normalizer)
    {
        $this->guesser    = $guesser;
        $this->resolver   = $resolver;
        $this->normalizer = $normalizer;
    }

    /**
     * Read builder button input.
     *
     * @param GridBuilder $builder
     */
    public function read(GridBuilder $builder)
    {
        $this->resolver->resolve($builder);
        $this->normalizer->normalize($builder);
        $this->guesser->guess($builder);
    }
}
