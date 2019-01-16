<?php

/*
 * This file is part of the Sepiphy package.
 *
 * (c) Nguyễn Xuân Quỳnh <nguyenxuanquynh2210vghy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sepiphy\Laravel\Support;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder as QBuilder;
use Illuminate\Database\Eloquent\Builder as EBuilder;

abstract class Query
{
    /**
     * Build a builder with the given request.
     *
     * @param  QBuilder|EBuilder  $builder
     * @param  Request  $request
     * @return QBuilder|EBuilder
     */
    public function build($builder, $request)
    {
        $methods = get_class_methods($this);

        foreach ($methods as $method) {
            if ($method !== __FUNCTION__ && Str::startsWith($method, 'build')) {
                $this->{$method}($builder, $request);
            }
        }

        return $builder;
    }
}
