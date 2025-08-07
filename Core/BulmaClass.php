<?php 

/**
 * Sınıfın adı: BulmaClass
 * Amacı: Bulma CSS Framework'ünün tüm sınıflarını PHP sabitleri olarak içerir.
 * Faydası: Geliştirme sırasında sınıf adlarının yanlış yazılmasını önler ve kod okunabilirliğini artırır.
 *
 * @source https://bulma.io/documentation/
 */
abstract class BulmaClass // "BulmaClass" adında soyut (abstract) bir sınıf tanımlar. "abstract" olması, bu sınıftan doğrudan nesne üretilemeyeceği anlamına gelir.
{ // Sınıf tanımının başladığı yer.

    //================================================================
    // LAYOUT (SAYFA YERLEŞİMİ) - Kodun okunabilirliğini artırmak için kullanılan bir yorum ayırıcı.
    //================================================================

    // --- Layout Bileşenleri ---
    // ".container" CSS sınıfını temsil eden bir sabittir. İçeriği ortalar.
    public const Container = "container";
    // ".hero" CSS sınıfını temsil eden bir sabittir. Geniş bir başlık alanı oluşturur.
    public const Hero = "hero";
    // ".section" CSS sınıfını temsil eden bir sabittir. Genel içerik bölümleri oluşturur.
    public const Section = "section";
    // ".footer" CSS sınıfını temsil eden bir sabittir. Sayfa altbilgisi oluşturur.
    public const Footer = "footer";
    // ".level" CSS sınıfını temsil eden bir sabittir. Yatay bir düzlemde öğeler hizalar.
    public const Level = "level";
    // ".media" CSS sınıfını temsil eden bir sabittir. Medya nesneleri (resim+metin) için kullanılır.
    public const Media = "media";
    // ".tile" CSS sınıfını temsil eden bir sabittir. Gelişmiş bir ızgara (grid) sistemi oluşturur.
    public const Tile = "tile";

    // --- Layout Bileşen Parçaları ---
    // ".hero-head" sınıfını temsil eder. Hero'nun başlık kısmıdır.
    public const HeroHead = "hero-head";
    // ".hero-body" sınıfını temsil eder. Hero'nun ana gövdesidir.
    public const HeroBody = "hero-body";
    // ".hero-foot" sınıfını temsil eder. Hero'nun alt kısmıdır.
    public const HeroFoot = "hero-foot";
    // ".level-left" sınıfını temsil eder. Level'in sol tarafıdır.
    public const LevelLeft = "level-left";
    // ".level-right" sınıfını temsil eder. Level'in sağ tarafıdır.
    public const LevelRight = "level-right";
    // ".level-item" sınıfını temsil eder. Level içindeki her bir öğedir.
    public const LevelItem = "level-item";
    // ".media-left" sınıfını temsil eder. Medya nesnesinin sol tarafıdır.
    public const MediaLeft = "media-left";
    // ".media-content" sınıfını temsil eder. Medya nesnesinin içerik kısmıdır.
    public const MediaContent = "media-content";
    // ".media-right" sınıfını temsil eder. Medya nesnesinin sağ tarafıdır.
    public const MediaRight = "media-right";

    // --- Layout Değiştiricileri ---
    // ".is-fluid" sınıfı. Konteynerin tam genişlikte olmasını sağlar.
    public const IsFluid = "is-fluid";
    // ".is-widescreen" sınıfı. Konteynerin maksimum genişliğini 1216px yapar.
    public const IsWidescreen = "is-widescreen";
    // ".is-fullhd" sınıfı. Konteynerin maksimum genişliğini 1408px yapar.
    public const IsFullHD = "is-fullhd";
    // ".is-max-tablet" sınıfı. Konteynerin maksimum genişliğini tablet boyutunda tutar.
    public const IsMaxTablet = "is-max-tablet";
    // ".is-max-desktop" sınıfı. Konteynerin maksimum genişliğini masaüstü boyutunda tutar.
    public const IsMaxDesktop = "is-max-desktop";
    // ".is-max-widescreen" sınıfı. Konteynerin maksimum genişliğini widescreen boyutunda tutar.
    public const IsMaxWidescreen = "is-max-widescreen";
    // ".is-bold" sınıfı. Hero bileşenini daha belirgin (koyu renkli) yapar.
    public const IsBold = "is-bold";
    // ".is-ancestor" sınıfı. Tile sisteminde en dış sarmalayıcıdır.
    public const IsAncestor = "is-ancestor";
    // ".is-parent" sınıfı. Tile sisteminde alt tile'ları içeren ebeveyndir.
    public const IsParent = "is-parent";
    // ".is-child" sınıfı. Tile sisteminde bir ebeveyn içindeki tekil öğedir.
    public const IsChild = "is-child";
    // ".is-vertical" sınıfı. Tile'ların dikey olarak sıralanmasını sağlar.
    public const IsVertical = "is-vertical";

