//Código da function/ consulta :


<?php

// Função de consulta do telefone na segunda API
function cpf1($cpf1, $chat_id) {
    // Montar a URL da API com o número de telefone
    $url = "https://katchau-apis.online/cpf1.php?cpf=$cpf1&token=@teddyks";

if ($cpf1) {
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://katchau-apis.online/cpf1.php?cpf=" . $cpf . "&token=@teddyks",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "gzip",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }

    $response = json_decode($response);
    
            $nome = $response['nome'];
            $cpf = $response['cpf'];
            $cnsdef = $response['cnsDefinitivo'];
            $cnsprov = $response['cnsProvisorio'];
            $nascimento = $response['dataNascimento']['nascimento'];
            $idade = $response['dataNascimento']['idade'];
            $signo = $response['dataNascimento']['signo'];
            $sexo = $response['sexo'];
            $identidade_genero = $response['identidadeGenero'];
            $mae = $response['nomeMae'];
            $pai = $response['nomePai'];
            $obito $mae = $response['obito'];
            $vip = $response['vip'];
            $racacor = $response['racaCor'];
            $estado_civil = $response['estadoCivil'];
            $telefone = $response['telefone'];
            $email = $response['email'];
            $tipo_logradouro = $response['endereco']['tipoLogradouro'];
            $logradouro = $response['endereco']['logradouro'];
            $numero = $response['endereco']['numero'];
            $complemento = $response['endereco']['complemento'];
            $bairro = $response['endereco']['bairro'];
            $municipio = $response['endereco']['municipio'];
            $siglauf = $response['endereco']['siglaUf'];
            $cep = $response['endereco']['cep'];

$resultado = "
*🔎 CONSULTA CPF (SIPNI) 🔎*

• CPF: $mono$cpf$mono
• CNS DEF: $mono$cnsdef$mono
• CNS PROV: $mono$cnsprov$mono
• NASCIMENTO: $mono$nascimento$mono
• IDADE: $mono$idade$mono
• SIGNO: $mono$signo$mono
• SEXO: $mono$sexo$mono
• IDD GÊNERO: $mono$identidade_genero$mono
• OBITO: $mono$obito$mono
• RAÇA: $mono$racacor$mono
• ESTADO CIVIL: $mono$estado_civil$mono
• VIP: $mono$vip$mono
• TELEFONES: $mono$telefone$mono
• MÃE: $mono$mae$mono
• PAI: $mono$pai$mono
• LOGRADOURO: $mono$logradouro$mono
• NUMERO: $mono$numero$mono
• COMPLEMENTO: $mono$complemento$mono
• BAIRRO: $mono$bairro$mono
• MUNICÍPIO: $mono$municipio$mono
• SIGLA UF: $mono$siglauf$mono
• CEP: $mono$cep$mono
";

            // Verificar se há dados disponíveis
            if (strpos($resultado, "SEM INFORMAÇÃO") !== false) {
                // Se os dados não estiverem disponíveis, enviar mensagem de resposta indicando a falta de informações
                $caption .= $resultado;
                $caption .= "\n\n*By: @teddy_buscas_bot*";
            } else {
                // Se houver dados disponíveis, formatar a mensagem de resposta
                $caption .= $resultado;
                $caption .= "\n\n*By: @teddy_buscas_bot*";
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