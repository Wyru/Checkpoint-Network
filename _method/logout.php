<?php

/* Autor: Rogério Júnior
 * Data: 01/06/2016
 * Função: Método para terminar sessão.
 */
    session_start();
    unset($_SESSION);
    session_destroy();
    header('location:../login.html');
?>