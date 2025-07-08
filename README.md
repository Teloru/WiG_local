# Women in Games France - Website

Local development environment for WiG France plugins & themes.

## Prerequisites

- Admin access to OVHCloud
- [LocalWP](https://localwp.com/) installed
- FTP access to get `wp-config.php`

## Quick Setup

1. **Clone this repository**
2. **Export the SQL file** from OVH's database
3. **Install LocalWP** and create a new site
4. **Import the database** and configure local URLs

## Step 1: Get the SQL file

> ⚠️ **Important**: You need admin access to OVHCloud and the `wp-config.php` file (get it via FTP). **Never share these credentials publicly.**

1. Go to **OVHCloud** → **Hosting plans** → `womeningamesfrance.org` → **Multisite**
2. Access **Databases** and click the **three dots** → **"Go to phpMyAdmin"**
3. Connect using credentials from `wp-config.php`
4. Click **Export** → Select **"fast"** → **"SQL format"** → Save the file

## Step 2: Setup LocalWP

> 💡 **Note**: This setup was tested on Windows. Steps may vary on other OS.

### Create a new site

1. Open LocalWP and select **"Create a new site"**
2. Name it `wigfr-local`
3. Select **"Preferred"** environment (you can change PHP version later)
4. Set temporary credentials:

   - Username: `admin`
   - Password: `toto`
   - Email: any email

   > These will be replaced when importing the database

5. Click **"Add site"** and accept any authorization requests
6. Wait for the site creation (this may take a few minutes)

### Copy project files

1. Once ready, open the local site in **File Explorer**
2. Navigate to `Local Sites/wigfr-local/app/public`
3. **Copy all content** from this git repository into that folder
4. Wait for the copy to complete

## Step 3: Import the database

> ⚠️ **Make sure your website is running live in LocalWP before proceeding!**

### Access the database

1. In LocalWP, click on **Database** → **"Open AdminerNeo"**
2. **Drop all existing tables** (there should be 12 tables)

### Import your SQL file

1. Click **Import** in the left menu
2. **Upload your SQL file** from OVHCloud
3. Press **Execute** and wait (this may take a few minutes due to the large database size)
4. You'll see a success message when the upload is complete

### Configure local URLs

1. Go to your database and select `womeninghy540`
2. Navigate to the `mod152_options` table
3. **Edit the following keys** with your local URL (e.g., `http://wigfr-local.local/`):
   - `siteurl`
   - `home`

## Step 4: Access your local site

🎉 **You're all set!**

- **Admin panel**: `http://wigfr-local.local/wp-admin`
- **Frontend**: `http://wigfr-local.local/`

Use your WiG admin account credentials to connect.

---

## Troubleshooting

- **Database connection issues**: Check that LocalWP site is running
- **URL problems**: Verify that `siteurl` and `home` values in the database match your local URL. Clear your cache with CTRL+F5 so it doesn't redirect
- **File permissions**: Make sure all files were copied correctly from the git repository
