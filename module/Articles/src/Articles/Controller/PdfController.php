<?php

namespace Articles\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Articles\Model\Articles;
use Articles\Model\CreaPdf;
use ZendPdf\PdfDocument;
use ZendPdf\ObjectFactory;

class PdfController extends AbstractActionController {

    protected $CreaPdf;

    public function getCreaPdf() {
        if (!$this->CreaPdf) {
            $sm = $this->getServiceLocator();
            $this->CreaPdf = $sm->get('CreaPdf');
        }
        return $this->CreaPdf;
    }

    public function fabricationAction() {
        $crea = $this->getCreaPdf();
        $crea->construction(15);
        //var_dump($crea);
    }

}
