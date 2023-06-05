<?php

namespace App\Traits;

use App\Observers\AuditObserver;

trait AuditTrait
{
    public static function bootAuditTrait()
    {
        static::observe(new AuditObserver());
    }
}