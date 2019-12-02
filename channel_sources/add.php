<?php
define('KNOWN_CHANNEL_SOURCES_DOCS_URL', 'https://acestream.readthedocs.io/en/latest/acestream_livetv_android/known_channel_sources.html');
define('SEARCH_API_DOCS_URL', 'https://acestream.readthedocs.io/en/latest/acestream_livetv_android/search_api.html');
define('REPO_PATH', '/home/repo/acestream-docs');
define('SOURCE_LIST_MARKER', '// sources are added below this line');
define('SOURCE_NAME_MARKER', '* | Name: ');
define('SOURCE_URL_MARKER', '  | Source URL: ');

$error = null;
$info = null;
$url = '';
$name = '';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $url = isset($_POST['url']) ? $_POST['url'] : '';

        $name = trim($name);
        $url = trim($url);

        add_source($name, $url);
        $info = 'Source added';
        $name = '';
        $url = '';
    }
    catch(Exception $e) {
        $error = $e->getMessage();
    }
}

header('Content-Type: text/html; charset=utf-8');
?>
<!doctype html>
<html>
    <head>
        <title>Add new channel source</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- MDL -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

        <style>
        h1 {
            font-size: 24px;
            text-align: center;
        }
        #content {
            width: 400px;
            margin: 0 auto;
            display: block;
        }
        .error {
            color: #ffffff;
            padding: 16px;
            margin: 16px 0;
        }
        .info {
            color: #ffffff;
            padding: 16px;
            margin: 16px 0;
        }
        .fixed-footer {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
        }
        </style>
    </head>
    <body class="mdl-color--grey-100">
        <div class="mdl-layout__container">
            <main id="content" class="mdl-layout__content ">
                <?php
                if($error) {
                    echo '<div class="error mdl-color--accent">' . htmlspecialchars($error) . '</div>';
                }
                if($info) {
                    echo '<div class="info mdl-color--primary">' . htmlspecialchars($info) . '</div>';
                }
                ?>
                <h1>Add new channel source</h1>
                <div style="">
                    * Add known to you source for searching live broadcasts, which implements <a class="mdl-color-text--primary" href="<?php echo SEARCH_API_DOCS_URL; ?>" target="_blank">Search API</a>
                </div>
                <form action="" method="post">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%;">
                        <input class="mdl-textfield__input" type="text" id="input-name" name="name" value="<?php echo $name; ?>">
                        <label class="mdl-textfield__label" for="input-name">Source name</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%;">
                        <input class="mdl-textfield__input" type="text" id="input-url" name="url" value="<?php echo $url; ?>">
                        <label class="mdl-textfield__label" for="input-url">Source URL</label>
                    </div>
                    <br/>
                    <input type="submit" value="Add" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" />
                </form>

                <br/>
                <div>
                    <a href="<?php echo KNOWN_CHANNEL_SOURCES_DOCS_URL; ?>" class="mdl-color-text--primary" style="display: inline-block; float: left;">Back to docs</a>
                    <a href="https://github.com/acestream/acestream-docs/blob/master/channel_sources/add.php" class="mdl-color-text--primary" style="display: inline-block; float: right;">
                        <svg version="1.1" width="16" height="16" viewBox="0 0 16 16" class="octicon octicon-mark-github" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
                        <span>View source on GitHub</span>
                    </a>
                </div>
            </main>
        </div>
    </body>
</html>
<?php

////////////////////////////////////////////////////////////////////////////////

function add_source($name, $url) {
    validate_source($name, $url);
    pull();
    $sources = load_sources();
    if(array_key_exists($url, $sources)) {
        throw new Exception('Source already exists');
    }

    $sources[$url] = array(
        'name' => $name,
        );
    save_sources($sources);
    push();
}

function get_sources_files_path() {
    return REPO_PATH . '/known_channel_sources.rst';
}

