# 📚 LibraryApp - Library Management System
<img src="https://e7.pngegg.com/pngimages/142/76/png-clipart-white-and-orange-book-logo-symbol-yellow-orange-logo-ibooks-orange-logo.png" alt="LibraryApp Banner" style="width: 300px; height: auto;" />

**A powerful CMS for managing library books and categories with CRUD functionality.**

LibraryApp is a modern **Content Management System (CMS)** built to streamline library operations. It offers role-based access for administrators and users to perform **CRUD (Create, Read, Update, Delete)** operations on books and categories. With an intuitive interface and robust features, LibraryApp is perfect for managing digital or physical library collections.

---

## ✨ Features

### 1. 🔐 User Authentication
- **Login & Registration**: Secure login and registration with validation and Toastr notifications. Admins can register using a special token (`admin123`).
- **Profile Management**: Update user details like name with real-time feedback.
- **Role-Based Access**: 
  - **Admins**: Full access to all books, categories, and user statistics.
  - **Users**: Manage only their own books and profile.

| Feature | Screenshot |
|---------|------------|
| Login | <img src="https://github.com/user-attachments/assets/e03e4f63-95a7-4330-805a-c865510524de" alt="Login Interface" style="width: 300px; height: auto;" /> |
| Registration | <img src="https://github.com/user-attachments/assets/560113e5-ac97-4ed3-860f-914f67678865" alt="Registration Interface" style="width: 300px; height: auto;" /> |
| Profile | <img src="https://github.com/user-attachments/assets/5c001cde-674f-4ef0-aa10-3e1668b7593b" alt="Profile Management" style="width: 300px; height: auto;" /> |

### 2. 📊 Dashboard
- **Statistics Overview**: Displays counts of users (admin-only), books, and categories.
- **Visual Analytics**: 
  - Column chart for books per category.
  - Area chart for books per user (admin-only).
- **Carousel**: Engaging image slideshow to enhance the dashboard's appeal.

| Feature | Screenshot |
|---------|------------|
| Dashboard | <img src="https://github.com/user-attachments/assets/b8c82dd7-64c2-457d-981d-96280d3ce09c" alt="Dashboard Overview" style="width: 300px; height: auto;" /> |

### 3. 📖 Book Management
- **Create**: Add books with title, description, quantity, category, cover image (JPEG/JPG/PNG, max 1MB), and PDF file (max 1MB).
- **Read**: View books in a card layout with category filtering. Admins see all books; users see their own.
- **Update**: Edit book details, including optional file replacements, with unique title validation.
- **Delete**: Remove books with a confirmation modal for safety.

| Feature | Screenshot |
|---------|------------|
| Create Book | <img src="https://github.com/user-attachments/assets/a6efdfa2-f6e6-481d-ac41-686fbd838d2b" alt="Book Creation Modal" style="width: 300px; height: auto;" /> |
| List Books | <img src="https://github.com/user-attachments/assets/d123bfb3-fff2-4ed1-8c5a-9b9c77eff615" alt="Book Listing" style="width: 300px; height: auto;" /> |
| Update Book | <img src="https://github.com/user-attachments/assets/ba023225-04cd-498d-b9f9-bd777ca81cf9" alt="Book Update Modal" style="width: 300px; height: auto;" /> |
| Delete Book | <img src="https://github.com/user-attachments/assets/0f7f05fe-209f-4c40-9aa2-96aa4942e7a9" alt="Book Deletion Confirmation" style="width: 300px; height: auto;" /> |

### 4. 🏷️ Category Management (Admin Only)
- **Create**: Add new categories with unique names.
- **Read**: Display categories in circular cards with book counts.
- **Update**: Edit category names with uniqueness validation.
- **Delete**: Remove categories with a confirmation modal.

| Feature | Screenshot |
|---------|------------|
| Create Category | <img src="https://github.com/user-attachments/assets/8f6eca41-1181-4fb7-8583-ca825c473e7a" alt="Category Creation Modal" style="width: 300px; height: auto;" /> |
| List Categories | <img src="https://github.com/user-attachments/assets/b64cf9d0-5f7e-4f7a-8d32-767bb2b5751a" alt="Category Listing" style="width: 300px; height: auto;" /> |
| Update Category | <img src="https://github.com/user-attachments/assets/95afc060-30de-4866-b3ab-0e39272cdcec" alt="Update Category" style="width: 300px; height: auto;" /> |
| Delete Category | <img src="https://github.com/user-attachments/assets/864978ac-eed6-43c4-891d-b9c7f0ccd66f" alt="Category Deletion Confirmation" style="width: 300px; height: auto;" /> |

### 5. ⚙️ Additional Features
- **Dark/Light Mode**: Toggle between themes for accessibility.
- **Toastr Notifications**: Real-time feedback for all actions.
- **Responsive Design**: Optimized for all devices using Bootstrap.

| Feature | Screenshot |
|---------|------------|
| Theme Toggle | <img src="https://github.com/user-attachments/assets/77be0f69-7f2b-4113-817a-ee692780d5c9" alt="Dark/Light Mode Toggle" style="width: 300px; height: auto;" /> |
| Notifications | <img src="https://github.com/user-attachments/assets/e9b7a253-45a3-46cd-b4ac-03fe0c2643ae" alt="Toastr Notifications" style="width: 300px; height: auto;" /> |

---

## 🛠️ Technologies Used
- **Laravel**: Backend framework for routing, authentication, and database management.
- **Bootstrap 5**: Responsive UI components.
- **Font Awesome**: Icons for navigation and buttons.
- **Highcharts & Chart.js**: Data visualization for dashboard charts.
- **Toastr.js**: User-friendly notifications.
- **jQuery**: DOM manipulation and modal triggers.
- **MySQL**: Database for storing users, books, and categories.

---

## 🚀 Setup Instructions

1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Configure Environment**:
   - Copy `.env.example` to `.env` and set up database credentials.
   - Generate an application key:
     ```bash
     php artisan key:generate
     ```

4. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

5. **Serve the Application**:
   ```bash
   php artisan serve
   ```

6. **Access the Application**:
   - Visit `http://localhost:8000`.
   - Use `admin123` as the token during registration for admin access.

---

## 📋 Usage
- **Admins**: Manage categories, view all books, and access user statistics.
- **Users**: Add, edit, or delete personal books and update profile details.
- **File Uploads**: Ensure cover images (JPEG/JPG/PNG) and PDF files are under 1MB.
- **Navigation**: Use the top navbar to access Dashboard, Books, and Categories (admin-only).

---

## 🔮 Future Enhancements
- 🔍 Add search functionality for books and categories.
- 📚 Implement book borrowing and return features.
- 🔒 Enhance security with advanced validation and CSRF protection.
- 👥 Add user management for admins.

---

## 🤝 Contributing
Contributions are welcome! Please:
1. Fork the repository.
2. Create a feature branch (`git checkout -b feature/YourFeature`).
3. Commit changes (`git commit -m 'Add YourFeature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Open a pull request.

Report bugs or suggest features via GitHub Issues.

---

## 📜 License
This project is licensed under the [MIT License](LICENSE).
