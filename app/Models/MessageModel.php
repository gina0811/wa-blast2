<?php
// MessageModel.php

class MessageModel {
    private $db;

    public function __construct() {
        $config = require __DIR__ . '/../config/config.php';
        $dsn = "mysql:host={$config['host']};dbname={$config['db_name']};charset={$config['charset']}";
        $this->db = new PDO($dsn, $config['username'], $config['password']);
    }

    // Fetch all messages
    public function getAllMessages() {
        $stmt = $this->db->prepare("SELECT messages.id, contacts.name AS contact_name, messages.message, messages.status, messages.sent_at
                                    FROM messages
                                    JOIN contacts ON messages.contact_id = contacts.id
                                    ORDER BY messages.sent_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Send a new message and save it to the database
    public function sendMessage($data) {
        // Send message via API (dummy example, replace with actual API call)
        $apiResponse = $this->sendToWhatsAppAPI($data['contact_id'], $data['message']);
        $status = $apiResponse['status'] ?? 'failed';

        // Save message to database
        $stmt = $this->db->prepare("INSERT INTO messages (contact_id, message, status, sent_at)
                                    VALUES (:contact_id, :message, :status, NOW())");
        $stmt->bindParam(':contact_id', $data['contact_id'], PDO::PARAM_INT);
        $stmt->bindParam(':message', $data['message']);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
    }

    // Delete a message
    public function deleteMessage($id) {
        $stmt = $this->db->prepare("DELETE FROM messages WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

// Count total messages
public function getTotalMessages() {
    $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM messages");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'] ?? 0;
}

    // Count messages by status
    public function getMessagesByStatus($status) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as total FROM messages WHERE status = :status");
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }

    // Dummy function to simulate sending to WhatsApp API
    private function sendToWhatsAppAPI($contactId, $message) {
        // Fetch contact's phone number
        $stmt = $this->db->prepare("SELECT phone FROM contacts WHERE id = :id");
        $stmt->bindParam(':id', $contactId, PDO::PARAM_INT);
        $stmt->execute();
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($contact) {
            $phoneNumber = $contact['phone'];

            // Simulated API response (replace with actual API integration)
            return [
                'status' => 'sent',
                'phone' => $phoneNumber,
                'message' => $message
            ];
        }

        return ['status' => 'failed'];
    }
}
?>
