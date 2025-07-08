# Women in Games France - Website

To work locally on plugins & themes of WiG France

## Setup

- Clone this repo
- Export the SQL file from OVH's db
- Install [LocalWP](https://localwp.com/) and launch it

### Get the SQL file

You will need an admin access to OVHCloud. Then, go to Hosting plans/`womeningamesfrance.org`/Multisite.

You will be able to access to Databases from here. Click on the three dots on the right, then "Go to phpMyAdmin".

Connect with the credentials given in `wp-config`, you will also need this file at the root of your project. You can get it via FTP from OVHCloud. Don't share it publicly.

From there, click on Export. Select `fast`, `SQL format` and save the SQL file on your computer.

### LocalWP

This tool will help you run locally the website. I tried it only on Windows, it might differ on other OS.

Select "Create a new site", you can name it "wigfr-local". Select "Preferred" for the environment (you can change the PHP version etc later if you need).

Put a random WP Username, password and email since it's going to be modified with our SQL file anyway. You can put "admin" with "toto" as password so you remember it if needed.

Press "Add site" and let the app ask you for authorizations, accept them.

Local will now create a blank new website. This can take a few minutes.

When it's ready, you can open the local site on the File Explorer, and paste all the content from this git repo inside `Local Sites/wigfr-local/app/public`. This can take a little time, depending on your computer speed.

Now, we need to give the database we grabbed to the local website. Go to Local, click on Database (make sure your website is running live!) then click on "Open AdminerNeo".

From there, drop all the tables (there should be 12).

When it's done, you can now click on `Import` on the left and upload your SQL file from OVHCloud. Press `Execute` and wait for a few minutes since the db is pretty large. You will see a success when the upload is finished.

Now, go to your databases and select the one named `womeninghy540`. Then go inside the `mod152_options` table. Display the data, and edit the keys `siteurl` and `home` with the correct local link (e.g. `http://wigfr-local.local/`).

Now, you should be able to go to `http://wigfr-local.local/wp-admin`, setting up and connect to your WiG admin account.
