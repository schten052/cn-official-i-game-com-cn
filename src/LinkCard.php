<?php

/**
 * Renders an escaped HTML snippet for a game link card.
 *
 * @param string $url         The target URL for the card.
 * @param string $keyword     The primary keyword or title to display.
 * @param string $description Optional short description (will be truncated).
 * @return string Escaped HTML string.
 */
function renderGameLinkCard(string $url, string $keyword, string $description = ''): string
{
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeKeyword = htmlspecialchars($keyword, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDescription = htmlspecialchars(
        mb_substr($description, 0, 120),
        ENT_QUOTES | ENT_HTML5,
        'UTF-8'
    );

    $html = '<div class="game-link-card">';
    $html .= '<a href="' . $safeUrl . '" rel="noopener noreferrer" target="_blank">';
    $html .= '<div class="card-content">';
    $html .= '<span class="card-keyword">' . $safeKeyword . '</span>';
    if ($safeDescription !== '') {
        $html .= '<p class="card-desc">' . $safeDescription . '</p>';
    }
    $html .= '<span class="card-url">' . $safeUrl . '</span>';
    $html .= '</div>';
    $html .= '</a>';
    $html .= '</div>';

    return $html;
}

// -------------------------------------------------------------------
// Example usage: this line can be removed or kept as a quick test.
// -------------------------------------------------------------------
$sampleUrl = 'https://cn-official-i-game.com.cn';
$sampleKeyword = '爱游戏';
$sampleDesc = '发现更多精彩游戏内容，尽在爱游戏官方平台。';

echo renderGameLinkCard($sampleUrl, $sampleKeyword, $sampleDesc);