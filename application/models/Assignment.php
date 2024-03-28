<?php
class Assignment extends CI_Model {
    /**
     * Gets all the assignments in the database
     * @return array Array of fetched assignments
     */
    public function getAllAssignments() {
        return $this->db->query("SELECT * FROM assignments;")->result_array();
    }

    /**
     * Search assignments that match the inputted characteristics of an assignment
     * @param array Array of the inputted characteristics
     * @return array Array of fetched assignments
     */
    public function searchAssignments($data) {
        $track = $this->security->xss_clean($data["track"]);
        $query = "SELECT * FROM assignments WHERE track LIKE ?";

        if (isset($data["easy"]) && $data["easy"] == 1 && isset($data["intermediate"]) && $data["intermediate"] == 1) {
            $query .= ";";
            return $this->db->query($query, array("%{$track}%"))->result_array();
        }

        if (isset($data["easy"]) && $data["easy"] == 1) {
            $query .= " AND level = 'Easy'";
        }

        if (isset($data["intermediate"]) && $data["intermediate"] == 1) {
            $query .= " AND level = 'Intermediate'";
        }

        $query .= ";";
        return $this->db->query($query, array("%{$track}%"))->result_array();
    }
}