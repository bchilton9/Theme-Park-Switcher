# 🎨 Theme.park Switcher

This repo lets you control the visual theme for **all your self-hosted apps** using [Theme.park](https://theme-park.dev), with **one line of configuration**.

Rather than updating every proxy or app manually, this setup lets you change the global theme across 50+ services — just by editing a single file in GitHub.


## 🚀 Features

- ✅ Supports **50+ Theme.park-compatible apps**
- ✅ Hosted on **GitHub Pages**
- ✅ One setting controls **all themes globally**
- ✅ Automatically generates `*.css` for each app
- ✅ No custom scripting or build step required


## 🌐 Live Demo

Theme CSS endpoints (examples):

- [`/sonarr.css`](https://themepark.chilsoft.com/sonarr.css)
- [`/radarr.css`](https://themepark.chilsoft.com/radarr.css)
- [`/jellyfin.css`](https://themepark.chilsoft.com/jellyfin.css)

Each file dynamically imports the correct theme from the Theme.park CDN.


## 🛠 How It Works

1. Each `.scss` file uses Jekyll + Liquid to pull in a theme:
   ```scss
   @import url("https://theme-park.dev/css/base/<app>/{{ site.current_theme }}.css");
   ```

2. The `current_theme` is defined in `_config.yml`:
   ```yaml
   current_theme: dracula
   ```

3. GitHub Pages builds each SCSS file into a proper `.css` endpoint (e.g. `/sonarr.css`).

## 🔁 How to Use


### 🔨 Option 1: Fork It

1. Click **Fork** at the top of this repo.
2. Rename the repo to `yourname.github.io` (optional for root-level domain).
3. Go to **Settings > Pages** and enable GitHub Pages (if not already).
4. Edit `_config.yml` to change the global theme:
   ```yaml
   current_theme: nord
   ```

5. Update your reverse proxy subfilters (once) to load:
   ```
   https://yourname.github.io/sonarr.css
   ```

   After that, **you never touch the proxy again** — just update `_config.yml`.


### 🔨 Option 2: Clone It

```bash
git clone https://github.com/yourname/themepark-switcher.git
cd themepark-switcher
```

Then:

- Modify `_config.yml` as needed
- Push to GitHub
- GitHub Pages handles the rest


## 🧰 Supported Apps

- Sonarr, Radarr, Lidarr, Jellyfin, Plex, Ombi, Overseerr, Gitea, Portainer, qBittorrent, Transmission, Heimdall, Homepage, Unraid, Tautulli, and **dozens more**

> Full list: see all `.scss` files in the repo

## 📜 License

MIT – free to use and modify. Not affiliated with theme.park or any of the apps.

## 🙌 Credits

Based on the incredible work of [theme.park](https://theme-park.dev).

## 🛠 Made By

[ChilSoft.com](https://chilsoft.com) with caffeine and questionable commits.

## ⚠️ Disclaimer

This site and its contents are provided for informational and educational purposes only.

Use any code, tools, or instructions at your own risk.  
We are **not responsible** for any damage to your device, data loss, or unintended consequences.

Always proceed with care — and make backups.

© **2025 ChilSoft**. All rights reserved.
