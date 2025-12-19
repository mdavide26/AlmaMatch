<?php

class DatabaseHelper {

    private $db;

    public function __construct($host, $user, $password, $database, $port) {
        $this->db = new mysqli($host, $user, $password, $database, $port);

        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getMatchesForUser($userId) {
        $query = "
            SELECT
                u.name,
                u.surname,
                img.image_path,
                img.alt_text,
                v.matched_at
            FROM VIEW_USER_MATCHES v
            JOIN USERS u ON v.matched_user_id = u.user_id
            LEFT JOIN USER_IMAGES img ON u.user_id = img.user_id AND img.display_order = 1
            WHERE v.user_id = ?;
            ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getChatsForUser($userId) {
        $query = "
            SELECT 
                u.user_id AS other_user_id,
                u.name AS other_user_name,
                u.surname AS other_user_surname,
                m.content AS last_message,
                m.sent_at AS last_message_date,
                img.image_path AS other_user_image,
                img.alt_text AS other_user_image_alt,
                CASE 
                    WHEN m.sender_id = ? THEN 'YOU' 
                    ELSE 'THEM' 
                END AS last_sender
            FROM USERS u
            /* Join con la tabella MESSAGES per ottenere l'ultimo messaggio tra l'utente e ogni altro utente */
            JOIN MESSAGES m ON (
                (m.sender_id = ? AND m.receiver_id = u.user_id) OR 
                (m.receiver_id = ? AND m.sender_id = u.user_id)
            )
            /* Join con USER_IMAGES per ottenere l'immagine dell'altro utente */
            LEFT JOIN USER_IMAGES img ON u.user_id = img.user_id AND img.display_order = 1
            WHERE m.message_id = (
                /* Query per ottenere l'ultimo messaggio tra l'utente e un altro utente */
                SELECT m2.message_id
                FROM MESSAGES m2
                WHERE (m2.sender_id = ? AND m2.receiver_id = u.user_id)
                   OR (m2.receiver_id = ? AND m2.sender_id = u.user_id)
                ORDER BY m2.sent_at DESC, m2.message_id DESC
                LIMIT 1
            )
            /* Ordinamento delle chat in base alla data dell'ultimo messaggio */
            ORDER BY m.sent_at DESC;
            ";
        $stmt = $this->db->prepare($query);
        
        // CORREZIONE: La query sopra ha 5 punti di domanda (?), quindi usiamo 'iiiii' e passiamo $userId 5 volte.
        $stmt->bind_param('iiiii', $userId, $userId, $userId, $userId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>