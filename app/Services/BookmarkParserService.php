<?php

namespace App\Services;

use App\Models\DTO\LinkDTO;

/**
 * Class wrapper of netscape bookmark parser (chrome bookmarks).
 */
class BookmarkParserService
{
    /** @var NetscapeBookmarkParser $netscapeParser */
    protected NetscapeBookmarkParser $netscapeParser;

    public function __construct(
        protected NetscapeBookmarkParser $parser
    )
    {
        $this->netscapeParser = $parser;
    }

    /**
     * todo handle exceptions
     * @param string $filePath
     * @return array|\App\Models\ParseResult[]
     */
    public function parseGoogleChromeBookmarks(
        string $filePath
    ) : array
    {
        // an array of ParseResult objects
        $result = [];

        // read the file
        $content = $this->netscapeParser->parseFile($filePath);

        // get info for each item (parsed bookmark) & pass it to ParseResult object
        foreach ($content as $bookmarkLinkData) {
            $linkDTO = new LinkDTO($bookmarkLinkData);

            $result[] = $linkDTO;
        }

        return $result;
    }
}
