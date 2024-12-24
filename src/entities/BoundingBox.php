<?php

namespace Src\Entities;

use Exception;

/**
 * @class BoundingBox
 * Represents the bounding box of an object in the format of a dataclass with (x, y, width, height).
 * By default, `BoundingBox` is set to work with denormalized co-ordinates: `x \\in [0, docwidth]` and :math:`y \\in [0, docheight]`.
 * Use the as_normalized_dict function to obtain BoundingBox with normalized co-ordinates: :math:`x \\in [0, 1]` and :math:`y \\in [0, 1]`.
 *
 * Create a BoundingBox like shown below:
 *
 * Directly:             :code:`bb = BoundingBox(x, y, width, height)`
 * From dict:            :code:`bb = BoundingBox.from_dict(bb_dict)` where :code:`bb_dict = {'x': x, 'y': y, 'width': width, 'height': height}`
 *
 * Use a BoundingBox like shown below:
 *
 * Directly:            :code:`print('The top left is: ' + str(bb.x) + ' ' + str(bb.y))`
 * Convert to dict:     :code:`bb_dict = bb.as_dict()` returns :code:`{'x': x, 'y': y, 'width': width, 'height': height}`
 *
 */
class BoundingBox extends SpatialObject
{
    public function __construct(protected float $x, protected float $y, float $width, float $height,
                                protected ?SpatialObject $spatialObject = null)
    {
        parent::__construct($width, $height);
    }

    /**
     * Builds an axis aligned BoundingBox from a dictionary like :code:`{'x': x, 'y': y, 'width': width, 'height': height}`.
     * The coordinates will be denormalized according to spatial_object.
     *
     * @param array $box Array of normalized co-ordinates.
     * @param SpatialObject|null $spatialObject Object with width and height attributes.
     * @return BoundingBox
     */
    public static function fromNormalizedArray(array $box, ?SpatialObject $spatialObject): BoundingBox
    {
        return self::fromArray($box, $spatialObject);
    }

    /**
     * Denormalizes the coordinates according to spatial_object (used as a calibrator).
     * The SpatialObject is assumed to be a container for the bounding boxes (i.e: Page).
     * Any object with width, height attributes can be used as a SpatialObject.
     *
     * @param float $x Normalized co-ordinate x
     * @param float $y Normalized co-ordinate y
     * @param float $width Normalized width of BoundingBox
     * @param float $height Normalized height of BoundingBox
     * @param SpatialObject $spatialObject Object with width and height attributes (i.e: Page).
     * @return array
     */
    public static function denormalize(float $x, float $y, float $width, float $height, SpatialObject $spatialObject): array
    {
        return [
            'x' => $x * $spatialObject->width,
            'y' => $y * $spatialObject->height,
            'width' => $width * $spatialObject->width,
            'height' => $height * $spatialObject->height,
        ];
    }

    /**
     * Builds an axis aligned bounding box from top-left, width and height properties.
     * The coordinates are assumed to be denormalized.
     *
     * @param float $x Left ~ [0, doc_width]
     * @param float $y Top  ~ [0, doc_height]
     * @param float $width Width ~ [0, doc_width]
     * @param float $height Height  ~ [0, doc_height]
     * @param SpatialObject|null $spatialObject Some object with width and height attributes (i.e: Document, ConvertibleImage).
     * @return BoundingBox object in denormalized coordinates:  ~ [0, doc_height] x [0, doc_width]
     */
    public static function fromDenormalizedXywh(float $x, float $y, float $width, float $height, ?SpatialObject $spatialObject): BoundingBox
    {
        return new BoundingBox($x, $y, $width, $height, $spatialObject);
    }

    /**
     * Builds an axis aligned bounding box from top-left and bottom-right coordinates.
     * The coordinates are assumed to be denormalized.
     *
     * @param float $x1 Left  ~ [0, wdoc_idth]
     * @param float $y1 Top ~ [0, doc_height]
     * @param float $x2 Right  ~ [0, doc_width]
     * @param float $y2 Bottom ~ [0, doc_height]
     * @param SpatialObject|null $spatialObject Some object with width and height attributes (i.e: Document, ConvertibleImage).
     * @return BoundingBox BoundingBox object in denormalized coordinates:  ~ [0, doc_height] x [0, doc_width]
     */
    public static function fromDenormalizedCorners(float $x1, float $y1, float $x2, float $y2, ?SpatialObject $spatialObject): BoundingBox
    {
        $x = $x1;
        $y = $y1;
        $width = $x2 - $x1;
        $height = $y2 - $y1;
        return new BoundingBox($x, $y, $width, $height, $spatialObject);
    }

    /**
     * Builds an axis aligned bounding box from top-left and bottom-right coordinates.
     * The coordinates are assumed to be denormalized.
     * If spatial_object is not None, the coordinates will be denormalized according to the spatial object.
     *
     * @param float $left ~ [0, doc_width]
     * @param float $top ~ [0, doc_height]
     * @param float $right ~ [0, doc_width]
     * @param float $bottom ~ [0, doc_height]
     * @param SpatialObject|null $spatialObject Some object with width and height attributes
     * @return BoundingBox BoundingBox object in denormalized coordinates:  ~ [0, doc_height] x [0, doc_width]
     */
    public static function fromDenormalizedBorders(float $left, float $top, float $right, float $bottom, ?SpatialObject $spatialObject): BoundingBox
    {
        return self::fromDenormalizedCorners($left, $top, $right, $bottom, $spatialObject);
    }

