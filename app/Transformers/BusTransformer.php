<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class BusTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [];

    /**
     * Transform object into a generic array
     *
     * @var $resource
     * @return array
     */
    public function transform($resource)
    {
        return [

            'id' => (int) $resource->id,
			'name' => $resource->name,
			'description' => $resource->description,
			'seat_count' => $resource->seat_count,
			'state' => $resource->state,
			'sended_at' => $resource->sended_at,
			'arrived_at' => $resource->arrived_at,
			'is_active' => (bool) $resource->is_active,
			'created_at' => $resource->created_at->toDateTimeString(),
			'updated_at' => $resource->updated_at->toDateTimeString(),
			
        ];
    }
}
