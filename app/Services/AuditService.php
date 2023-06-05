<?php

namespace App\Services;

use App\Models\Audit;
use Illuminate\Support\Facades\Log;

class AuditService
{
    /**
     * Create a audit log for a single eloquent event (usually done by a observer)
     */
    public static function createSingleEventAudit($model, string $event = '')
    {
        try {
            Audit::create([
                'user_id' => 1,
                'event_type' => $event,
                'model_id' => $model->getKey(),
                'table_name' => $model->getTable(),
                'old_data' => json_encode($model->getOriginal() ?? []),
                'new_data' => json_encode($model->toArray() ?? []),
                'diff_data' => json_encode(self::getModelDiff($model))
            ]);
        } catch (\Throwable $th) {
            Log::debug('failed to save audit: ' . $th->getMessage() . '|' . $th->getFile() . '|' . $th->getLine());
        }
    }

    /**
     * Get what has changed between the original model and the new one
     *
     * @param Model $model
     * @return array
     */
    private static function getModelDiff($model)
    {
        return $model->getOriginal() ?
            array_diff($model->toArray(), $model->getOriginal())
            : [];
    }
}