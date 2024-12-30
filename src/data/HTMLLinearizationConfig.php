<?php

namespace Src\Data;

/**
 * @class
 *
 * This `HTMLLinearizationConfig` is a convenience configuration for converting a Document or DocumentEntity to HTML.
 * For a description of the parameters see `TextLinearizationConfig`.
 */
class HTMLLinearizationConfig extends TextLinearizationConfig
{
	public string $titlePrefix = "<h1>";

	public string $titleSuffix = "</h1>";

	public string $headerPrefix = "<h1>";

	public string $headerSuffix = "</h1>";

	public string $sectionHeaderPrefix = "<h2>";

	public string $sectionHeaderSuffix = "</h2>";

	public string $textPrefix = "<p>";

	public string $textSuffix = "</p>";

	public string $entityLayoutPrefix = "<p>";

	public string $entityLayoutSuffix = "</p>";

	public string $tablePrefix = "<table>";

	public string $tableSuffix = "</table>";

	public string $tableRowPrefix = "<tr>";

	public string $tableRowSuffix = "</tr>";

	public string $tableCellHeaderPrefix = "<th>";

	public string $tableCellHeaderSuffix = "</th>";

	public string $tableCellPrefix = "<td>";

	public string $tableCellSuffix = "</td>";

	public string $tableColumnSeparator = "";

	public string $tableLinearizationFormat = "html";

	public bool $tableAddTitleAsCaption = true;

	public bool $tableAddFooterAsParagraph = true;

	public string $listLayoutPrefix = "<div>";

	public string $listLayoutSuffix = "</div>";

	public string $tableLayoutPrefix = "<div>";

	public string $tableLayoutSuffix = "</div>";

	public string $keyValueLayoutPrefix = "<div>";

	public string $keyValueLayoutSuffix = "</div>";

	public string $figureLayoutPrefix = "<div>";

	public string $figureLayoutSuffix = "</div>";

	public string $footerLayoutPrefix = "<div>";

	public string $footerLayoutSuffix = "</div>";

	public string $pageNumPrefix = "<div>";

	public string $pageNumSuffix = "</div>";

    /**
     * Adds Textract block id to the HTML markup. Only supported for HTML.
     * @var bool
     */
	public bool $addIdsToHtmlTags = false;

    /**
     * Adds the truncated (first 8 characters) Textract block id to the HTML markup. Only supported for HTML.
     * @var bool
     */
	public bool $addShortIdsToHtmlTags = false;
}