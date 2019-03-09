<?php

/*
 * This file is part of the Sepiphy package.
 *
 * (c) Quynh Xuan Nguyen <seriquynh@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sepiphy\Laravel\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use Illuminate\Contracts\Foundation\Application;

class Presenter
{
    /**
     * The application implementation.
     *
     * @var Application
     */
    protected static $app;

    /**
     * Get the application implementation.
     *
     * @return Application
     */
    public static function getApplication()
    {
        return static::$app;
    }

    /**
     * Set the application implementation.
     *
     * @param  Application  $app
     * @return void
     */
    public static function setApplication(Application $app)
    {
        static::$app = $app;
    }

    /**
     * The model object.
     *
     * @var object
     */
    protected $model;

    /**
     * The additional attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Create a new presenter instance.
     *
     * @param  object  $model
     * @param  array  $attributes
     * @return void
     */
    public function __construct($model = null, array $attributes = [])
    {
        $this->model = $model;
        $this->attributes = $attributes;
    }

    /**
     * Get the dynamic property.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        if (isset($this->attributes[$key])) {
            return $this->attributes[$key];
        }

        $method = Str::camel($key);

        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        return $this->model->{$key};
    }

    /**
     * Call the dynamic method.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, array $parameters)
    {
        return $this->model->{$method}(...$parameters);
    }

    /**
     * Get the model object.
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the model object.
     *
     * @param  mixed  $model
     * @return $this
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of a form field by the given key.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getFormValue($key)
    {
        $method = Str::camel($key).'FormValue';

        if (method_exists($this, $method)) {
            return Request::old($key, $this->{$method}());
        }

        return Request::old($key, $this->{$key});
    }
}
