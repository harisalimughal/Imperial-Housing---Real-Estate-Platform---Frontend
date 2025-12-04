# Imperial Housing - Real Estate Platform Frontend

A modern real estate platform for property listings and management.

## 🚀 Quick Start

### Prerequisites
- PHP 7.4 or higher
- A modern web browser

### Running the Development Server

**Option 1: Using npm (recommended)**
```bash
npm start
```

**Option 2: Using PHP directly**
```bash
php -S localhost:8000 -t frontend
```

Then visit: **http://localhost:8000/src/pages/index.php**

## 📁 Project Structure

```
frontend/
├── public/
│   └── assets/
│       ├── css/          # Stylesheets
│       ├── js/           # JavaScript files
│       └── images/       # Images and media
└── src/
    ├── pages/            # PHP pages
    │   ├── index.php     # Home page
    │   ├── properties.php # Properties listing
    │   ├── product.php   # Property details
    │   ├── contact.php   # Contact page
    │   ├── hmo.php       # HMO page
    │   ├── about.php     # About page
    │   └── tenants.php   # Tenants page
    └── data/
        └── properties.php # Property data
```

## 🌐 Available Pages

- **Home:** `/src/pages/index.php`
- **Properties:** `/src/pages/properties.php`
- **Property Details:** `/src/pages/product.php?id=1`
- **Contact:** `/src/pages/contact.php`
- **HMO:** `/src/pages/hmo.php`
- **About:** `/src/pages/about.php`
- **Tenants:** `/src/pages/tenants.php`

## 🔧 Features

- ✅ Responsive design with Tailwind CSS
- ✅ Property carousel with pagination
- ✅ Property filtering by type, location, and area
- ✅ Interactive property cards with hover effects
- ✅ Image galleries for property details
- ✅ Contact forms
- ✅ Mobile-friendly navigation
- ✅ Back button navigation fix

## 🐛 Troubleshooting

### Back Button Issues
The JavaScript back button fix is already included. If you experience issues:
1. Clear your browser cache (Ctrl+Shift+Delete)
2. Hard refresh the page (Ctrl+F5)
3. Restart the PHP server

### Port Already in Use
If port 8000 is already in use:
```bash
php -S localhost:8080 -t frontend
```
Then visit: `http://localhost:8080/src/pages/index.php`

## 📝 Development Notes

- The site uses PHP's built-in development server
- Property data is stored in `/src/data/properties.php`
- Images should be placed in `/public/assets/images/properties/`
- The back button fix script automatically handles browser navigation

## 🎨 Styling

The project uses:
- **Tailwind CSS** (via CDN) for utility-first styling
- **Custom CSS** in `/public/assets/css/styles.css`
- **Google Fonts** (Inter) for typography

## 📞 Contact

For questions or support, please contact the development team.
