<?php

namespace App\Observers;

use App\Services\Logs\AuditService;

class AuditObserver
{
    public function updated($model)
    {
        AuditService::createSingleEventAudit($model, 'updated');
    }
}