    //================================================================
    // COLUMNS (SÜTUNLAR) - Sütun sistemiyle ilgili sınıflar.
    //================================================================

    // ".columns" sınıfı. Sütunlar için sarmalayıcı görevi görür.
    public const Columns = "columns";
    // ".column" sınıfı. Tek bir sütunu temsil eder.
    public const Column = "column";

    // --- Sütun Seçenekleri ---
    // ".is-narrow" sınıfı. Sütunun sadece kendi içeriği kadar yer kaplamasını sağlar.
    public const IsNarrow = "is-narrow";
    // ".is-multiline" sınıfı. Sütunların toplamı %100'ü aştığında alt satıra geçmesini sağlar.
    public const IsMultiline = "is-multiline";
    // ".is-vcentered" sınıfı. Sütunları dikeyde ortalar.
    public const IsVcentered = "is-vcentered";
    // ".is-centered" sınıfı. Sütunları yatayda ortalar.
    public const IsCentered = "is-centered";
    // ".is-gapless" sınıfı. Sütunlar arasındaki boşluğu kaldırır.
    public const IsGapless = "is-gapless";
    // ".is-variable" sınıfı. Sütun boşluklarını CSS değişkenleri ile özelleştirmeyi sağlar.
    public const IsVariable = "is-variable";

    // --- Sütun Boyutları (Oransal) ---
    // ".is-full" sınıfı. Sütunu tam genişlik yapar (%100).
    public const IsFull = "is-full";
    // ".is-three-quarters" sınıfı. Sütun genişliğini %75 yapar.
    public const IsThreeQuarters = "is-three-quarters";
    // ".is-two-thirds" sınıfı. Sütun genişliğini %66.6 yapar.
    public const IsTwoThirds = "is-two-thirds";
    // ".is-half" sınıfı. Sütun genişliğini %50 yapar.
    public const IsHalf = "is-half";
    // ".is-one-third" sınıfı. Sütun genişliğini %33.3 yapar.
    public const IsOneThird = "is-one-third";
    // ".is-one-quarter" sınıfı. Sütun genişliğini %25 yapar.
    public const IsOneQuarter = "is-one-quarter";
    // ".is-one-fifth" sınıfı. Sütun genişliğini %20 yapar.
    public const IsOneFifth = "is-one-fifth";
    // ".is-two-fifths" sınıfı. Sütun genişliğini %40 yapar.
    public const IsTwoFifths = "is-two-fifths";
    // ".is-three-fifths" sınıfı. Sütun genişliğini %60 yapar.
    public const IsThreeFifths = "is-three-fifths";
    // ".is-four-fifths" sınıfı. Sütun genişliğini %80 yapar.
    public const IsFourFifths = "is-four-fifths";

    // --- Sütun Offset (Soldan Boşluk) ---
    // ".is-offset-three-quarters" sınıfı. Sütunu soldan %75 ittirir.
    public const IsOffsetThreeQuarters = "is-offset-three-quarters";
    // ".is-offset-two-thirds" sınıfı. Sütunu soldan %66.6 ittirir.
    public const IsOffsetTwoThirds = "is-offset-two-thirds";
    // ".is-offset-half" sınıfı. Sütunu soldan %50 ittirir.
    public const IsOffsetHalf = "is-offset-half";
    // ".is-offset-one-third" sınıfı. Sütunu soldan %33.3 ittirir.
    public const IsOffsetOneThird = "is-offset-one-third";
    // ".is-offset-one-quarter" sınıfı. Sütunu soldan %25 ittirir.
    public const IsOffsetOneQuarter = "is-offset-one-quarter";

    //================================================================
    // ELEMENTS & COMPONENTS (ELEMENTLER VE BİLEŞENLER) - Genel arayüz elemanları.
    //================================================================

