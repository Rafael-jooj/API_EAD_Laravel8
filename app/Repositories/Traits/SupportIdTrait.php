<?php

namespace App\Repositories\Traits;

use App\Models\Support;

trait SupportIdTrait
{
    private function getSupport(string $id)
    {
        return Support::findOrFail($id);
    }
}
