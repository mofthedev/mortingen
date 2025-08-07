<?php 

/**
 * Bu blok, sınıf hakkında genel bilgi veren bir dokümantasyon yorumudur (DocBlock).
 * Sınıfın adı: Bulma
 * Amacı: Bulma CSS Framework'ü için programatik olarak HTML bileşenleri oluşturan yardımcı sınıf.
 * Faydası: Güvenli, okunabilir ve yönetilebilir bir şekilde Bulma arayüzleri inşa etmeyi sağlar.
 */
// 
class Bulma 
{ // Sınıf tanımının başladığı yer.
    // --- Sayfa Başına ve Sonuna İçerik Eklemek İçin Kullanılan Diziler ---

    // HTML <head> etiketinin en başına eklenecek içerikleri tutan korumalı (protected) ve statik bir dizi.
    protected static $prepend_head = [];
    // HTML <head> etiketinin en sonuna eklenecek içerikleri tutan korumalı ve statik bir dizi.
    protected static $append_head = [];
    // HTML <body> etiketinin en başına eklenecek içerikleri tutan korumalı ve statik bir dizi.
    protected static $prepend_body = [];
    // HTML <body> etiketinin en sonuna eklenecek içerikleri tutan korumalı ve statik bir dizi.
    protected static $append_body = [];

    // --- İçerik Ekleme Fonksiyonları ---

    /**
     * <head> etiketinin başına içerik ekler.
     * @param mixed $content Eklenecek içerik (string veya View nesnesi).
     */
    public static function prependHead($content) // Her yerden erişilebilen (public) ve statik bir fonksiyon tanımlar.
    { // Fonksiyonun başlangıcı.
        $content = (new View($content))->escape(); // Gelen içeriği güvenlik için View nesnesiyle escape eder.
        array_unshift(static::$prepend_head, $content); // Escape edilmiş içeriği $prepend_head dizisinin başına ekler.
    } // Fonksiyonun sonu.

    /**
     * <head> etiketinin sonuna içerik ekler.
     * @param mixed $content Eklenecek içerik.
     */
    public static function appendHead($content)
    {
        $content = (new View($content))->escape(); // İçeriği güvenli hale getirir.
        static::$append_head[] = $content; // Güvenli içeriği $append_head dizisinin sonuna ekler.
    }

    /**
     * <body> etiketinin başına içerik ekler.
     * @param mixed $content Eklenecek içerik.
     */
    public static function prependBody($content)
    {
        $content = (new View($content))->escape(); // İçeriği güvenli hale getirir.
        array_unshift(static::$prepend_body, $content); // Güvenli içeriği $prepend_body dizisinin başına ekler.
    }

    /**
     * <body> etiketinin sonuna içerik ekler.
     * @param mixed $content Eklenecek içerik.
     */
    public static function appendBody($content)
    {
        $content = (new View($content))->escape(); // İçeriği güvenli hale getirir.
        static::$append_body[] = $content; // Güvenli içeriği $append_body dizisinin sonuna ekler.
    }

    //================================================================
    // TEMEL LAYOUT (YERLEŞİM) FONKSİYONLARI
    //================================================================

