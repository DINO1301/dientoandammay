CREATE DATABASE IF NOT EXISTS tudien;
USE tudien;

CREATE TABLE words (
    id INT AUTO_INCREMENT PRIMARY KEY,
    english VARCHAR(100),
    vietnamese VARCHAR(100)
);

INSERT INTO words (english, vietnamese) VALUES
('hello', 'xin chào'),
('goodbye', 'tạm biệt'),
('dog', 'con chó'),
('cat', 'con mèo'),
('computer', 'máy tính'),
('book', 'quyển sách'),
('love', 'tình yêu'),
('teacher', 'giáo viên'),
('student', 'học sinh'),
('car', 'xe hơi');
