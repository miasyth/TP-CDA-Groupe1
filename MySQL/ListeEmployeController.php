<?php

require_once '../dao/EmployeDao.php';
require_once '../dao/ServiceDao.php';
$employeDao = new EmployeDao();
$serviceDao = new ServiceDao();
$employes = $employeDao->getAll();


foreach ($employes as $employe) {
    if($employe->getService()!=null && $employe->getService()->getNumeroService()!=null){   
        $monService = $serviceDao->getById($employe->getService()->getNumeroService()); 
        $employe->setService($monService );
    }
}

require "../views/ListeEmployeView.php";

?>