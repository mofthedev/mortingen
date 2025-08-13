<?php 

abstract class BulmaClass
{   

    // Layout
    public const CONTAINER = "container";
    public const SECTION = "section";
    public const HERO = "hero";
    public const HERO_HEAD = "hero-head";
    public const HERO_BODY = "hero-body";
    public const HERO_FOOT = "hero-foot";
    public const FOOTER = "footer";
    public const LEVEL = "level";
    public const LEVEL_LEFT = "level-left";
    public const LEVEL_RIGHT = "level-right";
    public const LEVEL_ITEM = "level-item";
    public const MEDIA = "media";
    public const MEDIA_LEFT = "media-left";
    public const MEDIA_CONTENT = "media-content";
    public const MEDIA_RIGHT = "media-right";
    public const TILE = "tile";

    // Form
    public const FIELD = "field";
    public const FIELD_LABEL = "field-label";
    public const FIELD_BODY = "field-body";
    public const LABEL = "label";
    public const CONTROL = "control";
    public const INPUT = "input";
    public const TEXTAREA = "textarea";
    public const SELECT = "select";
    public const CHECKBOX = "checkbox";
    public const RADIO = "radio";
    public const HELP = "help";
    public const FILE = "file";
    public const FILE_LABEL = "file-label";
    public const FILE_INPUT = "file-input";
    public const FILE_CTA = "file-cta";
    public const FILE_ICON = "file-icon";
    public const FILE_NAME = "file-name";

    // Elements
    public const BOX = "box";
    public const BUTTON = "button";
    public const CONTENT = "content";
    public const DELETE = "delete";
    public const ICON = "icon";
    public const ICON_TEXT = "icon-text";
    public const IMAGE = "image";
    public const NOTIFICATION = "notification";
    public const PROGRESS = "progress";
    public const TABLE = "table";
    public const TABLE_CONTAINER = "table-container";
    public const TAG = "tag";
    public const TAGS = "tags";
    public const TITLE = "title";
    public const SUBTITLE = "subtitle";

    //Elements Sizes
    public const IS_16X16 = "is-16x16";
    public const IS_24X24 = "is-24x24";
    public const IS_32X32 = "is-32x32";
    public const IS_48X48 = "is-48x48";
    public const IS_64X64 = "is-64x64";
    public const IS_96X96 = "is-96x96";
    public const IS_128X128 = "is-128x128";
    public const IS_256X256 = "is-256x256";
    public const IS_512X512 = "is-512x512";

    // Components
    public const BREADCRUMB = "breadcrumb";
    public const BUTTONS = "buttons";
    public const CARD = "card";
    public const CARD_HEADER = "card-header";
    public const CARD_HEADER_TITLE = "card-header-title";
    public const CARD_HEADER_ICON = "card-header-icon";
    public const CARD_IMAGE = "card-image";
    public const CARD_CONTENT = "card-content";
    public const CARD_FOOTER = "card-footer";
    public const CARD_FOOTER_ITEM = "card-footer-item";
    public const DROPDOWN = "dropdown";
    public const DROPDOWN_TRIGGER = "dropdown-trigger";
    public const DROPDOWN_MENU = "dropdown-menu";
    public const DROPDOWN_CONTENT = "dropdown-content";
    public const DROPDOWN_ITEM = "dropdown-item";
    public const DROPDOWN_DIVIDER = "dropdown-divider";
    public const MENU = "menu";
    public const MENU_LABEL = "menu-label";
    public const MENU_LIST = "menu-list";
    public const MESSAGE = "message";
    public const MESSAGE_HEADER = "message-header";
    public const MESSAGE_BODY = "message-body";
    public const MODAL = "modal";
    public const MODAL_BACKGROUND = "modal-background";
    public const MODAL_CONTENT = "modal-content";
    public const MODAL_CLOSE = "modal-close";
    public const MODAL_CARD = "modal-card";
    public const MODAL_CARD_HEAD = "modal-card-head";
    public const MODAL_CARD_TITLE = "modal-card-title";
    public const MODAL_CARD_BODY = "modal-card-body";
    public const MODAL_CARD_FOOT = "modal-card-foot";
    public const NAVBAR = "navbar";
    public const NAVBAR_BRAND = "navbar-brand";
    public const NAVBAR_BURGER = "navbar-burger";
    public const NAVBAR_MENU = "navbar-menu";
    public const NAVBAR_START = "navbar-start";
    public const NAVBAR_END = "navbar-end";
    public const NAVBAR_ITEM = "navbar-item";
    public const NAVBAR_LINK = "navbar-link";
    public const NAVBAR_DROPDOWN = "navbar-dropdown";
    public const NAVBAR_DIVIDER = "navbar-divider";
    public const PAGINATION = "pagination";
    public const PAGINATION_LIST = "pagination-list";
    public const PAGINATION_LINK = "pagination-link";
    public const PAGINATION_PREVIOUS = "pagination-previous";
    public const PAGINATION_NEXT = "pagination-next";
    public const PAGINATION_ELLIPSIS = "pagination-ellipsis";
    public const PANEL = "panel";
    public const PANEL_HEADING = "panel-heading";
    public const PANEL_BLOCK = "panel-block";
    public const PANEL_TABS = "panel-tabs";
    public const PANEL_ICON = "panel-icon";
    public const TABS = "tabs";
    public const HAS_DROPDOWN = "has-dropdown";

