<?php

declare(strict_types=1);

$projectTitle = 'Self-Hosted Mobile';
$projectTagline = 'Mobile-friendly access to your self-hosted services';
$githubUrl = 'https://github.com/bchilton9/Self-Hosted-Mobile';

$readmeCandidates = [
    __DIR__ . '/README.md',
    __DIR__ . '/Readme.md',
    __DIR__ . '/readme.md',
];

$readmeFile = null;

foreach ($readmeCandidates as $candidate) {
    if (is_file($candidate)) {
        $readmeFile = $candidate;
        break;
    }
}

$markdown = $readmeFile !== null
    ? (string) file_get_contents($readmeFile)
    : "# README not found\n\nThis project does not currently have a README.md file.";

function h(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title><?= h($projectTitle) ?> | ChilSoft</title>

    <link
        rel="stylesheet"
        href="/assets/css/main-styles.css"
    >

    <style>
        .project-page {
            width: min(1100px, calc(100% - 2rem));
            margin: 90px auto 3rem;
        }

        .project-header {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .project-header h1 {
            margin-bottom: 0.35rem;
        }

        .project-header p {
            margin-top: 0;
            opacity: 0.8;
        }

        .project-navigation {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .project-navigation a {
            display: inline-block;
            padding: 0.55rem 0.9rem;
            border: 1px solid rgba(0, 240, 255, 0.45);
            border-radius: 6px;
            background: rgba(0, 0, 0, 0.45);
            color: #00f0ff;
            text-decoration: none;
        }

        .project-navigation a:hover,
        .project-navigation a:focus {
            background: rgba(0, 240, 255, 0.12);
        }

        .markdown-content {
            overflow-wrap: anywhere;
        }

        .markdown-content h1,
        .markdown-content h2,
        .markdown-content h3,
        .markdown-content h4 {
            scroll-margin-top: 80px;
        }

        .markdown-content img {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 1rem auto;
        }

        .markdown-content pre {
            max-width: 100%;
            overflow-x: auto;
            padding: 1rem;
            border: 1px solid rgba(0, 240, 255, 0.25);
            border-radius: 6px;
            background: rgba(0, 0, 0, 0.65);
        }

        .markdown-content code {
            font-family: "Fira Code", monospace;
        }

        .markdown-content :not(pre) > code {
            padding: 0.1rem 0.3rem;
            border-radius: 4px;
            background: rgba(0, 0, 0, 0.55);
        }

        .markdown-content table {
            display: block;
            max-width: 100%;
            overflow-x: auto;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        .markdown-content th,
        .markdown-content td {
            padding: 0.65rem;
            border: 1px solid rgba(0, 240, 255, 0.25);
            text-align: left;
        }

        .markdown-content blockquote {
            margin-left: 0;
            padding-left: 1rem;
            border-left: 4px solid #00f0ff;
            opacity: 0.9;
        }

        @media (max-width: 700px) {
            .project-page {
                width: min(100% - 1rem, 1100px);
                margin-top: 75px;
            }
        }
    </style>
</head>

<body>
    <canvas id="matrix"></canvas>

    <div class="logo-right">
        <a href="/" aria-label="Return to ChilSoft">
            <img
                src="/assets/img/logo.png"
                alt="ChilSoft Logo"
                class="full-logo"
            >
        </a>
    </div>

    <main class="project-page">
        <section class="welcome-box project-header">
            <h1><?= h($projectTitle) ?></h1>

            <p><?= h($projectTagline) ?></p>

            <nav
                class="project-navigation"
                aria-label="Project navigation"
            >
                <a href="/">ChilSoft Home</a>

                <a
                    href="<?= h($githubUrl) ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    GitHub Repository
                </a>
            </nav>
        </section>

        <section class="card-box">
            <article
                class="markdown-content"
                id="readme-content"
            >
                <p>Loading README…</p>
            </article>
        </section>
    </main>

    <footer>
        <div class="fake-status-bar">
            <span>Project: <?= h($projectTitle) ?></span>
            <span>README: <?= $readmeFile !== null ? 'Loaded' : 'Missing' ?></span>
            <span>Coffee: ∞</span>
        </div>

        <p>
            &copy; <?= date('Y') ?> ChilSoft.
            All rights reserved.
        </p>

        <p>
            Use any code, tools, or instructions at your own risk.
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="/assets/js/main-script.js"></script>

    <script>
        const markdown = <?= json_encode(
            $markdown,
            JSON_HEX_TAG
            | JSON_HEX_AMP
            | JSON_HEX_APOS
            | JSON_HEX_QUOT
        ) ?>;

        const readmeContent = document.getElementById('readme-content');

        readmeContent.innerHTML = marked.parse(markdown);
    </script>
</body>
</html>