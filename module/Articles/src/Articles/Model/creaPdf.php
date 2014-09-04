<?php

namespace Articles\Model;

use ZendPdf\PdfDocument;
use ZendPdf\ObjectFactory;
use ZendPdf\Page;
use ZendPdf\Font;
use ZendPdf\Image;
use ZendPdf\Image\ImageFactory;
use ZendPdf\Color\Rgb;

class creaPdf {

    public function __construct($adapter) {
        $this->adapter = $adapter;
    }

    public function infoArticles() {
        $requete = "SELECT * FROM articles";
        $adapter = $this->adapter;
        $res = $adapter->query($requete, $adapter::QUERY_MODE_EXECUTE);
        return $res;
    }

    public function construction($id) {
        // Création du document
        $pdf = new PdfDocument();
        $pdf->pages[] = new Page(Page::SIZE_A4);
        $page1 = $pdf->pages[0];
        $page1->setFont(Font::fontWithName(Font::FONT_COURIER_BOLD), 14);
        // Placement du logo
        $logo = Image::imageWithPath('public/img/logo.jpg');
        $page1->drawImage($logo, 36, 670, 106, 805);
        $page1->drawText("Nos articles", 36, 600, "UTF-8");
        // Données provenant de la base de données
        $articles = $this->infoArticles();
        $n = 0;
        foreach ($articles as $article) {
            $page1->drawText($article->articles_nom, 36, 550 - (30 * $n), "UTF-8");
            $n++;
        }
        // Création d'une deuxième page
        $pdf->pages[] = new Page(Page::SIZE_A4);
        $page2 = $pdf->pages[1];
        // Création d'un octogone croisé
        $x = array();
        $y = array();
        for ($count = 0; $count < 9; $count++) {
            $x[] = 300 + 280 * cos(3 * M_PI_4 * $count);
            $y[] = 500 + 280 * sin(3 * M_PI_4 * $count);
        }
        $page2->setFillColor(new Rgb(1, 0, 1));
        $page2->drawPolygon($x, $y, Page::SHAPE_DRAW_FILL_AND_STROKE, Page::FILL_METHOD_EVEN_ODD);
        // enregistrement du document
        $pdf->save("Test_pdf_3.pdf");
        return $pdf;
    }

}
