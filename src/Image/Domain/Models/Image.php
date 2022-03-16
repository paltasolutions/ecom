<?php

declare(strict_types=1);

namespace PaltaSolutions\Image\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PaltaSolutions\Image\Infrastructure\Database\Factories\ImageFactory;
use PaltaSolutions\Support\Eloquent\Concerns\HasUuid;

class Image extends Model
{
    use HasFactory;
    use HasUuid;

    protected static function newFactory()
    {
        return ImageFactory::new();
    }
}