    // ".box" sınıfı. Etrafında gölge ve boşluk olan bir kutu oluşturur.
    public const Box = "box";
    // ".button" sınıfı. Tıklanabilir bir düğme oluşturur.
    public const Button = "button";
    // ".buttons" sınıfı. Butonları bir arada gruplamak için kullanılır.
    public const Buttons = "buttons";
    // ".card" sınıfı. Esnek bir kart bileşeni oluşturur.
    public const Card = "card";
    // ".card-header" sınıfı. Kartın başlık bölümüdür.
    public const CardHeader = "card-header";
    // ".card-header-title" sınıfı. Kart başlık metnidir.
    public const CardHeaderTitle = "card-header-title";
    // ".card-header-icon" sınıfı. Kart başlığındaki ikondur.
    public const CardHeaderIcon = "card-header-icon";
    // ".card-image" sınıfı. Kart içindeki resim alanıdır.
    public const CardImage = "card-image";
    // ".card-content" sınıfı. Kartın ana içerik alanıdır.
    public const CardContent = "card-content";
    // ".card-footer" sınıfı. Kartın altbilgi bölümüdür.
    public const CardFooter = "card-footer";
    // ".card-footer-item" sınıfı. Kart altbilgisindeki her bir öğedir.
    public const CardFooterItem = "card-footer-item";
    // ".content" sınıfı. Standart HTML etiketlerini (p, ul, h1 vb.) biçimlendirir.
    public const Content = "content";
    // ".delete" sınıfı. Kapatma (çarpı) ikonu oluşturur.
    public const Delete = "delete";
    // ".icon" sınıfı. Font-Awesome gibi ikonları sarmalamak için kullanılır.
    public const Icon = "icon";
    // ".icon-text" sınıfı. İkon ve metni bir arada kullanmak içindir.
    public const IconText = "icon-text";
    // ".image" sınıfı. Resimleri responsive yapmak ve oranlamak için kullanılır.
    public const Image = "image";
    // ".modal" sınıfı. Ekranın üzerine çıkan bir pencere (dialog) oluşturur.
    public const Modal = "modal";
    // ".modal-background" sınıfı. Modal pencerenin arkasındaki karartılmış alandır.
    public const ModalBackground = "modal-background";
    // ".modal-content" sınıfı. Modal penceresinin içeriğini sarmalar.
    public const ModalContent = "modal-content";
    // ".modal-close" sınıfı. Modal penceresini kapatma düğmesidir.
    public const ModalClose = "modal-close";
    // ".modal-card" sınıfı. Başlık ve altbilgisi olan bir modal türüdür.
    public const ModalCard = "modal-card";
    // ".modal-card-head" sınıfı. Modal kartının başlığıdır.
    public const ModalCardHead = "modal-card-head";
    // ".modal-card-title" sınıfı. Modal kartının başlık metnidir.
    public const ModalCardTitle = "modal-card-title";
    // ".modal-card-body" sınıfı. Modal kartının gövdesidir.
    public const ModalCardBody = "modal-card-body";
    // ".modal-card-foot" sınıfı. Modal kartının altbilgisidir.
    public const ModalCardFoot = "modal-card-foot";
    // ".notification" sınıfı. Kullanıcıyı bilgilendirmek için renkli bir kutu oluşturur.
    public const Notification = "notification";
    // ".progress" sınıfı. İlerleme çubuğu oluşturur.
    public const Progress = "progress";
    // ".table" sınıfı. HTML tablolarını biçimlendirir.
    public const Table = "table";
    // ".table-container" sınıfı. Geniş tabloları yatayda kaydırılabilir yapar.
    public const TableContainer = "table-container";
    // ".tag" sınıfı. Küçük etiketler oluşturur.
    public const Tag = "tag";
    // ".tags" sınıfı. Etiketleri bir arada gruplar.
    public const Tags = "tags";
    // ".title" sınıfı. Ana başlıklar için kullanılır.
    public const Title = "title";
    // ".subtitle" sınıfı. İkincil başlıklar için kullanılır.
    public const Subtitle = "subtitle";
    // ".skeleton" sınıfı. İçerik yüklenirken yer tutucu iskelet görünümü oluşturur.
    public const Skeleton = "skeleton";

    //================================================================
    // FORM - Form elemanları için sınıflar.
    //================================================================

    // ".field" sınıfı. Form alanlarını (label, input) gruplar.
    public const Field = "field";
    // ".field-label" sınıfı. Yatay formlarda etiket için kullanılır.
    public const FieldLabel = "field-label";
    // ".field-body" sınıfı. Yatay formlarda form kontrolünü içerir.
    public const FieldBody = "field-body";
    // ".label" sınıfı. Form alanı etiketidir.
    public const Label = "label";
    // ".control" sınıfı. Form elemanlarını (input, button) sarmalar.
    public const Control = "control";
    // ".input" sınıfı. Metin giriş alanıdır.
    public const Input = "input";
    // ".textarea" sınıfı. Çok satırlı metin giriş alanıdır.
    public const Textarea = "textarea";
    // ".select" sınıfı. Açılır menü (select box) sarmalayıcısıdır.
    public const Select = "select";
    // ".checkbox" sınıfı. Onay kutusudur.
    public const Checkbox = "checkbox";
    // ".radio" sınıfı. Radyo düğmesidir.
    public const Radio = "radio";
    // ".help" sınıfı. Form alanları altında yardım metni gösterir.
    public const Help = "help";

