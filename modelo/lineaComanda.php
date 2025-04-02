<?php

function inserirLineaComanda($connexio, $id, $nom, $quantitat, $preu_unitat, $preu_total, $producte_id, $comanda_id){
    $query = 'INSERT INTO "Linia_comanda" ("id", "nom_producte", "quantitat", "preu_unitari", "preu_total", "producte_id", "comanda_id") VALUES ($1, $2, $3, $4, $5, $6, $7)';
    $consulta = pg_query_params($connexio, $query, array($id, $nom, $quantitat, $preu_unitat, $preu_total, $producte_id, $comanda_id));
}