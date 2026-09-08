<?php
function getHeader($name) {
    $key = 'HTTP_' . strtoupper(str_replace('-', '_', $name));
    return $_SERVER[$key] ?? null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {

    $baseLogDir = __DIR__ . '/days_logs';
    $dateDir = $baseLogDir . '/' . date('Y-m-d'); // Папка с текущей датой
    $hourFile = $dateDir . '/' . date('H') . 'h_log.txt'; // Файл с текущим часом

    // Проверка и создание папок, если они не существуют
    if (!is_dir($baseLogDir)) {
        mkdir($baseLogDir, 0755, true);
    }
    if (!is_dir($dateDir)) {
        mkdir($dateDir, 0755, true);
    }
    
    $logData = [
        "=== Новый {$_SERVER['REQUEST_METHOD']} запрос: " . date('Y-m-d H:i:s') . " ===",
        "User-Agent: " . (getHeader('User-Agent') ?? 'Не указан'),
        "User-Agent-2: " . ($ua_agent_app ?? 'Не указан'),
        "User-Agent-from_json: " . ($ua_agent_app_from_json ?? 'Не указан'),
        "User-IP: " . ($user_ip ?? 'Не указан'),
        "Страна: " . ($user_ip_country_code_from_serv ?? 'Не указан') . " - " . ($user_ip_country_from_serv ?? 'Не указан'),
        "User YA id: " . ($ya_user_id ?? 'Не указан'),
        "GET параметры: " . ($_SERVER['QUERY_STRING'] ?? 'Не указан'),
        "JSON from app: " . (json_encode($_POST, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?: 'Не указан'),
        "JSON to app: " . ($json_for_app ?? 'Не указан'),
        "Answer from Keitaro: " . ($keitaro_answer_from_check_ip ?? 'Не указан'),
        "URL Keitaro API: " . ($keitaro_check_ip_url ?? 'Не указан'),
        "URL to app: " . ($track_url ?? 'Не указан'),
        "===============================\n\n"
    ];
    file_put_contents($hourFile, implode("\n", $logData), FILE_APPEND | LOCK_EX);
}