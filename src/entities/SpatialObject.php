<?php

namespace Src\Entities;

/**
 * @class SpatialObject
 * Class to define an object that has a width and height. This mostly used for @class `BoundingBox`
 * reference to be able to provide normalized coordinates.
 *
 */
class SpatialObject
{
    public function __construct(public float $width, public float $height)
    {
    }
}