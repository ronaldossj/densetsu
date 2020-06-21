<?php

function gerarDelete($tabela, $where)
{
    if (($tabela && !empty($tabela)) && ($where && !empty($where))) {
        $query = "DELETE FROM {$tabela} WHERE {$where}";
        return $query;
    }
    return null;
}

function gerarInsert($tabela, $fildsValues)
{
    if (($tabela && !empty($tabela)) && ($fildsValues && is_array($fildsValues))) {
        $campos = '';
        $valores = '';
        foreach ($fildsValues as $key => $value) {
            $campos .= "{$key}, ";
            $valores .= "'{$value}', ";
        }
        $campos = substr($campos, 0, -2);
        $valores = substr($valores, 0, -2);

        $query = "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";

        return $query;
    }
    return null;
}

function gerarSelect($campos, $tabela, $where, $complement = "")
{
    if (($campos && !empty($campos)) && ($tabela && !empty($tabela)) && ($where && !empty($where))) {
        $query = "SELECT {$campos} FROM {$tabela} WHERE {$where} {$complement}";
        return $query;
    }
    return null;
}

function gerarUpdate($tabela, $fildsValues, $where)
{
    if (($tabela && !empty($tabela)) && ($fildsValues && is_array($fildsValues)) && ($where && !empty($where))) {
        $camposValores = '';
        foreach ($fildsValues as $key => $value){
            $camposValores .= "{$key} = '{$value}' ,";
        }
        $camposValores = substr($camposValores, 0, -1);

        $query = "UPDATE {$tabela} SET {$camposValores} WHERE {$where}";
        return $query;
    }
    return null;
}