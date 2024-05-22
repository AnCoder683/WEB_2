-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 22, 2024 lúc 07:24 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashionstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idChiTietDonHang` varchar(10) NOT NULL,
  `idDonHang` varchar(10) DEFAULT NULL,
  `idChiTietSanPham` varchar(10) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `giaTien` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bẫy `chitietdonhang`
--
DELIMITER $$
CREATE TRIGGER `generate_idChiTietDonHang` BEFORE INSERT ON `chitietdonhang` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'ChiTietDonHang');
    SET NEW.idChiTietDonHang = CONCAT('CTDH', LPAD(@next_id, 4, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'ChiTietDonHang';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonnhap`
--

CREATE TABLE `chitietdonnhap` (
  `idChiTietDonNhap` varchar(10) NOT NULL,
  `idDonNhap` varchar(10) DEFAULT NULL,
  `idChiTietSanPham` varchar(10) DEFAULT NULL,
  `giaTien` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bẫy `chitietdonnhap`
--
DELIMITER $$
CREATE TRIGGER `generate_idChiTietDonNhap` BEFORE INSERT ON `chitietdonnhap` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'ChiTietDonNhap');
    SET NEW.idChiTietDonNhap = CONCAT('CTDN', LPAD(@next_id, 4, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'ChiTietDonNhap';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `idChiTietGioHang` int(11) NOT NULL,
  `idGioHang` int(10) NOT NULL,
  `idChiTietSanPham` varchar(10) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`idChiTietGioHang`, `idGioHang`, `idChiTietSanPham`, `soLuong`) VALUES
(1, 1, 'CTSP001', 1),
(2, 1, 'CTSP002', 1),
(12, 7, 'CTSP009', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `idChiTietSanPham` varchar(10) NOT NULL,
  `idSanPham` varchar(10) NOT NULL,
  `idMau` varchar(10) NOT NULL,
  `idSize` varchar(5) NOT NULL,
  `soLuong` int(250) NOT NULL,
  `imgPath` varchar(50) NOT NULL,
  `tt_xoa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`idChiTietSanPham`, `idSanPham`, `idMau`, `idSize`, `soLuong`, `imgPath`, `tt_xoa`) VALUES
('CTSP001', 'SP001', 'M001', 'S001', 5, 'ao_so_mi_nam_den_size_S.jpg', 0),
('CTSP002', 'SP001', 'M002', 'S002', 5, 'ao_so_mi_nam_trang_size_M.jpg', 0),
('CTSP003', 'SP002', 'M003', 'S003', 5, 'ao_thun_nu_xanh_size_L.jpg', 0),
('CTSP004', 'SP002', 'M004', 'S004', 5, 'ao_thun_nu_do_size_XL.jpg', 0),
('CTSP005', 'SP003', 'M001', 'S002', 5, 'quan_jeans_nam_den_size_M.jpg', 0),
('CTSP006', 'SP003', 'M002', 'S003', 5, 'quan_jeans_nam_trang_size_L.jpg', 0),
('CTSP007', 'SP004', 'M001', 'S004', 5, 'quan_legging_nu_den_size_XL.jpg', 0),
('CTSP008', 'SP004', 'M002', 'S003', 5, 'quan_legging_nu_trang_size_L.jpg', 0),
('CTSP009', 'SP005', 'M003', 'S005', 5, 'giay_the_thao_nam_xanh_size_43.jpg', 0),
('CTSP010', 'SP005', 'M004', 'S005', 5, 'giay_the_thao_nam_do_size_45.jpg', 0),
('CTSP011', 'SP006', 'M001', 'S004', 5, 'giay_cao_got_nu_den_size_XL.jpg', 0),
('CTSP012', 'SP006', 'M002', 'S003', 5, 'giay_cao_got_nu_trang_size_L.jpg', 0),
('CTSP013', 'SP007', 'M003', 'S005', 5, 'ao_khoac_nam_xanh_size_XXL.jpg', 0),
('CTSP014', 'SP007', 'M004', 'S005', 5, 'ao_khoac_nam_do_size_XL.jpg', 0),
('CTSP015', 'SP008', 'M001', 'S001', 5, 'ao_len_nu_den_size_S.jpg', 0),
('CTSP016', 'SP008', 'M002', 'S002', 5, 'ao_len_nu_trang_size_M.jpg', 0),
('CTSP017', 'SP009', 'M003', 'S003', 5, 'quan_kaki_nam_xanh_size_L.jpg', 0),
('CTSP018', 'SP009', 'M004', 'S004', 5, 'quan_kaki_nam_do_size_XL.jpg', 0),
('CTSP019', 'SP010', 'M001', 'S003', 5, 'quan_short_nu_den_size_L.jpg', 0),
('CTSP020', 'SP010', 'M002', 'S004', 5, 'quan_short_nu_trang_size_XL.jpg', 0),
('CTSP021', 'SP062', 'M003', 'S003', 5, '6644e33003db9_cf7bf4bc26dd4dc9b801354b8e4b8148_opt', 0),
('CTSP022', 'SP063', 'M003', 'S004', 5, '6644e3e97cb5e_', 0),
('CTSP023', 'SP063', 'M003', 'S003', 5, '6644e3e97d34c_sp1.webp', 0),
('CTSP025', 'SP064', 'M004', 'S002', 5, '6644e47889ff9_sp1.webp', 0),
('CTSP026', 'SP001', 'M002', 'S003', 5, '', 0),
('CTSP027', 'SP066', 'M003', 'S002', 0, '6647f7729762b_', 0),
('CTSP028', 'SP067', 'M003', 'S002', 0, '6647f774016f5_', 0),
('CTSP029', 'SP068', 'M004', 'S003', 0, '6647f823493c2_', 0),
('CTSP030', 'SP069', 'M004', 'S003', 0, '6647f8241565f_', 0),
('CTSP031', 'SP070', 'M001', 'S003', 0, '6647f85c63e02_', 0),
('CTSP032', 'SP071', 'M003', 'S002', 0, '6647f941f0870_', 0),
('CTSP036', 'SP074', 'M003', 'S003', 0, '6648140969c24_', 0);

--
-- Bẫy `chitietsanpham`
--
DELIMITER $$
CREATE TRIGGER `id_generateChiTietSanPham` BEFORE INSERT ON `chitietsanpham` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'ChiTietSanPham');
    SET NEW.idChiTietSanPham = CONCAT('CTSP', LPAD(@next_id, 3, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'ChiTietSanPham';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateSoLuongSP_after_delete` AFTER DELETE ON `chitietsanpham` FOR EACH ROW BEGIN
  -- Update total quantity after delete
  UPDATE `sanpham`
  SET `soLuongTrongKho` = (SELECT SUM(`soLuong`) FROM `chitietsanpham` WHERE `idSanPham` = OLD.`idSanPham`)
  WHERE `idSanPham` = OLD.`idSanPham`;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateSoLuongSP_after_insert` AFTER INSERT ON `chitietsanpham` FOR EACH ROW BEGIN
  -- Update total quantity after insert
  UPDATE `sanpham`
  SET `soLuongTrongKho` = (SELECT SUM(`soLuong`) FROM `chitietsanpham` WHERE `idSanPham` = NEW.`idSanPham`)
  WHERE `idSanPham` = NEW.`idSanPham`;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateSoLuongSP_after_update` AFTER UPDATE ON `chitietsanpham` FOR EACH ROW BEGIN
  -- Update total quantity after update
  UPDATE `sanpham`
  SET `soLuongTrongKho` = (SELECT SUM(`soLuong`) FROM `chitietsanpham` WHERE `idSanPham` = NEW.`idSanPham`)
  WHERE `idSanPham` = NEW.`idSanPham`;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `idChucNang` varchar(10) NOT NULL,
  `tenChucNang` varchar(20) DEFAULT NULL,
  `codeChucNang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`idChucNang`, `tenChucNang`, `codeChucNang`) VALUES
('CN001', 'quanlysanpham', NULL),
('CN002', 'quanlydanhmucsanpham', NULL),
('CN003', 'quanlydonhang', NULL),
('CN004', 'quanlynhaphang', NULL),
('CN005', 'quanlytaikhoan', NULL),
('CN006', 'muahang', NULL),
('CN007', 'quanlykhachhang', NULL),
('CN008', 'quanlythongke', ''),
('CN010', 'phasan', NULL);

--
-- Bẫy `chucnang`
--
DELIMITER $$
CREATE TRIGGER `id_generateChucNang` BEFORE INSERT ON `chucnang` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'ChucNang');
    SET NEW.idChucNang = CONCAT('CN', LPAD(@next_id, 3, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'ChucNang';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctq_cn`
--

CREATE TABLE `ctq_cn` (
  `idChiTietQuyenChucNang` varchar(50) NOT NULL,
  `idQuyen` varchar(50) DEFAULT NULL,
  `idChucNang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ctq_cn`
--

INSERT INTO `ctq_cn` (`idChiTietQuyenChucNang`, `idQuyen`, `idChucNang`) VALUES
('CTQCN001', 'Q001', 'CN005'),
('CTQCN002', 'Q002', 'CN001'),
('CTQCN003', 'Q002', 'CN002'),
('CTQCN004', 'Q002', 'CN005'),
('CTQCN005', 'Q002', 'CN003'),
('CTQCN006', 'Q002', 'CN004'),
('CTQCN007', 'Q002', 'CN008'),
('CTQCN008', 'Q003', 'CN003'),
('CTQCN009', 'Q001', 'CN010');

--
-- Bẫy `ctq_cn`
--
DELIMITER $$
CREATE TRIGGER `generate_idCTQCN` BEFORE INSERT ON `ctq_cn` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'CTQCN');
    SET NEW.idChiTietQuyenChucNang = CONCAT('CTQCN', LPAD(@next_id, 3, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'CTQCN';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idDonHang` varchar(10) NOT NULL,
  `tongTienHang` float DEFAULT NULL,
  `phiVanChuyen` float DEFAULT NULL,
  `giamGia` float DEFAULT NULL,
  `ngayDat` date DEFAULT NULL,
  `thanhTien` int(11) DEFAULT NULL,
  `trangThai` varchar(30) NOT NULL,
  `idKhachHang` varchar(30) DEFAULT NULL,
  `idNhanVien` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idDonHang`, `tongTienHang`, `phiVanChuyen`, `giamGia`, `ngayDat`, `thanhTien`, `trangThai`, `idKhachHang`, `idNhanVien`) VALUES
('DH0001', 1, 1, 1, '0000-00-00', 1, '1', NULL, NULL),
('DH0002', 2700000, 0, 0, '2024-05-17', 2700000, 'Chờ nhận hàng', 'kh123', ''),
('DH0003', 700000, 0, 0, '2024-05-17', 700000, 'Chờ nhận hàng', 'kh123', 'quanly'),
('DH0004', 850000, 0, 0, '2024-05-17', 850000, 'Chờ nhận hàng', 'kh123', 'quanly'),
('DH0005', 400000, 0, 0, '2024-05-18', 400000, 'Chờ nhận hàng', 'kh123', 'quanly'),
('DH0006', 2000000, 10000, NULL, '2024-05-18', 210000, 'hoanthanh', 'KH001', 'NV001'),
('DH0007', 1500000, 12000, 5000, '2024-05-17', 1507000, 'hoanthanh', 'KH002', 'NV002'),
('DH0008', 1800000, 15000, NULL, '2024-05-16', 1815000, 'hoanthanh', 'KH003', 'NV003'),
('DH0009', 2200000, 8000, 10000, '2024-05-15', 2198000, 'hoanthanh', 'KH004', 'NV004'),
('DH0010', 1750000, 5000, 2000, '2024-05-14', 1753000, 'hoanthanh', 'KH005', 'NV005'),
('DH0011', 1600000, 10000, NULL, '2024-05-13', 1610000, 'hoanthanh', 'KH006', 'NV006'),
('DH0012', 2100000, 12000, 5000, '2024-05-12', 2107000, 'hoanthanh', 'KH007', 'NV007'),
('DH0013', 1950000, 9000, 1000, '2024-05-11', 1949000, 'hoanthanh', 'KH008', 'NV008'),
('DH0014', 2000000, 11000, 3000, '2024-05-10', 2008000, 'hoanthanh', 'KH009', 'NV009'),
('DH0015', 2300000, 13000, 7000, '2024-05-09', 2316000, 'hoanthanh', 'KH010', 'NV010'),
('DH0016', 2500000, 15000, 8000, '2024-05-08', 2522000, 'hoanthanh', 'KH011', 'NV011'),
('DH0017', 1700000, 5000, NULL, '2024-05-07', 1705000, 'hoanthanh', 'KH012', 'NV012'),
('DH0018', 1850000, 6000, 2000, '2024-05-06', 1848000, 'hoanthanh', 'KH013', 'NV013'),
('DH0019', 1900000, 7000, 1000, '2024-05-05', 1897000, 'hoanthanh', 'KH014', 'NV014'),
('DH0020', 2400000, 10000, 5000, '2024-05-04', 2405000, 'hoanthanh', 'KH015', 'NV015'),
('DH0021', 2100000, 8000, NULL, '2024-05-03', 2108000, 'hoanthanh', 'KH016', 'NV016'),
('DH0022', 1950000, 9000, 3000, '2024-05-02', 1966000, 'hoanthanh', 'KH017', 'NV017'),
('DH0023', 1800000, 11000, 2000, '2024-05-01', 1819000, 'hoanthanh', 'KH018', 'NV018'),
('DH0024', 2000000, 12000, 5000, '2024-04-30', 2017000, 'hoanthanh', 'KH019', 'NV019'),
('DH0025', 2200000, 15000, NULL, '2024-04-29', 2215000, 'hoanthanh', 'KH020', 'NV020'),
('DH0026', 2300000, 14000, 3000, '2024-04-28', 2311000, 'hoanthanh', 'KH021', 'NV021'),
('DH0027', 2500000, 10000, 7000, '2024-04-27', 2503000, 'hoanthanh', 'KH022', 'NV022'),
('DH0028', 13040000, 0, 0, '2024-05-18', 13040000, 'Chờ nhận hàng', 'kh123', '');

--
-- Bẫy `donhang`
--
DELIMITER $$
CREATE TRIGGER `generate_idDonHang` BEFORE INSERT ON `donhang` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'DonHang');
    SET NEW.idDonHang = CONCAT('DH', LPAD(@next_id, 4, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'DonHang';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donnhap`
--

CREATE TABLE `donnhap` (
  `idDonNhap` varchar(10) NOT NULL,
  `tongTienNhap` float DEFAULT NULL,
  `phiVanChuyen` float DEFAULT NULL,
  `thanhTien` float DEFAULT NULL,
  `idNhaCungCap` varchar(10) DEFAULT NULL,
  `idNhanVien` varchar(30) DEFAULT NULL,
  `tinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donnhap`
--

INSERT INTO `donnhap` (`idDonNhap`, `tongTienNhap`, `phiVanChuyen`, `thanhTien`, `idNhaCungCap`, `idNhanVien`, `tinhTrang`) VALUES
('DN0001', 500, 20, 520, 'NCC001', 'NV001', 'Hoàn thành'),
('DN0002', 750, 30, 780, 'NCC002', 'NV002', 'Hoàn thành'),
('DN0003', 1000, 50, 1050, 'NCC003', 'NV003', 'Hoàn thành'),
('DN0004', 600, 25, 625, 'NCC002', 'NV004', 'Hoàn thành'),
('DN0005', 0, 1000, 1000, 'NCC002', '', 'Chờ nhận hàng'),
('DN0006', 0, 0, 0, 'NCC002', '', 'Chưa xác nhận');

--
-- Bẫy `donnhap`
--
DELIMITER $$
CREATE TRIGGER `generate_idDonNhap` BEFORE INSERT ON `donnhap` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'DonNhap');
    SET NEW.idDonNhap = CONCAT('DN', LPAD(@next_id, 4, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'DonNhap';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `idGioHang` int(10) NOT NULL,
  `idKhachHang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idGioHang`, `idKhachHang`) VALUES
(1, 'kh1'),
(7, 'kh10'),
(6, 'kh123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `idcounter`
--

CREATE TABLE `idcounter` (
  `TableName` varchar(255) NOT NULL,
  `NextId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `idcounter`
--

INSERT INTO `idcounter` (`TableName`, `NextId`) VALUES
('ChiTietDonHang', 1),
('ChiTietDonNhap', 1),
('ChiTietPhanQuyen ', 1),
('ChiTietSanPham', 37),
('ChucNang', 11),
('ConNguoi', 6),
('CTQCN', 10),
('DonHang', 29),
('DonNhap', 7),
('KhachHang', 1),
('LoaiSanPham', 27),
('Mau', 6),
('NhanVien', 1),
('PhanQuyenNguoiDung', 1),
('QuanLyKho', 1),
('Quyen', 1),
('SanPham', 75),
('Size', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `idKhachHang` varchar(30) NOT NULL,
  `ten` varchar(20) DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gioiTinh` int(1) DEFAULT NULL,
  `ngaySinh` date DEFAULT NULL,
  `diaChiGiaoHang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`idKhachHang`, `ten`, `SDT`, `email`, `gioiTinh`, `ngaySinh`, `diaChiGiaoHang`) VALUES
('1awdasd', 'asdasd', '0798899720', 'thuan0@gmail.com', 0, '0000-00-00', ''),
('kh1', '', '', '', 0, '0000-00-00', ''),
('kh10', 'nguyen van a', '0798899720', 'thuan0@gmail.com', 0, '0000-00-00', ''),
('kh123', 'nguyen nhan vien', '0123456780', 'thuan0@gmail.com', 0, '0000-00-00', ''),
('kh3', '1', '1', 'thuan0@gmail.com', 0, '0000-00-00', ''),
('NV001', 'Nguyễn Văn A', '0798899720', 'test@gmail.com', 1, '2013-10-01', '273 an duong vuong\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `idLoaiSanPham` varchar(50) NOT NULL,
  `tenLoai` varchar(255) DEFAULT NULL,
  `tt_xoa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`idLoaiSanPham`, `tenLoai`, `tt_xoa`) VALUES
('CAT001', 'Áo', 1),
('CAT002', 'Quần', 1),
('CAT003', 'Giàys', 1),
('CAT005', 'Nón', 0),
('CAT025', 'dép', 1);

--
-- Bẫy `loaisanpham`
--
DELIMITER $$
CREATE TRIGGER `id_generateLoaiSanPham` BEFORE INSERT ON `loaisanpham` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'LoaiSanPham');
    SET NEW.idLoaiSanPham = CONCAT('CAT', LPAD(@next_id, 3, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'LoaiSanPham';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `idMau` varchar(10) NOT NULL,
  `tenMau` varchar(20) NOT NULL,
  `tt_xoa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mau`
--

INSERT INTO `mau` (`idMau`, `tenMau`, `tt_xoa`) VALUES
('M001', 'Đen', 1),
('M002', 'Trắng', 1),
('M003', 'Xanh', 1),
('M004', 'Đỏ', 1),
('M005', 'Vàng', 1);

--
-- Bẫy `mau`
--
DELIMITER $$
CREATE TRIGGER `id_generateMau` BEFORE INSERT ON `mau` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'Mau');
    SET NEW.idMau = CONCAT('M', LPAD(@next_id, 3, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'Mau';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `idNhaCungCap` varchar(10) NOT NULL,
  `tenNhaCungCap` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `SDT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`idNhaCungCap`, `tenNhaCungCap`, `email`, `SDT`) VALUES
('NCC001', 'Công ty Quần Áo 1', 'email1@example.com', '0123456789'),
('NCC002', 'Công ty Quần Áo 2', 'email2@example.com', '0987654321'),
('NCC003', 'Công ty Quần Áo 3', 'email3@example.com', '0369852147');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idNhanVien` varchar(30) NOT NULL,
  `tenNhanVien` varchar(30) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SDT` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idNhanVien`, `tenNhanVien`, `SDT`, `email`) VALUES
('', '', '', ''),
('admin', 'Quản trị viên', '0798899720', 'thuan@gmail.com'),
('admin123', 'nguyen van a', '0798899720', 'thuan03082003@gmail.com'),
('admin23', NULL, NULL, NULL),
('NV001', 'nguyen', '07934512', '123123'),
('NV002', 'Nguyễn Thị A', '12345678', 'thuan@gmail.com'),
('NV003', 'Trần Văn C', '123145671', 'thuan@gmail.com'),
('NV004', 'Lê Văn D', '123445678', 'vand@gmail.com'),
('nv1', '', '', ''),
('nv10', 'nguyen ten', '0798899720', 'thuan0@gmail.com'),
('nv123', 'nguyen nhan vien', '0123456780', 'thuan0@gmail.com'),
('quanly', 'Quản lý T', '0798899720', 'thuan@gmail.com'),
('quanly2', 'Nguyễn Văn A', '0798899720', 'thuan03082003@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quanlykho`
--

CREATE TABLE `quanlykho` (
  `idQuanLyKho` varchar(10) NOT NULL,
  `idConNguoi` varchar(10) DEFAULT NULL,
  `idTaiKhoan` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bẫy `quanlykho`
--
DELIMITER $$
CREATE TRIGGER `generate_idQuanLyKho` BEFORE INSERT ON `quanlykho` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'QuanLyKho');
    SET NEW.idQuanLyKho = CONCAT('QLK', LPAD(@next_id, 4, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'QuanLyKho';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `idQuyen` varchar(10) NOT NULL,
  `quyen` varchar(255) DEFAULT NULL,
  `muc_uu_tien` tinyint(4) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`idQuyen`, `quyen`, `muc_uu_tien`, `role`) VALUES
('Q001', 'Admin', 1, 'admin'),
('Q002', 'QuanLy', 2, 'admin'),
('Q003', 'NhanVien', 3, 'admin'),
('Q004', 'KhachHang', 5, 'user'),
('Q005', 'NhapKho', 3, 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSanPham` varchar(50) NOT NULL,
  `tenSanPham` varchar(255) DEFAULT NULL,
  `giaSanPham` float DEFAULT NULL,
  `giaNhap` float NOT NULL DEFAULT 100000,
  `moTa` varchar(1000) DEFAULT NULL,
  `soLuongTrongKho` int(11) DEFAULT NULL,
  `img` varchar(300) NOT NULL,
  `tt_xoa` tinyint(1) NOT NULL DEFAULT 1,
  `idLoaiSanPham` varchar(50) DEFAULT NULL,
  `phantramloinhuan` int(11) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSanPham`, `tenSanPham`, `giaSanPham`, `giaNhap`, `moTa`, `soLuongTrongKho`, `img`, `tt_xoa`, `idLoaiSanPham`, `phantramloinhuan`) VALUES
('SP001', 'Áo sơ mi nam', 2500000, 100000, 'Áo sơ mi nam dáng slim fit', 15, 'ao4.webp', 0, 'CAT001', 20),
('SP002', 'Áo thun nữaád', 150000, 100000, 'Áo thun nữ thoáng máta', 10, 'sp1.webp', 0, 'CAT001', 20),
('SP003', 'Quần jeans nam', 400000, 100000, 'Quần jeans nam phong cách', 10, 'ao4.webp', 0, 'CAT002', 20),
('SP004', 'Quần legging nữ', 200000, 100000, 'Quần legging nữ thoải mái', 10, 'ao4.webp', 0, 'CAT002', 20),
('SP005', 'Giày thể thao nam', 500000, 100000, 'Giày thể thao nam chạy bộ', 10, 'ao4.webp', 0, 'CAT003', 20),
('SP006', 'Giày cao gót nữ', 450000, 100000, 'Giày cao gót nữ sang trọng', 10, 'sp1.webp', 0, 'CAT003', 20),
('SP007', 'Áo khoác nam', 600000, 100000, 'Áo khoác nam chất lượng cao', 10, 'ao4.webp', 0, 'CAT001', 20),
('SP008', 'Áo len nữ', 350000, 100000, 'Áo len nữ ấm áp', 10, 'ao4.webp', 0, 'CAT001', 20),
('SP009', 'Quần kaki nam', 300000, 100000, 'Quần kaki nam phong cách', 10, 'sp1.webp', 0, 'CAT002', 20),
('SP010', 'Quần short nữ', 180000, 100000, 'Quần short nữ dễ thương', 10, 'ao4.webp', 0, 'CAT002', 20),
('SP062', '1', 0, 100000, ' 1', 5, '6644e3300236c_sp3.webp', 0, 'CAT005', 20),
('SP063', 'áo đẹp mới', 123123, 100000, ' 123', 10, '6644e3e97bb31_asmn1.webp', 0, 'CAT001', 20),
('SP064', 'ád', 1, 100000, ' áo thì đẹp', 5, '6644e47888444_apl1.webp', 0, 'CAT002', 20),
('SP065', NULL, NULL, 100000, NULL, NULL, '66457a2896f25_', 0, NULL, 20),
('SP066', 'ád', 123, 100000, ' 123', 0, '6647f772966b9_cf7bf4bc26dd4dc9b801354b8e4b8148_optimized_original_image.webp', 0, 'CAT002', 20),
('SP067', 'ád', 123, 100000, ' 123', 0, '6647f77400651_cf7bf4bc26dd4dc9b801354b8e4b8148_optimized_original_image.webp', 0, 'CAT002', 20),
('SP068', 'sản phẩm mới', 1000, 100000, ' ád', 0, '6647f82347d68_77ab3bceae124015949c1df535d6ba86_optimized_original_image.webp', 0, 'CAT003', 20),
('SP069', 'sản phẩm mới', 1000, 100000, ' ád', 0, '6647f82414c0d_77ab3bceae124015949c1df535d6ba86_optimized_original_image.webp', 0, 'CAT003', 20),
('SP070', 'ádfsdg', 12312, 100000, ' ádsdf', 0, '6647f85c63169_77ab3bceae124015949c1df535d6ba86_optimized_original_image.webp', 0, 'CAT002', 20),
('SP071', 'sản phẩm mới', 1000000, 100000, ' đá', 0, '6647f941ef9e8_sp2.webp', 0, 'CAT001', 20),
('SP072', 'sssdf', 23442, 100000, ' sđ', NULL, '66480fc1304ef_', 1, 'CAT002', 20),
('SP073', 'adsada', 10000, 100000, ' ád', 0, '66480e813782a_asmn2.webp', 1, 'CAT003', 20),
('SP074', 'sản phẩm mới 2024', 211111, 100000, ' 324324324', 0, '6648140968317_asmn1.webp', 0, 'CAT003', 20);

--
-- Bẫy `sanpham`
--
DELIMITER $$
CREATE TRIGGER `id_generateSanPham` BEFORE INSERT ON `sanpham` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'SanPham');
    SET NEW.idSanPham = CONCAT('SP', LPAD(@next_id, 3, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'SanPham';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `idSize` varchar(10) NOT NULL,
  `tenSize` varchar(10) NOT NULL,
  `tt_xoa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`idSize`, `tenSize`, `tt_xoa`) VALUES
('S001', 'XS', 0),
('S002', 'S', 0),
('S003', 'M', 0),
('S004', 'L', 0),
('S005', 'XL', 0);

--
-- Bẫy `size`
--
DELIMITER $$
CREATE TRIGGER `id_generateSize` BEFORE INSERT ON `size` FOR EACH ROW BEGIN
    DECLARE next_id INT;
    SET @next_id = (SELECT NextId FROM IdCounter WHERE TableName = 'Size');
    SET NEW.idSize = CONCAT('S' ,LPAD(@next_id, 3, '0'));
    UPDATE IdCounter SET NextId = NextId + 1 WHERE TableName = 'Size';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `tenDangNhap` varchar(30) NOT NULL,
  `MatKhau` varchar(255) DEFAULT NULL,
  `tinhTrang` int(1) DEFAULT NULL,
  `idQuyen` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`tenDangNhap`, `MatKhau`, `tinhTrang`, `idQuyen`) VALUES
('', '', 1, 'Q003'),
('1awdasd', '123', 1, 'Q004'),
('admin', 'admin', 1, 'Q001'),
('admin123', '1', 1, 'Q005'),
('admin23', '1', 0, 'Q003'),
('kh1', '2', 1, 'Q003'),
('kh10', '123', 1, 'Q004'),
('kh123', '1', 1, 'Q003'),
('kh3', '2', 1, 'Q003'),
('NV001', '123123', 1, 'Q003'),
('NV002', '123', 1, 'Q003'),
('NV003', '123456', 1, 'Q003'),
('NV004', '456789', 1, 'Q003'),
('nv1', '1', 1, 'Q003'),
('nv10', '123', 1, 'Q003'),
('nv123', '1', 1, 'Q003'),
('quanly', 'quanly', 1, 'Q002'),
('quanly2', '123', 1, 'Q002');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`idChiTietDonHang`),
  ADD UNIQUE KEY `idChiTietSanPham` (`idChiTietSanPham`),
  ADD KEY `idDonHang` (`idDonHang`);

--
-- Chỉ mục cho bảng `chitietdonnhap`
--
ALTER TABLE `chitietdonnhap`
  ADD PRIMARY KEY (`idChiTietDonNhap`),
  ADD KEY `idDonNhap` (`idDonNhap`),
  ADD KEY `idChiTietSanPham` (`idChiTietSanPham`);

--
-- Chỉ mục cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`idChiTietGioHang`),
  ADD KEY `idGioHang` (`idGioHang`),
  ADD KEY `idChiTietSanPham` (`idChiTietSanPham`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`idChiTietSanPham`),
  ADD KEY `idSanPham` (`idSanPham`),
  ADD KEY `idMau` (`idMau`),
  ADD KEY `idSize` (`idSize`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`idChucNang`);

--
-- Chỉ mục cho bảng `ctq_cn`
--
ALTER TABLE `ctq_cn`
  ADD PRIMARY KEY (`idChiTietQuyenChucNang`),
  ADD KEY `idQuyen` (`idQuyen`),
  ADD KEY `idChucNang` (`idChucNang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDonHang`);

--
-- Chỉ mục cho bảng `donnhap`
--
ALTER TABLE `donnhap`
  ADD PRIMARY KEY (`idDonNhap`),
  ADD KEY `idNhanVien` (`idNhanVien`),
  ADD KEY `idNhaCungCap` (`idNhaCungCap`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`idGioHang`),
  ADD UNIQUE KEY `idKhachHang_2` (`idKhachHang`),
  ADD KEY `idKhachHang` (`idKhachHang`);

--
-- Chỉ mục cho bảng `idcounter`
--
ALTER TABLE `idcounter`
  ADD PRIMARY KEY (`TableName`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idKhachHang`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`idLoaiSanPham`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`idMau`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`idNhaCungCap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idNhanVien`),
  ADD KEY `idNhanVien` (`idNhanVien`);

--
-- Chỉ mục cho bảng `quanlykho`
--
ALTER TABLE `quanlykho`
  ADD PRIMARY KEY (`idQuanLyKho`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`idQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSanPham`),
  ADD KEY `idLoaiSanPham` (`idLoaiSanPham`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`idSize`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`tenDangNhap`) USING BTREE,
  ADD KEY `iqQuyen` (`idQuyen`),
  ADD KEY `tenDangNhap` (`tenDangNhap`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  MODIFY `idChiTietGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `idGioHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`idDonHang`),
  ADD CONSTRAINT `chitietdonhang_ibfk_2` FOREIGN KEY (`idChiTietSanPham`) REFERENCES `chitietsanpham` (`idChiTietSanPham`);

--
-- Các ràng buộc cho bảng `chitietdonnhap`
--
ALTER TABLE `chitietdonnhap`
  ADD CONSTRAINT `chitietdonnhap_ibfk_1` FOREIGN KEY (`idDonNhap`) REFERENCES `donnhap` (`idDonNhap`),
  ADD CONSTRAINT `chitietdonnhap_ibfk_2` FOREIGN KEY (`idChiTietSanPham`) REFERENCES `chitietsanpham` (`idChiTietSanPham`);

--
-- Các ràng buộc cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`idGioHang`) REFERENCES `giohang` (`idGioHang`),
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`idChiTietSanPham`) REFERENCES `chitietsanpham` (`idChiTietSanPham`);

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`idSanPham`),
  ADD CONSTRAINT `chitietsanpham_ibfk_2` FOREIGN KEY (`idMau`) REFERENCES `mau` (`idMau`),
  ADD CONSTRAINT `chitietsanpham_ibfk_3` FOREIGN KEY (`idSize`) REFERENCES `size` (`idSize`);

--
-- Các ràng buộc cho bảng `ctq_cn`
--
ALTER TABLE `ctq_cn`
  ADD CONSTRAINT `ctq_cn_ibfk_1` FOREIGN KEY (`idQuyen`) REFERENCES `quyen` (`idQuyen`),
  ADD CONSTRAINT `ctq_cn_ibfk_2` FOREIGN KEY (`idChucNang`) REFERENCES `chucnang` (`idChucNang`);

--
-- Các ràng buộc cho bảng `donnhap`
--
ALTER TABLE `donnhap`
  ADD CONSTRAINT `donnhap_ibfk_1` FOREIGN KEY (`idNhanVien`) REFERENCES `nhanvien` (`idNhanVien`),
  ADD CONSTRAINT `donnhap_ibfk_2` FOREIGN KEY (`idNhaCungCap`) REFERENCES `nhacungcap` (`idNhaCungCap`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`idKhachHang`) REFERENCES `khachhang` (`idKhachHang`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`idKhachHang`) REFERENCES `taikhoan` (`tenDangNhap`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`idNhanVien`) REFERENCES `taikhoan` (`tenDangNhap`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLoaiSanPham`) REFERENCES `loaisanpham` (`idLoaiSanPham`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`idQuyen`) REFERENCES `quyen` (`idQuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