    // --- Form Değiştiricileri ---
    // ".has-addons" sınıfı. Form elemanlarını birbirine bitişik gösterir.
    public const HasAddons = "has-addons";
    // ".has-addons-centered" sınıfı. Bitişik elemanları ortalar.
    public const HasAddonsCentered = "has-addons-centered";
    // ".has-addons-right" sınıfı. Bitişik elemanları sağa yaslar.
    public const HasAddonsRight = "has-addons-right";
    // ".has-addons-fullwidth" sınıfı. Bitişik elemanların tam genişlikte olmasını sağlar.
    public const HasAddonsFullwidth = "has-addons-fullwidth";
    // ".is-grouped" sınıfı. Form alanlarını yatay bir grup olarak gösterir.
    public const IsGrouped = "is-grouped";
    // ".is-grouped-centered" sınıfı. Gruplanmış elemanları ortalar.
    public const IsGroupedCentered = "is-grouped-centered";
    // ".is-grouped-right" sınıfı. Gruplanmış elemanları sağa yaslar.
    public const IsGroupedRight = "is-grouped-right";
    // ".is-grouped-multiline" sınıfı. Gruplanmış elemanların alt satıra geçmesini sağlar.
    public const IsGroupedMultiline = "is-grouped-multiline";
    // ".has-icons-left" sınıfı. Giriş alanının soluna ikon eklenmesini sağlar.
    public const HasIconsLeft = "has-icons-left";
    // ".has-icons-right" sınıfı. Giriş alanının sağına ikon eklenmesini sağlar.
    public const HasIconsRight = "has-icons-right";
    // ".is-horizontal" sınıfı. Formu yatay olarak hizalar (label ve field yan yana).
    public const IsHorizontal = "is-horizontal";

    //================================================================
    // GENEL DEĞİŞTİRİCİLER (MODIFIERS) - Farklı elementlere uygulanabilen genel stiller.
    //================================================================

    // --- Durumlar (States) ---
    // ".is-hovered" sınıfı. Fare üzerine gelmiş gibi gösterir.
    public const IsHovered = "is-hovered";
    // ".is-focused" sınıfı. Odaklanılmış gibi gösterir.
    public const IsFocused = "is-focused";
    // ".is-active" sınıfı. Aktif (tıklanmış) gibi gösterir.
    public const IsActive = "is-active";
    // ".is-loading" sınıfı. Yükleniyor animasyonu ekler.
    public const IsLoading = "is-loading";
    // ".is-static" sınıfı. Tıklanamayan, statik bir eleman oluşturur.
    public const IsStatic = "is-static";
    // ".is-selected" sınıfı. Seçilmiş bir elemanı belirtir.
    public const IsSelected = "is-selected";

    // --- Renkler ---
    // ".is-primary" sınıfı. Ana tema rengini uygular.
    public const IsPrimary = "is-primary";
    // ".is-primary-light" sınıfı. Ana rengin açık tonunu uygular.
    public const IsPrimaryLight = "is-primary-light";
    // ".is-primary-dark" sınıfı. Ana rengin koyu tonunu uygular.
    public const IsPrimaryDark = "is-primary-dark";
    // ".is-link" sınıfı. Link rengini uygular.
    public const IsLink = "is-link";
    // ".is-link-light" sınıfı. Link renginin açık tonunu uygular.
    public const IsLinkLight = "is-link-light";
    // ".is-link-dark" sınıfı. Link renginin koyu tonunu uygular.
    public const IsLinkDark = "is-link-dark";
    // ".is-info" sınıfı. Bilgi rengini uygular.
    public const IsInfo = "is-info";
    // ".is-info-light" sınıfı. Bilgi renginin açık tonunu uygular.
    public const IsInfoLight = "is-info-light";
    // ".is-info-dark" sınıfı. Bilgi renginin koyu tonunu uygular.
    public const IsInfoDark = "is-info-dark";
    // ".is-success" sınıfı. Başarı rengini uygular.
    public const IsSuccess = "is-success";
    // ".is-success-light" sınıfı. Başarı renginin açık tonunu uygular.
    public const IsSuccessLight = "is-success-light";
    // ".is-success-dark" sınıfı. Başarı renginin koyu tonunu uygular.
    public const IsSuccessDark = "is-success-dark";
    // ".is-warning" sınıfı. Uyarı rengini uygular.
    public const IsWarning = "is-warning";
    // ".is-warning-light" sınıfı. Uyarı renginin açık tonunu uygular.
    public const IsWarningLight = "is-warning-light";
    // ".is-warning-dark" sınıfı. Uyarı renginin koyu tonunu uygular.
    public const IsWarningDark = "is-warning-dark";
    // ".is-danger" sınıfı. Tehlike rengini uygular.
    public const IsDanger = "is-danger";
    // ".is-danger-light" sınıfı. Tehlike renginin açık tonunu uygular.
    public const IsDangerLight = "is-danger-light";
    // ".is-danger-dark" sınıfı. Tehlike renginin koyu tonunu uygular.
    public const IsDangerDark = "is-danger-dark";
    // ".is-black" sınıfı. Siyah rengi uygular.
    public const IsBlack = "is-black";
    // ".is-dark" sınıfı. Koyu gri rengi uygular.
    public const IsDark = "is-dark";
    // ".is-light" sınıfı. Açık gri rengi uygular.
    public const IsLight = "is-light";
    // ".is-white" sınıfı. Beyaz rengi uygular.
    public const IsWhite = "is-white";
    // ".is-ghost" sınıfı. Yarı saydam bir arka plan stili uygular.
    public const IsGhost = "is-ghost";

