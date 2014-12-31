<?php namespace Anomaly\Streams\Platform\Ui\Form\Component\Action;

use Anomaly\Streams\Platform\Ui\Button\Button;
use Anomaly\Streams\Platform\Ui\Form\Component\Action\Contract\ActionInterface;

/**
 * Class Action
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Platform\Ui\Form\Component\Action
 */
class Action extends Button implements ActionInterface
{

    /**
     * The active flag.
     *
     * @var bool
     */
    protected $active = false;

    /**
     * The action prefix.
     *
     * @var string|null
     */
    protected $prefix = null;

    /**
     * The action slug.
     *
     * @var string
     */
    protected $slug = 'default';

    /**
     * The responding redirect URL.
     *
     * @var null|string
     */
    protected $redirect = null;

    /**
     * The setFormResponse handler.
     *
     * @var mixed
     */
    protected $formResponseHandler = 'Anomaly\Streams\Platform\Ui\Form\Component\Action\ActionResponseHandler@handle';

    /**
     * Set the form response handler.
     *
     * @param $handler
     * @return $this
     */
    public function setFormResponseHandler($handler)
    {
        $this->formResponseHandler = $handler;

        return $this;
    }

    /**
     * Get the form response handler.
     *
     * @return mixed
     */
    public function getFormResponseHandler()
    {
        return $this->formResponseHandler;
    }

    /**
     * Set the redirect URL.
     *
     * @param $redirect
     * @return $this
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;

        return $this;
    }

    /**
     * Get the redirect URL.
     *
     * @return null|string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * Set the active flag.
     *
     * @param bool $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the active flag.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Set the action prefix.
     *
     * @param string $prefix
     * @return $this
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get the action prefix.
     *
     * @return null|string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set the action slug.
     *
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the action slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}