![License](https://img.shields.io/github/license/bchilton9/Theme-Park-Switcher)
![Last Commit](https://img.shields.io/github/last-commit/bchilton9/Theme-Park-Switcher)
![Styled with CSS](https://img.shields.io/badge/Styled%20with-CSS-264de4?logo=css3&logoColor=white)

# 🎨 Theme.park Switcher

This repo lets you control the visual theme for **all your self-hosted apps** using [Theme.park](https://theme-park.dev), with **one line of configuration**.

Rather than updating every proxy or app manually, this setup lets you change the global theme across 50+ services — just by editing a single file in GitHub.

___

## 🚀 Features

- ✅ Supports **50+ Theme.park-compatible apps**
- ✅ Hosted on **GitHub Pages**
- ✅ One setting controls **all themes globally**
- ✅ Automatically generates `*.css` for each app
- ✅ No custom scripting or build step required

___

## 🌐 Live Demo

Theme CSS endpoints (examples):

- [`/sonarr.css`](https://themepark.chilsoft.com/sonarr.css)
- [`/radarr.css`](https://themepark.chilsoft.com/radarr.css)
- [`/jellyfin.css`](https://themepark.chilsoft.com/jellyfin.css)

Each file dynamically imports the correct theme from the Theme.park CDN.

___

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

___

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
git clone https://github.com/yourname/theme-park-switcher.git
cd theme-park-switcher
```

Then:

- Modify `_config.yml` as needed
- Push to GitHub
- GitHub Pages handles the rest

___

## 🧰 Supported Apps

- Sonarr, Radarr, Lidarr, Jellyfin, Plex, Ombi, Overseerr, Gitea, Portainer, qBittorrent, Transmission, Heimdall, Homepage, Unraid, Tautulli, and **dozens more**

> Full list: see all `.scss` files in the repo

___

## 🧩 Nginx Proxy Manager Integration (with Theme.park Mod Script)

You can theme **Nginx Proxy Manager** using this GitHub-hosted switcher and a single startup script.


#### 🛠 1. Add the patched script

Save the modified script as:

```
scripts/99-themepark-npm
```

Make sure it:
- Begins with `#!/command/with-contenv bash`
- Is executable (`chmod +x scripts/99-themepark-npm`)


#### 📦 2. Mount it into the container

In your `docker-compose.yml`, add this to the `volumes:` section of your NPM service:

```yaml
volumes:
  - ./scripts/99-themepark-npm:/etc/cont-init.d/99-themepark-npm
```

> This causes the script to run automatically at container start.


#### ⚙️ 3. Add the environment variables

In the same `docker-compose.yml` section:

```yaml
environment:
  - TP_SCHEME=https
  - TP_DOMAIN=yourname.github.io
  - TP_THEME=nginx-proxy-manager
```

#### 🔁 4. Change themes globally

To change the look of NPM (and all other apps), just update the `_config.yml` in this repo:

```yaml
current_theme: nord  # or dracula, hotpink, etc.
```

Push your changes, and the updated CSS will auto-load at:
```
https://yourname.github.io/nginx-proxy-manager.css
```
___

#### ✅ That’s it!

No need to ever touch the container again — just change the theme in one place and NPM updates instantly.

___

## 📜 License

MIT – free to use and modify. Not affiliated with theme.park or any of the apps.

___

## 🙌 Credits

Based on the incredible work of [theme.park](https://theme-park.dev).

___

## 🛠 Made By

[ChilSoft.com](https://chilsoft.com) with caffeine and questionable commits.

___

## ⚠️ Disclaimer

This site and its contents are provided for informational and educational purposes only.

Use any code, tools, or instructions at your own risk.  
We are **not responsible** for any damage to your device, data loss, or unintended consequences.

Always proceed with care — and make backups.

© **2025 ChilSoft**. All rights reserved.
