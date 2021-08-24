<?php

namespace Meduza\Plugin;

use Meduza\Build\Build;
use Meduza\Content\Content;

class Resumizer extends PluginBase
{
    public function __construct(Build $build)
    {
        parent::__construct($build);
    }

    public function run(): void
    {
        $content = $this->build->getContent();

        foreach($content->getIterator() as $contentKey => $contentItem){
            $frontmatter = $contentItem->frontmatter()->getFrontmatter();

            $markdown = explode(PHP_EOL.PHP_EOL, $contentItem->getMarkdown());
            if(sizeof($markdown) === 0) continue;

            $resume = '';
            foreach($markdown as $paragraph){
                if(str_starts_with($paragraph, '#')) continue;
                if(trim($paragraph) === '') continue;

                $resume = $paragraph;
            }

            $words = explode(' ', $resume);
            $maxWords = $this->build->config()->getConfig()['plugins']['Resumizer']['maxWords'];
            if(sizeof($words) > $maxWords){
                $resume = join(' ', array_slice($words, 0, $maxWords)).'...';
            }

            if(!key_exists('resume', $frontmatter)){
                $frontmatter['resume'] = $resume;
            }
            if(!key_exists('description', $frontmatter)){
                $frontmatter['description'] = $resume;
            }
            if(!key_exists('summary', $frontmatter)){
                $frontmatter['summary'] = $resume;
            }



            $contentItem->frontmatter()->setFrontmatter($frontmatter);
        }
    }
}