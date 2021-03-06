<?php

namespace App\Transformers;

use League\Fractal;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;

class UserTransformer extends TransformerAbstract
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
			'role_level' => (int) $resource->role_level,
			'name' => $resource->name,
			'mobile' => $resource->mobile,
			'sex' => (bool) $resource->sex,
			'company' => $resource->company,
			'position' => $resource->position,
			'qr_code' => $resource->qr_code
			
        ];
    }
}
