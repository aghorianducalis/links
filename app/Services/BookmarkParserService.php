<?php

namespace App\Services;

use App\Models\ParseResult;

class BookmarkParserService
{
    /** @var NetscapeBookmarkParser $netscapeParser */
    protected $netscapeParser;

    public function __construct(
        /*protected */NetscapeBookmarkParser $parser
    )
    {
        $this->netscapeParser = $parser;
    }

    /**
     * todo handle exceptions
     * @param string $fileName
     * @return array|ParseResult[]
     */
    public function parseGoogleChromeBookmarks(
        string $fileName // todo object
    ) : array
    {
//        $fileName = '/home/user/PHPProjects/links/backups/google_chrome_bookmarks/google_chrome_bookmarks_11_3_23.html';
//        $fileName = '/home/user/PHPProjects/links/backups/google_chrome_bookmarks/google_chrome_bookmarks_3_4_23.html';
//
//        //
//        $parseResults = $parserService->parseGoogleChromeBookmarks($fileName);

        // an array of ParseResult objects // todo DTO?
        $result = [];

        // read the file
        $content = $this->netscapeParser->parseFile($fileName);

        // get info for each item (parsed bookmark) & pass it to ParseResult object
        foreach ($content as $bookmark) {
            $uri = $bookmark['uri'];
            $title = $bookmark['title'];
            $added_at = $bookmark['time'];
            $tags = $bookmark['tags'];
            $icon = $bookmark['icon'];

            $parseResult = new ParseResult([
                'uri'   => $uri,
                'title' => $title,
                'time'  => $added_at,
                'tags'  => $tags,
                'icon'  => $icon
            ]);

            $result[] = $parseResult;
        }

        return $result;
    }
}
