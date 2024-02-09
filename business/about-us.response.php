<?php 
    include __DIR__.'/../classes/about-us.class.php';

    $abousUsModel=new AboutUs();

    $aboutUs=$abousUsModel->getAbousUs();

    function addCheckIconToListItems($content) {
        $dom = new DOMDocument();
        $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
        $xpath = new DOMXPath($dom);
        $listItems = $xpath->query("//ul//li");
    
        foreach ($listItems as $item) {
            $icon = $dom->createElement('i');
            $icon->setAttribute('class', 'bi bi-check-circle');
            $icon->setAttribute('style', 'font-size: 20px; padding-right: 4px; color: #cc1616;');
    
            $itemText = $item->textContent;
            $item->textContent = ''; // Clear existing content
    
            $item->appendChild($icon); // Append icon
            $item->appendChild($dom->createTextNode($itemText)); // Append original text
        }
    
        $ulElements = $xpath->query("//ul");
        foreach ($ulElements as $ul) {
            $ul->setAttribute('style', 'list-style-type: none;'); // Change list style
        }
    
        return $dom->saveHTML();
    }
    
    
    $modifiedContent = addCheckIconToListItems($aboutUs['about_content']);
    