    /**
     * Tam bir HTML sayfası oluşturur.
     * @param View|string $content Sayfanın ana içeriği.
     * @param string $title Sayfa başlığı.
     * @return View Oluşturulan tam HTML sayfasını içeren bir View nesnesi döndürür.
     */
    public static function Html($content, $title = "Mortingen Framework") : View
    {
        // $content genellikle diğer fonksiyonlardan gelen bir View nesnesi olduğu için tekrar escape edilmez.
        $title = (new View($title))->escape(); // Sayfa başlığını güvenlik için escape eder.

        // Temel HTML yapısını oluşturur.
        $baseHtml = "<!DOCTYPE html>". PHP_EOL . // HTML5 belge tipini ve yeni satır karakterini ekler.
                    HTML::html( // HTML::html() ile <html> etiketini oluşturur.
                        View::concat( // Birden fazla View nesnesini birleştirmek için kullanılır.
                            HTML::head( // HTML::head() ile <head> etiketini oluşturur.
                                View::concat(
                                    View::concat(...static::$prepend_head), // Başa eklenecek head içeriklerini ekler.
                                    HTML::meta(["charset" => "UTF-8"]), // Karakter setini UTF-8 olarak ayarlar.
                                    HTML::meta(["name" => "viewport", "content" => "width=device-width, initial-scale=1.0"]), // Mobil uyumluluk için viewport ayarı.
                                    HTML::title($title), // Sayfa başlığını ekler.
                                    HTML::css(App::getURIRoot()."/Public/bulma/css/bulma.min.css"), // Proje yolundan Bulma CSS dosyasını ekler.
                                    View::concat(...static::$append_head) // Sona eklenecek head içeriklerini ekler.
                                )
                            ),
                            HTML::body( // HTML::body() ile <body> etiketini oluşturur.
                                View::concat(
                                    View::concat(...static::$prepend_body), // Başa eklenecek body içeriklerini ekler.
                                    $content, // Sayfanın ana içeriğini yerleştirir.
                                    View::concat(...static::$append_body) // Sona eklenecek body içeriklerini ekler.
                                )
                            )
                        )
                    );

        return new View($baseHtml); // Oluşturulan HTML metnini bir View nesnesi olarak döndürür.
    }

    /**
     * Bir <section> elementi oluşturur.
     * @param View|string $content Section içeriği.
     * @param array $classes Eklenecek ekstra CSS sınıfları.
     * @return View Oluşturulan section elementini içeren bir View nesnesi.
     */
    public static function Section($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape(); // İçeriği güvenli hale getirir.
        array_unshift($classes, BulmaClass::Section); // Sınıf listesinin başına temel "section" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıf dizisini birleştirerek tek bir string oluşturur.
        return new View(HTML::section($content, ["class" => $class])); // HTML yardımcısı ile section oluşturup View olarak döndürür.
    }

    /**
     * Bir container <div> elementi oluşturur.
     * @param View|string $content Container içeriği.
     * @param array $classes Eklenecek ekstra CSS sınıfları.
     * @return View Oluşturulan container elementini içeren bir View nesnesi.
     */
    public static function Container($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape(); // İçeriği güvenli hale getirir.
        array_unshift($classes, BulmaClass::Container); // Sınıf listesinin başına temel "container" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // HTML yardımcısı ile div oluşturup View olarak döndürür.
    }

    /**
     * Bir "columns" <div> sarmalayıcısı oluşturur.
     * @param View|string $content Sütunları içeren içerik.
     * @param array $classes Eklenecek ekstra CSS sınıfları.
     * @return View Oluşturulan columns sarmalayıcısını içeren bir View nesnesi.
     */
    public static function Cols($content, array $classes=[]) : View
    {
        // İçerik genellikle Col() fonksiyonlarından gelen View nesneleri olduğu için escape edilmez.
        array_unshift($classes, BulmaClass::Columns); // Sınıf listesinin başına "columns" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // HTML yardımcısı ile div oluşturur.
    }

    /**
     * Tek bir "column" <div> elementi oluşturur.
     * @param View|string $content Sütun içeriği.
     * @param array $classes Eklenecek ekstra CSS sınıfları.
     * @return View Oluşturulan column elementini içeren bir View nesnesi.
     */
    public static function Col($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape(); // Sütun içeriğini güvenli hale getirir.
        array_unshift($classes, BulmaClass::Column); // Sınıf listesinin başına "column" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // HTML yardımcısı ile div oluşturur.
    }
    
    /**
     * Bir "box" <div> elementi oluşturur.
     * @param View|string $content Kutu içeriği.
     * @param array $classes Eklenecek ekstra CSS sınıfları.
     * @return View Oluşturulan box elementini içeren bir View nesnesi.
     */
    public static function Box($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape(); // Kutu içeriğini güvenli hale getirir.
        array_unshift($classes, BulmaClass::Box); // Sınıf listesinin başına "box" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // HTML yardımcısı ile div oluşturur.
    }

    //================================================================
    // ELEMENTS (ELEMENTLER)
    //================================================================

