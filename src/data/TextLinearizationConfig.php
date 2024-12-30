<?php

namespace Src\Data;

/**
 * @class
 *
 * The `TextLinearizationConfig` object defines how a document is linearized into a text string
 */
class TextLinearizationConfig
{
    /**
     * Removes new lines in leaf layout elements, this removes extra whitespace
     * @var bool
     **/
    public bool $removeNewLinesInLeafElements = true;

    /**
     * Removes extra whitespace
     * @var int
     **/
    public int $maxNumberOfConsecutiveNewLines = 2;

    /**
     * Removes extra whitespace (null skips whitespace removal)
     * @var int|null
     **/
    public ?int $maxNumberOfConsecutiveSpaces = null;

    /**
     * Hide headers layouts in the linearized output
     * @var bool
     **/
    public bool $hideHeaderLayout = false;

    /**
     * Hide footers layouts in the linearized output
     * @var bool
     **/
    public bool $hideFooterLayout = false;

    /**
     * Hide figures layouts in the linearized output
     * @var bool
     **/
    public bool $hideFigureLayout = false;

    /**
     * Hide tables layouts in the linearized output
     * @var bool
     **/
    public bool $hideTableLayout = false;

    /**
     * Hide key-value layouts in the linearized output
     * @var bool
     **/
    public bool $hideKeyValueLayout = false;

    /**
     * Hide page numbers in the linearized output
     * @var bool
     **/
    public bool $hidePageNumLayout = false;

    /**
     * Prefix for page number layout elements
     * @var string
     **/
    public string $pageNumPrefix = "";

    /**
     * Suffix for page number layout elements
     * @var string
     **/
    public string $pageNumSuffix = "";

    /**
     * Separator to use when combining elements within a text block
     * @var string
     **/
    public string $sameParagraphSeparator = " ";

    /**
     * Separator to use when two elements are in the same layout element
     * @var string
     **/
    public string $sameLayoutElementSeparator = PHP_EOL;

    /**
     * Separator to use when combining linearized layout elements
     * @var string
     **/
    public string $layoutElementSeparator = PHP_EOL . PHP_EOL;

    /**
     * Separator for elements in a list layout
     * @var string
     **/
    public string $listElementSeparator = PHP_EOL;

    /**
     * Prefix for list layout elements (parent)
     * @var string
     **/
    public string $listLayoutPrefix = "";

    /**
     * Suffix for list layout elements (parent)
     * @var string
     **/
    public string $listLayoutSuffix = "";

    /**
     * Prefix for elements in a list layout (children)
     * @var string
     **/
    public string $listElementPrefix = "";

    /**
     * Suffix for elements in a list layout (children)
     * @var string
     **/
    public string $listElementSuffix = "";

    /**
     * Prefix for title layout elements
     * @var string
     **/
    public string $titlePrefix = "";

    /**
     * Suffix for title layout elements
     * @var string
     **/
    public string $titleSuffix = "";

    /**
     * Prefix for table elements
     * @var string
     **/
    public string $tableLayoutPrefix = PHP_EOL . PHP_EOL;

    /**
     * Suffix for table elements
     * @var string
     **/
    public string $tableLayoutSuffix = PHP_EOL;

    /**
     * Remove pandas index column headers from tables
     * @var bool
     **/
    public bool $tableRemoveColumnHeaders = false;

    /**
     * Threshold for a row to be selected as header when rendering as markdown. 0.9 means that 90% of the cells must have the is_header_cell flag.
     * @var float
     **/
    public float $tableColumnHeaderThreshold = 0.9;

    /**
     * How to represent tables in the linearized output. Choices are plaintext, markdown or html.
     * @var string
     **/
    public string $tableLinearizationFormat = "plaintext";

    /**
     * When using html linearization format, adds the title inside the table as <caption></caption>
     * @var bool
     **/
    public bool $tableAddTitleAsCaption = false;

    public bool $tableAddFooterAsParagraph = false;

    /**
     * Markdown tabulate format to use when table are linearized as markdown
     * @var string
     **/
    public string $tableTabulateFormat = "github";

    /**
     * By default markdown tables will have N hyphens to preserve alignement, this reduces the number of hyphens to 1,
     * which is the minimum number allowed by the GitHub Markdown spec
     * @var bool
     **/
    public bool $tableTabulateRemoveExtraHyphens = false;

    /**
     * Duplicate text in merged cells to preserve line alignment
     * @var bool
     **/
    public bool $tableDuplicateTextInMergedCells = false;

    /**
     * Flatten table headers into a single row, unmerging the cells horizontally
     * @var bool
     **/
    public bool $tableFlattenHeaders = false;

    /**
     * Threshold below which tables will be rendered as words instead of using table layout
     * @var int
     **/
    public int $tableMinTableWords = 0;

    /**
     * Table column separator, used when linearizing layout tables, not used if AnalyzeDocument was called with the TABLES feature
     * @var string
     **/
    public string $tableColumnSeparator = "\t";

    /**
     * Ignores table structure for SEMI_STRUCTURED tables and returns them as text
     * @var bool
     **/
    public bool $tableFlattenSemiStructuredAsPlaintext = false;

    public string $tablePrefix = "";

    public string $tableSuffix = "";

    /**
     * Table row separator
     * @var string
     **/
    public string $tableRowSeparator = PHP_EOL;