    // --- Boyutlar ---
    // ".is-small" sınıfı. Elemanı küçük boyutta yapar.
    public const IsSmall = "is-small";
    // ".is-normal" sınıfı. Elemanı normal boyutta yapar.
    public const IsNormal = "is-normal";
    // ".is-medium" sınıfı. Elemanı orta boyutta yapar.
    public const IsMedium = "is-medium";
    // ".is-large" sınıfı. Elemanı büyük boyutta yapar.
    public const IsLarge = "is-large";

    // --- Stiller ---
    // ".is-outlined" sınıfı. İçi boş, kenarlıklı bir stil uygular.
    public const IsOutlined = "is-outlined";
    // ".is-inverted" sınıfı. Renkleri tersine çevirir (koyu arka plan, açık metin).
    public const IsInverted = "is-inverted";
    // ".is-rounded" sınıfı. Köşeleri yuvarlaklaştırır.
    public const IsRounded = "is-rounded";
    // ".is-bordered" sınıfı. Kenarlık ekler.
    public const IsBordered = "is-bordered";
    // ".is-striped" sınıfı. Zebra deseni ekler (genellikle tablolara).
    public const IsStriped = "is-striped";
    // ".is-hoverable" sınıfı. Üzerine gelince vurgu efekti ekler.
    public const IsHoverable = "is-hoverable";
    // ".is-fullwidth" sınıfı. Elemanın %100 genişlikte olmasını sağlar.
    public const IsFullwidth = "is-fullwidth";
    // ".is-spaced" sınıfı. Elemanlar arasında daha fazla boşluk bırakır.
    public const IsSpaced = "is-spaced";
    // ".is-square" sınıfı. Elemanı kare yapar.
    public const IsSquare = "is-square";
    // ".is-skeleton" sınıfı. Skeleton (iskelet) yükleme efektini aktif eder.
    public const IsSkeleton = "is-skeleton";

    // --- Görüntü Oranları (Image için) ---
    // Bu sınıflar, bir resmin veya videonun en-boy oranını korumasını sağlar.
    public const Is1by1 = "is-1by1"; public const Is5by4 = "is-5by4"; public const Is4by3 = "is-4by3"; public const Is3by2 = "is-3by2";
    public const Is5by3 = "is-5by3"; public const Is16by9 = "is-16by9"; public const Is2by1 = "is-2by1"; public const Is3by1 = "is-3by1";
    public const Is4by5 = "is-4by5"; public const Is3by4 = "is-3by4"; public const Is2by3 = "is-2by3"; public const Is3by5 = "is-3by5";
    public const Is9by16 = "is-9by16"; public const Is1by2 = "is-1by2"; public const Is1by3 = "is-1by3";

    // --- Sabit Görüntü Boyutları (Image için) ---
    // Bu sınıflar, bir resmi belirtilen piksel boyutlarına sabitler.
    public const Is16x16 = "is-16x16"; public const Is24x24 = "is-24x24"; public const Is32x32 = "is-32x32";
    public const Is48x48 = "is-48x48"; public const Is64x64 = "is-64x64"; public const Is96x96 = "is-96x96";
    public const Is128x128 = "is-128x128";


    //================================================================
    // HELPERS (YARDIMCI SINIFLAR) - Hızlı stil vermek için kullanılan yardımcılar.
    //================================================================

