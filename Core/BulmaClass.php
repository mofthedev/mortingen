<?php

abstract class BulmaClass
{   

    // Layout
    public const Container = "container";
    public const Section = "section";
    public const Hero = "hero";
    public const HeroHead = "hero-head";
    public const HeroBody = "hero-body";
    public const HeroFoot = "hero-foot";
    public const Footer = "footer";
    public const Level = "level";
    public const LevelLeft = "level-left";
    public const LevelRight = "level-right";
    public const LevelItem = "level-item";
    public const Media = "media";
    public const MediaLeft = "media-left";
    public const MediaContent = "media-content";
    public const MediaRight = "media-right";
    public const Tile = "tile";

    // Form
    public const Field = "field";
    public const FieldLabel = "field-label";
    public const FieldBody = "field-body";
    public const Label = "label";
    public const Control = "control";
    public const Input = "input";
    public const Textarea = "textarea";
    public const Select = "select";
    public const Checkbox = "checkbox";
    public const Radio = "radio";
    public const Help = "help";
    public const File = "file";
    public const FileLabel = "file-label";
    public const FileInput = "file-input";
    public const FileCTA = "file-cta";
    public const FileIcon = "file-icon";
    public const FileName = "file-name";

    // Elements
    public const Box = "box";
    public const Button = "button";
    public const Content = "content";
    public const Delete = "delete";
    public const Icon = "icon";
    public const IconText = "icon-text";
    public const Image = "image";
    public const Notification = "notification";
    public const Progress = "progress";
    public const Table = "table";
    public const TableContainer = "table-container";
    public const Tag = "tag";
    public const Tags = "tags";
    public const Title = "title";
    public const Subtitle = "subtitle";

    // Components
    public const Breadcrumb = "breadcrumb";
    public const Buttons = "buttons";
    public const Card = "card";
    public const CardHeader = "card-header";
    public const CardHeaderTitle = "card-header-title";
    public const CardHeaderIcon = "card-header-icon";
    public const CardImage = "card-image";
    public const CardContent = "card-content";
    public const CardFooter = "card-footer";
    public const CardFooterItem = "card-footer-item";
    public const Dropdown = "dropdown";
    public const DropdownTrigger = "dropdown-trigger";
    public const DropdownMenu = "dropdown-menu";
    public const DropdownContent = "dropdown-content";
    public const DropdownItem = "dropdown-item";
    public const DropdownDivider = "dropdown-divider";
    public const Menu = "menu";
    public const MenuLabel = "menu-label";
    public const MenuList = "menu-list";
    public const Message = "message";
    public const MessageHeader = "message-header";
    public const MessageBody = "message-body";
    public const Modal = "modal";
    public const ModalBackground = "modal-background";
    public const ModalContent = "modal-content";
    public const ModalClose = "modal-close";
    public const ModalCard = "modal-card";
    public const ModalCardHead = "modal-card-head";
    public const ModalCardTitle = "modal-card-title";
    public const ModalCardBody = "modal-card-body";
    public const ModalCardFoot = "modal-card-foot";
    public const Navbar = "navbar";
    public const NavbarBrand = "navbar-brand";
    public const NavbarBurger = "navbar-burger";
    public const NavbarMenu = "navbar-menu";
    public const NavbarStart = "navbar-start";
    public const NavbarEnd = "navbar-end";
    public const NavbarItem = "navbar-item";
    public const NavbarLink = "navbar-link";
    public const NavbarDropdown = "navbar-dropdown";
    public const NavbarDivider = "navbar-divider";
    public const Pagination = "pagination";
    public const PaginationList = "pagination-list";
    public const PaginationLink = "pagination-link";
    public const PaginationPrevious = "pagination-previous";
    public const PaginationNext = "pagination-next";
    public const PaginationEllipsis = "pagination-ellipsis";
    public const Panel = "panel";
    public const PanelHeading = "panel-heading";
    public const PanelBlock = "panel-block";
    public const PanelTabs = "panel-tabs";
    public const PanelIcon = "panel-icon";
    public const Tabs = "tabs";

