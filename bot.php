<?php

$mono = "`";

$authorized_chats = array(
    '6686054045', // ID do primeiro grupo autorizado
    '-1001972359345', // ID do segundo grupo autorizado
    '6686054045',
    '-998748959' //ID do terceiro gp
);

$input = file_get_contents('php://input');

$update = json_decode($input);

$message = $update->message;

$chat_id = $message->chat->id;

if (in_array($chat_id, $authorized_chats)) {

$message_id = $update->message->message_id;

$tipo = $message->chat->type;

$texto = $message->text;

$id = $message->from->id;

$isbot = $message->from->is_bot;
}

 if($message->from->is_premium){
   
     $ispremium = "sim";
     
 }else{
   
     $ispremium = "não";
     
 }
 $nome = $message->from->first_name;
 
 $usuario = $message->chat->username;
 
 $data = $update->callback_query->data;
 
 $query_message_id = $update->callback_query->message->message_id;
 
 $query_chat_id = $update->callback_query->message->chat->id;
 
 $query_usuario = $update->callback_query->message->chat->username;
 
 $query_nome = $update->callback_query->message->chat->first_name;
 
 $query_id = $update->callback_query->id;

function bot($method, $parameters) {
 $token = "6067551514:AAHD7FeGd_I-KFjrSq3VSEPbPPRhjGyBlJA";
 $options = array(
			 'http' => array(
			 'method'  => 'POST',
			 'content' => json_encode($parameters),
			 'header'=>  "Content-Type: application/json\r\n" .
	            "Accept: application/json\r\n"
			 )
			);

$context  = stream_context_create( $options );
		return file_get_contents('https://api.telegram.org/bot'.$token.'/'.$method, false, $context );
  
}

function consultas($dados){
  
  $chat_id = $dados["chat_id"];
  $message_id = $dados["query_message_id"];
  
  $txt = "*☆ | COMANDOS BOT @teddy_do_7 | ☆*
*🔄 Bases de dados atualizada, servidores otimizados!*

*● | PARÂMETROS | ●*
🟢 *STATUS 》* ONLINE
🟡 *STATUS 》* MANUTENÇÃO
🔴 *STATUS 》* OFFLINE

*• | MÓDULOS | •*
🔴 SCORE: `/score 00000000000`
🟢 CPF1: `/cpf1 00000000000`
🔴 CPF2: `/cpf2 00000000000`
🔴 CPF3: `/cpf3 00000000000`
🔴 CPF4: `/cpf4 00000000000`

🔴 TEL1: `/tel1 81971185449`
🔴 TEL2: `/tel2 81971185449`
🔴 TEL3: `/tel3 81971185449`
🔴 NOME: `/nome Jamilly Cambui`
🔴 PARENTES: `/parentes 00000000000`
🔴 VIZINHOS: `/vizinhos 00000000000`
🔴 BIN: `/bin 000000`
🟢 CEP: `/cep 54520015`

🔴 IP:
🔴 PLACA1:
🔴 EMAIL: `/email joao@hotmail.com`
🔴 CNPJ: `/cnpj 0000000000000`
🔴 RG: `/rg 0000000`

🔴 PLACA2:
🔴 SITE:

*● | CHECKERS | ●*

🟡CHK: `/chk`

⚡️ *Use os comandos em Grupos e no Privado do Robô*
👤 *Suporte: @teddy_do_7*
━━━━━━━━━━━━━━━━━━━━━";

  $button[] = ['text'=>"Voltar", "callback_data" => "start"];

  $menu['inline_keyboard'] = array_chunk($button, 2);
  
  bot("editMessageText",
    array(
    "chat_id"=> $chat_id,
    "text" => $txt,
    "message_id" => $message_id,
    "reply_to_message_id"=> $message_id,
    "reply_markup" => $menu,
    "parse_mode" => 'Markdown'));
}

//comando de chk live


//fim

function tabela($dados){
  
  $chat_id = $dados["chat_id"];
  $message_id = $dados["query_message_id"];
  
  $txt = "● | PREÇOS INDIVIDUAIS | ●

7 DIAS 》15$
15 DIAS》 28$
30 DIAS》 45$

● | PREÇOS PARA GRUPOS | ●

7DIAS 》25$
15 DIAS》 35$
30 DIAS》 65$

💰 | PAGAMENTOS | 💰

PIX


👤 Dono: @teddy_do_7
━━━━━━━━━━━━━━━━━━━━━";

  $button[] = ['text'=>"Voltar", "callback_data" => "start"];

  $menu['inline_keyboard'] = array_chunk($button, 2);
  
  bot("editMessageText",
    array(
    "chat_id"=> $chat_id,
    "text" => $txt,
    "message_id" => $message_id,
    "reply_to_message_id"=> $message_id,
    "reply_markup" => $menu,
    "parse_mode" => 'Markdown'));
}

