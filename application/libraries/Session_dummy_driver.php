<?php
class CI_Session_dummy_driver extends CI_Session_driver implements SessionHandlerInterface
{

        public function __construct(&$params)
        {
                // DO NOT forget this
                parent::__construct();

                // Configuration & other initializations
        }

        public function open($save_path, $name)
        {
                // Initialize storage mechanism (connection)
        }

        public function read($session_id)
        {
                $db = new PDO("mysql:host=localhost;dbname=rim_", "myuser", "mypassword");

                $sql = "SELECT data FROM ci_session where id =" . $db->quote($sessionId);
                $result = $db->query($sql);
                $data = $result->fetchColumn();
                $result->closeCursor();

                return $data;
        }

        public function write($session_id, $session_data)
        {
                // Create / update session data (it might not exist!)
        }

        public function close()
        {
                // Free locks, close connections / streams / etc.
        }

        public function destroy($session_id)
        {
                // Call close() method & destroy data for current session (order may differ)
        }

        public function gc($maxlifetime)
        {
                // Erase data for expired sessions
                $db = new PDO("mysql:host=localhost;dbname=rim_live", "root", "root123");

                $sql = "DELETE FROM ci_session WHERE timestamp < DATE_SUB(NOW(), INTERVAL " . $lifetime . " SECOND)";
                $db->query($sql);
        }

}
?>
