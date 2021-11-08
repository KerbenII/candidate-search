<?php

declare(strict_types=1);

namespace App\Searcher\Application\Enum;

class AdditionalFieldsEnum
{
    public const ALLOWED_FIELDS = [
       self::NOTES_FIELD,
       self::TAGS_FIELD
   ];

    public const TAGS_FIELD = 'tags';
    public const NOTES_FIELD = 'notes';
}