    // --- Renk Helperları ---
    // ".has-text-primary" sınıfı. Metin rengini ana renk yapar.
    public const HasTextPrimary = "has-text-primary";
    public const HasTextPrimaryLight = "has-text-primary-light";
    public const HasTextPrimaryDark = "has-text-primary-dark";
    // ".has-text-link" sınıfı. Metin rengini link rengi yapar.
    public const HasTextLink = "has-text-link";
    public const HasTextLinkLight = "has-text-link-light";
    public const HasTextLinkDark = "has-text-link-dark";
    // (Diğer renkler de aynı mantıkla çalışır...)
    public const HasTextInfo = "has-text-info";
    public const HasTextInfoLight = "has-text-info-light";
    public const HasTextInfoDark = "has-text-info-dark";
    public const HasTextSuccess = "has-text-success";
    public const HasTextSuccessLight = "has-text-success-light";
    public const HasTextSuccessDark = "has-text-success-dark";
    public const HasTextWarning = "has-text-warning";
    public const HasTextWarningLight = "has-text-warning-light";
    public const HasTextWarningDark = "has-text-warning-dark";
    public const HasTextDanger = "has-text-danger";
    public const HasTextDangerLight = "has-text-danger-light";
    public const HasTextDangerDark = "has-text-danger-dark";
    public const HasTextBlack = "has-text-black";
    public const HasTextDark = "has-text-dark";
    public const HasTextLight = "has-text-light";
    public const HasTextWhite = "has-text-white";
    public const HasTextGreyDarker = "has-text-grey-darker";
    public const HasTextGreyDark = "has-text-grey-dark";
    public const HasTextGrey = "has-text-grey";
    public const HasTextGreyLight = "has-text-grey-light";
    public const HasTextGreyLighter = "has-text-grey-lighter";
    // ".has-background-primary" sınıfı. Arka plan rengini ana renk yapar.
    public const HasBackgroundPrimary = "has-background-primary";
    public const HasBackgroundPrimaryLight = "has-background-primary-light";
    public const HasBackgroundPrimaryDark = "has-background-primary-dark";
    // (Diğer arka plan renkleri de aynı mantıkla çalışır...)
    public const HasBackgroundLink = "has-background-link";
    public const HasBackgroundLinkLight = "has-background-link-light";
    public const HasBackgroundLinkDark = "has-background-link-dark";
    public const HasBackgroundInfo = "has-background-info";
    public const HasBackgroundInfoLight = "has-background-info-light";
    public const HasBackgroundInfoDark = "has-background-info-dark";
    public const HasBackgroundSuccess = "has-background-success";
    public const HasBackgroundSuccessLight = "has-background-success-light";
    public const HasBackgroundSuccessDark = "has-background-success-dark";
    public const HasBackgroundWarning = "has-background-warning";
    public const HasBackgroundWarningLight = "has-background-warning-light";
    public const HasBackgroundWarningDark = "has-background-warning-dark";
    public const HasBackgroundDanger = "has-background-danger";
    public const HasBackgroundDangerLight = "has-background-danger-light";
    public const HasBackgroundDangerDark = "has-background-danger-dark";
    public const HasBackgroundBlack = "has-background-black";
    public const HasBackgroundDark = "has-background-dark";
    public const HasBackgroundLight = "has-background-light";
    public const HasBackgroundWhite = "has-background-white";
    public const HasBackgroundGreyDarker = "has-background-grey-darker";
    public const HasBackgroundGreyDark = "has-background-grey-dark";
    public const HasBackgroundGrey = "has-background-grey";
    public const HasBackgroundGreyLight = "has-background-grey-light";
    public const HasBackgroundGreyLighter = "has-background-grey-lighter";

    // --- Tipografi Helperları ---
    // ".is-size-1" den ".is-size-7" ye kadar: Metin boyutunu ayarlar (1 en büyük).
    public const IsSize1 = "is-size-1";
    public const IsSize2 = "is-size-2";
    public const IsSize3 = "is-size-3";
    public const IsSize4 = "is-size-4";
    public const IsSize5 = "is-size-5";
    public const IsSize6 = "is-size-6";
    public const IsSize7 = "is-size-7";
    // ".has-text-centered" sınıfı. Metni ortalar.
    public const HasTextCentered = "has-text-centered";
    // ".has-text-justified" sınıfı. Metni iki yana yaslar.
    public const HasTextJustified = "has-text-justified";
    // ".has-text-left" sınıfı. Metni sola yaslar.
    public const HasTextLeft = "has-text-left";
    // ".has-text-right" sınıfı. Metni sağa yaslar.
    public const HasTextRight = "has-text-right";
    // ".is-capitalized" sınıfı. Her kelimenin ilk harfini büyük yapar.
    public const IsCapitalized = "is-capitalized";
    // ".is-lowercase" sınıfı. Metni tamamen küçük harfe çevirir.
    public const IsLowercase = "is-lowercase";
    // ".is-uppercase" sınıfı. Metni tamamen büyük harfe çevirir.
    public const IsUppercase = "is-uppercase";
    // ".is-italic" sınıfı. Metni italik yapar.
    public const IsItalic = "is-italic";
    // ".is-underlined" sınıfı. Metnin altını çizer.
    public const IsUnderlined = "is-underlined";
    // ".has-text-weight-light" den ".has-text-weight-bold" a kadar: Metin kalınlığını ayarlar.
    public const HasTextWeightLight = "has-text-weight-light";
    public const HasTextWeightNormal = "has-text-weight-normal";
    public const HasTextWeightMedium = "has-text-weight-medium";
    public const HasTextWeightSemibold = "has-text-weight-semibold";
    public const HasTextWeightBold = "has-text-weight-bold";
    // ".is-family-sans-serif" vb: Yazı tipi ailesini belirler.
    public const IsFamilySansSerif = "is-family-sans-serif";
    public const IsFamilyMonospace = "is-family-monospace";
    public const IsFamilyPrimary = "is-family-primary";
    public const IsFamilySecondary = "is-family-secondary";
    public const IsFamilyCode = "is-family-code";