    // Modifiers
    // General Style & State
    public const IsActive = "is-active";
    public const IsBlack = "is-black";
    public const IsBordered = "is-bordered";
    public const IsCentered = "is-centered";
    public const IsCurrent = "is-current";
    public const IsDanger = "is-danger";
    public const IsDark = "is-dark";
    public const IsDisabled = "is-disabled";
    public const IsExpanded = "is-expanded";
    public const IsFocused = "is-focused";
    public const IsFullwidth = "is-fullwidth";
    public const IsGhost = "is-ghost";
    public const IsHoverable = "is-hoverable";
    public const IsHovered = "is-hovered";
    public const IsInfo = "is-info";
    public const IsInverted = "is-inverted";
    public const IsLarge = "is-large";
    public const IsLight = "is-light";
    public const IsLink = "is-link";
    public const IsLoading = "is-loading";
    public const IsMedium = "is-medium";
    public const IsNormal = "is-normal";
    public const IsPrimary = "is-primary";
    public const IsRight = "is-right";
    public const IsRounded = "is-rounded";
    public const IsSelected = "is-selected";
    public const IsSmall = "is-small";
    public const IsStatic = "is-static";
    public const IsStriped = "is-striped";
    public const IsSuccess = "is-success";
    public const IsToggle = "is-toggle";
    public const IsToggleRound = "is-toggle-round";
    public const IsTransparent = "is-transparent";
    public const IsUp = "is-up";
    public const IsWarning = "is-warning";
    public const IsWhite = "is-white";

    // Layout & Structure
    public const IsAncestor = "is-ancestor";
    public const IsChild = "is-child";
    public const IsFluid = "is-fluid";
    public const IsFullheight = "is-fullheight";
    public const IsFullheightWithNavbar = "is-fullheight-with-navbar";
    public const IsGapless = "is-gapless";
    public const IsHalfheight = "is-halfheight";
    public const IsHorizontal = "is-horizontal";
    public const IsMultiline = "is-multiline";
    public const IsNarrow = "is-narrow";
    public const IsParent = "is-parent";
    public const IsVcentered = "is-vcentered";
    public const IsVertical = "is-vertical";

    // Grouping
    public const HasAddons = "has-addons";
    public const HasAddonsCentered = "has-addons-centered";
    public const HasAddonsFullwidth = "has-addons-fullwidth";
    public const HasAddonsRight = "has-addons-right";
    public const IsGrouped = "is-grouped";
    public const IsGroupedCentered = "is-grouped-centered";
    public const IsGroupedMultiline = "is-grouped-multiline";
    public const IsGroupedRight = "is-grouped-right";

    // Icons
    public const HasIconsLeft = "has-icons-left";
    public const HasIconsRight = "has-icons-right";

    // Columns - Grid
    public const Columns = "columns";
    public const Column = "column";
    public const Grid = "grid";

    // Column Sizes
    public const IsFull = "is-full";
    public const IsThreeQuarters = "is-three-quarters";
    public const IsTwoThirds = "is-two-thirds";
    public const IsHalf = "is-half";
    public const IsOneThird = "is-one-third";
    public const IsOneQuarter = "is-one-quarter";
    public const IsOneFifth = "is-one-fifth";
    public const IsTwoFifths = "is-two-fifths";
    public const IsThreeFifths = "is-three-fifths";
    public const IsFourFifths = "is-four-fifths";
    public const Is1 = "is-1";
    public const Is2 = "is-2";
    public const Is3 = "is-3";
    public const Is4 = "is-4";
    public const Is5 = "is-5";
    public const Is6 = "is-6";
    public const Is7 = "is-7";
    public const Is8 = "is-8";
    public const Is9 = "is-9";
    public const Is10 = "is-10";
    public const Is11 = "is-11";
    public const Is12 = "is-12";

    // Column Offsets
    public const IsOffsetThreeQuarters = "is-offset-three-quarters";
    public const IsOffsetTwoThirds = "is-offset-two-thirds";
    public const IsOffsetHalf = "is-offset-half";
    public const IsOffsetOneThird = "is-offset-one-third";
    public const IsOffsetOneQuarter = "is-offset-one-quarter";
    public const IsOffsetOneFifth = "is-offset-one-fifth";
    public const IsOffsetTwoFifths = "is-offset-two-fifths";
    public const IsOffsetThreeFifths = "is-offset-three-fifths";
    public const IsOffsetFourFifths = "is-offset-four-fifths";

    // Image Ratios
    public const HasRatio = "has-ratio";
    public const IsSquare = "is-square";
    public const Is1by1 = "is-1by1";
    public const Is5by4 = "is-5by4";
    public const Is4by3 = "is-4by3";
    public const Is3by2 = "is-3by2";
    public const Is5by3 = "is-5by3";
    public const Is16by9 = "is-16by9";
    public const Is2by1 = "is-2by1";
    public const Is3by1 = "is-3by1";
    public const Is4by5 = "is-4by5";
    public const Is3by4 = "is-3by4";
    public const Is2by3 = "is-2by3";
    public const Is3by5 = "is-3by5";
    public const Is9by16 = "is-9by16";
    public const Is1by2 = "is-1by2";
    public const Is1by3 = "is-1by3";

