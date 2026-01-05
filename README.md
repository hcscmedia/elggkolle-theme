# Elgg Kolle Theme

Ein modernes, app-ähnliches Theme für Elgg 6.3.2, inspiriert vom Design von X.com (Twitter).

## Features

✨ **Modernes Design**
- Clean, minimalistisches Interface im X.com-Stil
- App-ähnliche Benutzeroberfläche
- Responsive Layout für alle Geräte

🌙 **Dark Mode**
- Vollständiger Dark Mode Support
- Automatische Speicherung der Benutzereinstellung
- Sanfte Übergänge zwischen Modi

🎨 **Design-System**
- Durchdachtes Farbsystem mit Design Tokens
- Konsistente Spacing-Skala
- Moderne Typografie

📱 **Responsive**
- Mobile-First Ansatz
- Anpassbare Sidebar für verschiedene Bildschirmgrößen
- Touch-optimierte Bedienelemente

⚡ **Performance**
- Lazy Loading für Bilder
- Optimierte Animationen
- Effizientes CSS mit CSS Custom Properties

## Installation

1. Laden Sie das Theme in Ihr Elgg-Plugin-Verzeichnis hoch:
   ```bash
   cd /path/to/elgg/mod/
   git clone <repository-url> elggkolle_theme
   ```

2. Aktivieren Sie das Plugin im Elgg Admin-Bereich:
   - Gehen Sie zu Administration > Plugins
   - Suchen Sie "Elgg Kolle Theme"
   - Klicken Sie auf "Aktivieren"

3. Setzen Sie das Theme als Standard (optional):
   - Gehen Sie zu Administration > Einstellungen > Erweitert
   - Wählen Sie "Elgg Kolle Theme" als Standard-Theme

## Struktur

```
elggkolle_theme/
├── elgg-plugin.php          # Plugin-Manifest
├── start.php                # Bootstrap-Datei
├── manifest.xml             # Legacy-Manifest
├── views/
│   └── default/
│       ├── elggkolle_theme/
│       │   ├── elgg.css     # Haupt-Stylesheet
│       │   ├── elgg.js      # JavaScript-Funktionen
│       │   └── admin.css    # Admin-Styles
│       ├── page/
│       │   ├── layouts/
│       │   │   └── default.php  # Haupt-Layout
│       │   └── elements/
│       │       ├── topbar.php   # Top-Navigation
│       │       └── sidebar.php  # Seitenleiste
│       └── river/
│           └── item.php         # Activity Feed Item
└── README.md
```

## Anpassung

### Farben anpassen

Bearbeiten Sie die CSS-Variablen in `views/default/elggkolle_theme/elgg.css`:

```css
:root {
    --color-primary: #1d9bf0;        /* Primärfarbe */
    --color-background: #ffffff;      /* Hintergrund */
    --color-text-primary: #0f1419;   /* Textfarbe */
    /* ... weitere Farben ... */
}
```

### Layout-Anpassungen

Die Layout-Breiten können über CSS-Variablen angepasst werden:

```css
:root {
    --sidebar-width: 275px;
    --main-content-width: 600px;
    --topbar-height: 53px;
}
```

## Browser-Unterstützung

- Chrome/Edge (neueste 2 Versionen)
- Firefox (neueste 2 Versionen)
- Safari (neueste 2 Versionen)
- Mobile Browser (iOS Safari, Chrome Mobile)

## Kompatibilität

- **Elgg Version**: 6.3.2 oder höher
- **PHP**: 7.4 oder höher
- **MySQL**: 5.7 oder höher

## Features im Detail

### Dark Mode
Der Dark Mode wird automatisch erkannt und kann über einen Toggle-Button in der Topbar umgeschaltet werden. Die Einstellung wird im localStorage gespeichert.

### Navigation
- Sticky Sidebar mit Hauptnavigation
- Responsive Topbar mit Suchfunktion
- Mobile-optimierte Navigation

### Activity Feed
- X.com-style Post-Layout
- Unterstützung für Bilder und Anhänge
- Interaktive Aktionen (Like, Kommentieren, Teilen)

### Formulare
- Moderne Input-Styles
- Auto-expandierende Textareas
- Client-seitige Validierung

## Entwicklung

### Voraussetzungen
- Node.js (für Build-Tools, optional)
- Git

### Lokale Entwicklung
```bash
# Repository klonen
git clone <repository-url> elggkolle_theme
cd elggkolle_theme

# Dateien bearbeiten
# CSS: views/default/elggkolle_theme/elgg.css
# JS: views/default/elggkolle_theme/elgg.js
# PHP: views/default/...

# Cache leeren nach Änderungen
php /path/to/elgg/bin/elgg-cli cache:clear
```

## Lizenz

MIT License - siehe LICENSE-Datei für Details

## Credits

Entwickelt von HCS Media
Inspiriert von X.com (Twitter) Design

## Support

Bei Fragen oder Problemen:
- Erstellen Sie ein Issue im GitHub Repository
- Kontaktieren Sie den Support

## Changelog

### Version 1.0.0 (2026-01-05)
- Initiales Release
- X.com-inspiriertes Design
- Dark Mode Support
- Responsive Layout
- Modern UI Components
