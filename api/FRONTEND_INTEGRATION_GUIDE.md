# Frontend Developer Integration Guide — Shining School ERP APIs

This document provides complete instructions, endpoints, payload formats, query parameters, authorization rules, and sample JSON responses for integrating the enhanced backend APIs and the new Copy Collection module.

---

## 1. Global Standards & Base URL

- **Base URL:** `http://<your-domain-or-localhost>/shining_school/api/`
- **Default Session format:** `2026-2027`
- **Content-Type:** `application/json` or `multipart/form-data`
- **Authentication:** Pass `user_id` / `teacher_id` / `created_by` parameter in request body/query, or provide standard Bearer token in headers (`Authorization: Bearer <token>`).

---

## 2. Database Changes & Index Queries

If configuring a new server or synchronizing environments, run the following SQL queries:

```sql
-- 1. Performance index for Scholar No. search
ALTER TABLE `student` ADD INDEX `idx_student_scholar` (`student_scholar`);

-- 2. Primary Key & Auto Increment for syllabus
ALTER TABLE `syllabus` ADD PRIMARY KEY (`id`);
ALTER TABLE `syllabus` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- 3. Primary Key & Auto Increment for exam_copy_collection
ALTER TABLE `exam_copy_collection` ADD PRIMARY KEY (`id`);
ALTER TABLE `exam_copy_collection` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

-- 4. Query optimization indexes for exam_copy_collection
CREATE INDEX `idx_copy_class_exam` ON `exam_copy_collection` (`session`, `class`(50), `exam`(50), `subject`(50));
CREATE INDEX `idx_copy_student` ON `exam_copy_collection` (`student`);
```

---

## 3. Module-by-Module API Reference

### Module 1: Teacher API

#### `GET /api/get_teacher.php`
Fetches teacher list enriched with login credentials and database primary key.

- **Query Parameters:**
  - `session` (required, e.g. `2026-2027`)
  - `id` (optional, filter by primary key)
  - `teacher_id` (optional, filter by teacher_id)
  - `status` (optional, `1` for active)

- **Response Format:**
```json
{
  "status": true,
  "total": 45,
  "teachers": [
    {
      "id": 23,
      "teacher_id": 23,
      "teacher_name": "JOHN DOE",
      "teacher_username": "techshining23",
      "login_uid": "techshining23",
      "login_password": "mypassword123",
      "teacher_type": 3,
      "status": "1"
    }
  ]
}
```

---

### Module 2: Syllabus Role-Based Access Control (RBAC)

#### `POST /api/syllabus/store_syllabus.php`
- **Rules:**
  - Subject Teachers are verified against `class_teacher_sub`. Unauthorized class/subject returns HTTP 403.
  - Admin can upload any class/subject.
- **Request Body:**
```json
{
  "user_id": "techshining23",
  "class": "I A",
  "subject": "EVS",
  "session": "2026-2027",
  "description": "Term 1 Environmental Studies",
  "remark": "Milestone 1",
  "chapters": [
    {
      "chapter_no": "1",
      "chapter_name": "My Family",
      "topics": ["Parents", "Siblings"]
    }
  ]
}
```

#### `GET /api/syllabus/get_syllabus.php`
- **Role-based behavior:**
  - `role=subject_teacher&user_id=techshining23`: Returns only syllabus created by `techshining23`.
  - `role=class_teacher&user_id=techshining23`: Returns all subjects for the assigned class (e.g. `I A`).
  - `user_id=admin&class=I A`: Returns all syllabi for class `I A` with optional teacher filtering.

---

### Module 3: Student Reports & Advanced Search

#### `GET /api/get_student.php`

| Parameter | Type | Purpose | Example |
| :--- | :--- | :--- | :--- |
| `session` | string | Academic Session | `2026-2027` |
| `search` or `q` | string | Simultaneous multi-field search (Name, Mobile, Scholar No, Roll No, ID) | `PRAJAPATI` |
| `scholar_no` | string | Exact Scholar No search | `4010` |
| `min_age` / `max_age` | integer | Age Range Filter (dynamically computed from DOB) | `min_age=5&max_age=12` |
| `age` | integer | Exact Age Filter | `age=7` |
| `address` / `city` / `pincode` | string | Address / Area Filter | `city=RAISEN` |
| `gender` | string | Gender Filter (`male` / `female`) | `gender=female` |
| `category` | string | Caste Category (`GENERAL`, `OBC`, `SC`, `ST`, `Minority`, `RTE`) | `category=OBC` |
| `rte` | string | RTE Filter (`1` or `Yes`) | `rte=1` |
| `new_student` | string | New Student Filter (`1` or `New`) | `new_student=1` |
| `group_by` | string | Grouping summary mode (`gender`, `caste`, `class`, `age`) | `group_by=caste` |
| `count_only` | string | Return only counts without loading individual student objects | `count_only=1` |

