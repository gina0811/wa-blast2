<?php
// MessageController.php

require_once __DIR__ . '/../models/MessageModel.php';

class MessageController {
    private $model;

    public function __construct() {
        $this->model = new MessageModel();
    }

    // Display all messages
    public function index() {
        $messages = $this->model->getAllMessages();
        require __DIR__ . '/../views/messages/index.php';
    }

    // Show form to create a new message
    public function create() {
        require __DIR__ . '/../views/messages/create.php';
    }

    // Send a new message
    public function send($data) {
        if (!empty($data['contact_id']) && !empty($data['message'])) {
            $this->model->sendMessage($data);
            header('Location: /messages');
        } else {
            echo "Contact and message fields are required!";
        }
    }

    // Delete a message
    public function delete($id) {
        $this->model->deleteMessage($id);
        header('Location: /messages');
    }
}
?>
