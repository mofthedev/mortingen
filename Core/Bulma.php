<?php

class Bulma
{
    protected static $prepend_head = [];
    protected static $append_head = [];
    protected static $prepend_body = [];
    protected static $append_body = [];

    public static function prependHead($content)
    {
        $content = (new View($content))->escape();
        // Add the content to the beginning of the $prepend_head array
        array_unshift(static::$prepend_head, $content);
    }

    public static function appendHead($content)
    {
        $content = (new View($content))->escape();
        // Add the content to the end of the $append_head array
        static::$append_head[] = $content;
    }

    public static function prependBody($content)
    {
        $content = (new View($content))->escape();
        // Add the content to the beginning of the $prepend_body array
        array_unshift(static::$prepend_body, $content);
    }

    public static function appendBody($content)
    {
        $content = (new View($content))->escape();
        // Add the content to the end of the $append_body array
        static::$append_body[] = $content;
    }

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
                                    View::concat(...static::$prepend_head) ,
                                    HTML::meta(["charset" => "UTF-8"]) ,
                                    HTML::meta(["name" => "viewport", "content" => "width=device-width, initial-scale=1.0"]) ,
                                    HTML::title($title) ,
                                    HTML::css(App::getURIRoot()."/Public/bulma/css/bulma.min.css") ,
                                    View::concat(...static::$append_head)
                                )
                            ) ,
                            HTML::body($content)
                        )
                    );

        return new View($baseHtml);
    }

    public static function Section($content) : View
    {
        $content = (new View($content))->escape();

        return new View(HTML::section($content, ["class" => BulmaClass::SECTION]));
    }

    public static function Container($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape();

        array_unshift($classes, BulmaClass::CONTAINER);
        $class = implode(" ", $classes);
        $class = (new View($class))->escape();

        return new View(HTML::div($content, ["class" => $class]));
    }

    public static function Cols($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape();

        array_unshift($classes, BulmaClass::COLUMNS);
        $class = implode(" ", $classes);
        $class = (new View($class))->escape();

        return new View(HTML::div($content, ["class" => $class]));
    }

    public static function Col($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape();

        array_unshift($classes, BulmaClass::COLUMN);
        $class = implode(" ", $classes);
        $class = (new View($class))->escape();

        return new View(HTML::div($content, ["class" => $class]));
    }
    
    public static function Box($content, array $classes=[]) : View
    {
        $content = (new View($content))->escape();

        array_unshift($classes, BulmaClass::BOX);
        $class = implode(" ", $classes);
        $class = (new View($class))->escape();

        return new View(HTML::div($content, ["class" => $class]));
    }
}