<?php


/**
 * Retorna os nutrientes de um alimentos em formato JSON
 * 
 * @param $nutrienteAlimento
 * @return string
 */
function grafoComposicao($nutrienteAlimento)
{

    $totalNutrientes = 0;
    $percentNutr = [];

    foreach ($nutrienteAlimento as $nutrieAlm) {
        if ($nutrieAlm->nutriente->nomeNutriente != "Energia(J)" &&
            $nutrieAlm->nutriente->nomeNutriente != "Energia" &&
            $nutrieAlm->qtde != 0
        ) {

            if ($nutrieAlm->nutriente->unidadeMedida->siglaUnidade == 'mg'
                && $nutrieAlm->qtde != 'NA' && $nutrieAlm->qte != 'Tr'
            ) {
                $totalNutrientes += ($nutrieAlm->qtde / 1000);
                array_push($percentNutr, ['label' => $nutrieAlm->nutriente->nomeNutriente, 'value' => $nutrieAlm->qtde / 1000]);
            } elseif ($nutrieAlm->qtde != 'NA' && $nutrieAlm->qte != 'Tr') {
                $totalNutrientes += $nutrieAlm->qtde;
                array_push($percentNutr, ['label' => $nutrieAlm->nutriente->nomeNutriente, 'value' => $nutrieAlm->qtde]);
            }
        }
    }

    $vlrs = [];
    $toJson = [];
    foreach ($percentNutr as $nutriente) {
        $porcentagemAtual = ($nutriente['value'] * 100) / $totalNutrientes;
        $porcentagemAtual = number_format($porcentagemAtual, 0);
        if ($porcentagemAtual > 0) {
            array_push($toJson, ['label' => $nutriente['label'],
                'value' => $porcentagemAtual]);
        }
    }
    return json_encode($toJson);
}
