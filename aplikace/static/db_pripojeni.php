<?php
  $server = "localhost"; // define("DB_SERVER", "localhost");
  $uzivatel = "root";
  $heslo = "";
  $databaze = "samurai";

  $db = new mysqli($server,$uzivatel,$heslo,$databaze);
?>