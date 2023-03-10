<?php

namespace App\Services\Contract;

class ContentTypeConstants
{
    public const CONTENT_TYPE_VIDEO = 'video';
    public const CONTENT_TYPE_BOOK = 'book';
    public const CONTENT_TYPE_NEWS = 'news';
    public const CONTENT_TYPE_ARTICLE = 'article';
    public const CONTENT_TYPE_SOCIAL_NETWORK = 'social network page';
    public const CONTENT_TYPE_EDUCATION = 'education material';

    public const CONTENT_TYPES = [
        ContentTypeConstants::CONTENT_TYPE_VIDEO,
        ContentTypeConstants::CONTENT_TYPE_BOOK,
        ContentTypeConstants::CONTENT_TYPE_NEWS,
        ContentTypeConstants::CONTENT_TYPE_ARTICLE,
        ContentTypeConstants::CONTENT_TYPE_SOCIAL_NETWORK,
        ContentTypeConstants::CONTENT_TYPE_EDUCATION,
    ];
}