function start($dados){
  
  $chat_id = $dados["chat_id"];
  $message_id = $dados["query_message_id"];
  $nome = $dados["nome"];
  
    $txt = "🐻 *Bem Vindo! {$nome}*
  
🆔 : $mono{$chat_id}$mono
  
_Explore minhas funcionalidades abaixo:_ [ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";

  $button[] = ['text'=>"Consultas",'callback_data'=>"consultas"];
  
  $button[] = ['text'=>"Tabela",'callback_data'=>"tabela"];
  
  $button[] = ['text'=>"Suporte / Dev",'url'=>"t.me/teddy_do_7"];

  $menu['inline_keyboard'] = array_chunk($button, 2);
  
  bot("editMessageText",
    array(
    "chat_id"=> $chat_id,
    "text" => $txt,
    "message_id" => $message_id,
    "reply_to_message_id"=> $message_id,
    "reply_markup" => $menu,
    "parse_mode" => 'Markdown'));
}

if (strpos($texto, "/start") === 0){
  
  $txt = "🐻 *Bem Vindo! {$nome}*
  
🆔 : $mono{$chat_id}$mono
  
_Explore minhas funcionalidades abaixo:_ [ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";

  $button[] = ['text'=>"Consultas",'callback_data'=>"consultas"];
  
  $button[] = ['text'=>"Tabela",'callback_data'=>"tabela"];
  
  $button[] = ['text'=>"Suporte / Dev",'url'=>"t.me/teddy_do_7"];
 
 $menu['inline_keyboard'] = array_chunk($button, 2);

  bot("sendChatAction", 
    array(
    "chat_id" => $chat_id,
    "action" => "typing"));

bot("sendMessage",
    array(
    "chat_id"=> $chat_id ,
    "text" => $txt,
    "reply_markup" => $menu,
    "reply_to_message_id"=> $message_id,
    "message_id" => $message_id,
    "parse_mode" => 'Markdown'));
}

if (strpos($texto, "/menu") === 0){
  
  $txt = "🐻 *Bem Vindo! {$nome}*
  
🆔 : $mono{$chat_id}$mono
  
_Explore minhas funcionalidades abaixo:_ [ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";

  $button[] = ['text'=>"Consultas",'callback_data'=>"consultas"];
  
  $button[] = ['text'=>"Tabela",'callback_data'=>"tabela"];
  
  $button[] = ['text'=>"Suporte / Dev",'url'=>"t.me/teddy_do_7"];
 
 $menu['inline_keyboard'] = array_chunk($button, 2);

  bot("sendChatAction", 
    array(
    "chat_id" => $chat_id,
    "action" => "typing"));

bot("sendMessage",
    array(
    "chat_id"=> $chat_id ,
    "text" => $txt,
    "reply_markup" => $menu,
    "reply_to_message_id"=> $message_id,
    "message_id" => $message_id,
    "parse_mode" => 'Markdown'));
}

// Verificar se o comando "/score" foi usado
if (strpos($texto, "/score") === 0) {
    // Extrair o score da mensagem
    $score = substr($texto, 7);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $score)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/score 00000000000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/score.php';

    // Chamar a função de consulta do telefone na segunda API
    score($score, $chat_id);
}

// Verificar se o comando "/tel2" foi usado
if (strpos($texto, "/tel2") === 0) {
    // Extrair o telefone da mensagem
    $tel2 = substr($texto, 6);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $tel2)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/tel2 81971185449
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/tel2.php';

    // Chamar a função de consulta do telefone na segunda API
    tel2($tel2, $chat_id);
}

//Código para o comando:

// Verificar se o comando "/t" foi usado
if (strpos($texto, "/nome") === 0) {
    // Extrair o telefone da mensagem
    $nomek = substr($texto, 6);

    if (empty($nomek)) {
        $photo_url = "https://i.ibb.co/2YhfdmV/1688958230412.png";
        $caption = '_Não seja mamaco, use assim_:
/nome renata jose
[ ](' . $photo_url . ')';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/nome.php';

    // Chamar a função de consulta do telefone na segunda API
    nomek($nomek, $chat_id);
}

// Verificar se o comando "/cpf1" foi usado
if (strpos($texto, "/cpf1") === 0) {
    // Extrair o telefone da mensagem
    $cpf1 = substr($texto, 6);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $cpf1)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/cpf1 00000000000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/cpf1.php';

    // Chamar a função de consulta do telefone na segunda API
    cpf1($cpf1, $chat_id);
}

// Verificar se o comando "/cpf2" foi usado
if (strpos($texto, "/cpf2") === 0) {
    // Extrair o telefone da mensagem
    $cpf2 = substr($texto, 6);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $cpf2)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/cpf2 00000000000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/cpf2.php';

    // Chamar a função de consulta do telefone na segunda API
    cpf2($cpf2, $chat_id);
}


