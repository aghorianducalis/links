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

    public function exampleUse()
    {
        $filePath = base_path('backups') . '/' . 'google_chrome_bookmarks/google_chrome_bookmarks_12_3_23.html';

        // all link urls
        $linkUrls = [];
        /** @var \Illuminate\Support\Collection $categories */
        $categories = \App\Models\Category::query()->get()->pluck('id', 'title')->toArray();

        $result = $this->parseGoogleChromeBookmarks($filePath);

        foreach ($result as $item) {
            $linkCategories = [];

            if (! in_array($item->uri, $linkUrls)) {
                $linkUrls[] = $item->uri;

                $tags = $item->tags;
                $tags = substr($tags, strlen('Панель закладок '));

                if (strpos($tags, 'software ') !== false) {
                    $linkCategories[] = 'software';
                    $linkCategories[] = substr($tags, strlen('software '));
                } else {
                    $linkCategories[] = $tags;
                }
            } else {
                continue;
            }

            /** @var \App\Models\DTO\LinkDTO $item */
            /** @var \App\Models\Link $link */
            $link = new \App\Models\Link();

            $link->added_at = \Carbon\Carbon::createFromTimestamp($item->added_at)->toDateTimeString();
            $link->url = $item->uri;
            $link->title = $item->title;
            $link->icon = $item->icon;

            $link->save();

            foreach ($linkCategories as $linkCategory) {
                if (
                    ($linkCategory != 'uncategorized') &&
                    ($linkCategory != '12_3_23')
                ) {
                    /** @var \App\Models\Category $category */
                    $category = \App\Models\Category::query()
                        ->where('title', '=', $linkCategory)
                        ->first();

                    if (! $category) {
                        $category = \App\Models\Category::query()
                            ->create([
                                'title' => $linkCategory,
                                'description' => '',
                            ]);
                    }

                    $link->categories()->attach($category->id);
                }
            }
        }
    }
}
