<?php

/*
 * This file is part of the Sepiphy package.
 *
 * (c) Quynh Xuan Nguyen <seriquynh@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sepiphy\Laravel\Support\Interaction;

use Illuminate\Contracts\View\Factory as ViewFactory;

trait InteractsWithViewFactory
{
    /**
     * The view factory implementation
     *
     * @var Factory
     */
    protected $views;

    /**
     * Get the view factory implementation.
     *
     * @return Factory
     */
    public function getViewFactory()
    {
        return $this->views;
    }

    /**
     * Set the view factory implementation.
     *
     * @param  Factory  $views
     * @return $this
     */
    public function setViewFactory(ViewFactory $views)
    {
        $this->views = $views;

        return $this;
    }
}
