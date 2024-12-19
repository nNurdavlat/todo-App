<?php

namespace App;

use GuzzleHttp\Client;
class Bot
{
    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.telegram.org/bot' . $_ENV['TELEGRAM_BOT_TOKEN'] . '/'
        ]);
    }

    public function makeRequest(string $method, array $parames)
    {
        $this->client->post($method, ['json' => $parames]);
    }


    public function getUserTasks(int $chatId)
    {
        $todo = new Todo();
        return $todo->getTodoByTelegramId($chatId);
    }


    public function prepareTaskLIst (int $chatId): string
    {
        $i = 0;
        $tasks = $this->getUserTasks($chatId);
        $tasksLIst = "Your tasks:\n\n";

        foreach ($tasks as $task) {
            $i ++;
            $tasksLIst .= "Task #" . $i . "\n";
            $tasksLIst .= $task['title'] . "\n";
            $tasksLIst .= $task['due_date'] . "\n";
            $tasksLIst .= $task['status'] . "\n\n";
            $tasksLIst .= "===========================\n\n";
        }
        return $tasksLIst;
    }


    public function prepareButtons(int $chatId): array
    {
        $i = 0;
        $tasks = $this->getUserTasks($chatId);
        $buttons = [];
        foreach ($tasks as $task) {
            $i ++;
            $buttons[] = [
                'text' => $i,
                'callback_data' => $task['id']
            ];
        }
        return array_chunk($buttons, 2);
    }

    public function sendUserTasks(int $chatId): void
    {
        $tasksLIst = $this->prepareTaskLIst($chatId);
        $this->makeRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => $tasksLIst,
            'reply_markup' => json_encode([
                'inline_keyboard' => $this->prepareButtons($chatId),
            ])
        ]);
    }
}