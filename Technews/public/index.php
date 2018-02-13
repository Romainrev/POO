<?php

# Chargement du Bootstrap
use Core\Core;

require_once 'bootstrap.php';

# Chargement du header
include_once PATH_HEADER;

# Contenu de mon site
$core = new Core($_GET);

# Chargement du Footer
include_once PATH_FOOTER;