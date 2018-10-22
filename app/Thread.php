<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Thread
 *
 * @package App
 */
class Thread extends Model
{
    /**
     * @return string
     */
    public function patch(): string
    {
        return '/threads/' . $this->id;
    }
}
