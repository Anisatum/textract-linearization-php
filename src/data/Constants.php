<?php

namespace Src\Data;

enum ElementType: string
{
    case WORD = "WORD";
    case LINE = "LINE";
    case KEY_VALUE_SET = "KEY_VALUE_SET";
    case SELECTION_ELEMENT = "SELECTION_ELEMENT";
    case TABLE = "TABLE";
    case TABLE_TITLE = "TABLE_TITLE";
    case TABLE_FOOTER = "TABLE_FOOTER";
    case TABLE_SUMMARY = "TABLE_SUMMARY";
    case TABLE_SECTION_TITLE = "TABLE_SECTION_TITLE";
    case TABLE_COLUMN_HEADER = "COLUMN_HEADER";
    case TABLE_STRUCTURED = "STRUCTURED_TABLE";
    case TABLE_SEMI_STRUCTURED = "SEMI_STRUCTURED_TABLE";
    case CELL = "CELL";
    case PAGE = "PAGE";
    case MERGED_CELL = "MERGED_CELL";
    case QUERY = "QUERY";
    case QUERY_RESULT = "QUERY_RESULT";
    case SIGNATURE = "SIGNATURE";
    case LAYOUT = "LAYOUT";
    case LAYOUT_TEXT = "LAYOUT_TEXT";
    case LAYOUT_TITLE = "LAYOUT_TITLE";
    case LAYOUT_HEADER = "LAYOUT_HEADER";
    case LAYOUT_FOOTER = "LAYOUT_FOOTER";
    case LAYOUT_SECTION_HEADER = "LAYOUT_SECTION_HEADER";
    case LAYOUT_PAGE_NUMBER = "LAYOUT_PAGE_NUMBER";
    case LAYOUT_LIST = "LAYOUT_LIST";
    case LAYOUT_FIGURE = "LAYOUT_FIGURE";
    case LAYOUT_TABLE = "LAYOUT_TABLE";
    case LAYOUT_KEY_VALUE = "LAYOUT_KEY_VALUE";

    # This is not a base layout type, but a fake type for the text conversion logic
    # when an API is called without the AnalyzeLayout API, all the elements will be LAYOUT_ENTITY
    case LAYOUT_ENTITY = "LAYOUT_ENTITY";

    # cell type attributes
    case IS_COLUMN_HEAD = "isColumnHead";
    case IS_SECTION_TITLE_CELL = "isSectionTitleCell";
    case IS_SUMMARY_CELL = "isSummaryCell";
    case IS_TITLE_CELL = "isTitleCell";
    case IS_FOOTER_CELL = "isFooterCell";
    case IS_MERGED_CELL = "isMergedCell";

    # Text Types
    case HANDWRITING = "HANDWRITING";
    case PRINTED = "PRINTED";
}