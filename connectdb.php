<?php
require __DIR__ . '/connect.inc';

$conn = mysqli_connect($host, $username, $password, $database, $port);

if (!$conn) {
	die('Ket noi CSDL that bai: ' . mysqli_connect_error());
}

mysqli_set_charset($conn, 'utf8mb4');

class DataProvider {
    private $conn;

    public function __construct() {
        global $host, $username, $password, $database, $port;

        $this->conn = new mysqli($host, $username, $password, $database, $port);
        if ($this->conn->connect_error) {
            throw new Exception("Kết nối thất bại: " . $this->conn->connect_error);
        }
        $this->conn->set_charset("utf8mb4");
    }

    public function executeQuery($query) {
        $result = $this->conn->query($query);
        if (!$result) {
            throw new Exception("Lỗi truy vấn: " . $this->conn->error);
        }
        return $result;
    }

    public function createCategory($categoryId, $categoryName, $status = 1) {
        $categoryId = trim((string)$categoryId);
        $categoryName = trim((string)$categoryName);

        if ($categoryId === '' || $categoryName === '') {
            throw new Exception("Danh mục mới cần có mã và tên.");
        }

        $checkStmt = $this->conn->prepare("SELECT danh_muc_id FROM danh_muc WHERE danh_muc_id = ? LIMIT 1");
        if (!$checkStmt) {
            throw new Exception("Không thể kiểm tra danh mục: " . $this->conn->error);
        }

        $checkStmt->bind_param("s", $categoryId);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();
        if ($checkResult && $checkResult->num_rows > 0) {
            $checkStmt->close();
            return $categoryId;
        }
        $checkStmt->close();

        $insertStmt = $this->conn->prepare("INSERT INTO danh_muc (danh_muc_id, ten_danh_muc, status) VALUES (?, ?, ?)");
        if (!$insertStmt) {
            throw new Exception("Không thể tạo danh mục mới: " . $this->conn->error);
        }

        $status = (int)$status;
        $insertStmt->bind_param("ssi", $categoryId, $categoryName, $status);
        $ok = $insertStmt->execute();
        if (!$ok) {
            $errorMessage = $insertStmt->error;
            $insertStmt->close();
            throw new Exception("Tạo danh mục thất bại: " . $errorMessage);
        }

        $insertStmt->close();
        return $categoryId;
    }

    public function addImageRecord($imagePath) {
        $imagePath = trim((string)$imagePath);
        if ($imagePath === '') {
            throw new Exception("Đường dẫn ảnh không hợp lệ.");
        }

        $nextIdResult = $this->executeQuery("SELECT COALESCE(MAX(ma_anh), 0) + 1 AS next_id FROM anh");
        $nextIdRow = $nextIdResult->fetch_assoc();
        $nextId = (int)($nextIdRow['next_id'] ?? 1);

        $stmt = $this->conn->prepare("INSERT INTO anh (ma_anh, duong_dan) VALUES (?, ?)");
        if (!$stmt) {
            throw new Exception("Không thể lưu ảnh: " . $this->conn->error);
        }

        $stmt->bind_param("is", $nextId, $imagePath);
        $ok = $stmt->execute();
        if (!$ok) {
            $errorMessage = $stmt->error;
            $stmt->close();
            throw new Exception("Lưu ảnh thất bại: " . $errorMessage);
        }

        $stmt->close();
        return $nextId;
    }

    public function addProduct($productData) {
        $maSp = trim($productData['ma_sp'] ?? '');
        $tenSp = trim($productData['ten_sp'] ?? '');

        if ($maSp === '' || $tenSp === '') {
            throw new Exception("Mã sản phẩm và tên sản phẩm là bắt buộc.");
        }

        $checkStmt = $this->conn->prepare("SELECT ma_sp FROM san_pham WHERE ma_sp = ? LIMIT 1");
        if (!$checkStmt) {
            throw new Exception("Không thể kiểm tra mã sản phẩm: " . $this->conn->error);
        }

        $checkStmt->bind_param("s", $maSp);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();
        if ($checkResult && $checkResult->num_rows > 0) {
            $checkStmt->close();
            throw new Exception("Mã sản phẩm đã tồn tại.");
        }
        $checkStmt->close();

        $slTonKho = (int)($productData['sl_ton_kho'] ?? 0);
        $giaNhap = (float)($productData['gia_nhap_hien_tai'] ?? 0);
        $giaBan = (float)($productData['gia_ban_hien_tai'] ?? 0);
        $tiLeLoiNhuan = (float)($productData['ti_le_loi_nhuan'] ?? 0);
        $moTa = trim($productData['mo_ta'] ?? '');
        $donVi = trim($productData['don_vi'] ?? '');
        $danhMucId = trim($productData['danh_muc_id'] ?? '');
        $maAnh = $productData['ma_anh'] ?? null;
        $trangThai = (int)($productData['trang_thai'] ?? 1);

        if ($danhMucId === '') {
            $danhMucId = null;
        }

        if ($maAnh === '' || $maAnh === null) {
            $maAnh = null;
        } else {
            $maAnh = (int)$maAnh;
        }

        $stmt = $this->conn->prepare(
            "INSERT INTO san_pham (ma_sp, ten_sp, sl_ton_kho, gia_nhap_hien_tai, gia_ban_hien_tai, ti_le_loi_nhuan, mo_ta, don_vi, ma_anh, danh_muc_id, trang_thai)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        if (!$stmt) {
            throw new Exception("Không thể chuẩn bị truy vấn thêm sản phẩm: " . $this->conn->error);
        }

        $stmt->bind_param(
            "ssidddssisi",
            $maSp,
            $tenSp,
            $slTonKho,
            $giaNhap,
            $giaBan,
            $tiLeLoiNhuan,
            $moTa,
            $donVi,
            $maAnh,
            $danhMucId,
            $trangThai
        );

        $ok = $stmt->execute();
        if (!$ok) {
            $errorMessage = $stmt->error;
            $stmt->close();
            throw new Exception("Thêm sản phẩm thất bại: " . $errorMessage);
        }

        $stmt->close();
        return true;
    }

    public function escapeString($string) {
        return $this->conn->real_escape_string($string);
    }

    public function getLastInsertId() {
        return $this->conn->insert_id;
    }

    public function __destruct() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
