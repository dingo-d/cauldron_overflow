<?php

/**
 * File holding MarkdownHelper class
 *
 * @since
 * @package App\Service
 */

declare(strict_types=1);

namespace App\Service;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * MarkdownHelper class
 *
 * @since
 * @package App\Service
 */
class MarkdownHelper
{
  /**
   * @var MarkdownParserInterface
   */
  private $markdownParser;

  /**
   * @var CacheInterface
   */
  private $cache;

  /**
   * @var bool
   */
  private $isDebug;

  public function __construct(MarkdownParserInterface $markdownParser, CacheInterface $cache, bool $isDebug)
  {
    $this->markdownParser = $markdownParser;
    $this->cache = $cache;
    $this->isDebug = $isDebug;
  }

  public function parse(string $source): string
  {
    if ($this->isDebug) {
      return $this->markdownParser->transformMarkdown($source);
    }

    return $this->cache->get('markdown_' . md5($source), function () use ($source) {
      return $this->markdownParser->transformMarkdown($source);
    });
  }
}
