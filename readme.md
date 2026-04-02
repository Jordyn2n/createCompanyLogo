# CreateCompanyLogo 🎨

Ein PHP-basiertes Tool zur dynamischen Generierung von Firmenlogos mit Slogan und individueller Farbgestaltung.

## 🚀 Features
*   **Dynamische Logos:** Erzeugt HTML-Logo-Bausteine basierend auf einem Parameter-Array.
*   **Validierung:** Prüft Hex-Farbcodes und URLs automatisch.
*   **Responsive Design:** Nutzt Flexbox für die Ausrichtung von Grafik und Text.
*   **Zeichenbegrenzung:** Kürzt zu lange Brandnames oder Slogans automatisch auf 30 Zeichen.

## 🖼 Vorschau
So sieht das generierte Logo aktuell aus:

![Firmenlogo Vorschau](/bilder/vorschau.jpg)

## 🛠 Installation & Setup

1.  **Repository clonen:**
    Navigiere in dein `htdocs` Verzeichnis (z.B. XAMPP) und führe aus:
    ```bash
    git clone https://github.com/Jordyn2n/createCompanyLogo.git
    ```

2.  **Server starten:**
    Starte **Apache** über dein Control Panel.

3.  **Aufrufen:**
    Öffne `http://localhost/createCompanyLogo/` im Browser.

## 💻 Code-Beispiel (PHP)
Die Hauptfunktion `createCompanyLogo` kann wie folgt genutzt werden:

```php
echo createCompanyLogo([
                    'url'         => 'www.meinfenster24deasc',
                    'logoSrc'     => 'hello bols',
                    'brandName'   => 'meinfenster24.deeee',
                    'slogan'      => 'Fenster - Türen - Rollläden cdscasc'
                    'brandColor'  => '#00173a',
                    'sloganColor' => '#0460BB'
                ]);
