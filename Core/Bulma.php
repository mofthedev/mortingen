<?php

class Bulma
{
    public static function Html($content, $title = "Mortingen Framework") : View
    {
        $content = (new View($content))->escape();
        $title = (new View($title))->escape();

        $baseHtml = "<!DOCTYPE html>". PHP_EOL .
                    HTML::html(
                        View::concat(
                            HTML::head(
                                // It is required to use View::concat(...) to concatenate consecutive View objects or strings.
                                View::concat(
                                    HTML::meta(["charset" => "UTF-8"]) ,
                                    HTML::meta(["name" => "viewport", "content" => "width=device-width, initial-scale=1.0"]) ,
                                    HTML::title($title) ,
                                    HTML::css(App::getURIRoot()."/Public/bulma/css/bulma.min.css")
                                )
                            ) ,
                            HTML::body(
                                static::Container(
                                    static::Section($content)
                                )
                            )
                        )
                    );

        return new View($baseHtml);
    }

    public static function Container($content) : View
    {
        $content = (new View($content))->escape();

        return new View(HTML::div($content, ["class" => BulmaClass::Container]));
    }

    public static function Section($content) : View
    {
        $content = (new View($content))->escape();

        return new View(HTML::section($content, ["class" => BulmaClass::Section]));
    }

    
    public static function Box($text, array $classes=[]) : View
    {
        $text = (new View($text))->escape();

        array_unshift($classes, BulmaClass::Box);
        $class = implode(" ", $classes);
        $class = (new View($class))->escape();

        return new View(HTML::div($text, ["class" => $class]));
    }
}