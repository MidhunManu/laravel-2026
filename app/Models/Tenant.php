<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Tenant as BaseModel;

#[Fillable([
    'role',
    'trial_ends_at',
])]
class Tenant extends BaseModel implements TenantWithDatabase
{
    use HasDomains, HasDatabase;

    public static function getCustomColumns(): array
    {
        return [
            'plan',
            'trial_ends_at',
        ];
    }
}
