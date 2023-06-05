<?php

namespace App\Observers;

use App\Models\Audit;
use App\Services\AuditService;

class AuditObserver
{
    public function updated($model)
    {
        AuditService::createSingleEventAudit($model, Audit::EVENT_TYPE_UPDATED);
    }
}