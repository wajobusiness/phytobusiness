# PhytoScience Wellness — Global Business Opportunity Portal

This repository contains the standalone, production-ready **Business Opportunity Website** for PhytoScience Wellness, architected to deploy under the `/business/` subfolder (e.g. `https://phytosciencewellness.com/business/`) without modifying or conflicting with the existing WordPress/Woodmart e-commerce store on the root domain.

---

## 📁 Repository Structure

```
├── .cpanel.yml                 # Automated deployment configuration for cPanel Git Version Control
├── .gitignore                  # Ignores system junk, logs, and sensitive form submissions
├── README.md                   # Setup, deployment, and operational documentation
└── business/                   # Core application root to deploy under public_html/business/
    ├── .htaccess               # Clean URLs (/business/about), security headers, Gzip, browser cache
    ├── config.php              # Verified company data, licensing (AJL932039), packages, offices
    ├── index.php               # Home Page: Hero, KPIs, 4P model, Swiss science, packages, calculator
    ├── about.php               # Heritage, Bangi HQ, Founders, Leadership, Scientific Board, Milestones
    ├── business-opportunity.php# Value proposition, comparison matrix, target profiles
    ├── how-it-works.php        # 7-Step Roadmap & illustrated binary duplication architecture
    ├── compensation-plan.php   # 6 income streams, pairing limits table, ranks, live calculator
    ├── membership.php          # Packages matrix (Silver to Platinum) & Mobile Stockist perks
    ├── success-stories.php     # Documented distributor stories, car delivery videos, travel proof
    ├── gallery.php             # Categorized tabbed video archive (9 official YouTube videos)
    ├── events.php              # Conventions, African leadership tours, Dr. Fred Zülli masterclasses
    ├── faq.php                 # Categorized accordions (Corporate, Packages, Payouts, Stockists)
    ├── contact.php             # Secure CSRF inquiry form, disk logging, 13+ global offices directory
    ├── join.php                # 3 enrollment pathways, package selector, registration flow
    ├── sitemap.xml             # XML sitemap for SEO crawlers
    ├── robots.txt              # Search engine index directives
    ├── includes/               # Shared templates (header, navbar, footer, functions, meta-tags)
    ├── components/             # Reusable UI widgets (hero, cards, stats, timeline, calc, cta-banner)
    └── assets/                 # Custom luxury CSS tokens, animations, and Vanilla JS scripts
```

---

## 🚀 Deployment Options to cPanel

### Option A: Using cPanel Git™ Version Control (Recommended for CI/CD)

1. **Push this repository to your GitHub account** (see instructions below).
2. Log into your **cPanel** dashboard (`https://yourdomain.com:2083`).
3. Scroll to the **Files** section and click **Git™ Version Control**.
4. Click **Create** (or **Clone Repository**):
   - **Clone URL:** Enter your GitHub repository URL (e.g., `https://github.com/USERNAME/phyto-business.git`).
   - **Repository Path:** Set to `repositories/phyto-business` (or clone directly).
   - **Repository Name:** `phyto-business`.
5. Click **Create**.
6. Once cloned, click **Manage** on the repository.
7. Switch to the **Deploy Head Commit** tab.
8. Click **Deploy Head Commit**. The `.cpanel.yml` file will automatically copy all files from `business/` into `public_html/business/`.
9. In future updates, simply push to GitHub, click **Update from Remote** in cPanel, and click **Deploy**.

---

### Option B: 1-Click ZIP Upload via cPanel File Manager

1. In your local terminal, generate a deployment package:
   ```bash
   cd "/Users/walex/phyto business"
   zip -r phyto-business.zip business/
   ```
2. Log into **cPanel** and open **File Manager**.
3. Navigate into `public_html/`.
4. Click **Upload** and upload `phyto-business.zip`.
5. Right-click `phyto-business.zip` in File Manager and select **Extract**.
6. Confirm the destination is `public_html/`. The folder `public_html/business/` will now be live with all pages, assets, and `.htaccess` intact.
7. Delete the uploaded `.zip` archive.

---

## 🛡️ Security & Technical Stack

- **Server:** Apache on cPanel (Linux) with PHP 8.1, 8.2, or 8.3.
- **Dependencies:** 0 Node.js in production, 0 Laravel, 0 Composer requirements. 100% native PHP.
- **Security:** CSRF tokens on all POST requests, invisible anti-bot honeypots, `X-Frame-Options`, `X-Content-Type-Options: nosniff`, and restricted HTTP access to `config.php` and `data/`.
- **Clean URLs:** Managed through `business/.htaccess`. Works seamlessly with `https://phytosciencewellness.com/business/about` or `https://phytosciencewellness.com/business/about.php`.
