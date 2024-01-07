// Lấy liên kết "QUYẾT ĐỊNH" bằng ID
let quyetDinhLink = document.querySelector(".quyet-dinh-link");
let lyLichLink = document.querySelector(".ly-lich-link");

// Lấy các phần tử thông tin gia đình và thông tin cá nhân bằng ID
let thongTinGiaDinh = document.querySelector(".family-info");

let thongTinCaNhan = document.querySelector(".my-info");

// Xử lý sự kiện khi nhấn vào liên kết "QUYẾT ĐỊNH"
quyetDinhLink.addEventListener("click", function (event) {
  event.preventDefault();
  thongTinGiaDinh.style.display = "none";
  thongTinCaNhan.style.display = "none";
  quyetDinhLink.classList.add("item-navbar--active");
  lyLichLink.classList.remove("item-navbar--active");
});

// Xử lý sự kiện khi nhấn vào liên kết "Lý lịch"
lyLichLink.addEventListener("click", function (event) {
  event.preventDefault();
  thongTinGiaDinh.style.display = "block";
  thongTinCaNhan.style.display = "block";
  quyetDinhLink.classList.remove("item-navbar--active");
  lyLichLink.classList.add("item-navbar--active");
});
