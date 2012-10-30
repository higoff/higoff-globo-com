<?php
    
    

$lista_arquivos = array(array('nome' => 'arquivo1', 'tamanho' => '55'),
                        array('nome' => 'arquivo2', 'tamanho' => '100'),
                        array('nome' => 'arquivo3', 'tamanho' => '150'),
                        array('nome' => 'arquivo4', 'tamanho' => '300'),
                        array('nome' => 'arquivo5', 'tamanho' => '500'),
                        array('nome' => 'arquivo6', 'tamanho' => '300'),
                        array('nome' => 'arquivo7', 'tamanho' => '200'),
                        array('nome' => 'arquivo8', 'tamanho' => '900')
                        );

$tamanho_pasta = 0;
$num_arquivos = 0;
$diretorio_usado = 1;
$array_saida = array();

foreach ($lista_arquivos as $chave => $arquivo) {
    
    if ($num_arquivos == 10 || ((int)$tamanho_pasta + (int)$arquivo['tamanho'] > 1024)) {
        
        $diretorio_usado++;
        $tamanho_pasta = 0;
        $num_arquivos = 0;
        
    } else {
        
        $tamanho_pasta += (int)$arquivo['tamanho'];
        $num_arquivos++;
        
    }
    
    $array_saida[] = array('arquivo' => $arquivo['nome'], 'diretorio' => $diretorio_usado);
    
}

$diretorio_atual_exibicao = "";
$index_saida = 0;
$str_arquivos = "";
$array_saida_formatado = array();

foreach ($array_saida as $value) {
    
    if ($diretorio_atual_exibicao != $value['diretorio']) {
        
        $str_arquivos = $value['arquivo'];
        $diretorio_atual_exibicao = $value['diretorio'];
        $index_saida++;
        
    } else {
        
        $str_arquivos .= ", " . $value['arquivo'];
        
    }
    
    $array_saida_formatado[$index_saida] = array('diretorio' => $diretorio_atual_exibicao, 'arquivos' => $str_arquivos);
    
}

//print_r($array_saida);
print_r($array_saida_formatado);

    

?>