    // Modifiers
    // General Style & State
    public const IS_ACTIVE = "is-active";
    public const IS_BLACK = "is-black";
    public const IS_BORDERED = "is-bordered";
    public const IS_CENTERED = "is-centered";
    public const IS_CURRENT = "is-current";
    public const IS_DANGER = "is-danger";
    public const IS_DARK = "is-dark";
    public const IS_DISABLED = "is-disabled";
    public const IS_EXPANDED = "is-expanded";
    public const IS_FOCUSED = "is-focused";
    public const IS_FULLWIDTH = "is-fullwidth";
    public const IS_GHOST = "is-ghost";
    public const IS_HOVERABLE = "is-hoverable";
    public const IS_HOVERED = "is-hovered";
    public const IS_INFO = "is-info";
    public const IS_INVERTED = "is-inverted";
    public const IS_LARGE = "is-large";
    public const IS_LIGHT = "is-light";
    public const IS_LINK = "is-link";
    public const IS_LOADING = "is-loading";
    public const IS_MEDIUM = "is-medium";
    public const IS_NORMAL = "is-normal";
    public const IS_PRIMARY = "is-primary";
    public const IS_RIGHT = "is-right";
    public const IS_ROUNDED = "is-rounded";
    public const IS_SELECTED = "is-selected";
    public const IS_SMALL = "is-small";
    public const IS_STATIC = "is-static";
    public const IS_STRIPED = "is-striped";
    public const IS_SUCCESS = "is-success";
    public const IS_TOGGLE = "is-toggle";
    public const IS_TOGGLE_ROUND = "is-toggle-round";
    public const IS_TRANSPARENT = "is-transparent";
    public const IS_UP = "is-up";
    public const IS_WARNING = "is-warning";
    public const IS_WHITE = "is-white";
    public const IS_OUTLINED = "is-outlined";
    public const IS_LEFT = "is-left"; 
    public const IS_BOXED = "is-boxed";

    // Layout & Structure
    public const IS_ANCESTOR = "is-ancestor";
    public const IS_CHILD = "is-child";
    public const IS_FLUID = "is-fluid";
    public const IS_FULLHEIGHT = "is-fullheight";
    public const IS_FULLHEIGHT_WITH_NAVBAR = "is-fullheight-with-navbar";
    public const IS_GAPLESS = "is-gapless";
    public const IS_HALFHEIGHT = "is-halfheight";
    public const IS_HORIZONTAL = "is-horizontal";
    public const IS_MULTILINE = "is-multiline";
    public const IS_NARROW = "is-narrow";
    public const IS_PARENT = "is-parent";
    public const IS_VCENTERED = "is-vcentered";
    public const IS_VERTICAL = "is-vertical";

    // Grouping
    public const HAS_ADDONS = "has-addons";
    public const HAS_ADDONS_CENTERED = "has-addons-centered";
    public const HAS_ADDONS_FULLWIDTH = "has-addons-fullwidth";
    public const HAS_ADDONS_RIGHT = "has-addons-right";
    public const IS_GROUPED = "is-grouped";
    public const IS_GROUPED_CENTERED = "is-grouped-centered";
    public const IS_GROUPED_MULTILINE = "is-grouped-multiline";
    public const IS_GROUPED_RIGHT = "is-grouped-right";

    // Icons
    public const HAS_ICONS_LEFT = "has-icons-left";
    public const HAS_ICONS_RIGHT = "has-icons-right";

