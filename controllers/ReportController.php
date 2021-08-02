<?php

require_once 'controllers/ClientController.php';

class ReportController {
    public function index(){
        $client = new ClientController();
        $clients = $client->listClientNC();

        $employee = new EmployeeController();
        $employees = $employee->listEmployeeNC();

        $provider = new ProviderController();
        $providers = $provider->showReportProvider();

        require_once 'views/report/indexReport.php';
    }
}