# RPM-App: Remote Patient Monitoring

**RPM-App** is a Laravel-based web application designed to monitor and manage patient health data using sensor devices. It enables healthcare providers to track patient conditions, such as blood glucose, blood pressure, and heart rate, in real time.

---

## Features
- **Monitoring Data**: Manage health data collected via sensors (e.g., blood glucose, blood pressure, heart rate).
- **Patient Management**: Link monitoring data to patients.
- **User Roles**:
  - General Practitioners
  - Patients
  - Admins

---

## Installation

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL or MariaDB
- Node.js and npm (optional, for asset compilation)

### Steps

Follow these steps to set up the project locally:

1. **Clone the repository**:
   ```bash
   git clone <repository-url>
   cd pp-app
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Copy `.env.example` to `.env`**:
   ```bash
   cp .env.example .env
   ```

4. **Configure environment variables** in `.env`:
   Update the database settings:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

5. **Generate the application key**:
   ```bash
   php artisan key:generate
   ```

6. **Run migrations**:
   ```bash
   php artisan migrate
   ```

7. **Seed the database (optional)**:
   ```bash
   php artisan db:seed
   ```

8. **Run the development server**:
   ```bash
   php artisan serve
   ```

   Access the application at [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Usage

### **General Practitioner Features**
- View and analyze patient monitoring data.
- Track sensor readings (e.g., blood glucose, blood pressure, heart rate).

### **Patient Features**
- View personal monitoring data (if patient-facing functionality is implemented).

### **Admin Features**
- Manage general practitioners, patients, and monitoring data records.

## Development

### **Asset Compilation**
To compile CSS or JS assets:
   ```bash
   npm install
   npm run dev
   ```

### **Project Structure**
- **Routes**: Located in routes/web.php.
- **Controllers**: Application logic in app/Http/Controllers/.
- **Models**: Database relationships in app/Models/.
- **Views**: UI files in resources/views/.

#### **Contributing**
1.	Fork the repository.
2.	Create a new branch (git checkout -b feature/your-feature).
3.	Commit your changes (git commit -m 'Add your feature').
4.	Push the branch (git push origin feature/your-feature).
5.	Open a Pull Request.

### **License**
This project is open-source and available under the MIT License.

### **Contact**
For questions or contributions, contact Aidil Ikbar:
- GitHub: https://github.com/aidilikbar
- Email: aidil@aidilikbar.com