    // Columns - Grid
    public const COLUMNS = "columns";
    public const COLUMN = "column";
    public const GRID = "grid";

    // Column Sizes
    public const IS_FULL = "is-full";
    public const IS_THREE_QUARTERS = "is-three-quarters";
    public const IS_TWO_THIRDS = "is-two-thirds";
    public const IS_HALF = "is-half";
    public const IS_ONE_THIRD = "is-one-third";
    public const IS_ONE_QUARTER = "is-one-quarter";
    public const IS_ONE_FIFTH = "is-one-fifth";
    public const IS_TWO_FIFTHS = "is-two-fifths";
    public const IS_THREE_FIFTHS = "is-three-fifths";
    public const IS_FOUR_FIFTHS = "is-four-fifths";
    public const IS_0 = "is-0";
    public const IS_1 = "is-1";
    public const IS_2 = "is-2";
    public const IS_3 = "is-3";
    public const IS_4 = "is-4";
    public const IS_5 = "is-5";
    public const IS_6 = "is-6";
    public const IS_7 = "is-7";
    public const IS_8 = "is-8";
    public const IS_9 = "is-9";
    public const IS_10 = "is-10";
    public const IS_11 = "is-11";
    public const IS_12 = "is-12";

    // Column Offsets
    public const IS_OFFSET_THREE_QUARTERS = "is-offset-three-quarters";
    public const IS_OFFSET_TWO_THIRDS = "is-offset-two-thirds";
    public const IS_OFFSET_HALF = "is-offset-half";
    public const IS_OFFSET_ONE_THIRD = "is-offset-one-third";
    public const IS_OFFSET_ONE_QUARTER = "is-offset-one-quarter";
    public const IS_OFFSET_ONE_FIFTH = "is-offset-one-fifth";
    public const IS_OFFSET_TWO_FIFTHS = "is-offset-two-fifths";
    public const IS_OFFSET_THREE_FIFTHS = "is-offset-three-fifths";
    public const IS_OFFSET_FOUR_FIFTHS = "is-offset-four-fifths";

    // Image Ratios
    public const HAS_RATIO = "has-ratio";
    public const IS_SQUARE = "is-square";
    public const IS_1BY1 = "is-1by1";
    public const IS_5BY4 = "is-5by4";
    public const IS_4BY3 = "is-4by3";
    public const IS_3BY2 = "is-3by2";
    public const IS_5BY3 = "is-5by3";
    public const IS_16BY9 = "is-16by9";
    public const IS_2BY1 = "is-2by1";
    public const IS_3BY1 = "is-3by1";
    public const IS_4BY5 = "is-4by5";
    public const IS_3BY4 = "is-3by4";
    public const IS_2BY3 = "is-2by3";
    public const IS_3BY5 = "is-3by5";
    public const IS_9BY16 = "is-9by16";
    public const IS_1BY2 = "is-1by2";
    public const IS_1BY3 = "is-1by3";

    // Responsive Container Sizes
    public const IS_WIDESCREEN = "is-widescreen";
    public const IS_FULLHD = "is-fullhd";
    public const IS_MAX_TABLET = "is-max-tablet";
    public const IS_MAX_DESKTOP = "is-max-desktop";
    public const IS_MAX_WIDESCREEN = "is-max-widescreen";

    // Helpers
    // Color Helpers
    public const HAS_BACKGROUND_BLACK = "has-background-black";
    public const HAS_BACKGROUND_DARK = "has-background-dark";
    public const HAS_BACKGROUND_LIGHT = "has-background-light";
    public const HAS_BACKGROUND_WHITE = "has-background-white";
    public const HAS_BACKGROUND_PRIMARY = "has-background-primary";
    public const HAS_BACKGROUND_LINK = "has-background-link";
    public const HAS_BACKGROUND_INFO = "has-background-info";
    public const HAS_BACKGROUND_SUCCESS = "has-background-success";
    public const HAS_BACKGROUND_WARNING = "has-background-warning";
    public const HAS_BACKGROUND_DANGER = "has-background-danger";
    public const HAS_TEXT_BLACK = "has-text-black";
    public const HAS_TEXT_DARK = "has-text-dark";
    public const HAS_TEXT_LIGHT = "has-text-light";
    public const HAS_TEXT_WHITE = "has-text-white";
    public const HAS_TEXT_PRIMARY = "has-text-primary";
    public const HAS_TEXT_LINK = "has-text-link";
    public const HAS_TEXT_INFO = "has-text-info";
    public const HAS_TEXT_SUCCESS = "has-text-success";
    public const HAS_TEXT_WARNING = "has-text-warning";
    public const HAS_TEXT_DANGER = "has-text-danger";