function load_sources() {
    $sources = array();
    $lines = file(get_sources_files_path());
    if($lines) {
        $got_marker = false;
        for($i = 0; $i < count($lines); $i++) {
            $line = $lines[$i];
            if(!$got_marker) {
                if(trim($line) == SOURCE_LIST_MARKER) {
                    $got_marker = true;
                }
                continue;
            }

            if(starts_with($line, SOURCE_NAME_MARKER)) {
                $source_name = trim(substr($line, strlen(SOURCE_NAME_MARKER)));
                $source_name = str_replace('`', '', $source_name);

                $next_line = $lines[$i+1];
                if(!starts_with($next_line, SOURCE_URL_MARKER)) {
                    throw new Exception('Internal error: malformed source list');
                }
                ++$i;
                $source_url = trim(substr($next_line, strlen(SOURCE_URL_MARKER)));

                $sources[$source_url] = array(
                    'name' => $source_name,
                    );
            }
        }
    }

    return $sources;
}

function save_sources($sources) {
    $new_lines = array();
    $lines = file(get_sources_files_path());
    if(!$lines) {
        $new_lines[] = '=====================';
        $new_lines[] = 'Known channel sources';
        $new_lines[] = '=====================';
        $new_lines[] = '';
    }
    else {
        $got_marker = false;
        foreach($lines as $line) {
            $line = trim($line);
            if($got_marker) {
                break;
            }
            else {
                if($line == SOURCE_LIST_MARKER) {
                    $got_marker = true;
                }
                $new_lines[] = $line;
            }
        }

        if(!$got_marker) {
            throw new Exception('Internal error: marker not found');
        }
    }

    $new_lines[] = '';
    $new_lines[] = '';
    foreach($sources as $source_url => $source) {
        // escape with backquotes
        $new_lines[] = SOURCE_NAME_MARKER . '`' . str_replace('`', '\`', $source['name']) . '`';
        $new_lines[] = SOURCE_URL_MARKER . $source_url;
        $new_lines[] = '';
    }
    file_put_contents(get_sources_files_path(), implode("\n", $new_lines));
}

function validate_source($name, $url) {
    if(!$name) {
        throw new Exception('Validation failed: empty name');
    }
    if(!$url) {
        throw new Exception('Validation failed: empty URL');
    }
    if(!starts_with($url, 'http://') && !starts_with($url, 'https://')) {
        throw new Exception('Validation failed: not a valid URL (1)');
    }
    if(!filter_var($url, FILTER_VALIDATE_URL)) {
        throw new Exception('Validation failed: not a valid URL (2)');
    }

    if(strpos($url, '?') === false) {
        $url .= '?';
    }
    else {
        $url .= '&';
    }
    $params = array(
        'query' => 'test',
        );
    $url .= http_build_query($params);
    $response = file_get_contents($url);
    if(!$response) {
        throw new Exception('Validation failed: empty response');
    }
    $data = json_decode($response, true);
    if(!$data) {
        throw new Exception('Validation failed: failed to parse response');
    }
    if(!array_key_exists('result', $data)) {
        throw new Exception('Validation failed: malformed response (1)');
    }
    $fields = array('time', 'total', 'results');
    foreach($fields as $field) {
        if(!array_key_exists($field, $data['result'])) {
            throw new Exception('Validation failed: malformed response (2)');
        }
    }
}

function push() {
    run_command('git push');
}

function pull() {
    run_command('git pull');
}

function run_command($command) {
    $descriptorspec = array(
        1 => array('pipe', 'w'),
        2 => array('pipe', 'w'),
    );
    $pipes = array();
    $resource = proc_open($command, $descriptorspec, $pipes, REPO_PATH);
    $stdout = stream_get_contents($pipes[1]);
    $stderr = stream_get_contents($pipes[2]);
    foreach ($pipes as $pipe) {
        fclose($pipe);
    }
    $status = trim(proc_close($resource));
    if($status) {
        throw new Exception($stderr . "\n" . $stdout);
    }
    return $stdout;
}

function starts_with($haystack, $needle) {
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}
