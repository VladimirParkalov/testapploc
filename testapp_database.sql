CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL
);

CREATE TABLE Courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    start_date DATETIME
);

CREATE TABLE students_courses (
    id_student INT NOT NULL,
    id_course INT NOT NULL,
    PRIMARY KEY (id_student, id_course),
    FOREIGN KEY student_key(id_student) REFERENCES students(id),
    FOREIGN KEY course_key(id_course) REFERENCES courses(id)
);

CREATE TABLE teachers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_name VARCHAR(255),
    UNIQUE KEY (teacher_name)
);

CREATE TABLE teachers_courses (
    id_teacher INT NOT NULL,
    id_course INT NOT NULL,
    PRIMARY KEY (id_teacher, id_course),
    FOREIGN KEY teacher_key(id_teacher) REFERENCES teachers(id),
    FOREIGN KEY teacher_course_key(id_course) REFERENCES courses(id)
);