    // Spacing Helpers: Margin
    // Margin Auto
    public const M_AUTO = "m-auto";
    public const MT_AUTO = "mt-auto";
    public const MR_AUTO = "mr-auto";
    public const MB_AUTO = "mb-auto";
    public const ML_AUTO = "ml-auto";
    public const MX_AUTO = "mx-auto";
    public const MY_AUTO = "my-auto";
    // Margin All
    public const M_0 = "m-0";
    public const M_1 = "m-1";
    public const M_2 = "m-2";
    public const M_3 = "m-3";
    public const M_4 = "m-4";
    public const M_5 = "m-5";
    public const M_6 = "m-6";
    // Margin Top, Right, Bottom, Left
    public const MT_0 = "mt-0";
    public const MT_1 = "mt-1";
    public const MT_2 = "mt-2";
    public const MT_3 = "mt-3";
    public const MT_4 = "mt-4";
    public const MT_5 = "mt-5";
    public const MT_6 = "mt-6";
    public const MR_0 = "mr-0";
    public const MR_1 = "mr-1";
    public const MR_2 = "mr-2";
    public const MR_3 = "mr-3";
    public const MR_4 = "mr-4";
    public const MR_5 = "mr-5";
    public const MR_6 = "mr-6";
    public const MB_0 = "mb-0";
    public const MB_1 = "mb-1";
    public const MB_2 = "mb-2";
    public const MB_3 = "mb-3";
    public const MB_4 = "mb-4";
    public const MB_5 = "mb-5";
    public const MB_6 = "mb-6";
    public const ML_0 = "ml-0";
    public const ML_1 = "ml-1";
    public const ML_2 = "ml-2";
    public const ML_3 = "ml-3";
    public const ML_4 = "ml-4";
    public const ML_5 = "ml-5";
    public const ML_6 = "ml-6";
    // Margin X and Y
    public const MX_0 = "mx-0";
    public const MX_1 = "mx-1";
    public const MX_2 = "mx-2";
    public const MX_3 = "mx-3";
    public const MX_4 = "mx-4";
    public const MX_5 = "mx-5";
    public const MX_6 = "mx-6";
    public const MY_0 = "my-0";
    public const MY_1 = "my-1";
    public const MY_2 = "my-2";
    public const MY_3 = "my-3";
    public const MY_4 = "my-4";
    public const MY_5 = "my-5";
    public const MY_6 = "my-6";

    // Spacing Helpers: Padding
    // Padding Auto
    public const P_AUTO = "p-auto";
    public const PT_AUTO = "pt-auto";
    public const PR_AUTO = "pr-auto";
    public const PB_AUTO = "pb-auto";
    public const PL_AUTO = "pl-auto";
    public const PX_AUTO = "px-auto";
    public const PY_AUTO = "py-auto";
    // Padding All
    public const P_0 = "p-0";
    public const P_1 = "p-1";
    public const P_2 = "p-2";
    public const P_3 = "p-3";
    public const P_4 = "p-4";
    public const P_5 = "p-5";
    public const P_6 = "p-6";
    // Padding Top, Right, Bottom, Left
    public const PT_0 = "pt-0";
    public const PT_1 = "pt-1";
    public const PT_2 = "pt-2";
    public const PT_3 = "pt-3";
    public const PT_4 = "pt-4";
    public const PT_5 = "pt-5";
    public const PT_6 = "pt-6";
    public const PR_0 = "pr-0";
    public const PR_1 = "pr-1";
    public const PR_2 = "pr-2";
    public const PR_3 = "pr-3";
    public const PR_4 = "pr-4";
    public const PR_5 = "pr-5";
    public const PR_6 = "pr-6";
    public const PB_0 = "pb-0";
    public const PB_1 = "pb-1";
    public const PB_2 = "pb-2";
    public const PB_3 = "pb-3";
    public const PB_4 = "pb-4";
    public const PB_5 = "pb-5";
    public const PB_6 = "pb-6";
    public const PL_0 = "pl-0";
    public const PL_1 = "pl-1";
    public const PL_2 = "pl-2";
    public const PL_3 = "pl-3";
    public const PL_4 = "pl-4";
    public const PL_5 = "pl-5";
    public const PL_6 = "pl-6";
    // Padding X and Y
    public const PX_0 = "px-0";
    public const PX_1 = "px-1";
    public const PX_2 = "px-2";
    public const PX_3 = "px-3";
    public const PX_4 = "px-4";
    public const PX_5 = "px-5";
    public const PX_6 = "px-6";
    public const PY_0 = "py-0";
    public const PY_1 = "py-1";
    public const PY_2 = "py-2";
    public const PY_3 = "py-3";
    public const PY_4 = "py-4";
    public const PY_5 = "py-5";
    public const PY_6 = "py-6";


