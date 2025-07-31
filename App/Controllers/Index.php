<?php

namespace Controllers;

use App;
use Request\Request;
use Session;
use Bulma;
use Controller;

class Index extends Controller
{
    public function index(...$args)
    {
        // var_dump(Request::getPath());
        // var_dump(App::getAbsoluteProjectPath());
        // var_dump(App::getProjectPath());
        $this->response->addContent("Hello! This is Index. ".Index::class);
        $this->response->addContent("<br>Func args: ".implode(", ", $args));
        $this->response->addContent("<br>Args: ".implode(", ", Request::getArgs()));
        $this->response->addContent("<br>Args Assoc: ".print_r(Request::getArgsAssoc(), true));
        $this->response->addContent("<br>Path: ".Request::getPath());
        $this->response->addContent("<br>Path Segs: ".implode(", ", Request::getPathSegments()) );


    }

    public function test2()
    {
        $this->response->addContent("Hello! This is test2. ".Index::class);
        $this->response->addContent("<br>Args: ".implode(", ", Request::getArgs()));
        $this->response->addContent("<br>Path: ".Request::getPath());
    }

    public function test($a1, ?int $a2=null, ?string $a3)
    {
        Session::set("deneme",123);
        var_dump(Request::getArgsAssoc());
        var_dump(Request::getArgs());
        $this->response->addContent("Test this!");
        $this->response->addContent("---".Session::get("denem")."---");
        var_dump($a2);
    }

    public function testcode()
    {
        $captcha = new \Captcha\Captcha(8, 100);
        $img = $captcha->render();
        $this->response->setContentType(\Response\ContentType::IMAGE_PNG);
        $this->response->setContent($img);
    }

    public function bulma()
    {
        $this->response->addContent( 
            Bulma::Html(
                Bulma::Box("this is a box. <b>This sentence is escaped.</b>", "noclass"), "Bulma Test in Mortingen Framework"
            )
        );
    }
}