    // --- Görünürlük Helperları ---
    // ".is-hidden" sınıfı. Elemanı tamamen gizler (display: none).
    public const IsHidden = "is-hidden";
    // ".is-invisible" sınıfı. Elemanı görünmez yapar ama yerini korur (visibility: hidden).
    public const IsInvisible = "is-invisible";
    // ".is-sr-only" sınıfı. Elemanı sadece ekran okuyucular için görünür kılar.
    public const IsSrOnly = "is-sr-only";

    // --- Flexbox Helperları ---
    // Bu sınıflar, display, direction, wrap, alignment ve justification gibi flexbox özelliklerini kontrol eder.
    public const IsBlock = "is-block";
    public const IsFlex = "is-flex";
    public const IsInline = "is-inline";
    public const IsInlineBlock = "is-inline-block";
    public const IsInlineFlex = "is-inline-flex";
    public const IsFlexDirectionRow = "is-flex-direction-row";
    public const IsFlexDirectionRowReverse = "is-flex-direction-row-reverse";
    public const IsFlexDirectionColumn = "is-flex-direction-column";
    public const IsFlexDirectionColumnReverse = "is-flex-direction-column-reverse";
    public const IsFlexWrapNowrap = "is-flex-wrap-nowrap";
    public const IsFlexWrapWrap = "is-flex-wrap-wrap";
    public const IsFlexWrapWrapReverse = "is-flex-wrap-wrap-reverse";
    public const IsJustifyContentFlexStart = "is-justify-content-flex-start";
    public const IsJustifyContentFlexEnd = "is-justify-content-flex-end";
    public const IsJustifyContentCenter = "is-justify-content-center";
    public const IsJustifyContentSpaceBetween = "is-justify-content-space-between";
    public const IsJustifyContentSpaceAround = "is-justify-content-space-around";
    public const IsJustifyContentSpaceEvenly = "is-justify-content-space-evenly";
    public const IsAlignContentFlexStart = "is-align-content-flex-start";
    public const IsAlignContentFlexEnd = "is-align-content-flex-end";
    public const IsAlignContentCenter = "is-align-content-center";
    public const IsAlignContentSpaceBetween = "is-align-content-space-between";
    public const IsAlignContentSpaceAround = "is-align-content-space-around";
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
    public const IsFlexGrow0 = "is-flex-grow-0"; public const IsFlexGrow1 = "is-flex-grow-1"; public const IsFlexGrow2 = "is-flex-grow-2"; public const IsFlexGrow3 = "is-flex-grow-3"; public const IsFlexGrow4 = "is-flex-grow-4"; public const IsFlexGrow5 = "is-flex-grow-5";
    public const IsFlexShrink0 = "is-flex-shrink-0"; public const IsFlexShrink1 = "is-flex-shrink-1"; public const IsFlexShrink2 = "is-flex-shrink-2"; public const IsFlexShrink3 = "is-flex-shrink-3"; public const IsFlexShrink4 = "is-flex-shrink-4"; public const IsFlexShrink5 = "is-flex-shrink-5";

    // --- Diğer Helperlar ---
    // ".is-pulled-left" sınıfı. Elemanı sola yaslar (float).
    public const IsPulledLeft = "is-pulled-left";
    // ".is-pulled-right" sınıfı. Elemanı sağa yaslar (float).
    public const IsPulledRight = "is-pulled-right";
    // ".is-radiusless" sınıfı. Köşe yuvarlaklığını kaldırır.
    public const IsRadiusless = "is-radiusless";
    // ".is-shadowless" sınıfı. Gölgeyi kaldırır.
    public const IsShadowless = "is-shadowless";
    // ".is-unselectable" sınıfı. Metin seçilmesini engeller.
    public const IsUnselectable = "is-unselectable";
    // ".is-clickable" sınıfı. Fare imlecini tıklanabilir (pointer) yapar.
    public const IsClickable = "is-clickable";
    // ".is-relative" sınıfı. Pozisyonu `relative` yapar.
    public const IsRelative = "is-relative";
    // ".is-overlay" sınıfı. Bir elemanı diğerinin üzerine bindirmek için kullanılır.
    public const IsOverlay = "is-overlay";
    // ".is-clipped" sınıfı. Kapsayıcısını aşan içeriği gizler.
    public const IsClipped = "is-clipped";
    // ".is-clearfix" sınıfı. Float'lanmış elemanları temizler.
    public const IsClearfix = "is-clearfix";

