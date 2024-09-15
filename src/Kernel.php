<?php

namespace App;

use PowerDI\AbstractKernel;

class Kernel extends AbstractKernel {
    protected function configure(): void {
        date_default_timezone_set("Europe/Prague");
        $this->config = \yaml_parse_file(realpath("../config/config.yaml"));
        $this->dependency = \yaml_parse_file(realpath("../config/dependency.yaml"));
        $this->routes = \yaml_parse_file(realpath("../config/routes.yaml"));
        $this->firewallConfig = \yaml_parse_file(realpath("../config/firewall.yaml"));
        $this->envFilePath = realpath("../config/.env");
    }

    protected function setAppBase(): void {
        $this->appBase = realpath(__DIR__ . "/..");
    }
}