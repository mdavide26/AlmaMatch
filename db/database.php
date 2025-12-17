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
        $query = "SELECT * FROM MATCHES WHERE student1_id = ? OR student2_id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("ii", $userId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>