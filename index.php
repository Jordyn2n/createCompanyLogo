<?php
/**
 * Die Methode createCompanyLogo basieren aus Parameters das Logo von meinfenster24.de und gibt ein HTML-Objekt zurück.
 * @param array $parameters [
 *       'url'           =>  url der Webseite
 *       'logoSrc'       =>  Pfad zur SVG-Icon.
 *       'brandName'     =>  Name der Marke.
 *       'slogan'        =>  Slogan der Marke
 *       'brandColor'    =>  Schriftfarbe des Markennamens
 *       'sloganColor'   => Schriftfarbe des Slogans
 * ]
 * @return Html
 * Author: Jordan Ngatcha Njicthe
 * Version: 1.0
 */

function createCompanyLogo(array $parameters = []): string {
    $defaultParameters = [
        'url'         => 'https://www.meinfenster24.de/',
        'logoSrc'     => 'bilder/meinfenster24-fenster_RGB.svg',
        'brandName'   => 'meinfenster24.de',
        'slogan'      => 'Fenster - Türen - Rollläden',
        'brandColor'  => '#00173a',
        'sloganColor' => '#0460BB'
    ];

    $config = array_merge($defaultParameters, $parameters);
    $url = filter_var($config['url'], FILTER_VALIDATE_URL) ? $config['url'] : $defaultParameters['url'];
    
    $isHex = fn($color) => preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $color);
    $brandColor  = $isHex($config['brandColor'])  ? $config['brandColor']  : $defaultParameters['brandColor'];
    $sloganColor = $isHex($config['sloganColor']) ? $config['sloganColor'] : $defaultParameters['sloganColor'];
    
    $limitCharacters = fn($str, $n) => (mb_strlen($str) > $n) ? mb_substr($str, 0, $n) . '...' : $str;
    $brandName = $limitCharacters($config['brandName'], 30);
    $slogan    = $limitCharacters($config['slogan'], 30);
    
    $src = $config['logoSrc'];
    $logoPath = (filter_var($src, FILTER_VALIDATE_URL) || file_exists($src)) ? $src : $defaultParameters['logoSrc'];
                                                                                                                            //HTML
    $html  = '<div id="menuLeisteKleinInner_Logo">';
    $html .= '  <a href=' . htmlspecialchars($url) . ' style="text-decoration: none; color: inherit;">';
    $html .= '    <div id="logoErsatz">';
    $html .= '      <div id="logoErsatzGrafik">';                                                                           //Logo svg icon
    $html .= '        <img class="logoErsatzGrafik" src="' . htmlspecialchars($logoPath) . '" alt="Logo">';
    $html .= '      </div>';
    $html .= '      <div id="logoErsatzTexte">';                                                                                   
    $html .= '        <div id="logoErsatzText1" style="color: ' . htmlspecialchars($brandColor) . ';">';                    //Brand Name
    $html .=            htmlspecialchars($brandName);
    $html .= '        </div>';
    $html .= '        <div id="logoErsatzText2" style="color: ' . htmlspecialchars($sloganColor) . ';">';                   //Slogan
    $html .=            htmlspecialchars($slogan);
    $html .= '        </div>';
    $html .= '      </div>'; 
    $html .= '    </div>';
    $html .= '  </a>';
    $html .= '</div>';

    return $html;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>  

<?php
echo createCompanyLogo([
                    'url'         => 'www.meinfenster24deasc',
                    'logoSrc'     => 'hello bols',
                    'brandName'   => 'meinfenster24.deeee',
                    'slogan'      => 'Fenster - Türen - Rollläden cdscasc'
               //     'brandColor'  => '#00173a',
              //      'sloganColor' => '#0460BB'
                ]);
?> 

</body>
</html>