<?php

/**
 * File holding AppRuntime class
 *
 * @since
 * @package App\Twig
 */

declare(strict_types=1);

namespace App\Twig;

use App\Service\MarkdownHelper;
use Twig\Extension\RuntimeExtensionInterface;

/**
 * AppRuntime class
 *
 * @since
 * @package App\Twig
 */
class AppRuntime implements RuntimeExtensionInterface
{
  /**
   * @var MarkdownHelper
   */
  private $markdownHelper;

  public function __construct(MarkdownHelper $markdownHelper)
  {
    $this->markdownHelper = $markdownHelper;
  }

  public function parseMarkdown($value)
  {
    return $this->markdownHelper->parse($value);
  }
}
