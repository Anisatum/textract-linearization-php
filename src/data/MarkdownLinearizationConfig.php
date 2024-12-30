<?php

namespace Src\Data;

/**
 * @class
 *
 * This `MarkdownLinearizationConfig` is a convenience configuration for converting a Document or DocumentEntity to Markdown.
 * For a description of the parameters see `TextLinearizationConfig`.
 */
class MarkdownLinearizationConfig extends TextLinearizationConfig
{
    public string $titlePrefix = "# ";

    public string $tableLinearizationFormat = "markdown";

    public string $sectionHeaderPrefix = "## ";

    public bool $tableRemoveColumnHeaders = true;
}