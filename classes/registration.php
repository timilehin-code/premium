<?php
class Registration
{
    public $fullName;
    public $userEmail;
    public $password;

    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertUser()
    {
        // Basic validation
        if (empty($this->fullName) || empty($this->userEmail) || empty($this->password)) {
            echo "All fields are required!";
            return false;
        }

        $userId = false; // Initialize to indicate failure

        try {
            // Check if email exists
            $checkEmail = "SELECT email FROM users WHERE email = ?";
            $prepareEmail = $this->conn->prepare($checkEmail);
            if (!$prepareEmail) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
            $prepareEmail->bind_param("s", $this->userEmail);
            $prepareEmail->execute();
            $result = $prepareEmail->get_result(); // Fixed: get_result()

            if ($result->num_rows > 0) { // Fixed: num_rows
                echo "Email already exists!";
                $prepareEmail->close();
                return false;
            }
            $prepareEmail->close();

            // Insert user
            $hashPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $insertUser = "INSERT INTO users (userName, email, password) VALUES (?, ?, ?)";
            $prepareUser = $this->conn->prepare($insertUser); // Use $this->conn consistently
            if (!$prepareUser) {
                throw new Exception("Prepare failed: " . $this->conn->error);
            }
            $prepareUser->bind_param("sss", $this->fullName, $this->userEmail, $hashPassword);
            $success = $prepareUser->execute(); // Renamed for clarity
            if ($success) {
                $userId = $this->conn->insert_id;
            } else {
                echo "Failed to insert user: " . $prepareUser->error;
            }
            $prepareUser->close();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }

        return $userId;
    }
}
