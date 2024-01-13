<?php

namespace Uptoolkit\Addressable\Traits;

use DB;
use Illuminate\Database\Eloquent\Model;

trait HasAddresses
{
    /**
     * @param string $role
     *
     * @return bool
     */
    public function hasAddress($role)
    {
        return !empty($this->address($role));
    }

    /**
     * @param string $role
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function address($role, $address = null)
    {
        if (is_array($address)) {
            $address = $this->addresses()->create($address);
        }

        if ($address instanceof Model) {
            $address->role($role);
        }

        return $this->addresses()->whereRole($role)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function addresses()
    {
        return $this->morphMany(config('laravel-addressable.models.address'), 'model');
    }
}
