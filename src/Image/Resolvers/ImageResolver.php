<?php

declare(strict_types=1);

namespace PaltaSolutions\Image\Resolvers;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use PaltaSolutions\Image\Domain\Models\Image;

class ImageResolver
{
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        if ($imageId = $rootValue->image_id) {
            return Image::find($imageId);
        }

        return null;
    }
}
