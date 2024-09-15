<?php

namespace App\Controllers;

use PowerDI\Core\Controller;
use PowerDI\HttpBasics\AbstractController;
use PowerDI\HttpBasics\Exceptions\AccessForbiddenException;
use PowerDI\HttpBasics\Exceptions\MethodNotSupportedException;
use PowerDI\HttpBasics\Exceptions\PageNotFoundException;
use PowerDI\HttpBasics\HttpRequest;
use PowerDI\HttpBasics\HttpResponse;
use PowerDI\Security\Exceptions\UserNotLoggedInException;

#[Controller]
class ErrorController extends AbstractController {
    public function handleError(\Exception $exception, HttpRequest $request): HttpResponse {
        $errorTitle = "Something went wrong";
        $errorCode = 500;
        if ($exception instanceof PageNotFoundException) {
            $errorTitle = "Page not found";
            $errorCode = 404;
        } else if ($exception instanceof MethodNotSupportedException) {
            $errorTitle = "Method not allowed";
            $errorCode = 405;
        } else if ($exception instanceof UserNotLoggedInException) {
            return $this->redirect("/login");
        } else if ($exception instanceof AccessForbiddenException) {
            $errorTitle = "Access forbidden";
            $errorCode = 403;
        }

        return $this->render("error.latte", ["error" => $errorTitle], $errorCode);
    }
}