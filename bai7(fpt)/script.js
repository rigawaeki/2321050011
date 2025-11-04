let danhSachPhim =[
{
    id: 1,
    tenPhim: "Mưa đỏ",
    namPhatHanh: 2025,
    tuoi: 16,
    thoiLuong:2,
    quocGia: "Việt Nam",
    poster: "./Picture/640x396-muado.jpg" ,
    theLoai: "Phim Chiếu Rạp",
    link: "https://www.youtube.com/watch?v=BD6PoZJdt_M",
},
{
    id: 2, 
    tenPhim: "Conan",
    namPhatHanh: 2023,
    tuoi: 10,
    thoiLuong: 1.5,
    quocGia: "Nhật Bản",
    poster: "./Picture/conan.jpg" ,
    theLoai: "Phim Chiếu Rạp",
    link: "https://www.youtube.com/watch?v=dz5mN-iIC4g",
}
]
let phimHienTai =danhSachPhim[0];

let banner = document.getElementsByClassName('img_mainbanner2')[0];

let trailer = document.getElementById('trailer');
let trailer1 = document.getElementById('trailer1');
let trailer2 = document.getElementById('trailer2');
let trailer3 = document.getElementById('trailer3');
let trailer4 = document.getElementById('trailer4');
function chonPhim(idPhim){
    
    for (let index = 0; index < danhSachPhim.length; index++) {
        if(danhSachPhim[index].id==idPhim){
            banner.src =  danhSachPhim[index].poster;
            trailer.innerText = danhSachPhim[index].tenPhim;
            trailer1.innerText = danhSachPhim[index].tuoi;
            trailer2.innerText = danhSachPhim[index].thoiLuong;
            trailer3.innerText = danhSachPhim[index].quocGia;
            trailer4.href = danhSachPhim[index].link;
            trailer4.innerText = danhSachPhim[index].tenPhim;
            debugger
        }
    }
    debugger
    
}
//hoan thien va lam them 