    // Typography Helpers 
    public const IS_SIZE1 = "is-size-1";
    public const IS_SIZE2 = "is-size-2";
    public const IS_SIZE3 = "is-size-3";
    public const IS_SIZE4 = "is-size-4";
    public const IS_SIZE5 = "is-size-5";
    public const IS_SIZE6 = "is-size-6";
    public const IS_SIZE7 = "is-size-7";
    // Text Alignment
    public const HAS_TEXT_CENTERED = "has-text-centered";
    public const HAS_TEXT_JUSTIFIED = "has-text-justified";
    public const HAS_TEXT_LEFT = "has-text-left";
    public const HAS_TEXT_RIGHT = "has-text-right";
    // Text Decoration
    public const IS_CAPITALIZED = "is-capitalized";
    public const IS_LOWERCASE = "is-lowercase";
    public const IS_UPPERCASE = "is-uppercase";
    public const IS_ITALIC = "is-italic";
    public const IS_UNDERLINED = "is-underlined";
    // Text Weight
    public const HAS_TEXT_WEIGHT_LIGHT = "has-text-weight-light";
    public const HAS_TEXT_WEIGHT_NORMAL = "has-text-weight-normal";
    public const HAS_TEXT_WEIGHT_MEDIUM = "has-text-weight-medium";
    public const HAS_TEXT_WEIGHT_SEMIBOLD = "has-text-weight-semibold";
    public const HAS_TEXT_WEIGHT_BOLD = "has-text-weight-bold";
    // Font Family
    public const IS_FAMILY_SANS_SERIF = "is-family-sans-serif";
    public const IS_FAMILY_MONOSPACE = "is-family-monospace";
    public const IS_FAMILY_PRIMARY = "is-family-primary";
    public const IS_FAMILY_SECONDARY = "is-family-secondary";
    public const IS_FAMILY_CODE = "is-family-code";

    // Visibility Helpers
    public const IS_HIDDEN = "is-hidden";
    public const IS_INVISIBLE = "is-invisible";
    public const IS_SR_ONLY = "is-sr-only";
    public const IS_BLOCK = "is-block";
    public const IS_FLEX = "is-flex";
    public const IS_INLINE = "is-inline";
    public const IS_INLINE_BLOCK = "is-inline-block";
    public const IS_INLINE_FLEX = "is-inline-flex";
    public const IS_HIDDEN_MOBILE = "is-hidden-mobile";
    public const IS_HIDDEN_TABLET_ONLY = "is-hidden-tablet-only";
    public const IS_HIDDEN_DESKTOP_ONLY = "is-hidden-desktop-only";
    public const IS_HIDDEN_WIDESCREEN_ONLY = "is-hidden-widescreen-only";
    public const IS_HIDDEN_TOUCH = "is-hidden-touch";
    public const IS_HIDDEN_TABLET = "is-hidden-tablet";
    public const IS_HIDDEN_DESKTOP = "is-hidden-desktop";
    public const IS_HIDDEN_WIDESCREEN = "is-hidden-widescreen";
    public const IS_HIDDEN_FULLHD = "is-hidden-fullhd";

