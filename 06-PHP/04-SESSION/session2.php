<?php

session_start(); // sans cette ligne la suite provoquerai une erreur

echo '<pre>';
print_r($_SESSION);
echo '</pre>';