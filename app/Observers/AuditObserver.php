<?php

namespace App\Observers;

use App\Services\AuditService;

class AuditObserver
{
    public function updated($model)
    {
        AuditService::createSingleEventAudit($model, 'updated');
    }
}