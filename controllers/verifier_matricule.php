<?php
    function verifier_matricule(){
        require_once('PHPExcel/Classes/PHPExcel.php');//inclusion de kla bibliotheque
        $objReader = PHPExcel_IOFactory::createReader('Excel2007');//creation du lecteur excel
        $objPHPExcel = $objReader->load("G2_genie_logiciel.xlsx");//chargement du fichier
        $sheet = $objPHPExcel->getActiveSheet() ; // affection du contenu de la page active
        $numero = 2;//indice des noms dans le ficier excel
        do{
            $cell = $sheet->getCell('B'.$numero) ; //affectation du contenu du fichier(conlonne 'Matricule') ligne par ligne
            if($matricule==$cell->getValue()){
                return true;
            }
            $numero++;//passage à la cellule suivante
        }while($cell!="");
        return false;
    }
?>