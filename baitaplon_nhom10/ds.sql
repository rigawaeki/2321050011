CREATE DATABASE IF NOT EXISTS quan_ly_khach_san;
USE quan_ly_khach_san;
DROP TABLE IF EXISTS don_dat;
DROP TABLE IF EXISTS phong;
DROP TABLE IF EXISTS nguoi_dung;
DROP TABLE IF EXISTS loai_phong;
DROP TABLE IF EXISTS vai_tro;

-- 1. Bảng Vai trò (Roles)
CREATE TABLE IF NOT EXISTS vai_tro (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ten_vai_tro VARCHAR(50) NOT NULL 
);

-- 2. Bảng Loại Phòng (MỚI)
CREATE TABLE IF NOT EXISTS loai_phong (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ten_loai VARCHAR(50) NOT NULL, -- VD: Deluxe, Suite, Standard
    mo_ta_loai TEXT -- Mô tả chung cho loại phòng này
);

-- 3. Bảng Người dùng (Users)
CREATE TABLE IF NOT EXISTS nguoi_dung (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ten_dang_nhap VARCHAR(50) UNIQUE NOT NULL,
    mat_khau VARCHAR(255) NOT NULL,
    ho_va_ten VARCHAR(100),
    ngay_sinh DATETIME,
    dia_chi TEXT,
    so_dien_thoai VARCHAR(15),
    gmail VARCHAR(100) UNIQUE,
    vai_tro_id INT,
    FOREIGN KEY (vai_tro_id) REFERENCES vai_tro(id)
);

-- 4. Bảng Phòng (Sửa loai_phong thành loai_phong_id)
CREATE TABLE IF NOT EXISTS phong (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ten_phong VARCHAR(100) NOT NULL,
    loai_phong_id INT, -- Khóa phụ trỏ tới bảng loai_phong
    so_luong_nguoi INT,
    tang INT,
    hoat_dong BOOLEAN DEFAULT TRUE,
    poster VARCHAR(255), 
    mo_ta TEXT, 
    gia DECIMAL(15, 0),
    FOREIGN KEY (loai_phong_id) REFERENCES loai_phong(id)
);

-- 5. Bảng Đặt phòng
CREATE TABLE IF NOT EXISTS don_dat (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    room_id INT,
    ngay_dat TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    thoi_gian_nhan_phong DATETIME NOT NULL,
    thoi_gian_tra_phong DATETIME NOT NULL,
    FOREIGN KEY (user_id) REFERENCES nguoi_dung(id),
    FOREIGN KEY (room_id) REFERENCES phong(id)
);
ALTER TABLE don_dat
ADD COLUMN trang_thai_thanh_toan_id INT DEFAULT 1,
ADD COLUMN tong_tien DECIMAL(15, 2) DEFAULT 0,
-- Tạo liên kết (Khóa ngoại) để đảm bảo dữ liệu chặt chẽ
ADD CONSTRAINT fk_don_dat_trang_thai 
FOREIGN KEY (trang_thai_thanh_toan_id) REFERENCES trang_thai_thanh_toan(id);