    /**
     * Builds an axis aligned bounding box from a dictionary of:
     * {'x': x, 'y': y, 'width': width, 'height': height}
     * The coordinates will be denormalized according to the spatial object.
     *
     * @param array $box {'x': x, 'y': y, 'width': width, 'height': height} of [0, doc_height] x [0, doc_width]
     * @param SpatialObject|null $spatialObject Some object with width and height attributes
     * @return BoundingBox BoundingBox object in denormalized coordinates:  ~ [0, doc_height] x [0, doc_width]
     */
    public static function fromDenormalizedArray(array $box, ?SpatialObject $spatialObject): BoundingBox
    {
        $x = $box["x"];
        $y = $box["y"];
        $width = $box["width"];
        $height = $box["height"];
        return new BoundingBox($x, $y, $width, $height, $spatialObject);
    }

    /**
     * @param BoundingBox[] $bboxes list of bounding boxes
     * @param SpatialObject|null $spatialObject spatial object to be added to the returned bbox
     * @return BoundingBox
     * @throws Exception
     */
    public static function enclosingBbox(array $bboxes, ?SpatialObject $spatialObject = null) {
        // Filter out null values from the list of bounding boxes
        $bboxes = array_filter($bboxes, function($bbox) {
            return $bbox !== null;
        });

        // Check if the first element is of type BoundingBox
        if (!empty($bboxes) && !($bboxes[0] instanceof BoundingBox)) {
            try {
                $bboxes = array_map(function($bbox) {
                    return $bbox->bbox;
                }, $bboxes);
            } catch (Exception $e) {
                throw new Exception("bboxes must be of type List[BoundingBox] or of type List[DocumentEntity]");
            }
        }

        // Initialize coordinates
        $x1 = INF;
        $y1 = INF;
        $x2 = -INF;
        $y2 = -INF;

        // FIXME: This should not happen
        if (empty(array_filter($bboxes, function($bbox) { return $bbox !== null; }))) {
            error_log("At least one bounding box needs to be non-null");
            return new BoundingBox(0, 0, 1, 1, $spatialObject);
        }

        // If spatial_object is not provided, use the spatial_object of the first bounding box
        if ($spatialObject === null) {
            $spatialObject = $bboxes[0]->spatialObject;
        }

        // Calculate the enclosing bounding box
        foreach ($bboxes as $bbox) {
            if ($bbox !== null) {
                $x1 = min($x1, $bbox->x);
                $x2 = max($x2, $bbox->x + $bbox->width);
                $y1 = min($y1, $bbox->y);
                $y2 = max($y2, $bbox->y + $bbox->height);
            }
        }

        return new BoundingBox($x1, $y1, $x2 - $x1, $y2 - $y1, $spatialObject);
    }

    /**
     * Returns true if Bounding Box A is within Bounding Box B
     *
     * @param BoundingBox $boxA
     * @param BoundingBox $boxB
     * @return bool
     */
    public static function isInside(BoundingBox $boxA, BoundingBox $boxB): bool
    {
        return (
            $boxA->x >= $boxB->x and
            ($boxA->x + $boxA->width) <= ($boxB->x + $boxB->width) and
            $boxA->y >= $boxB->y and
            ($boxA->y + $boxA->height) <= ($boxB->y + $boxB->height)
        );
    }

    /**
     * Returns true if the center point of Bounding Box A is within Bounding Box B
     *
     * @param BoundingBox $boxA
     * @param BoundingBox $boxB
     * @return bool
     */
    public static function centerIsInside(BoundingBox $boxA, BoundingBox $boxB): bool
    {
        return (
            ($boxA->x + $boxA->width / 2) >= $boxB->x and
            ($boxA->x + $boxA->width / 2) <= ($boxB->x + $boxB->width) and
            ($boxA->y + $boxA->height / 2) >= $boxB->y and
            ($boxA->y + $boxA->height / 2) <= ($boxB->y + $boxB->height)
        );
    }

    /**
     * Returns the area of the bounding box, handles negative bboxes as 0-area
     *
     * @return float Bounding box area
     */
    public function area(): float
    {
        if ($this->width < 0 or $this->height < 0)
            return 0;
        else
            return $this->width * $this->height;
    }

    /**
     * Builds an axis aligned BoundingBox from a dictionary like :code:`{'Left': x, 'Top': y, 'Width': width, 'Height': height}`.
     * The co-ordinates will be denormalized according to spatial_object.
     *
     * @param array $box
     * @param SpatialObject|null $spatialObject
     * @return BoundingBox
     */
    public static function fromArray(array $box, ?SpatialObject $spatialObject): BoundingBox
    {
        $x = $box["Left"];
        $y = $box["Top"];
        $width = $box["Width"];
        $height = $box["Height"];
        return new BoundingBox($x, $y, $width, $height, $spatialObject);
    }

    public function getIntersection(BoundingBox $bbox) : BoundingBox
    {
        return self::fromDenormalizedCorners(
            max($this->x, $bbox->x),
            max($this->y, $bbox->y),
            min($this->x + $this->width, $bbox->x + $bbox->width),
            min($this->y + $this->height, $bbox->y + $bbox->height),
            $this->spatialObject
        );
    }

    /**
     * Returns the distance between the center point of the bounding box and another bounding box
     *
     * @param BoundingBox $bbox
     * @return float
     */
    public function getDistance(BoundingBox $bbox): float
    {
        return sqrt(
            (($this->x + $this->width / 2) - ($bbox->x + $bbox->width / 2)) ** 2
            + (($this->y + $this->height / 2) - ($bbox->y + $bbox->height / 2)) ** 2
        );
    }

    public function toString(): string
    {
        return "x: {$this->x}, y: {$this->y}, width: {$this->width}, height: {$this->height}";
    }
}