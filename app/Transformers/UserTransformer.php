<?php

namespace CodeDelivery\Transformers;

use CodeDelivery\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class UserTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['client'];
    /**
     * Transform the \Client entity
     * @param \User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'         => (int) $model->id,
            'name'       => $model->name,
            'email'      => $model->email,
            'role'       => $model->role,
        ];
    }
    public function includeClient(User $model){
        return $this->item($model->client, new ClientTransformer());
    }
}