- **Sample Response (Individual Students):**
```json
{
  "status": true,
  "total": 1,
  "users": [
    {
      "student_id": "1314",
      "scholar_no": "4010",
      "student_name": "VISHWASH PRAJAPATI",
      "student_fname": "RAMESH PRAJAPATI",
      "student_class": "VIII A",
      "student_gender": "male",
      "student_dob": "12-04-2012",
      "age": 14,
      "caste": "OBC",
      "rti": "No",
      "std_type": "Old",
      "student_contactno": "9876543210",
      "student_address": "Raisen MP",
      "home_town": "RAISEN",
      "pn": "464001"
    }
  ]
}
```

- **Sample Response (`group_by=caste&count_only=1`):**
```json
{
  "status": true,
  "total": 945,
  "group_by": "caste",
  "grouped_counts": {
    "GENERAL": 131,
    "OBC": 548,
    "RTE": 125,
    "SC": 110,
    "ST": 26
  }
}
```

---

### Module 4: Student Documents API

#### `GET /api/get_student_documents.php?student_id=1314&session=2026-2027`
Includes `scholar_no` in the student details response payload:
```json
{
  "success": true,
  "message": "Documents fetched successfully",
  "data": {
    "student_id": "1314",
    "scholar_no": "4010",
    "student_name": "VISHWASH PRAJAPATI",
    "session": "2026-2027",
    "documents": { ... }
  }
}
```

---

### Module 5: Student Admission Creation

#### `POST /api/store_admission.php`
- **Supported Fields:** `student_name`, `scholar_no`, `student_class`, `student_section`, `student_session`, `student_dob`, `student_doj`, `student_gender`, `student_fname`, `m_name`, `student_contactno`, `alt_no`, `caste`, `caste_no`, `student_address`, `home_town`, `pn`, `apaar`, `pen`, `family_id`, `bank_name`, `acc_holder`, `fid` (IFSC), `income`, `school_type`, `rti`, `addmisionfee`, `student_img`.
- **Response:** HTTP 201 with newly generated sequential `student_id` and standard `uid` (`smrt<school><student_id>`).

---

### Module 6: Student Details Full Update

#### `POST /api/student_update.php`
- **Authorization:** Class Teachers can only update students belonging to their assigned class (`class_teacher` table). Unauthorized updates return HTTP 403 Forbidden. Admins can update any student.
- **Request Body:**
```json
{
  "user_id": "admin",
  "student_id": "1314",
  "session": "2026-2027",
  "student_address": "New House No 45, Raisen",
  "student_contactno": "9988776655",
  "apaar": "APAAR998877",
  "pen": "PEN11223344",
  "family_id": "FAM554433",
  "bank_name": "State Bank of India",
  "income": "250000"
}
```

---

### Module 7: Copy Collection CRUD & Copy View Report

#### 1. Store / Bulk Collection: `POST /api/copy_collection/store_copy_collection.php`
```json
{
  "class": "I A",
  "exam": "JULY TEST",
  "subject": "English",
  "session": "2026-2027",
  "date": "06-08-2026",
  "attendance": {
    "1706": "absent",
    "1561": "absent",
    "1447": "present"
  }
}
```

#### 2. Get / Filter List: `GET /api/copy_collection/get_copy_collection.php`
- **Parameters:** `class`, `exam`, `subject`, `session`, `student_id`, `date`.

#### 3. Update Record: `POST /api/copy_collection/update_copy_collection.php`
```json
{
  "id": 185,
  "status": "absent",
  "rmk": "Sick on exam day"
}
```

#### 4. Delete Record: `POST /api/copy_collection/delete_copy_collection.php`
- Single delete: `{"id": 185}`
- Bulk clear: `{"class": "I A", "exam": "JULY TEST", "subject": "English", "session": "2026-2027"}`

#### 5. Copy View Report: `GET /api/copy_collection/copy_view_report.php`
- **Query Parameters:** `class=I A&exam=JULY TEST&subject=English&session=2026-2027`
- **Sample Output:**
```json
{
  "status": true,
  "data": {
    "exam_info": {
      "class": "I A",
      "exam": "JULY TEST",
      "subject": "English",
      "session": "2026-2027",
      "school_title": "Shining Middle School Raisen (M.P.)",
      "generated_at": "01-09-2026 12:00:00"
    },
    "summary": {
      "total_students": 32,
      "total_collected_copies": 30,
      "total_absent_copies": 2,
      "collection_percentage": 93.75
    },
    "students": [
      {
        "sr_no": 1,
        "student_id": "1447",
        "student_name": "Aarav Sharma",
        "father_name": "Ramesh Sharma",
        "scholar_no": "3101",
        "roll_no": "101",
        "class": "I A",
        "section": "A",
        "status": "Present",
        "is_collected": true,
        "remark": "",
        "date": "06-08-2026"
      },
      {
        "sr_no": 2,
        "student_id": "1706",
        "student_name": "Ananya Verma",
        "father_name": "Suresh Verma",
        "scholar_no": "3102",
        "roll_no": "102",
        "class": "I A",
        "section": "A",
        "status": "Absent",
        "is_collected": false,
        "remark": "Sick on exam date",
        "date": "06-08-2026"
      }
    ]
  }
}
```
