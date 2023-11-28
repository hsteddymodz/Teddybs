//Código da function/ consulta :


<?php

// Função de consulta do telefone na segunda API
function cep($cep, $chat_id) {
    // Montar a URL da API com o número de telefone
    $url = "https://shadow-consultas.onrender.com/cep/$cep?apiKey=teddy";

    // Fazer a requisição HTTP
    $response = file_get_contents($url);

    // Verificar se a requisição foi bem-sucedida
    if ($response !== false) {
        // Decodificar a resposta JSON
        $data = json_decode($response, true);

        // Verificar o status da resposta
        if ($data['status']) {
            // Obter o resultado da consulta
            $resultado = $data['resultado']['str'];

            // Verificar se há dados disponíveis
            if (strpos($resultado, "SEM INFORMAÇÃO") !== false) {
                // Se os dados não estiverem disponíveis, enviar mensagem de resposta indicando a falta de informações
                $caption .= $resultado;
                $caption .= "\n*By: @teddy_buscas_bot*";
            } else {
                // Se houver dados disponíveis, formatar a mensagem de resposta
                $caption .= $resultado;
                $caption .= "\n*By: @teddy_buscas_bot*";;
            }

            // Enviar a resposta ao usuário
            bot("sendMessage", array(
                "chat_id" => $chat_id,
                "text" => $caption,
                "parse_mode" => "Markdown",
                "reply_markup" => [
                    "inline_keyboard" => [
                        [
                            ["text" => "🗑️", "callback_data" => "delete_message"]
                        ]
                    ]
                ]
            ));
        } else {
            // Em caso de erro na consulta, enviar uma mensagem informando
            bot("sendMessage", array(
                "chat_id" => $chat_id,
                "text" => "Erro na consulta. Por favor, tente novamente."
            ));
        }
    } else {
        // Em caso de falha na requisição, enviar uma mensagem informando
        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => "Falha na comunicação com o servidor. Por favor, tente novamente mais tarde."
        ));
    }
}