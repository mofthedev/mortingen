<?php

class Bulma
{
    public static function Html($content, $title = "Mortingen Framework") : View
    {
        $content = (new View($content))->escape();
        $title = (new View($title))->escape();

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

        return new View($baseHtml);
    }

    public static function Container($content) : View
    {
        $content = (new View($content))->escape();
        
        return new View("<div class=\"".BulmaClass::Container."\">".$content."</div>");
    }

    public static function Section($content) : View
    {
        $content = (new View($content))->escape();

        return new View("<section class=\"".BulmaClass::Section."\">".$content."</section>");
    }

    public static function Box($text, $class="") : View
    {
        $text = (new View($text))->escape();
        $class = (new View($class))->escape();

        return new View("<div class=\"".BulmaClass::Box." ".$class."\">".$text."</div>");
    }
}