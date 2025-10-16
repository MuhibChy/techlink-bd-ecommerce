# 🚀 Deployment Guide

## GitHub Pages (Live Demo)

Your website is now live at:
- **Main Page**: https://muhibchy.github.io/techlink-bd-ecommerce/
- **Demo Page**: https://muhibchy.github.io/techlink-bd-ecommerce/demo.html

### ⚠️ Important Notes:
- GitHub Pages only supports **static HTML/CSS/JS** files
- **PHP files will NOT work** on GitHub Pages
- The demo shows the complete design system
- For full PHP functionality, deploy to a PHP hosting service

## Local Development (XAMPP)

### Setup Instructions:
1. **Start XAMPP**
   - Open XAMPP Control Panel
   - Start Apache
   - Start MySQL

2. **Access Your Site**
   - Open browser: `http://localhost/MRSecurity`
   - Or: `http://localhost/MRSecurity/demo.html` (for static demo)

3. **Clear Browser Cache**
   - Press `Ctrl + Shift + Delete`
   - Clear cached images and files
   - Reload the page with `Ctrl + F5`

### Database Setup:
```sql
-- Import the SQL file
mysql -u root -p < sql/techlink_schema.sql
```

## Production Deployment (PHP Hosting)

### Recommended Hosting Providers (Bangladesh):
1. **Hostinger Bangladesh**
   - Affordable PHP hosting
   - cPanel included
   - Good support

2. **ExonHost**
   - Local Bangladesh hosting
   - Fast servers
   - PHP 7.4+ support

3. **WebHostBD**
   - Reliable uptime
   - Bangladesh-based
   - Good for e-commerce

### Deployment Steps:
1. **Upload Files**
   - Use FTP/SFTP or cPanel File Manager
   - Upload all files except `.git` folder

2. **Configure Database**
   - Create MySQL database via cPanel
   - Import `sql/techlink_schema.sql`
   - Update `config.php` with database credentials

3. **Set Permissions**
   ```bash
   chmod 755 assets/
   chmod 644 assets/css/*.css
   chmod 644 assets/js/*.js
   ```

4. **Test the Site**
   - Visit your domain
   - Test all pages
   - Check database connections

## Viewing the New Design

### ✅ What You Should See:
- **Pure black background** with red radial gradients
- **Transparent glass cards** with blur effects
- **Red neon accents** on all interactive elements
- **Smooth animations** on hover
- **Red glow effects** around buttons and cards
- **Gradient text** with red shadows
- **Custom red scrollbar**

### 🔧 Troubleshooting:

#### Design Not Showing?
1. **Clear browser cache**: `Ctrl + Shift + Delete`
2. **Hard reload**: `Ctrl + F5`
3. **Check CSS file**: Verify `assets/css/styles.css` exists
4. **Check browser console**: Press `F12` and look for errors

#### GitHub Pages Not Updating?
- Wait 2-3 minutes for GitHub to rebuild
- Check repository settings → Pages
- Ensure source is set to `main` branch

#### PHP Not Working Locally?
- Ensure XAMPP Apache is running
- Check `config.php` exists (not in Git)
- Verify database connection settings

## File Structure

```
MRSecurity/
├── assets/
│   ├── css/
│   │   └── styles.css          # Main stylesheet (red & black theme)
│   └── js/
│       └── app.js              # JavaScript functionality
├── pages/                      # PHP page files
├── partials/                   # Header/Footer PHP includes
├── actions/                    # Backend actions
├── sql/                        # Database schema
├── index.php                   # Main PHP entry point (for XAMPP)
├── index.html                  # Static demo (for GitHub Pages)
├── demo.html                   # Full demo page
├── config.php                  # Database config (not in Git)
├── README.md                   # Project documentation
├── DESIGN.md                   # Design system guide
├── CHANGELOG.md                # Version history
└── DEPLOYMENT.md               # This file

```

## Quick Commands

### Git Commands:
```bash
# Check status
git status

# Add changes
git add .

# Commit changes
git commit -m "Your message"

# Push to GitHub
git push

# Pull latest changes
git pull
```

### XAMPP Commands:
```bash
# Start Apache (Windows)
C:\xampp\apache_start.bat

# Start MySQL (Windows)
C:\xampp\mysql_start.bat
```

## Support

For issues or questions:
- Check the [Design System](DESIGN.md)
- Review the [Changelog](CHANGELOG.md)
- See [Contributing Guidelines](CONTRIBUTING.md)

---

**Last Updated**: 2025-10-17  
**Version**: 2.0.0
