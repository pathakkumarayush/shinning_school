<?php
/**
 * Student Repository for Shining School Student Documents API
 */

class StudentRepository {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    /**
     * Fetch a student by student_id and session
     */
    public function findByIdAndSession($student_id, $session) {
        $student_id = mysqli_real_escape_string($this->con, $student_id);
        $session = mysqli_real_escape_string($this->con, $session);

        $query = "SELECT * FROM student WHERE student_id = '$student_id' AND student_session = '$session' AND status = 0 LIMIT 1";
        $result = mysqli_query($this->con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        }
        return null;
    }

    /**
     * Fetch all students of a specific class and session
     */
    public function findByClassAndSession($class, $session) {
        $class = mysqli_real_escape_string($this->con, $class);
        $session = mysqli_real_escape_string($this->con, $session);

        $query = "SELECT * FROM student WHERE student_class = '$class' AND student_session = '$session' AND status = 0 ORDER BY student_name ASC";
        $result = mysqli_query($this->con, $query);

        $students = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $students[] = $row;
            }
        }
        return $students;
    }

    /**
     * Update student document fields in database
     */
    public function updateDocument($student_id, $session, $img_col, $status_col, $filename, $otnm = null) {
        $student_id = mysqli_real_escape_string($this->con, $student_id);
        $session = mysqli_real_escape_string($this->con, $session);
        $filename = mysqli_real_escape_string($this->con, $filename);

        // Build the update query
        $setClauses = [
            "$img_col = '$filename'",
            "$status_col = 'Yes'"
        ];

        // If other document name is specified
        if ($img_col === 'otimg' && $otnm !== null) {
            $otnm = mysqli_real_escape_string($this->con, $otnm);
            $setClauses[] = "otnm = '$otnm'";
        }

        $query = "UPDATE student SET " . implode(", ", $setClauses) . " WHERE student_id = '$student_id' AND student_session = '$session'";
        
        $result = mysqli_query($this->con, $query);
        return ($result && mysqli_affected_rows($this->con) >= 0);
    }
}
