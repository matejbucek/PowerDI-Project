<?php

namespace App\Controllers;

use PowerDI\Core\Autowired;
use PowerDI\Core\Controller;
use PowerDI\Core\Route;
use PowerDI\HttpBasics\AbstractController;
use PowerDI\HttpBasics\HttpMethod;
use PowerDI\HttpBasics\HttpResponse;
use PowerDI\HttpBasics\HttpRequest;

#[Controller]
class MainController extends AbstractController {
    #[Autowired("%title%")]
    private string $title;
    #[Autowired("%version%")]
    private string $version;

    #[Route("/", methods: [HttpMethod::GET])]
    public function index(HttpRequest $request) : HttpResponse {
        return $this->render("index.latte", ["title" => $this->title, "version" => $this->version]);
    }
}