    /**
     * Bir <button> elementi oluşturur.
     * @param string $content Buton metni.
     * @param array $classes Eklenecek CSS sınıfları.
     * @param array $attributes Eklenecek HTML attributeları.
     * @return View Oluşturulan button elementini içeren bir View nesnesi.
     */
    public static function Button($content, array $classes=[], array $attributes = []) : View
    {
        $content = (new View($content))->escape(); // Buton metnini güvenli hale getirir.
        array_unshift($classes, BulmaClass::Button); // Sınıf listesine "button" sınıfını ekler.
        $attributes['class'] = implode(" ", $classes); // Sınıfları birleştirip 'class' attribute'una atar.
        return new View(HTML::button($content, $attributes)); // HTML yardımcısı ile button oluşturur.
    }

    /**
     * Buton gibi görünen bir <a> linki oluşturur.
     * @param string $content Link metni.
     * @param string $href Linkin URL adresi.
     * @param array $classes Eklenecek CSS sınıfları.
     * @param array $attributes Eklenecek HTML attributeları.
     * @return View Oluşturulan link elementini içeren bir View nesnesi.
     */
    public static function ButtonLink($content, string $href, array $classes=[], array $attributes = []) : View
    {
        $content = (new View($content))->escape(); // Link metnini güvenli hale getirir.
        $attributes['href'] = (new View($href))->escape(); // URL'yi güvenli hale getirir.
        array_unshift($classes, BulmaClass::Button); // Sınıf listesine "button" sınıfını ekler.
        $attributes['class'] = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::a($content, $attributes)); // HTML yardımcısı ile <a> linki oluşturur.
    }

    /**
     * Zengin metin içeriği için bir "content" <div> oluşturur.
     * @param View|string $content Genellikle HTML içeren içerik.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan content div'ini içeren bir View nesnesi.
     */
    public static function Content($content, array $classes=[]) : View
    {
        // Bu fonksiyonda içerik genellikle zengin metin olduğu için escape edilmez.
        // Güvenlik için bu fonksiyona gönderilen verinin önceden temizlenmesi (purify) gerekir.
        array_unshift($classes, BulmaClass::Content); // Sınıf listesine "content" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // HTML yardımcısı ile div oluşturur.
    }

    /**
     * Bir "delete" (kapatma) butonu oluşturur.
     * @param array $classes Eklenecek CSS sınıfları.
     * @param array $attributes Eklenecek HTML attributeları.
     * @return View Oluşturulan delete butonunu içeren bir View nesnesi.
     */
    public static function Delete(array $classes=[], array $attributes = []) : View
    {
        array_unshift($classes, BulmaClass::Delete); // Sınıf listesine "delete" sınıfını ekler.
        $attributes['class'] = implode(" ", $classes); // Sınıfları birleştirir.
        $attributes['aria-label'] = "delete"; // Erişilebilirlik için etiket ekler.
        return new View(HTML::button(null, $attributes)); // İçeriği olmayan bir buton oluşturur.
    }

    /**
     * Bir "icon" <span> elementi oluşturur.
     * @param string $iconClass İkonun CSS sınıfı (örn: "fas fa-home").
     * @param array $spanClasses Dıştaki <span> için ekstra sınıflar.
     * @param array $iClasses İçteki <i> için ekstra sınıflar.
     * @return View Oluşturulan icon elementini içeren bir View nesnesi.
     */
    public static function Icon($iconClass, array $spanClasses=[], array $iClasses=[]) : View
    {
        $iconClass = (new View($iconClass))->escape(); // İkon sınıfını güvenli hale getirir.
        array_unshift($spanClasses, BulmaClass::Icon); // Dış span için "icon" sınıfını ekler.
        $spanClassStr = implode(" ", $spanClasses); // Span sınıflarını birleştirir.
        $iClasses[] = $iconClass; // İkon sınıfını <i> etiketinin sınıflarına ekler.
        $iClassStr = implode(" ", $iClasses); // <i> sınıflarını birleştirir.
        $iTag = HTML::i(null, ["class" => $iClassStr, "aria-hidden" => "true"]); // <i> etiketini oluşturur.
        return new View(HTML::span($iTag, ["class" => $spanClassStr])); // <i> etiketini <span> ile sarmalar.
    }
    
    /**
     * İkon ve metni birleştiren bir "icon-text" <span> oluşturur.
     * @param View $icon Bulma::Icon() ile oluşturulmuş bir ikon.
     * @param string $text İkonun yanındaki metin.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan icon-text elementini içeren bir View nesnesi.
     */
    public static function IconText($icon, $text, array $classes=[]) : View
    {
        // $icon bir View nesnesi olduğu için tekrar escape edilmez.
        $text = (new View($text))->escape(); // Metni güvenli hale getirir.
        array_unshift($classes, BulmaClass::IconText); // "icon-text" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        $content = View::concat($icon, HTML::span($text)); // İkon ve metni birleştirir.
        return new View(HTML::span($content, ['class' => $class])); // Sonucu bir span ile sarmalar.
    }

    /**
     * Bir "image" <figure> elementi oluşturur.
     * @param string $src Resmin kaynak URL'si.
     * @param array $figureClasses Dıştaki <figure> için sınıflar.
     * @param array $imgAttributes İçteki <img> için attributelar.
     * @return View Oluşturulan image elementini içeren bir View nesnesi.
     */
    public static function Image($src, array $figureClasses = [], array $imgAttributes = []) : View
    {
        $imgAttributes['src'] = (new View($src))->escape(); // Resim kaynağını güvenli hale getirir.
        array_unshift($figureClasses, BulmaClass::Image); // "image" sınıfını ekler.
        $figureClass = implode(" ", $figureClasses); // Sınıfları birleştirir.
        return new View(HTML::figure(HTML::img($imgAttributes), ["class" => $figureClass])); // img'yi figure ile sarmalar.
    }
    
    /**
     * Bir "notification" <div> elementi oluşturur.
     * @param string $content Bildirim içeriği.
     * @param array $classes Eklenecek CSS sınıfları.
     * @param bool $withDelete Kapatma düğmesi eklenip eklenmeyeceği.
     * @return View Oluşturulan notification elementini içeren bir View nesnesi.
     */
    public static function Notification($content, array $classes=[], bool $withDelete = true) : View
    {
        $content = (new View($content))->escape(); // Bildirim içeriğini güvenli hale getirir.
        array_unshift($classes, BulmaClass::Notification); // "notification" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        // Kapatma düğmesi isteniyorsa, içeriğin başına ekler.
        $finalContent = $withDelete ? View::concat(self::Delete(), $content) : $content;
        return new View(HTML::div($finalContent, ["class" => $class])); // Sonucu div ile sarmalar.
    }

    /**
     * Bir "tag" <span> elementi oluşturur.
     * @param string $content Etiket metni.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan tag elementini içeren bir View nesnesi.
     */
    public static function Tag($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape(); // Etiket metnini güvenli hale getirir.
        array_unshift($classes, BulmaClass::Tag); // "tag" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::span($content, ["class" => $class])); // Sonucu span ile sarmalar.
    }

    /**
     * Birden fazla tag'i içeren bir "tags" <div> sarmalayıcısı oluşturur.
     * @param array $tags Bulma::Tag() ile oluşturulmuş View nesneleri dizisi.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan tags sarmalayıcısını içeren bir View nesnesi.
     */
    public static function Tags($tags, array $classes=[]) : View
    {
        $tagViews = []; // Boş bir dizi oluşturur.
        foreach($tags as $tag){ // Gelen her bir etiket için döngü başlatır.
            $tagViews[] = $tag; // Etiketi (View nesnesi) diziye ekler.
        }
        $content = View::concat(...$tagViews); // Tüm etiketleri birleştirir.
        array_unshift($classes, BulmaClass::Tags); // "tags" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // Sonucu div ile sarmalar.
    }

    //================================================================
    // COMPONENTS (BİLEŞENLER) - Birden fazla elementten oluşan yapılar.
    //================================================================

    // --- Card (Kart) Bileşeni ---

    /**
     * Bir "card" <div> sarmalayıcısı oluşturur.
     * @param View|string $content Kartın tüm parçalarını (header, image, content, footer) içeren içerik.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan card elementini içeren bir View nesnesi.
     */
    public static function Card($content, array $classes=[]) : View
    {
        // İçerik, diğer Card... fonksiyonlarından gelen View nesnelerinin birleşimi olmalıdır.
        array_unshift($classes, BulmaClass::Card); // "card" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // Sonucu div ile sarmalar.
    }
    /**
     * Bir "card-header" <header> elementi oluşturur.
     * @param string $title Kart başlığı.
     * @param View|null $icon Başlığın sağındaki ikon (isteğe bağlı).
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan card-header elementini içeren bir View nesnesi.
     */
    public static function CardHeader($title, $icon = null, array $classes=[]) : View
    {
        $title = (new View($title))->escape(); // Başlığı güvenli hale getirir.
        $titleP = HTML::p($title, ["class" => BulmaClass::CardHeaderTitle]); // Başlık için <p> etiketi oluşturur.
        // Eğer ikon varsa, onu bir <a> etiketi ile sarmalar.
        $iconA = $icon ? HTML::a($icon, ["class" => BulmaClass::CardHeaderIcon]) : '';
        $content = View::concat($titleP, $iconA); // Başlık ve ikonu birleştirir.
        array_unshift($classes, BulmaClass::CardHeader); // "card-header" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::header($content, ["class" => $class])); // Sonucu header ile sarmalar.
    }
    /**
     * Bir "card-image" <div> sarmalayıcısı oluşturur.
     * @param View $image Bulma::Image() ile oluşturulmuş bir resim.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan card-image elementini içeren bir View nesnesi.
     */
    public static function CardImage($image, array $classes=[]) : View
    {
        // $image bir View nesnesi olduğu için tekrar escape edilmez.
        array_unshift($classes, BulmaClass::CardImage); // "card-image" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($image, ["class" => $class])); // Resmi div ile sarmalar.
    }
    /**
     * Bir "card-content" <div> elementi oluşturur.
     * @param View|string $content Kartın ana içeriği.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan card-content elementini içeren bir View nesnesi.
     */
    public static function CardContent($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape(); // İçeriği güvenli hale getirir.
        array_unshift($classes, BulmaClass::CardContent); // "card-content" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // Sonucu div ile sarmalar.
    }
    /**
     * Bir "card-footer" <footer> elementi oluşturur.
     * @param array $items Footer içindeki öğeler (genellikle View nesneleri).
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan card-footer elementini içeren bir View nesnesi.
     */
    public static function CardFooter($items, array $classes=[]) : View
    {
        $itemViews = []; // Boş bir dizi oluşturur.
        foreach($items as $item){ // Her bir öğe için döngü başlatır.
            // Her öğeyi "card-footer-item" sınıfına sahip bir div ile sarmalar.
            $itemViews[] = HTML::div($item, ["class" => BulmaClass::CardFooterItem]);
        }
        $content = View::concat(...$itemViews); // Tüm öğeleri birleştirir.
        array_unshift($classes, BulmaClass::CardFooter); // "card-footer" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::footer($content, ["class" => $class])); // Sonucu footer ile sarmalar.
    }

    // --- Message (Mesaj) Bileşeni ---

    /**
     * Bir "message" <article> bileşeni oluşturur.
     * @param string $header Mesaj başlığı.
     * @param string $body Mesaj gövdesi.
     * @param array $classes Eklenecek CSS sınıfları.
     * @param bool $withDelete Kapatma düğmesi eklenip eklenmeyeceği.
     * @return View Oluşturulan message bileşenini içeren bir View nesnesi.
     */
    public static function Message($header, $body, array $classes=[], bool $withDelete = true) : View
    {
        $header = (new View($header))->escape(); // Başlığı güvenli hale getirir.
        $body = (new View($body))->escape(); // Gövdeyi güvenli hale getirir.
        array_unshift($classes, BulmaClass::Message); // "message" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        $deleteButton = $withDelete ? self::Delete() : ''; // Kapatma düğmesi isteniyorsa oluşturur.
        $headerContent = View::concat(HTML::p($header), $deleteButton); // Başlık ve kapatma düğmesini birleştirir.
        $messageHeader = HTML::div($headerContent, ["class" => BulmaClass::MessageHeader]); // Mesaj başlığını oluşturur.
        $messageBody = HTML::div($body, ["class" => BulmaClass::MessageBody]); // Mesaj gövdesini oluşturur.
        $content = View::concat($messageHeader, $messageBody); // Başlık ve gövdeyi birleştirir.
        return new View(HTML::article($content, ["class" => $class])); // Sonucu article ile sarmalar.
    }

    // --- Modal (Popup Pencere) Bileşeni ---

    /**
     * Bir "modal" <div> bileşeni oluşturur.
     * @param View|string $content Modal penceresinin içeriği.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan modal bileşenini içeren bir View nesnesi.
     */
    public static function Modal($content, array $classes=[]) : View
    {
        // İçerik genellikle Box gibi başka bir bileşenden gelen View nesnesidir.
        array_unshift($classes, BulmaClass::Modal); // "modal" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        // Modal'ın parçalarını (arka plan, içerik, kapatma düğmesi) oluşturur ve birleştirir.
        $modalContent = View::concat(
            HTML::div(null, ["class" => BulmaClass::ModalBackground]),
            HTML::div($content, ["class" => BulmaClass::ModalContent]),
            self::Delete(['class' => BulmaClass::ModalClose, 'is-large'])
        );
        return new View(HTML::div($modalContent, ["class" => $class])); // Sonucu div ile sarmalar.
    }
    
    // --- Navbar (Navigasyon Çubuğu) Bileşeni ---

    /**
     * Bir "navbar" <nav> bileşeni oluşturur.
     * @param View $brand Navbar'ın marka (logo) bölümü.
     * @param View $menu Navbar'ın menü bölümü.
     * @param array $classes Eklenecek CSS sınıfları.
     * @param array $attributes Eklenecek HTML attributeları.
     * @return View Oluşturulan navbar bileşenini içeren bir View nesnesi.
     */
    public static function Navbar($brand, $menu, array $classes=[], array $attributes=[]) : View
    {
        // $brand ve $menu, diğer Navbar... fonksiyonlarından gelen View nesneleridir.
        array_unshift($classes, BulmaClass::Navbar); // "navbar" sınıfını ekler.
        $attributes['class'] = implode(" ", $classes); // Sınıfları birleştirir.
        $attributes['role'] = 'navigation'; // Erişilebilirlik için rol belirtir.
        $attributes['aria-label'] = 'main navigation'; // Erişilebilirlik için etiket belirtir.
        $content = View::concat($brand, $menu); // Marka ve menüyü birleştirir.
        return new View(HTML::nav($content, $attributes)); // Sonucu nav ile sarmalar.
    }
    /**
     * Bir "navbar-brand" <div> sarmalayıcısı oluşturur.
     * @param View|string $content Marka bölümünün içeriği.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan navbar-brand elementini içeren bir View nesnesi.
     */
    public static function NavbarBrand($content, array $classes=[]) : View
    {
        array_unshift($classes, BulmaClass::NavbarBrand); // "navbar-brand" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::div($content, ["class" => $class])); // Sonucu div ile sarmalar.
    }
    /**
     * Bir "navbar-burger" (mobil menü butonu) oluşturur.
     * @param array $attributes Eklenecek HTML attributeları.
     * @return View Oluşturulan navbar-burger elementini içeren bir View nesnesi.
     */
    public static function NavbarBurger(array $attributes=[]) : View
    {
        // Bu veriler kullanıcıdan gelmediği için escape edilmemiştir.
        $attributes['role'] = 'button'; // Erişilebilirlik için rol belirtir.
        $attributes['class'] = BulmaClass::NavbarBurger; // "navbar-burger" sınıfını atar.
        $attributes['aria-label'] = 'menu'; // Erişilebilirlik için etiket belirtir.
        $attributes['aria-expanded'] = 'false'; // Menünün başlangıçta kapalı olduğunu belirtir.
        // Burger ikonunun üç çizgisini oluşturan span'ları oluşturur.
        $content = View::concat(
            HTML::span(null, ["aria-hidden" => "true"]),
            HTML::span(null, ["aria-hidden" => "true"]),
            HTML::span(null, ["aria-hidden" => "true"])
        );
        return new View(HTML::a($content, $attributes)); // Çizgileri bir <a> linki ile sarmalar.
    }
    /**
     * Bir "navbar-menu" <div> sarmalayıcısı oluşturur.
     * @param View $start Menünün başlangıç (sol) kısmı.
     * @param View $end Menünün bitiş (sağ) kısmı.
     * @param array $classes Eklenecek CSS sınıfları.
     * @param array $attributes Eklenecek HTML attributeları.
     * @return View Oluşturulan navbar-menu elementini içeren bir View nesnesi.
     */
    public static function NavbarMenu($start, $end, array $classes=[], array $attributes=[]) : View
    {
        array_unshift($classes, BulmaClass::NavbarMenu); // "navbar-menu" sınıfını ekler.
        $attributes['class'] = implode(" ", $classes); // Sınıfları birleştirir.
        $startDiv = HTML::div($start, ["class" => BulmaClass::NavbarStart]); // Menünün başlangıç bölümünü oluşturur.
        $endDiv = HTML::div($end, ["class" => BulmaClass::NavbarEnd]); // Menünün bitiş bölümünü oluşturur.
        $content = View::concat($startDiv, $endDiv); // Başlangıç ve bitişi birleştirir.
        return new View(HTML::div($content, $attributes)); // Sonucu div ile sarmalar.
    }
    /**
     * Bir "navbar-item" <a> veya <div> elementi oluşturur.
     * @param View|string $content Menü öğesinin içeriği.
     * @param string $href Link URL'si (eğer link ise).
     * @param array $classes Eklenecek CSS sınıfları.
     * @param bool $isLink Öğenin bir link olup olmadığı.
     * @return View Oluşturulan navbar-item elementini içeren bir View nesnesi.
     */
    public static function NavbarItem($content, string $href = '#', array $classes=[], $isLink = true) : View
    {
        $content = (new View($content))->escape(); // İçeriği güvenli hale getirir.
        array_unshift($classes, BulmaClass::NavbarItem); // "navbar-item" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        if($isLink){ // Eğer öğe bir link ise...
            return new View(HTML::a($content, ["href" => (new View($href))->escape(), "class" => $class])); // <a> etiketi oluşturur.
        }
        return new View(HTML::div($content, ["class" => $class])); // Değilse, <div> etiketi oluşturur.
    }
    /**
     * Bir "navbar-dropdown" (açılır menü) oluşturur.
     * @param string $title Açılır menünün başlığı.
     * @param View $items Açılır menünün içeriği.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan navbar-dropdown elementini içeren bir View nesnesi.
     */
    public static function NavbarDropdown($title, $items, array $classes=[]) : View
    {
        $title = (new View($title))->escape(); // Başlığı güvenli hale getirir.
        $link = HTML::a($title, ["class" => BulmaClass::NavbarLink]); // Açılır menü başlığı için link oluşturur.
        $dropdownContent = HTML::div($items, ["class" => BulmaClass::NavbarDropdown]); // Açılır menü içeriğini oluşturur.
        // Gerekli sınıfları bir diziye ekler.
        array_unshift($classes, BulmaClass::NavbarItem, BulmaClass::HasDropdown, BulmaClass::IsHoverable);
        // Başlık linkini ve içeriği birleştirip bir div ile sarmalar.
        return new View(HTML::div(View::concat($link, $dropdownContent), ["class" => implode(" ", $classes)]));
    }
    /**
     * Bir "navbar-divider" (ayırıcı çizgi) oluşturur.
     * @param array $classes Eklenecek CSS sınıfları.
     * @return View Oluşturulan navbar-divider elementini içeren bir View nesnesi.
     */
    public static function NavbarDivider(array $classes=[]) : View
    {
        array_unshift($classes, BulmaClass::NavbarDivider); // "navbar-divider" sınıfını ekler.
        $class = implode(" ", $classes); // Sınıfları birleştirir.
        return new View(HTML::hr(null, ["class" => $class])); // <hr> etiketi oluşturur.
    }
} // Sınıf tanımının bittiği yer.