// Verificar se o comando "/cpf3" foi usado
if (strpos($texto, "/cpf3") === 0) {
    // Extrair o telefone da mensagem
    $cpf3 = substr($texto, 6);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $cpf3)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/cpf3 00000000000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/cpf3.php';

    // Chamar a função de consulta do telefone na segunda API
    cpf3($cpf3, $chat_id);
}


// Verificar se o comando "/cpf4" foi usado
if (strpos($texto, "/cpf4") === 0) {
    // Extrair o telefone da mensagem
    $cpf4 = substr($texto, 6);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $cpf4)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/cpf4 00000000000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/cpf4.php';

    // Chamar a função de consulta do telefone na segunda API
    cpf4($cpf4, $chat_id);
}

// Verificar se o comando "/cep" foi usado
if (strpos($texto, "/cep") === 0) {
    // Extrair o telefone da mensagem
    $cep = substr($texto, 5);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $cep)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/cep 69900000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/cep.php';

    // Chamar a função de consulta do telefone na segunda API
    cep($cep, $chat_id);
}

// Verificar se o comando "/rg" foi usado
if (strpos($texto, "/rg") === 0) {
    // Extrair o telefone da mensagem
    $rg = substr($texto, 4);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $rg)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/rg 4978261
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/rg.php';

    // Chamar a função de consulta do telefone na segunda API
    rg($rg, $chat_id);
}

    // Verificar se o comando "/parentes" foi usado
if (strpos($texto, "/parentes") === 0) {
    // Extrair o telefone da mensagem
    $parentes = substr($texto, 10);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $parentes)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/parentes 69900000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/parentes.php';

    // Chamar a função de consulta do telefone na segunda API
    parentes($parentes, $chat_id);
}

// Verificar se o comando "/beneficios" foi usado
if (strpos($texto, "/beneficios") === 0) {
    // Extrair o telefone da mensagem
    $beneficios = substr($texto, 12);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $beneficios)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/beneficios 00000000000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/beneficios.php';

    // Chamar a função de consulta do telefone na segunda API
    beneficios($beneficios, $chat_id);
}

    // Verificar se o comando "/cnpj" foi usado
if (strpos($texto, "/cnpj") === 0) {
    // Extrair o telefone da mensagem
    $cnpj = substr($texto, 6);

    // Validar se a entrada contém apenas números
    if (!preg_match('/^\d+$/', $cnpj)) {
        $photo_url = "[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)";
        $caption = '_Não seja mamaco, use assim_:
/cnpj 69900000
[ ](https://i.ibb.co/2YhfdmV/1688958230412.png)';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/cnpj.php';

    // Chamar a função de consulta do telefone na segunda API
    cnpj($cnpj, $chat_id);
}

//Código para o comando:

// Verificar se o comando "/email" foi usado
if (strpos($texto, "/email") === 0) {
    // Extrair o telefone da mensagem
    $emai = substr($texto, 6);

    if (empty($email)) {
        $photo_url = "https://i.ibb.co/2YhfdmV/1688958230412.png";
        $caption = '_Não seja mamaco, use assim_:
/email robertojose@hotmail.com
[ ](' . $photo_url . ')';

        bot("sendMessage", array(
            "chat_id" => $chat_id,
            "text" => $caption,
            "parse_mode" => "Markdown"
        ));

        exit();
    }

    // Incluir o arquivo com as funções de consulta
    require_once 'includes/email.php';

    // Chamar a função de consulta do telefone na segunda API
    email($email, $chat_id);
}

if (!empty($data)) {
    $callback = explode("|", $data)[0];
    $dados = array(
        "chat_id" => $query_chat_id,
        "id" => $query_chat_id,
        "nome" => $query_nome,
        "usuario" => $query_usuario,
        "message_id" => $query_message_id,
        "query_message_id" => $query_message_id,
        "query_nome" => $query_nome,
        "query_id" => $query_id,
        "optional" => explode("|", $data)[1],
        "query_usuario" => $query_usuario
    );

    if ($callback === "delete_message") { 
        bot("deleteMessage", array(
            "chat_id" => $query_chat_id,
            "message_id" => $query_message_id
        ));
    } else if (function_exists($callback)) {
        $callback($dados);
    } else {
        bot("answerCallbackQuery", array(
            "callback_query_id" => $query_id,
            "text" => "⚠️ | Função em desenvolvimento!",
            "show_alert" => false,
            "cache_time" => 10
        ));
    }
}