    //================================================================
    // SAYISAL VE BOŞLUK SINIFLARI (SPACING & NUMERIC)
    //================================================================
    // Bu sınıflar genellikle sütun genişliği, boşluk miktarı veya responsive davranışlar için kullanılır.
    public const Is0 = "is-0"; public const Is1 = "is-1"; public const Is2 = "is-2"; public const Is3 = "is-3";
    public const Is4 = "is-4"; public const Is5 = "is-5"; public const Is6 = "is-6"; public const Is7 = "is-7";
    public const Is8 = "is-8"; public const Is9 = "is-9"; public const Is10 = "is-10"; public const Is11 = "is-11";
    public const Is12 = "is-12";

    // --- Spacing (Boşluk) Helperları ---
    // Bu sınıflar, margin (m) ve padding (p) değerlerini kontrol eder.
    // t: top, r: right, b: bottom, l: left, x: yatay (sol ve sağ), y: dikey (üst ve alt)
    public const M_0 = "m-0"; public const P_0 = "p-0";
    public const M_1 = "m-1"; public const P_1 = "p-1";
    public const M_2 = "m-2"; public const P_2 = "p-2";
    public const M_3 = "m-3"; public const P_3 = "p-3";
    public const M_4 = "m-4"; public const P_4 = "p-4";
    public const M_5 = "m-5"; public const P_5 = "p-5";
    public const M_6 = "m-6"; public const P_6 = "p-6";
    public const MT_0 = "mt-0"; public const PT_0 = "pt-0";
    public const MT_1 = "mt-1"; public const PT_1 = "pt-1";
    public const MT_2 = "mt-2"; public const PT_2 = "pt-2";
    public const MT_3 = "mt-3"; public const PT_3 = "pt-3";
    public const MT_4 = "mt-4"; public const PT_4 = "pt-4";
    public const MT_5 = "mt-5"; public const PT_5 = "pt-5";
    public const MT_6 = "mt-6"; public const PT_6 = "pt-6";
    public const MR_0 = "mr-0"; public const PR_0 = "pr-0";
    public const MR_1 = "mr-1"; public const PR_1 = "pr-1";
    public const MR_2 = "mr-2"; public const PR_2 = "pr-2";
    public const MR_3 = "mr-3"; public const PR_3 = "pr-3";
    public const MR_4 = "mr-4"; public const PR_4 = "pr-4";
    public const MR_5 = "mr-5"; public const PR_5 = "pr-5";
    public const MR_6 = "mr-6"; public const PR_6 = "pr-6";
    public const MB_0 = "mb-0"; public const PB_0 = "pb-0";
    public const MB_1 = "mb-1"; public const PB_1 = "pb-1";
    public const MB_2 = "mb-2"; public const PB_2 = "pb-2";
    public const MB_3 = "mb-3"; public const PB_3 = "pb-3";
    public const MB_4 = "mb-4"; public const PB_4 = "pb-4";
    public const MB_5 = "mb-5"; public const PB_5 = "pb-5";
    public const MB_6 = "mb-6"; public const PB_6 = "pb-6";
    public const ML_0 = "ml-0"; public const PL_0 = "pl-0";
    public const ML_1 = "ml-1"; public const PL_1 = "pl-1";
    public const ML_2 = "ml-2"; public const PL_2 = "pl-2";
    public const ML_3 = "ml-3"; public const PL_3 = "pl-3";
    public const ML_4 = "ml-4"; public const PL_4 = "pl-4";
    public const ML_5 = "ml-5"; public const PL_5 = "pl-5";
    public const ML_6 = "ml-6"; public const PL_6 = "pl-6";
    public const MX_0 = "mx-0"; public const PX_0 = "px-0";
    public const MX_1 = "mx-1"; public const PX_1 = "px-1";
    public const MX_2 = "mx-2"; public const PX_2 = "px-2";
    public const MX_3 = "mx-3"; public const PX_3 = "px-3";
    public const MX_4 = "mx-4"; public const PX_4 = "px-4";
    public const MX_5 = "mx-5"; public const PX_5 = "px-5";
    public const MX_6 = "mx-6"; public const PX_6 = "px-6";
    public const MY_0 = "my-0"; public const PY_0 = "py-0";
    public const MY_1 = "my-1"; public const PY_1 = "py-1";
    public const MY_2 = "my-2"; public const PY_2 = "py-2";
    public const MY_3 = "my-3"; public const PY_3 = "py-3";
    public const MY_4 = "my-4"; public const PY_4 = "py-4";
    public const MY_5 = "my-5"; public const PY_5 = "py-5";
    public const MY_6 = "my-6"; public const PY_6 = "py-6";
    public const M_AUTO = "m-auto";
    public const MX_AUTO = "mx-auto";
    public const ML_AUTO = "ml-auto";
    public const MR_AUTO = "mr-auto";

} // Sınıf tanımının bittiği yer. 
//=                     
