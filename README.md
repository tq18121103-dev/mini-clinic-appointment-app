# 🏥 Mini Clinic Appointment App

## 📌 Giới thiệu
Ứng dụng PHP thuần mô phỏng hệ thống đăng ký lịch khám.

Chức năng:
- Xem danh sách lịch khám
- Đăng ký lịch khám (POST API)
- Validate dữ liệu đầu vào
- Trả đúng HTTP status code

---

## 🛠️ Công nghệ
- PHP (Native)
- Composer (PSR-4)
- Git

---

## 📁 Cấu trúc
public/ # index.php (entry point)
src/
- Controllers/
- Data/
- Support/
views/
config/
storage/logs/

---

## ▶️ Chạy project

```bash
composer dump-autoload
php -S localhost:8000 -t public

Mở: http://localhost:8000
```

## 📡 API

### GET /appointments
- Lấy danh sách lịch khám
- 200 OK

### POST /registrations
- Đăng ký lịch khám
{
  "appointment_id": 1,
  "patient_name": "Nguyen Van A",
  "email": "a@gmail.com",
  "quantity": 1
}
- 201 Created
- Có header Location

## ✅ Validation
- Thiếu field
- Sai kiểu dữ liệu
- Appointment không tồn tại
- Vượt số lượng slot

## 👨‍💻 Author

Quynh Ngo