<?php

namespace App\Models\DTO;

class LinkDTO
{
    public string $uri;
    public string $title;
    public string $added_at;
    public string $tags;
    public string $icon;

    public function __construct(array $bookmark)
    {
        $this->uri = $bookmark['uri'];
        $this->title = $bookmark['title'];
        $this->added_at = $bookmark['time'];
        $this->tags = $bookmark['tags'];
        $this->icon = $bookmark['icon'];
    }

    public function toArray(): array
    {
        return [
            'uri'   => $this->uri,
            'title' => $this->title,
            'time'  => $this->added_at,
            'tags'  => $this->tags,
            'icon'  => $this->icon
        ];
    }
}
