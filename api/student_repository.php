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

        $query = "
            SELECT s.*, r.rno AS roll_no_current 
            FROM student s
            LEFT JOIN roll_no r ON (
                r.sid = s.student_id 
                AND r.ses = '$session' 
                AND (r.class = s.student_class OR r.class IS NULL)
            )
            WHERE s.student_id = '$student_id' 
              AND s.student_session = '$session' 
              AND s.status = 0 
            ORDER BY (r.class = s.student_class) DESC, r.id DESC
            LIMIT 1
        ";
        $result = mysqli_query($this->con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $row['rno'] = $row['roll_no_current'] !== null ? $row['roll_no_current'] : null;
            $row['roll_no'] = $row['rno'];
            unset($row['roll_no_current']);
            return $row;
        }
        return null;
    }

    /**
     * Fetch all students of a specific class and session
     */
    public function findByClassAndSession($class, $session) {
        $class = mysqli_real_escape_string($this->con, $class);
        $session = mysqli_real_escape_string($this->con, $session);

        $query = "
            SELECT s.*, r.rno AS roll_no_current 
            FROM student s
            LEFT JOIN roll_no r ON (
                r.sid = s.student_id 
                AND r.ses = '$session' 
                AND (r.class = s.student_class OR r.class IS NULL)
            )
            WHERE s.student_class = '$class' 
              AND s.student_session = '$session' 
              AND s.status = 0 
            ORDER BY 
                CASE 
                    WHEN r.rno IS NULL OR TRIM(r.rno) = '' THEN 2
                    WHEN r.rno REGEXP '^[0-9]+$' THEN 0
                    ELSE 1
                END ASC,
                CAST(r.rno AS UNSIGNED) ASC,
                CAST(REGEXP_REPLACE(r.rno, '[^0-9]', '') AS UNSIGNED) ASC,
                r.rno ASC,
                s.student_name ASC
        ";
        $result = mysqli_query($this->con, $query);

        $students = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $row['rno'] = $row['roll_no_current'] !== null ? $row['roll_no_current'] : null;
                $row['roll_no'] = $row['rno'];
                unset($row['roll_no_current']);
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
