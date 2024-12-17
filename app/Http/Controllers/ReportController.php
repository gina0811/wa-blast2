<?php
// ReportController.php

require_once __DIR__ . '/../models/MessageModel.php';

class ReportController {
    private $model;

    public function __construct() {
        $this->model = new MessageModel();
    }

    // Display report
    public function index() {
        $reportData = $this->generateReport();
        require __DIR__ . '/../views/reports/index.php';
    }

    // Generate report data
    private function generateReport() {
        // Fetch total messages
        $totalMessages = $this->model->getTotalMessages();

        // Fetch sent messages
        $sentMessages = $this->model->getMessagesByStatus('sent');

        // Fetch failed messages
        $failedMessages = $this->model->getMessagesByStatus('failed');

        return [
            'total_messages' => $totalMessages,
            'sent_messages' => $sentMessages,
            'failed_messages' => $failedMessages,
        ];
    }
}
?>
