create DATABASE if not EXISTS quan_ly_web_phim;
-- 1.phim
--     id: varchar
--     tenPhim: varchar
--     namPhatHanh: date
--     tuoi: int
--     thoiLuong: varchar
--     quocGia: varchar
--     theLoai: varchar
--     poster:
--     tập phim
--     dạo diễn
--     diễn viên
    số tập
-- 2.người dùng
--     id
--     tên
--     tuổi
--     địa chỉ
--     số điện thoại
--     gmail
--     gói đăng kí
--     mật khẩu
-- 3.thể loại
--     id
--     ten
-- 4.quốc gia
--     châu á
--     châu âu
--     châu mỹ
--     châu phi
--     châu nam cực
-- 5.tập phim
--     tập 1
--     tập 2
--     ...
--     tập n
-- 6. quyen
    -- id
    -- quyen
9. phim
    id
    ten
7.dien_vien
    id 
    ten
8.phim_dien_vien
    id
    phim id
    dien vien id
create TABLE phim{
    id varchar PRIMARY KEY,
    ten_phim varchar,
    nam_phat_hanh date,
    tuoi int,
    thoi_luong int,
    quoc_gia varchar,
    the_loai varchar,
    poster varchar,
    tap_phim varchar,
    dao_dien_id int,
}
create TABLE user{
    id varchar PRIMARY KEY,
    ten varchar(50),
    tuoi int,
    dia_chi varchar,
    sdt varchar,
    gmail varchar,
    goi_dang_ki varchar,
    user varchar,
    passwowd varchar,
    quyen_id int,
    ngay_sinh datetime
    }
create TABLE the_loai{
    id varchar PRIMARY KEY,
    the_loai varchar,
}
create TABLE quyen_id{
    id int;
    quyen varchar;
}
