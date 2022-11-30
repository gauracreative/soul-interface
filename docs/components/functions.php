<?php

declare(strict_types=1);

const ALLOW_CHARS_PER_LINE = 50;

function slug(?bool $beforeMapping = false): string
{
    $slug = ltrim($_ENV['REQUEST_URI'], '/');
    if ($beforeMapping) {
        return $slug;
    }
    return $slug == '' ? 'home' : $slug;
}

function title(): string
{
    return ucfirst(slug());
}

function content(): void
{
    $file = dirname(__DIR__).'/'.slug().'.php';
    if (file_exists($file)) {
        include $file;
    } else {
        include dirname(__DIR__).'/404.php';
    }
}

function navLink(string $route, string $label): void
{
    $active = ltrim($route, '/') == slug(true);
    $tpl = dirname(__DIR__).'/components/link.php';
    if (file_exists($tpl)) {
        include $tpl;
    }
}

function code(array $lines, ?array $deps = [], ?bool $noReturns = false): void
{
    $code = '<?'.PHP_EOL;
    foreach ($lines as $i => $line) {
        $code .= $line;
        if (!$noReturns) {
            if (preg_match('/^(echo|printf)/', $line)) {
                ob_start();
                eval(implode(' ', $deps).' '.$line);
                $comment = ob_get_clean();
                if (strlen($line.' // '.$comment) > ALLOW_CHARS_PER_LINE) {
                    $code .= PHP_EOL.'// '.$comment;
                } else {
                    $code .= ' // '.$comment;
                }
            } elseif (strpos($line, '//') === 0) {
                continue;
            } else {
                $deps[] = false === strpos($line, '; //') ? trim($line) : trim(strstr($line, '//', true));
            }
        }
        $code .= PHP_EOL;
    }
    $code = highlight_string($code.'?>', true);

    $code = str_replace(['&lt;?', '?&gt;'], '', $code);
    $code = preg_replace_callback(
        '@<span style="color: #FF8000">(.+)</span>@',
        function ($matches) {
            return '<span style="color: #FF8000">'.str_replace('&nbsp;', ' ', $matches[0]).'</span>';
        },
        $code
    );
    echo '<div class="code">'.$code.'</div>';
}

function snipet(string $code): void
{
    $code = '<?'.PHP_EOL.$code.PHP_EOL.'?>';
    $code = highlight_string($code, true);
    $code = str_replace(['&lt;?', '?&gt;', '<br />'], '', $code);
    echo '<span class="snipet">'.$code.'</span>';
}
