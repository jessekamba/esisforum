<?php
     $db= new PDO("mysql:host=localhost;dbname=regi","root","");
     $id = $_POST['id'];
     $nom = $_POST['nom'];
     
     $requette = $db->prepare("UPDATE clients SET nom=? WHERE ID=?");
     $requette->execute(array($nom,$id))
?>