    // Responsive Container Sizes
    public const IsWidescreen = "is-widescreen";
    public const IsFullhd = "is-fullhd";
    public const IsMaxTablet = "is-max-tablet";
    public const IsMaxDesktop = "is-max-desktop";
    public const IsMaxWidescreen = "is-max-widescreen";

    // Helpers
    // Color Helpers
    public const HasBackgroundBlack = "has-background-black";
    public const HasBackgroundDark = "has-background-dark";
    public const HasBackgroundLight = "has-background-light";
    public const HasBackgroundWhite = "has-background-white";
    public const HasBackgroundPrimary = "has-background-primary";
    public const HasBackgroundLink = "has-background-link";
    public const HasBackgroundInfo = "has-background-info";
    public const HasBackgroundSuccess = "has-background-success";
    public const HasBackgroundWarning = "has-background-warning";
    public const HasBackgroundDanger = "has-background-danger";
    public const HasTextBlack = "has-text-black";
    public const HasTextDark = "has-text-dark";
    public const HasTextLight = "has-text-light";
    public const HasTextWhite = "has-text-white";
    public const HasTextPrimary = "has-text-primary";
    public const HasTextLink = "has-text-link";
    public const HasTextInfo = "has-text-info";
    public const HasTextSuccess = "has-text-success";
    public const HasTextWarning = "has-text-warning";
    public const HasTextDanger = "has-text-danger";

    // Spacing Helpers: Margin
    // Margin Auto
    public const M_Auto = "m-auto";
    public const MT_Auto = "mt-auto";
    public const MR_Auto = "mr-auto";
    public const MB_Auto = "mb-auto";
    public const ML_Auto = "ml-auto";
    public const MX_Auto = "mx-auto";
    public const MY_Auto = "my-auto";
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
    public const P_Auto = "p-auto";
    public const PT_Auto = "pt-auto";
    public const PR_Auto = "pr-auto";
    public const PB_Auto = "pb-auto";
    public const PL_Auto = "pl-auto";
    public const PX_Auto = "px-auto";
    public const PY_Auto = "py-auto";
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
    public const IsSize1 = "is-size-1";
    public const IsSize2 = "is-size-2";
    public const IsSize3 = "is-size-3";
    public const IsSize4 = "is-size-4";
    public const IsSize5 = "is-size-5";
    public const IsSize6 = "is-size-6";
    public const IsSize7 = "is-size-7";
    // Text Alignment
    public const HasTextCentered = "has-text-centered";
    public const HasTextJustified = "has-text-justified";
    public const HasTextLeft = "has-text-left";
    public const HasTextRight = "has-text-right";
    // Text Decoration
    public const IsCapitalized = "is-capitalized";
    public const IsLowercase = "is-lowercase";
    public const IsUppercase = "is-uppercase";
    public const IsItalic = "is-italic";
    public const IsUnderlined = "is-underlined";
    // Text Weight
    public const HasTextWeightLight = "has-text-weight-light";
    public const HasTextWeightNormal = "has-text-weight-normal";
    public const HasTextWeightMedium = "has-text-weight-medium";
    public const HasTextWeightSemibold = "has-text-weight-semibold";
    public const HasTextWeightBold = "has-text-weight-bold";
    // Font Family
    public const IsFamilySansSerif = "is-family-sans-serif";
    public const IsFamilyMonospace = "is-family-monospace";
    public const IsFamilyPrimary = "is-family-primary";
    public const IsFamilySecondary = "is-family-secondary";
    public const IsFamilyCode = "is-family-code";

    // Visibility Helpers
    public const IsHidden = "is-hidden";
    public const IsInvisible = "is-invisible";
    public const IsSrOnly = "is-sr-only";
    public const IsBlock = "is-block";
    public const IsFlex = "is-flex";
    public const IsInline = "is-inline";
    public const IsInlineBlock = "is-inline-block";
    public const IsInlineFlex = "is-inline-flex";
    public const IsHiddenMobile = "is-hidden-mobile";
    public const IsHiddenTabletOnly = "is-hidden-tablet-only";
    public const IsHiddenDesktopOnly = "is-hidden-desktop-only";
    public const IsHiddenWidescreenOnly = "is-hidden-widescreen-only";
    public const IsHiddenTouch = "is-hidden-touch";
    public const IsHiddenTablet = "is-hidden-tablet";
    public const IsHiddenDesktop = "is-hidden-desktop";
    public const IsHiddenWidescreen = "is-hidden-widescreen";
    public const IsHiddenFullhd = "is-hidden-fullhd";

