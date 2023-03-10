<?php

namespace App\Services\Contract;

class SourceConstants
{
    public const SOURCE_CHROME_BOOKMARKS = 'chrome bookmarks';
    public const SOURCE_CHROME_TABS = 'chrome tabs';
    public const SOURCE_ANDROID_TABS = 'android tabs';

    public const SOURCES = [
        SourceConstants::SOURCE_CHROME_BOOKMARKS,
        SourceConstants::SOURCE_CHROME_TABS,
        SourceConstants::SOURCE_ANDROID_TABS,
    ];
}
