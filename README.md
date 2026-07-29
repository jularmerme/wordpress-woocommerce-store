# WordPress WooCommerce Store

A fully containerized, production-ready WordPress e-commerce store built with WooCommerce, featuring advanced security, payment processing, and admin tools.

## Overview

This project provides a complete WordPress WooCommerce installation with Docker support, automated configuration via Handlebars templates, and pre-configured plugins for a fully functional online store. It includes security hardening, payment gateway integration, and a modern storefront theme out of the box.

## 📋 Table of Contents

- [Features](#features)
- [System Requirements](#system-requirements)
- [Project Structure](#project-structure)
- [Installation & Setup](#installation--setup)
- [Configuration](#configuration)
- [Usage](#usage)
- [Database](#database)
- [Plugins](#plugins)
- [Theme](#theme)
- [Development](#development)
- [Troubleshooting](#troubleshooting)
- [License](#license)

## ✨ Features

### Core E-Commerce
- **WooCommerce**: Full-featured e-commerce platform for WordPress
- **Product Management**: Complete product catalog with variations and swatches
- **Shopping Cart & Checkout**: Streamlined customer purchasing experience
- **Order Management**: Built-in order tracking and fulfillment
- **Inventory Management**: Stock tracking and management

### Payment Processing
- **Stripe Integration**: `woo-stripe-payment` plugin for credit card processing
- **PayPal Integration**: `woocommerce-paypal-payments` plugin
- **Multiple Payment Methods**: Support for various payment gateways

### Security & Backup
- **All-In-One WP Security & Firewall**: Comprehensive security hardening
  - Firewall protection with AIOS bootstrap
  - Automated backups with UpdraftPlus
  - Security scanning and threat detection
- **UpdraftPlus**: Automated backup and restoration
- **Security Key Salt**: Pre-configured authentication keys

### Frontend & User Experience
- **Astra Theme**: Modern, fast, and responsive WooCommerce theme
- **Elementor**: Visual page builder for custom layouts
- **Elementor Pro**: Advanced design capabilities
- **Wishlist Functionality**: `ti-woocommerce-wishlist` for customer wishlists
- **Product Load More**: `load-more-products-for-woocommerce` for infinite scroll

### Customization & Content
- **WooCommerce Customizer**: Fine-tune store appearance
- **WooLentor Addons**: Advanced WooCommerce widgets and extensions
- **Contact Form 7**: Customer contact forms
- **Fixed Widget**: `q2w3-fixed-widget` for sticky sidebar elements

### Infrastructure
- **Docker Containerization**: MySQL, PHP-FPM, and Nginx
- **Nginx Web Server**: High-performance HTTP server
- **PHP-FPM**: FastCGI Process Manager for PHP execution
- **MySQL Database**: Relational database backend
- **Handlebars Templates**: Dynamic configuration generation

## 🖥️ System Requirements

### Minimum Requirements
- **Docker & Docker Compose**: For containerized deployment
- **8GB RAM**: Recommended for smooth operation
- **2GB Disk Space**: Minimum (excluding media files)
- **Modern Web Browser**: For admin panel and storefront

### Development Requirements
- Git
- Text editor or IDE
- Command-line knowledge (bash/PowerShell)

## 📁 Project Structure

```
wordpress-woocommerce-store/
├── app/
│   ├── public/                    # WordPress root directory
│   │   ├── wp-admin/              # WordPress admin panel
│   │   ├── wp-content/            # Themes, plugins, uploads
│   │   │   ├── plugins/           # Installed plugins
│   │   │   ├── themes/            # Active themes (Astra, Storefront)
│   │   │   ├── uploads/           # Media files and product images
│   │   │   └── mu-plugins/        # Must-use plugins (security loader)
│   │   ├── wp-includes/           # WordPress core files
│   │   ├── wp-config.php          # Database and security configuration
│   │   ├── index.php              # WordPress entry point
│   │   └── aios-bootstrap.php     # Security firewall loader
│   └── sql/
│       └── local.sql              # Database dump and initialization
├── conf/
│   ├── nginx/                     # Nginx configuration
│   │   ├── nginx.conf.hbs         # Main Nginx config template
│   │   ├── site.conf.hbs          # Virtual host configuration
│   │   └── includes/              # Additional Nginx modules
│   ├── php/                       # PHP configuration
│   │   ├── php.ini.hbs            # PHP settings template
│   │   ├── php-fpm.conf.hbs       # PHP-FPM configuration
│   │   └── php-fpm.d/             # PHP-FPM pool configurations
│   └── mysql/                     # MySQL configuration
│       └── my.cnf.hbs             # MySQL settings template
├── assets/
│   ├── products.csv               # Product data import
│   ├── Header-Image-LLandudno.jpg # Default header image
│   └── woocommerceImagesUploads.zip # Product images bulk upload
├── logs/                          # Application logs (MySQL, PHP, Nginx)
├── .gitignore                     # Git ignore rules
├── LICENSE                        # GNU GPL v3 License
└── README.md                      # This file
```

## 🚀 Installation & Setup

### Prerequisites

1. **Install Docker & Docker Compose**
   - Windows: [Docker Desktop for Windows](https://docs.docker.com/desktop/install/windows-install/)
   - macOS: [Docker Desktop for Mac](https://docs.docker.com/desktop/install/mac-install/)
   - Linux: [Docker Engine](https://docs.docker.com/engine/install/) and [Docker Compose](https://docs.docker.com/compose/install/)

2. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd wordpress-woocommerce-store
   ```

### Quick Start

1. **Start Services**
   ```bash
   docker-compose up -d
   ```

2. **Access the Store**
   - Frontend: http://localhost
   - Admin Panel: http://localhost/wp-admin
   - Default Username: `admin`
   - Default Password: Check database or admin user settings

3. **Verify Installation**
   ```bash
   docker-compose ps
   ```

### Manual Setup (if not using Docker)

1. **Create MySQL Database**
   ```sql
   CREATE DATABASE local;
   GRANT ALL PRIVILEGES ON local.* TO 'root'@'localhost';
   ```

2. **Import Database**
   ```bash
   mysql -u root -p local < app/sql/local.sql
   ```

3. **Configure WordPress**
   - Edit `app/public/wp-config.php` with your database credentials
   - Update `DB_NAME`, `DB_USER`, `DB_PASSWORD`, `DB_HOST`

4. **Set Web Server Root**
   - Configure web server to serve from `app/public/`

## ⚙️ Configuration

### WordPress Configuration (`wp-config.php`)

```php
// Database Settings
define( 'DB_NAME', 'local' );      // Database name
define( 'DB_USER', 'root' );       // Database user
define( 'DB_PASSWORD', 'root' );   // Database password
define( 'DB_HOST', 'localhost' );  // Database host
```

### Handlebars Templates

Configuration files use Handlebars templates (`.hbs`) for dynamic generation:

- **Nginx**: `conf/nginx/nginx.conf.hbs`
- **PHP**: `conf/php/php.ini.hbs`
- **MySQL**: `conf/mysql/my.cnf.hbs`

These templates are processed during container initialization.

### Environment Variables

Set these in Docker environment or system configuration:

```bash
WORDPRESS_DB_NAME=local
WORDPRESS_DB_USER=root
WORDPRESS_DB_PASSWORD=root
WORDPRESS_DB_HOST=db
WORDPRESS_TABLE_PREFIX=wp_
```

## 🏪 Usage

### Adding Products

1. Go to WordPress Admin → Products → Add New
2. Fill in product details:
   - Product name and description
   - Price and SKU
   - Images (drag and drop supported)
   - Categories and tags
3. Configure variations and swatches if needed
4. Publish product

### Bulk Import Products

1. Use `assets/products.csv` as template
2. Go to Admin → Products → Import
3. Upload CSV file
4. Map columns and import

### Upload Product Images

1. Extract `assets/woocommerceImagesUploads.zip`
2. Upload to Media Library or use bulk import
3. Assign images to products

### Managing Orders

1. Admin → Orders
2. View order details and status
3. Update order status
4. Process refunds if needed

### Customizing Store Appearance

1. **Theme Settings**: Admin → Appearance → Customize (Astra theme)
2. **Page Builder**: Use Elementor on any page/product
3. **Products Display**: Configure via WooCommerce Customizer
4. **Wishlist**: Customers can add products to wishlists

## 💾 Database

### Database File

The database is stored in `app/sql/local.sql`:

```bash
# Backup current database
mysqldump -u root -p local > app/sql/local.sql

# Restore from backup
mysql -u root -p local < app/sql/local.sql
```

### Database Tables

- `wp_posts`: Posts, pages, products
- `wp_postmeta`: Post metadata
- `wp_users`: User accounts
- `wp_usermeta`: User metadata
- `wp_options`: Site settings and options
- `wp_links`: Navigation links
- `wp_comments`: Post comments
- `wp_terms`: Categories and tags
- `wp_termmeta`: Term metadata
- WooCommerce tables: `wp_woocommerce_*`

## 📦 Plugins

### Installed Plugins

| Plugin | Purpose |
|--------|---------|
| **WooCommerce** | E-commerce platform |
| **Astra** | Responsive WooCommerce theme |
| **Elementor** | Visual page builder |
| **Elementor Pro** | Advanced Elementor features |
| **All-In-One WP Security & Firewall** | Security and protection |
| **UpdraftPlus** | Backup and restoration |
| **Stripe for WooCommerce** | Stripe payment gateway |
| **WooCommerce PayPal Payments** | PayPal integration |
| **WooCommerce Customizer** | Customize store appearance |
| **WooLentor Addons** | Advanced WooCommerce widgets |
| **TI WooCommerce Wishlist** | Product wishlist functionality |
| **Load More Products for WooCommerce** | Infinite scroll for products |
| **Q2W3 Fixed Widget** | Sticky sidebar widgets |
| **Contact Form 7** | Customer contact forms |

### Activating/Deactivating Plugins

1. Admin → Plugins
2. Find plugin in list
3. Click "Activate" or "Deactivate"
4. Or use WP-CLI: `wp plugin activate/deactivate <plugin-name>`

### Installing New Plugins

1. Admin → Plugins → Add New
2. Search for plugin name
3. Click "Install Now" then "Activate"
4. Or upload ZIP file manually

## 🎨 Theme

### Active Theme: Astra

**Astra** is a fast, lightweight, and flexible WooCommerce theme.

**Features:**
- Fully responsive design
- WooCommerce compatibility
- Elementor integration
- Multiple homepage templates
- SEO optimized
- Lightweight performance

### Secondary Theme: Storefront

**Storefront** is a dedicated WooCommerce theme with solid foundations.

**To Activate Storefront:**
1. Admin → Appearance → Themes
2. Click "Activate" on Storefront theme

### Customizing Themes

1. **Theme Customizer**: Admin → Appearance → Customize
2. **CSS**: Add custom CSS in Theme Settings
3. **Child Theme**: Create child theme for safe customization

## 🔧 Development

### Local Development Environment

1. **Start Docker Services**
   ```bash
   docker-compose up -d
   ```

2. **Access Container**
   ```bash
   docker-compose exec wordpress bash
   ```

3. **Use WP-CLI**
   ```bash
   docker-compose exec wordpress wp --allow-root <command>
   ```

### File Structure for Development

- **Plugins**: `app/public/wp-content/plugins/`
- **Themes**: `app/public/wp-content/themes/`
- **Custom Code**: Create custom plugin in `wp-content/plugins/custom/`

### Creating Custom Plugin

1. Create plugin directory: `app/public/wp-content/plugins/my-plugin/`
2. Create main plugin file: `my-plugin.php`
3. Add plugin header:
   ```php
   <?php
   /**
    * Plugin Name: My Plugin
    * Plugin URI: https://example.com
    * Description: Custom plugin for the store
    * Version: 1.0.0
    * Author: Your Name
    * License: GPL v3
    */
   ?>
   ```

### Database Modifications

Use WordPress plugins like **Adminer** or **phpMyAdmin** for database management, or access via MySQL client:

```bash
mysql -u root -p local
```

## 🐛 Troubleshooting

### WordPress Won't Load

**Check Docker containers:**
```bash
docker-compose ps
docker-compose logs wordpress
```

**Verify database connection:**
- Check `wp-config.php` credentials
- Ensure MySQL service is running

### White Screen of Death (WSoD)

1. Enable debugging in `wp-config.php`:
   ```php
   define( 'WP_DEBUG', true );
   define( 'WP_DEBUG_LOG', true );
   ```

2. Check error logs: `app/public/wp-content/debug.log`

3. Check PHP error logs: `logs/php-error.log`

### Database Connection Errors

1. Verify MySQL is running: `docker-compose ps`
2. Check credentials in `wp-config.php`
3. Test connection: `mysql -u root -p -h localhost local`

### Plugin/Theme Not Activating

1. Check file permissions (should be 755 for directories, 644 for files)
2. Check PHP memory limit: Increase in `php.ini`
3. Review error logs

### Nginx 404 Errors

1. Verify WordPress root in `conf/nginx/site.conf.hbs`
2. Check `.htaccess` file exists in `app/public/`
3. Restart Nginx: `docker-compose restart nginx`

### Permission Issues

```bash
# Fix WordPress permissions
docker-compose exec wordpress chown -R www-data:www-data /var/www/html
docker-compose exec wordpress chmod -R 755 /var/www/html/wp-content
```

## 📊 Logs

Application logs are stored in the `logs/` directory:

- **PHP**: `logs/php-error.log`
- **Nginx**: `logs/nginx/access.log`, `logs/nginx/error.log`
- **MySQL**: `logs/mysql/error.log`
- **WordPress**: `app/public/wp-content/debug.log`

## 🔐 Security Recommendations

1. **Change Default Credentials**: Update admin password immediately
2. **Enable HTTPS**: Use SSL/TLS in production
3. **Update Plugins**: Regularly update all plugins and WordPress
4. **Database Security**: Use strong passwords, restrict access
5. **Backup Regularly**: Use UpdraftPlus for automated backups
6. **Limit Login Attempts**: Use All-In-One WP Security plugin
7. **Two-Factor Authentication**: Install additional security plugins

## 📄 License

This project is licensed under the **GNU General Public License v3.0** - see the [LICENSE](LICENSE) file for details.

The GPL v3 allows:
- ✓ Commercial use
- ✓ Modification
- ✓ Distribution
- ✓ Private use

Conditions:
- ⚠ Disclose source
- ⚠ License and copyright notice
- ⚠ State changes

## 🤝 Contributing

Contributions are welcome! Please:

1. Fork the repository
2. Create a feature branch: `git checkout -b feature/amazing-feature`
3. Commit changes: `git commit -m 'Add amazing feature'`
4. Push to branch: `git push origin feature/amazing-feature`
5. Open a Pull Request

## 📞 Support & Resources

### Documentation
- [WordPress Documentation](https://wordpress.org/support/)
- [WooCommerce Documentation](https://docs.woocommerce.com/)
- [Elementor Documentation](https://elementor.com/help/)
- [Astra Theme Documentation](https://wpastra.com/docs/)

### Community
- [WordPress.org Forums](https://wordpress.org/support/forums/)
- [WooCommerce Community](https://www.woocommerce.com/community/)
- [Stripe Support](https://support.stripe.com/)

### Contacts
For issues, feature requests, or contributions, please open a GitHub issue.

## 🔄 Version History

- **Latest**: Production-ready WooCommerce store with Docker support
- **Features**: Complete plugin ecosystem, payment integration, security hardening
- **Last Updated**: 2026

---

**Happy selling! 🎉**

For questions or support, please refer to the documentation links above or create an issue in the repository.