<?php

namespace App\Forms\Components;

use Closure;
use Filament\Forms\Components\Field;
use Filament\Forms\Components\FileUpload;

class UploadProfile extends FileUpload
{
    protected string $view = 'forms.components.upload-profile';
    protected bool | Closure $isMultiple = true;
}
