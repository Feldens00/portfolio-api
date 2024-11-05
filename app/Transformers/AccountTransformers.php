<?php

namespace App\Transformers;

use App\Models\Account;
use League\Fractal\TransformerAbstract;

class AccountTransformer extends TransformerAbstract
{
    public function transform(Account $account): array
    {
        return [
            'id' => $account->id,
            'account_number' => $account->account_number,
            'balance' => $account->balance,
            'status' => $account->status,
            'created_at' => $account->created_at,
            'updated_at' => $account->updated_at,
        ];
    }
}
