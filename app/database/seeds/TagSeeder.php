<?php

use Lio\Tags\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        if (Tag::count() == 0) {
            $this->createTags();
        }
    }

    private function createTags()
    {
        $commonTags = Config::get('forum.tags.common');

        foreach ($commonTags as $name) {
            $tagStrings = trans('forum.tags.'.$name);
            Tag::create([
                'name' => $tagStrings['title'],
                'slug' => $name,
                'description' => $tagStrings['description'],
                'forum' => 1,
                'articles' => 1,
            ]);
        }

        $articleTags = Config::get('forum.tags.article');

        foreach ($articleTags as $name) {
            $tagStrings = trans('forum.tags.'.$name);
            Tag::create([
                'name' => $tagStrings['title'],
                'slug' => $name,
                'description' => $tagStrings['description'],
                'forum' => 0,
                'articles' => 1,
            ]);
        }
    }
}
