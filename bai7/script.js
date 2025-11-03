let danhSachPhim =[
{
    id: 1,
    tenPhim: "Mưa đỏ",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong:2,
    quocGia: "Việt Nam",
    poster: "../Picture/640x396-muado.jpg" ,
    theLoai: "Phim Chiếu Rạp"

},
{
    id: 2, 
    tenPhim: "Conan",
    namPhatHanh: 2023,
    tuoi: 10,
    thoiLuong: 1.5,
    quocGia: "Nhật Bản",
    poster: "../Picture/anh1 tapthe.jpg" ,
    theLoai: "Phim Chiếu Rạp"
}
]
let phimHienTai =danhSachPhim[0];

let banner = document.getElementsByClassName('img_mainbanner2')[0];

function chonPhim(idPhim){
    
    for (let index = 0; index < danhSachPhim.length; index++) {
        if(danhSachPhim[index].id==idPhim){
            banner.src =  danhSachPhim[index].poster;
        }
    }
    debugger
    
}