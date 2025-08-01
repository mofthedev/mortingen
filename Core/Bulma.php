<?php

class Bulma
{
    public static function Html($content, $title = "Mortingen Framework") : ViewSafe
    {
        $content = new View($content);
        $title = new View($title);

        $baseHtml = "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>".$title."</title>
    <link rel=\"stylesheet\" href=\"".App::getURIRoot()."/Public/bulma/css/bulma.min.css\">
</head>
<body>
".static::Container( static::Section($content) )."
</body>
</html>";

        return new ViewSafe($baseHtml);
    }

    public static function Container($content) : ViewSafe
    {
        $content = new View($content);

        return new ViewSafe("<div class=\"".BulmaClass::Container."\">".$content."</div>");
    }

    public static function Section($content) : ViewSafe
    {
        $content = new View($content);

        return new ViewSafe("<section class=\"".BulmaClass::Section."\">".$content."</section>");
    }

    public static function Box($text, $class="") : ViewSafe
    {
        $text = new View($text);
        $class = new ViewSafe($class);

        return new ViewSafe("<div class=\"".BulmaClass::Box." ".$class."\">".$text."</div>");
    }
}