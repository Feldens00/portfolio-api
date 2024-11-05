<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['account'];

    public function transform(User $user): array
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ];
    }

    /**
     * Inclui dados da conta associada ao usuário.
     */
    public function includeAccount(User $user)
    {
        $account = $user->account;
        return $this->item($account, new AccountTransformer());
    }
}
