<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class Utils
{
    public static function getModels(): array
    {
        $models = [];
        $modelsPath = app_path('Models');
        $modelFiles = File::allFiles($modelsPath);
        foreach ($modelFiles as $modelFile) {
            $models[] = 'App\\Models\\'.$modelFile->getBasename('.php');
        }

        $models[] = config('permission.models.role');

        return $models;
    }
}