    // Flexbox Helpers
    // Flexbox Container
    public const IsFlexDirectionRow = "is-flex-direction-row";
    public const IsFlexDirectionRowReverse = "is-flex-direction-row-reverse";
    public const IsFlexDirectionColumn = "is-flex-direction-column";
    public const IsFlexDirectionColumnReverse = "is-flex-direction-column-reverse";
    public const IsFlexWrapNowrap = "is-flex-wrap-nowrap";
    public const IsFlexWrapWrap = "is-flex-wrap-wrap";
    public const IsFlexWrapWrapReverse = "is-flex-wrap-wrap-reverse";
    // Flexbox Justification
    public const IsJustifyContentFlexStart = "is-justify-content-flex-start";
    public const IsJustifyContentFlexEnd = "is-justify-content-flex-end";
    public const IsJustifyContentCenter = "is-justify-content-center";
    public const IsJustifyContentSpaceBetween = "is-justify-content-space-between";
    public const IsJustifyContentSpaceAround = "is-justify-content-space-around";
    public const IsJustifyContentSpaceEvenly = "is-justify-content-space-evenly";
    // Flexbox Alignment
    public const IsAlignContentFlexStart = "is-align-content-flex-start";
    public const IsAlignContentFlexEnd = "is-align-content-flex-end";
    public const IsAlignContentCenter = "is-align-content-center";
    public const IsAlignContentSpaceBetween = "is-align-content-space-between";
    public const IsAlignContentSpaceAround = "is-align-content-space-around";
    public const IsAlignContentSpaceEvenly = "is-align-content-space-evenly";
    public const IsAlignContentStretch = "is-align-content-stretch";
    public const IsAlignItemsFlexStart = "is-align-items-flex-start";
    public const IsAlignItemsFlexEnd = "is-align-items-flex-end";
    public const IsAlignItemsCenter = "is-align-items-center";
    public const IsAlignItemsBaseline = "is-align-items-baseline";
    public const IsAlignItemsStretch = "is-align-items-stretch";
    public const IsAlignSelfAuto = "is-align-self-auto";
    public const IsAlignSelfFlexStart = "is-align-self-flex-start";
    public const IsAlignSelfFlexEnd = "is-align-self-flex-end";
    public const IsAlignSelfCenter = "is-align-self-center";
    public const IsAlignSelfBaseline = "is-align-self-baseline";
    public const IsAlignSelfStretch = "is-align-self-stretch";
    // Flexbox Order
    public const IsFlexGrow0 = "is-flex-grow-0";
    public const IsFlexGrow1 = "is-flex-grow-1";
    public const IsFlexGrow2 = "is-flex-grow-2";
    public const IsFlexGrow3 = "is-flex-grow-3";
    public const IsFlexGrow4 = "is-flex-grow-4";
    public const IsFlexGrow5 = "is-flex-grow-5";
    public const IsFlexShrink0 = "is-flex-shrink-0";
    public const IsFlexShrink1 = "is-flex-shrink-1";
    public const IsFlexShrink2 = "is-flex-shrink-2";
    public const IsFlexShrink3 = "is-flex-shrink-3";
    public const IsFlexShrink4 = "is-flex-shrink-4";
    public const IsFlexShrink5 = "is-flex-shrink-5";

    // Other Helpers
    public const IsClearfix = "is-clearfix";
    public const IsPulledLeft = "is-pulled-left";
    public const IsPulledRight = "is-pulled-right";
    public const IsOverlay = "is-overlay";
    public const IsClipped = "is-clipped";
    public const IsRadiusless = "is-radiusless";
    public const IsShadowless = "is-shadowless";
    public const IsUnselectable = "is-unselectable";
    public const IsClickable = "is-clickable";
    public const IsRelative = "is-relative";

    // Skeleton Helpers
    public const IsSkeleton = "is-skeleton";
    public const HasSkeleton = "has-skeleton";
    public const SkeletonBlock = "skeleton-block";
    public const SkeletonLines = "skeleton-lines";
}