    // Flexbox Helpers
    // Flexbox Container
    public const IS_FLEX_DIRECTION_ROW = "is-flex-direction-row";
    public const IS_FLEX_DIRECTION_ROW_REVERSE = "is-flex-direction-row-reverse";
    public const IS_FLEX_DIRECTION_COLUMN = "is-flex-direction-column";
    public const IS_FLEX_DIRECTION_COLUMN_REVERSE = "is-flex-direction-column-reverse";
    public const IS_FLEX_WRAP_NOWRAP = "is-flex-wrap-nowrap";
    public const IS_FLEX_WRAP_WRAP = "is-flex-wrap-wrap";
    public const IS_FLEX_WRAP_WRAP_REVERSE = "is-flex-wrap-wrap-reverse";
    // Flexbox Justification
    public const IS_JUSTIFY_CONTENT_FLEX_START = "is-justify-content-flex-start";
    public const IS_JUSTIFY_CONTENT_FLEX_END = "is-justify-content-flex-end";
    public const IS_JUSTIFY_CONTENT_CENTER = "is-justify-content-center";
    public const IS_JUSTIFY_CONTENT_SPACE_BETWEEN = "is-justify-content-space-between";
    public const IS_JUSTIFY_CONTENT_SPACE_AROUND = "is-justify-content-space-around";
    public const IS_JUSTIFY_CONTENT_SPACE_EVENLY = "is-justify-content-space-evenly";
    // Flexbox Alignment
    public const IS_ALIGN_CONTENT_FLEX_START = "is-align-content-flex-start";
    public const IS_ALIGN_CONTENT_FLEX_END = "is-align-content-flex-end";
    public const IS_ALIGN_CONTENT_CENTER = "is-align-content-center";
    public const IS_ALIGN_CONTENT_SPACE_BETWEEN = "is-align-content-space-between";
    public const IS_ALIGN_CONTENT_SPACE_AROUND = "is-align-content-space-around";
    public const IS_ALIGN_CONTENT_SPACE_EVENLY = "is-align-content-space-evenly";
    public const IS_ALIGN_CONTENT_STRETCH = "is-align-content-stretch";
    public const IS_ALIGN_ITEMS_FLEX_START = "is-align-items-flex-start";
    public const IS_ALIGN_ITEMS_FLEX_END = "is-align-items-flex-end";
    public const IS_ALIGN_ITEMS_CENTER = "is-align-items-center";
    public const IS_ALIGN_ITEMS_BASELINE = "is-align-items-baseline";
    public const IS_ALIGN_ITEMS_STRETCH = "is-align-items-stretch";
    public const IS_ALIGN_SELF_AUTO = "is-align-self-auto";
    public const IS_ALIGN_SELF_FLEX_START = "is-align-self-flex-start";
    public const IS_ALIGN_SELF_FLEX_END = "is-align-self-flex-end";
    public const IS_ALIGN_SELF_CENTER = "is-align-self-center";
    public const IS_ALIGN_SELF_BASELINE = "is-align-self-baseline";
    public const IS_ALIGN_SELF_STRETCH = "is-align-self-stretch";
    // Flexbox Order
    public const IS_FLEX_GROW0 = "is-flex-grow-0";
    public const IS_FLEX_GROW1 = "is-flex-grow-1";
    public const IS_FLEX_GROW2 = "is-flex-grow-2";
    public const IS_FLEX_GROW3 = "is-flex-grow-3";
    public const IS_FLEX_GROW4 = "is-flex-grow-4";
    public const IS_FLEX_GROW5 = "is-flex-grow-5";
    public const IS_FLEX_SHRINK0 = "is-flex-shrink-0";
    public const IS_FLEX_SHRINK1 = "is-flex-shrink-1";
    public const IS_FLEX_SHRINK2 = "is-flex-shrink-2";
    public const IS_FLEX_SHRINK3 = "is-flex-shrink-3";
    public const IS_FLEX_SHRINK4 = "is-flex-shrink-4";
    public const IS_FLEX_SHRINK5 = "is-flex-shrink-5";

    // Other Helpers
    public const IS_CLEARFIX = "is-clearfix";
    public const IS_PULLED_LEFT = "is-pulled-left";
    public const IS_PULLED_RIGHT = "is-pulled-right";
    public const IS_OVERLAY = "is-overlay";
    public const IS_CLIPPED = "is-clipped";
    public const IS_RADIUSLESS = "is-radiusless";
    public const IS_SHADOWLESS = "is-shadowless";
    public const IS_UNSELECTABLE = "is-unselectable";
    public const IS_CLICKABLE = "is-clickable";
    public const IS_RELATIVE = "is-relative";

    // Skeleton Helpers
    public const IS_SKELETON = "is-skeleton";
    public const HAS_SKELETON = "has-skeleton";
    public const SKELETON_BLOCK = "skeleton-block";
    public const SKELETON_LINES = "skeleton-lines";
    
}