    /**
     * Prefix for table row
     * @var string
     **/
    public string $tableRowPrefix = "";

    /**
     * Suffix for table row
     * @var string
     **/
    public string $tableRowSuffix = "";

    /**
     * Prefix for table cell
     * @var string
     **/
    public string $tableCellPrefix = "";

    /**
     * Suffix for table cell
     * @var string
     **/
    public string $tableCellSuffix = "";

    /**
     * Prefix for header cell
     * @var string
     **/
    public string $tableCellHeaderPrefix = "";

    /**
     * Suffix for header cell
     * @var string
     **/
    public string $tableCellHeaderSuffix = "";

    /**
     * Placeholder for empty cells
     * @var string
     **/
    public string $tableCellEmptyCellPlaceholder = "";

    /**
     * Placeholder for merged cell
     * @var string
     **/
    public string $tableCellMergeCellPlaceholder = "";

    /**
     * Placeholder for left merge cell (L) see:
     * @var string
     **/
    public string $tableCellLeftMergeCellPlaceholder = "";

    /**
     * Placeholder for left merge cell (T)
     * @var string
     **/
    public string $tableCellTopMergeCellPlaceholder = "";

    /**
     * Placeholder for left merge cell (X)
     * @var string
     **/
    public string $tableCellCrossMergeCellPlaceholder = "";

    /**
     * Prefix for table title if it is outside of the table (floating)
     * @var string
     **/
    public string $tableTitlePrefix = "";

    /**
     * Suffix for table title if it is outside of the table (floating)
     * @var string
     **/
    public string $tableTitleSuffix = "";

    /**
     * Prefix for table footers if they are outside of the table (floating)
     * @var string
     **/
    public string $tableFootersPrefix = "";

    /**
     * Suffix for table footers if they are outside of the table (floating)
     * @var string
     **/
    public string $tableFootersSuffix = "";

    /**
     * Prefix for header layout elements
     * @var string
     **/
    public string $headerPrefix = "";

    /**
     * Suffix for header layout elements
     * @var string
     **/
    public string $headerSuffix = "";

    /**
     * Prefix for section header layout elements
     * @var string
     **/
    public string $sectionHeaderPrefix = "";

    /**
     * Suffix for section header layout elements
     * @var string
     **/
    public string $sectionHeaderSuffix = "";

    /**
     * Prefix for text layout elements
     * @var string
     **/
    public string $textPrefix = "";

    /**
     * Suffix for text layout elements
     * @var string
     **/
    public string $textSuffix = "";

    /**
     * Prefix for key_value layout elements (not for individual key-value elements)
     * @var string
     **/
    public string $keyValueLayoutPrefix = "";

    /**
     * Suffix for key_value layout elements (not for individual key-value elements)
     * @var string
     **/
    public string $keyValueLayoutSuffix = "";

    /**
     * Prefix for key-value elements
     * @var string
     **/
    public string $keyValuePrefix = "";
    /**
     * Suffix for key-value elements
     * @var string
     **/
    public string $keyValueSuffix = "";
    /**
     * Prefix for key elements
     * @var string
     **/
    public string $keyPrefix = "";

    /**
     * Suffix for key elements
     * @var string
     **/
    public string $keySuffix = " ";

    /**
     * Prefix for value elements
     * @var string
     **/
    public string $valuePrefix = "";

    /**
     * Suffix for value elements
     * @var string
     **/
    public string $valueSuffix = "";

    /**
     * Prefix for LAYOUT_ENTITY elements (layout elements without a predicted layout type)
     * @var string
     **/
    public string $entityLayoutPrefix = "";

    /**
     * Suffix for LAYOUT_ENTITY elements (layout elements without a predicted layout type)
     * @var string
     **/
    public string $entityLayoutSuffix = "";

    /**
     * Prefix for figure layout elements
     * @var string
     **/
    public string $figureLayoutPrefix = "";

    /**
     * Suffix for figure layout elements
     * @var string
     **/
    public string $figureLayoutSuffix = "";

    /**
     * Prefix for figure layout elements
     * @var string
     **/
    public string $footerLayoutPrefix = "";

    /**
     * Suffix for figure layout elements
     * @var string
     **/
    public string $footerLayoutSuffix = "";

    /**
     * Representation for selection element when selected
     * @var string
     **/
    public string $selectionElementSelected = "[X]";

    /**
     * Representation for selection element when not selected
     * @var string
     **/
    public string $selectionElementNotSelected = "[ ]";

    /**
     * How much the line below and above the current line should differ in width to be separated
     * @var float
     **/
    public float $heuristicHTolerance = 0.3;

    /**
     * How much space is acceptable between two lines before splitting them. Expressed in multiple of min heights
     * @var float
     **/
    public float $heuristicLineBreakThreshold = 0.9;

    /**
     * How much vertical overlap is tolerated between two subsequent lines before merging them into a single line
     * @var float
     **/
    public float $heuristicOverlapRatio = 0.5;

    /**
     * Signature representation in the linearized text
     * @var string
     **/
    public string $signatureToken = "[SIGNATURE]";

    /**
     * Controls if the prefixes/suffixes will be inserted in the words returned by `get_text_and_words`
     * @var bool
     **/
    public bool $addPrefixesAndSuffixesAsWords = false;

    /**
     * Controls if the prefixes/suffixes will be added to the linearized text
     * @var bool
     **/
    public bool $addPrefixesAndSuffixesInText = true;
}