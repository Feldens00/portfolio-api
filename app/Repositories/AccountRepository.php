<?php

namespace App\Repositories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;

class AccountRepository
{
    public function getAll(): Collection
    {
        return Account::all();
    }

    public function findById(int $id): ?Account
    {
        return Account::find($id);
    }

    public function create(array $data): Account
    {
        return Account::create($data);
    }

    public function update(Account $account, array $data): bool
    {
        return $account->update($data);
    }

    public function delete(Account $account): bool
    {
        return $account->delete();
    }
}
